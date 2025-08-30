<?php

/**
 * Uber Freight API Client for Load Posting
 * Handles authentication and load creation
 */
class UberFreightAPI {
    
    private $clientId;
    private $clientSecret;
    private $baseUrl;
    private $accessToken;
    
    public function __construct($clientId, $clientSecret, $sandbox = true) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        // Updated URLs based on current Uber Freight API structure
        $this->baseUrl = $sandbox ? 
            'https://sandbox.uberfreight.com/api' : 
            'https://api.uberfreight.com';
    }
    
    /**
     * Set custom base URL (use this if you find the correct endpoint)
     */
    public function setBaseUrl($baseUrl) {
        $this->baseUrl = rtrim($baseUrl, '/');
        return $this;
    }
    
    /**
     * Get current base URL
     */
    public function getBaseUrl() {
        return $this->baseUrl;
    }
    public function authenticate() {
        $authUrl = $this->baseUrl . '/oauth2/token';
        
        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'scope' => 'freight.loads'
        ];
        
        $response = $this->makeRequest($authUrl, 'POST', $data, [], false);
        
        if (isset($response['access_token'])) {
            $this->accessToken = $response['access_token'];
            return true;
        }
        
        throw new Exception('Authentication failed: ' . json_encode($response));
    }
    
    /**
     * Get rate quote for a load (optional step)
     */
    public function getRateQuote($loadData) {
        $url = $this->baseUrl . '/v1/quotes';
        
        $quoteData = [
            'origin' => $loadData['origin'],
            'destination' => $loadData['destination'],
            'cargo' => $loadData['cargo'],
            'pickup_date' => $loadData['pickup_date'],
            'delivery_date' => $loadData['delivery_date']
        ];
        
        return $this->makeRequest($url, 'POST', $quoteData);
    }
    
    /**
     * Create a new load posting
     */
    public function createLoad($loadData) {
        $url = $this->baseUrl . '/v1/loads';
        
        // Validate required fields
        $this->validateLoadData($loadData);
        
        $payload = [
            'external_id' => $loadData['external_id'] ?? uniqid('load_'),
            'origin' => [
                'address' => $loadData['origin']['address'],
                'city' => $loadData['origin']['city'],
                'state' => $loadData['origin']['state'],
                'postal_code' => $loadData['origin']['postal_code'],
                'country' => $loadData['origin']['country'] ?? 'US',
                'latitude' => $loadData['origin']['latitude'] ?? null,
                'longitude' => $loadData['origin']['longitude'] ?? null
            ],
            'destination' => [
                'address' => $loadData['destination']['address'],
                'city' => $loadData['destination']['city'],
                'state' => $loadData['destination']['state'],
                'postal_code' => $loadData['destination']['postal_code'],
                'country' => $loadData['destination']['country'] ?? 'US',
                'latitude' => $loadData['destination']['latitude'] ?? null,
                'longitude' => $loadData['destination']['longitude'] ?? null
            ],
            'cargo' => [
                'weight' => $loadData['cargo']['weight'],
                'weight_unit' => $loadData['cargo']['weight_unit'] ?? 'lbs',
                'commodity' => $loadData['cargo']['commodity'],
                'value' => $loadData['cargo']['value'] ?? null,
                'hazmat' => $loadData['cargo']['hazmat'] ?? false,
                'temperature_controlled' => $loadData['cargo']['temperature_controlled'] ?? false
            ],
            'equipment' => [
                'type' => $loadData['equipment']['type'] ?? 'dry_van',
                'length' => $loadData['equipment']['length'] ?? null
            ],
            'timeline' => [
                'pickup_date' => $loadData['timeline']['pickup_date'],
                'pickup_time_start' => $loadData['timeline']['pickup_time_start'] ?? null,
                'pickup_time_end' => $loadData['timeline']['pickup_time_end'] ?? null,
                'delivery_date' => $loadData['timeline']['delivery_date'],
                'delivery_time_start' => $loadData['timeline']['delivery_time_start'] ?? null,
                'delivery_time_end' => $loadData['timeline']['delivery_time_end'] ?? null
            ],
            'pricing' => [
                'rate' => $loadData['pricing']['rate'] ?? null,
                'currency' => $loadData['pricing']['currency'] ?? 'USD',
                'payment_terms' => $loadData['pricing']['payment_terms'] ?? 'net_30'
            ],
            'contact' => [
                'name' => $loadData['contact']['name'],
                'phone' => $loadData['contact']['phone'],
                'email' => $loadData['contact']['email']
            ],
            'notes' => $loadData['notes'] ?? '',
            'reference_numbers' => $loadData['reference_numbers'] ?? []
        ];
        
        return $this->makeRequest($url, 'POST', $payload);
    }
    
    /**
     * Get load status and details
     */
    public function getLoad($loadId) {
        $url = $this->baseUrl . '/v1/loads/' . $loadId;
        return $this->makeRequest($url, 'GET');
    }
    
    /**
     * Update an existing load
     */
    public function updateLoad($loadId, $updateData) {
        $url = $this->baseUrl . '/v1/loads/' . $loadId;
        return $this->makeRequest($url, 'PATCH', $updateData);
    }
    
    /**
     * Cancel a load
     */
    public function cancelLoad($loadId, $reason = '') {
        $url = $this->baseUrl . '/v1/loads/' . $loadId . '/cancel';
        $data = ['reason' => $reason];
        return $this->makeRequest($url, 'POST', $data);
    }
    
    /**
     * Get list of your posted loads
     */
    public function getLoads($filters = []) {
        $url = $this->baseUrl . '/v1/loads';
        
        if (!empty($filters)) {
            $url .= '?' . http_build_query($filters);
        }
        
        return $this->makeRequest($url, 'GET');
    }
    
    /**
     * Validate required load data fields
     */
    private function validateLoadData($loadData) {
        $required = [
            'origin.address', 'origin.city', 'origin.state', 'origin.postal_code',
            'destination.address', 'destination.city', 'destination.state', 'destination.postal_code',
            'cargo.weight', 'cargo.commodity',
            'timeline.pickup_date', 'timeline.delivery_date',
            'contact.name', 'contact.phone', 'contact.email'
        ];
        
        foreach ($required as $field) {
            $keys = explode('.', $field);
            $value = $loadData;
            
            foreach ($keys as $key) {
                if (!isset($value[$key]) || empty($value[$key])) {
                    throw new Exception("Required field missing: {$field}");
                }
                $value = $value[$key];
            }
        }
    }
    
    /**
     * Make HTTP request to Uber Freight API
     */
    private function makeRequest($url, $method = 'GET', $data = null, $headers = [], $useAuth = true) {
        $ch = curl_init();
        
        // Base headers
        $defaultHeaders = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];
        
        // Add authorization header if authenticated
        if ($useAuth && $this->accessToken) {
            $defaultHeaders[] = 'Authorization: Bearer ' . $this->accessToken;
        }
        
        $allHeaders = array_merge($defaultHeaders, $headers);
        
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $allHeaders,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => true
        ]);
        
        if ($data && in_array($method, ['POST', 'PUT', 'PATCH'])) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
        
        if ($error) {
            throw new Exception('cURL Error: ' . $error);
        }
        
        $decodedResponse = json_decode($response, true);
        
        if ($httpCode >= 400) {
            throw new Exception('API Error (' . $httpCode . '): ' . 
                ($decodedResponse['message'] ?? $response));
        }
        
        return $decodedResponse;
    }
}

/**
 * Example usage and testing
 */
class UberFreightExample {
    
    public static function postSampleLoad() {
        // Initialize API client (use your actual credentials)
        $api = new UberFreightAPI(
            'e8WrBgg4q_HtVux0N0NzwyHxrKoIrZ75',
            'OQ9vVb5XA9yQqOZvZ268VTu89KhzBHSJW0Ez-4cb',
            true // Use sandbox for testing
        );
        
        try {
            // Step 1: Authenticate
            echo "Authenticating...\n";
            $api->authenticate();
            echo "Authentication successful!\n";
            
            // Step 2: Prepare load data
            $loadData = [
                'external_id' => 'LOAD_' . date('YmdHis'),
                'origin' => [
                    'address' => '123 Warehouse St',
                    'city' => 'Chicago',
                    'state' => 'IL',
                    'postal_code' => '60601',
                    'country' => 'US'
                ],
                'destination' => [
                    'address' => '456 Distribution Ave',
                    'city' => 'Dallas',
                    'state' => 'TX',
                    'postal_code' => '75201',
                    'country' => 'US'
                ],
                'cargo' => [
                    'weight' => 25000,
                    'weight_unit' => 'lbs',
                    'commodity' => 'Electronics',
                    'value' => 50000,
                    'hazmat' => false,
                    'temperature_controlled' => false
                ],
                'equipment' => [
                    'type' => 'dry_van',
                    'length' => 53
                ],
                'timeline' => [
                    'pickup_date' => date('Y-m-d', strtotime('+2 days')),
                    'pickup_time_start' => '08:00',
                    'pickup_time_end' => '17:00',
                    'delivery_date' => date('Y-m-d', strtotime('+5 days')),
                    'delivery_time_start' => '09:00',
                    'delivery_time_end' => '16:00'
                ],
                'pricing' => [
                    'rate' => 2500.00,
                    'currency' => 'USD',
                    'payment_terms' => 'net_30'
                ],
                'contact' => [
                    'name' => 'John Smith',
                    'phone' => '+1-555-0123',
                    'email' => 'john.smith@company.com'
                ],
                'notes' => 'Appointment required for pickup and delivery. Loading dock available.',
                'reference_numbers' => [
                    'bol' => 'BOL123456',
                    'po' => 'PO789012'
                ]
            ];
            
            // Step 3: Get rate quote (optional)
            echo "Getting rate quote...\n";
            $quote = $api->getRateQuote($loadData);
            echo "Quote received: " . json_encode($quote, JSON_PRETTY_PRINT) . "\n";
            
            // Step 4: Create the load
            echo "Creating load...\n";
            $result = $api->createLoad($loadData);
            echo "Load created successfully!\n";
            echo "Load ID: " . $result['id'] . "\n";
            echo "Status: " . $result['status'] . "\n";
            
            // Step 5: Check load status
            $loadStatus = $api->getLoad($result['id']);
            echo "Current load status: " . json_encode($loadStatus, JSON_PRETTY_PRINT) . "\n";
            
            return $result;
            
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
            return false;
        }
    }
    
    /**
     * Monitor load status changes
     */
    public static function monitorLoad($api, $loadId) {
        try {
            $load = $api->getLoad($loadId);
            
            echo "Load Status Update:\n";
            echo "ID: " . $load['id'] . "\n";
            echo "Status: " . $load['status'] . "\n";
            echo "Carrier: " . ($load['carrier']['name'] ?? 'Not assigned') . "\n";
            echo "Rate: $" . ($load['final_rate'] ?? $load['quoted_rate']) . "\n";
            
            return $load;
            
        } catch (Exception $e) {
            echo "Error monitoring load: " . $e->getMessage() . "\n";
            return false;
        }
    }
}

/**
 * Webhook handler for receiving status updates
 */
class UberFreightWebhook {
    
    /**
     * Handle incoming webhook from Uber Freight
     */
    public static function handleWebhook() {
        // Verify webhook signature (implement based on Uber Freight docs)
        $payload = file_get_contents('php://input');
        $data = json_decode($payload, true);
        
        if (!$data) {
            http_response_code(400);
            echo "Invalid JSON payload";
            return;
        }
        
        // Process different event types
        switch ($data['event_type']) {
            case 'load.created':
                self::handleLoadCreated($data);
                break;
                
            case 'load.assigned':
                self::handleLoadAssigned($data);
                break;
                
            case 'load.picked_up':
                self::handleLoadPickedUp($data);
                break;
                
            case 'load.delivered':
                self::handleLoadDelivered($data);
                break;
                
            case 'load.cancelled':
                self::handleLoadCancelled($data);
                break;
                
            default:
                error_log('Unknown webhook event: ' . $data['event_type']);
        }
        
        // Respond with 200 OK
        http_response_code(200);
        echo "OK";
    }
    
    private static function handleLoadCreated($data) {
        $loadId = $data['load']['id'];
        echo "Load created: {$loadId}\n";
        
        // Update your database
        // self::updateLoadStatus($loadId, 'created');
    }
    
    private static function handleLoadAssigned($data) {
        $loadId = $data['load']['id'];
        $carrier = $data['load']['carrier']['name'];
        echo "Load {$loadId} assigned to carrier: {$carrier}\n";
        
        // Update your database
        // self::updateLoadStatus($loadId, 'assigned', $carrier);
    }
    
    private static function handleLoadPickedUp($data) {
        $loadId = $data['load']['id'];
        echo "Load {$loadId} picked up\n";
        
        // Update your database and notify customer
        // self::updateLoadStatus($loadId, 'picked_up');
    }
    
    private static function handleLoadDelivered($data) {
        $loadId = $data['load']['id'];
        echo "Load {$loadId} delivered successfully\n";
        
        // Update your database and trigger billing
        // self::updateLoadStatus($loadId, 'delivered');
    }
    
    private static function handleLoadCancelled($data) {
        $loadId = $data['load']['id'];
        $reason = $data['load']['cancellation_reason'] ?? 'Unknown';
        echo "Load {$loadId} cancelled. Reason: {$reason}\n";
        
        // Update your database
        // self::updateLoadStatus($loadId, 'cancelled');
    }
}

/**
 * Configuration and utility functions
 */
class UberFreightConfig {
    
    // Equipment types supported by Uber Freight
    public static $equipmentTypes = [
        'dry_van' => 'Dry Van',
        'reefer' => 'Refrigerated',
        'flatbed' => 'Flatbed',
        'step_deck' => 'Step Deck',
        'lowboy' => 'Lowboy',
        'tanker' => 'Tanker',
        'auto_carrier' => 'Auto Carrier'
    ];
    
    // Common commodity types
    public static $commodityTypes = [
        'general_freight' => 'General Freight',
        'electronics' => 'Electronics',
        'automotive' => 'Automotive',
        'food_beverage' => 'Food & Beverage',
        'chemicals' => 'Chemicals',
        'machinery' => 'Machinery',
        'textiles' => 'Textiles',
        'paper' => 'Paper Products'
    ];
    
    /**
     * Validate US postal code format
     */
    public static function validatePostalCode($postalCode) {
        return preg_match('/^\d{5}(-\d{4})?$/', $postalCode);
    }
    
    /**
     * Format phone number for API
     */
    public static function formatPhoneNumber($phone) {
        // Remove all non-digits
        $digits = preg_replace('/\D/', '', $phone);
        
        // Add +1 if US number without country code
        if (strlen($digits) === 10) {
            return '+1' . $digits;
        }
        
        return '+' . $digits;
    }
}

/**
 * API Endpoint Configuration Helper
 * Use this to find and test the correct API endpoints
 */
class UberFreightEndpointTester {
    
    private $clientId;
    private $clientSecret;
    
    public function __construct($clientId, $clientSecret) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }
    
    /**
     * Test different possible API endpoints
     */
    public function findWorkingEndpoint() {
        // Possible base URLs for Uber Freight API
        $possibleUrls = [
            'https://sandbox.uberfreight.com/api',
            'https://api-sandbox.uberfreight.com',
            'https://sandbox-api.uberfreight.com',
            'https://partners.uberfreight.com/api',
            'https://developer.uberfreight.com/api',
            'https://api.uberfreight.com' // Production - use carefully
        ];
        
        echo "Testing API endpoints...\n";
        
        foreach ($possibleUrls as $baseUrl) {
            echo "Testing: {$baseUrl}\n";
            
            if ($this->testEndpoint($baseUrl)) {
                echo "✅ Working endpoint found: {$baseUrl}\n";
                return $baseUrl;
            } else {
                echo "❌ Failed: {$baseUrl}\n";
            }
        }
        
        echo "❌ No working endpoint found. Please check:\n";
        echo "1. Your credentials are correct\n";
        echo "2. Your developer account has API access\n";
        echo "3. Check Uber Freight developer portal for current URLs\n";
        
        return null;
    }
    
    /**
     * Test if an endpoint is accessible
     */
    private function testEndpoint($baseUrl) {
        $authUrl = $baseUrl . '/oauth2/token';
        
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $authUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_NOBODY => true, // HEAD request to test connectivity
            CURLOPT_HEADER => true
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
        
        // If we get any HTTP response (even 404 or 401), the endpoint exists
        // DNS resolution errors will cause cURL errors
        return !$error && $httpCode > 0;
    }
    
    /**
     * Get API documentation or status page
     */
    public function getApiInfo($baseUrl) {
        $infoUrls = [
            $baseUrl . '/docs',
            $baseUrl . '/status',
            $baseUrl . '/health',
            $baseUrl . '/v1',
            $baseUrl
        ];
        
        foreach ($infoUrls as $url) {
            echo "Checking info at: {$url}\n";
            
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_USERAGENT => 'UberFreight-PHP-Client/1.0'
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($httpCode === 200) {
                echo "Response from {$url}:\n";
                echo substr($response, 0, 500) . "...\n\n";
            }
        }
    }
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['webhook'])) {
    // Handle webhook
    UberFreightWebhook::handleWebhook();
} elseif (isset($_GET['test_endpoints'])) {
    // Test endpoints
    echo "=== Uber Freight API Endpoint Tester ===\n";
    $tester = new UberFreightEndpointTester('e8WrBgg4q_HtVux0N0NzwyHxrKoIrZ75', 'OQ9vVb5XA9yQqOZvZ268VTu89KhzBHSJW0Ez-4cb');
    $workingUrl = $tester->findWorkingEndpoint();
    
    if ($workingUrl) {
        echo "\nGetting API info...\n";
        $tester->getApiInfo($workingUrl);
    }
} else {
    // Example load posting
    echo "=== Uber Freight Load Posting Example ===\n";
    echo "If you get DNS resolution errors, run with ?test_endpoints=1 first\n\n";
    UberFreightExample::postSampleLoad();
}

/**
 * Advanced Features and Error Handling
 */
class UberFreightAdvanced extends UberFreightAPI {
    
    /**
     * Batch create multiple loads
     */
    public function createMultipleLoads($loadsArray) {
        $results = [];
        
        foreach ($loadsArray as $index => $loadData) {
            try {
                echo "Creating load " . ($index + 1) . " of " . count($loadsArray) . "...\n";
                $result = $this->createLoad($loadData);
                $results[] = ['success' => true, 'data' => $result];
                
                // Rate limiting - wait between requests
                sleep(1);
                
            } catch (Exception $e) {
                $results[] = [
                    'success' => false, 
                    'error' => $e->getMessage(),
                    'load_data' => $loadData
                ];
            }
        }
        
        return $results;
    }
    
    /**
     * Search for available carriers for a specific route
     */
    public function searchCarriers($origin, $destination, $equipmentType = 'dry_van') {
        $url = $this->baseUrl . '/v1/carriers/search';
        
        $searchData = [
            'origin' => $origin,
            'destination' => $destination,
            'equipment_type' => $equipmentType,
            'available_date' => date('Y-m-d')
        ];
        
        return $this->makeRequest($url, 'POST', $searchData);
    }
    
    /**
     * Get market rates for a lane
     */
    public function getMarketRates($origin, $destination, $equipmentType = 'dry_van') {
        $url = $this->baseUrl . '/v1/market-rates';
        
        $params = [
            'origin_city' => $origin['city'],
            'origin_state' => $origin['state'],
            'destination_city' => $destination['city'],
            'destination_state' => $destination['state'],
            'equipment_type' => $equipmentType
        ];
        
        $url .= '?' . http_build_query($params);
        
        return $this->makeRequest($url, 'GET');
    }
}

?>

<!-- 
USAGE INSTRUCTIONS:

1. SETUP:
   - Replace 'YOUR_CLIENT_ID' and 'YOUR_CLIENT_SECRET' with your actual credentials
   - Set up webhook endpoint for status updates
   - Test in sandbox environment first

2. BASIC LOAD POSTING:
   $api = new UberFreightAPI('client_id', 'client_secret', true);
   $api->authenticate();
   $result = $api->createLoad($loadData);

3. WEBHOOK SETUP:
   - Point Uber Freight webhook to: https://yoursite.com/webhook.php?webhook=1
   - Handle different event types in UberFreightWebhook class

4. ERROR HANDLING:
   - All methods throw exceptions on errors
   - Use try-catch blocks for proper error handling
   - Check API response status codes

5. TESTING:
   - Always test in sandbox environment first
   - Verify load data format before posting
   - Monitor webhook events during testing

6. PRODUCTION CHECKLIST:
   - Switch to production API URL
   - Implement proper logging
   - Set up monitoring for failed requests
   - Handle rate limiting appropriately
   - Secure webhook endpoint
-->