  

  <?php
            function time_elapsed_string($datetime, $full = false)
            {
                $now = new DateTime('now', new DateTimeZone('UTC'));

                // Support three input types:
                // 1) Numeric less than 946684800 (2000-01-01): age in seconds
                // 2) Numeric greater/equal to 946684800: Unix timestamp (seconds)
                // 3) Non-numeric string (e.g., ISO8601 'YYYY-MM-DDTHH:MM:SS'): parse as datetime in UTC
                if (is_numeric($datetime)) {
                    if ($datetime < 946684800) {
                        // Treat as age in seconds, convert to timestamp by subtracting from current time
                        $ago = new DateTime('now', new DateTimeZone('UTC'));
                        // Round to whole seconds for DateInterval compatibility
                        $seconds = (int) round($datetime);
                        $ago->sub(new DateInterval('PT' . $seconds . 'S'));
                    } else {
                        // Treat as Unix timestamp (seconds since epoch)
                        $ago = new DateTime('@' . ((int) $datetime));
                        $ago->setTimezone(new DateTimeZone('UTC'));
                    }
                } else {
                    // Attempt to parse as a date-time string (e.g., '2025-09-20T10:44:50')
                    try {
                        $ago = new DateTime((string) $datetime, new DateTimeZone('UTC'));
                    } catch (Exception $e) {
                        // Fallback to now if parsing fails to avoid breaking the flow
                        $ago = new DateTime('now', new DateTimeZone('UTC'));
                    }
                }

                $diff = $now->diff($ago);

                // If less than a minute old
                if ($diff->y == 0 && $diff->m == 0 && $diff->d == 0 && $diff->h == 0 && $diff->i == 0) {
                    return $diff->s > 0 ? $diff->s . 's' : 'now';
                }
                // If less than an hour old
                elseif ($diff->y == 0 && $diff->m == 0 && $diff->d == 0 && $diff->h == 0) {
                    return $diff->i . 'm';
                }
                // If less than a day old
                elseif ($diff->y == 0 && $diff->m == 0 && $diff->d == 0) {
                    return $diff->h . 'h';
                }
                // If less than a month old
                elseif ($diff->y == 0 && $diff->m == 0) {
                    return $diff->d . 'd';
                }
                // If less than a year old
                elseif ($diff->y == 0) {
                    return $diff->m . 'mo';
                }
                // Otherwise show years
                else {
                    return $diff->y . 'y';
                }
            }


            include 'config/config.php';

            if (isset($_COOKIE['vendor'])) {
                $userData = json_decode($_COOKIE['vendor'], true);
            } else {
                $userData = [];
            }
            // print_r($userData);

            $address = '';
            $loadRadius = '';
            $loadType = '';
            if (isset($_GET['address'])) {
                $address = $_GET['address'];
                $loadRadius = $_GET['load_radius'];
                $loadType = $_GET['load_type'];
            } else {
                $address = $userData['city'] . ', ' . $userData['state'] . ', USA';
                if ($address == ', , ') {
                    $address = 'Glen Burnie,MD,US';
                }
                $loadRadius = '300';
                $loadType = 'all';
            }

            $data['id'] = $userData['id'];
            $data['address'] = $address;
            $data['load_radius'] = $loadRadius;
            $data['load_type'] = $loadType;
            $response = getLoadsFromTP($data);

            $data123['location'] = $address;
            $response123 = getLoadFrom123($data123);
            $responseTS = getLoadFromTS();


?>

<?php
    $shipments = [];
    $loads = $response['data']['items'];
   
    foreach ($loads as $key => $value) {
        if ($value['drop_off']['address']['city'] && $value['drop_off']['address']['state']) {
            $dropoff = $value['drop_off']['address']['city'] . ', ' . $value['drop_off']['address']['state'];
        } else {
            $dropoff = 'N/A';
        }
        if (!empty($value['equipment'])) {
            // Use full equipment names with proper casing and uniqueness
            $equipmentNames = array_map(function ($eq) {
                // Ensure string and apply consistent casing (e.g., "Van", "Flatbed")
                return ucwords(strtolower((string)$eq));
            }, $value['equipment']);
            $equipment = implode(', ', array_unique(array_filter($equipmentNames)));
        } else {
            $equipment = 'N/A';
        }
        $shipments[] = [
            'pickup_date' => $value['all_in_one_date']['pickup_day'] ?? 'N/A',
            'pickup' => $value['pickup']['address']['city'] . ', ' . $value['pickup']['address']['state'],
            'pickup_lat' => $value['pickup']['location']['lat'],
            'pickup_lng' => $value['pickup']['location']['lng'],
            'dropoff_lat' => $value['drop_off']['location']['lat'],
            'dropoff_lng' => $value['drop_off']['location']['lng'],
            'dropoff_date' => $value['drop_off']['date_local'] ?? '',
            'deadhead' => number_format($value['pickup']['deadhead'], 2),
            'dropoff' => $dropoff,
            'broker' => $value['broker']['company'] ?? 'N/A',
            'broker_dot' => $value['broker']['dot'] ?? 'N/A',
            'price' => $value['price'] ?? 0,
            'avg_price' => $value['avg_price'] ?? 0,
            'distance_total' => $value['distance_total'] ?? 0,
            'weight' => $value['weight'] ?? 0,
            'created_at' => time_elapsed_string($value['created_at'] / 1000),  // Show relative time (e.g., '2 hours ago')
            'equipment' => $equipment,
            'id' => $value['shipment_id'],
            'shipment_data' => $value
        ];
    }
    $shipmentsNew = [];  // Initialize empty array

    if (isset($response123['status']) && $response123['status'] != 'pending' && $response123['status'] == 200) {
        $loadsNew = $response123['data']['loads'];

        foreach ($loadsNew as $key => $value) {
            if (!empty($value['equipments'])) {
                // Use full equipment type names (from nested arrays/objects), properly cased and unique
                $equipmentNames = array_map(function ($eq) {
                    // Extract equipment type from the nested array/object
                    $eqType = '';
                    if (is_array($eq)) {
                        $eqType = $eq['equipmentType'] ?? '';
                    } elseif (is_object($eq)) {
                        $eqType = $eq->equipmentType ?? '';
                    } else {
                        $eqType = (string)$eq;
                    }
                    return ucwords(strtolower($eqType));
                }, $value['equipments']);
                $equipment = implode(', ', array_unique(array_filter($equipmentNames)));
                $equipment = $equipment ?: 'N/A';
            } else {
                $equipment = 'N/A';
            }
            $price = 0;
            if (isset($value['rate']['amount']) && $value['rate']['amount'] > 0) {
                $price = $value['rate']['amount'];
            }
            $shipmentsNew[] = [
                'pickup_date' => $value['pickupDates'][0] ?? 'N/A',
                'pickup' => $value['originLocation']['address']['city'] . ', ' . $value['originLocation']['address']['state'],
                'pickup_lat' => $value['originLocation']['geolocation']['latitude'],
                'pickup_lng' => $value['originLocation']['geolocation']['longitude'],
                'dropoff_lat' => $value['destinationLocation']['geolocation']['latitude'],
                'dropoff_lng' => $value['destinationLocation']['geolocation']['longitude'],
                'dropoff_date' => '',
                'deadhead' => 0,
                'dropoff' => $value['destinationLocation']['address']['city'] . ', ' . $value['destinationLocation']['address']['state'],
                'broker' => $value['poster']['name'] ?? 'N/A',
                'broker_dot' => $value['poster']['docketNumber']['number'] ?? 'N/A',
                'price' => $price,
                'avg_price' => $price ?? 0,
                'distance_total' => $value['computedMileage'] ?? 0,
                'weight' => $value['weight'] ?? 0,
                'created_at' => time_elapsed_string($value['age'] / 1000), 
                'equipment' => $equipment,
                'id' => $value['id'],
                'shipment_data' => $value
            ];
        }
    }

    $shipments = array_merge($shipments, $shipmentsNew);


    if(isset($responseTS['data']) && !empty($responseTS['data'])){
        $shipmentsTS = [];

        $loadsTS = $responseTS['data'];

        foreach ($loadsTS as $key => $value) {

            $birthDate = new DateTime($value['createDateTime']);
            $today = new DateTime("now");
            $age = $birthDate->diff($today);
            $equipment = 'Van';
            if(isset($value['equipmentAttributes']['equipmentTypeId'])){
                switch ($value['equipmentAttributes']['equipmentTypeId']) {
                    case 43:
                        $equipment = 'Van';
                        break;
                    case 12:
                        $equipment = 'Flatbed';
                        break;
                    case 31:
                        $equipment = 'Reefer';
                        break;
                    case 30:
                        $equipment = 'Power Only';
                        break;
                    case 37:
                        $equipment = 'Step Deck';
                        break;
                    default:
                        $equipment = 'Van';
                        break;
                }

            }

            $pickupXeno = $value['loadStops'][0]['location']['city'] . ', ' . $value['loadStops'][0]['location']['state'];

            
            // if(isset($value['loadStops'][0]['location']['city']) && isset($value['loadStops'][0]['location']['state']) ){
                if($pickupXeno == $address ){
                   $shipmentsTS[] = [
                        'pickup_date' => $value['loadStops'][0]['lateDateTime'] ?? 'N/A',
                        'pickup' => $pickupXeno,
                        'pickup_lat' => $value['loadStops'][0]['location']['latitude'],
                        'pickup_lng' => $value['loadStops'][0]['location']['longitude'],
                        'dropoff_lat' => $value['loadStops'][1]['location']['latitude'],
                        'dropoff_lng' => $value['loadStops'][1]['location']['longitude'],
                        'deadhead' => 0,
                        'dropoff_date' => $value['loadStops'][1]['earlyDateTime'],
                        'dropoff' => $value['loadStops'][1]['location']['city'] . ', ' . $value['loadStops'][1]['location']['state'],
                        'broker' => $value['loadStops'][0]['contactName'] ?? 'N/A',
                        'broker_dot' =>  'N/A',
                        'price' => $value['rateAttributes']['postedAllInRate']['amount'] ?? 0,
                        'avg_price' => $value['rateAttributes']['postedAllInRate']['amount'] ?? 0,
                        'distance_total' => $value['computedMileage'] ?? 0,
                        'weight' => $value['dimensional']['weight'] ?? 0,
                        'created_at' => time_elapsed_string($value['createDateTime']),
                        'equipment' => $equipment,
                        'id' => $value['loadId'],
                        'shipment_data' => $value
                    ];
                }

            // }
        
        }
        
        $shipments = array_merge($shipments, $shipmentsTS);
    }




$uniqueShipments = [];
$i = 0;

function formatDateXeno($date){
 $raw = htmlspecialchars_decode($date);
                $raw = trim(is_string($raw) ? $raw : '');
                $formatted = 'N/A';
                if ($raw !== '') {
                    $dt = false;
                    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $raw)) {
                        // Format like 2025-09-19
                        $dt = DateTime::createFromFormat('Y-m-d', $raw);
                    } elseif (preg_match('/^\d{2}\/\d{2}$/', $raw)) {
                        // Format like 09/22 -> add current year
                        $rawWithYear = $raw . '/' . date('Y');
                        $dt = DateTime::createFromFormat('m/d/Y', $rawWithYear);
                    } else {
                        // Generic fallback
                        $ts = strtotime($raw);
                        if ($ts !== false) {
                            $dt = (new DateTime())->setTimestamp($ts);
                        }
                    }
                    if ($dt instanceof DateTime) {
                        $formatted = $dt->format('m/d/y');
                    }
                }
                return $formatted;
}

foreach ($shipments as $shipment) {
    $isDuplicate = false;
    
                $shipment['pickup_date'] = formatDateXeno($shipment['pickup_date']);
                $shipment['dropoff_date'] = formatDateXeno($shipment['dropoff_date']);

    // Normalize current shipment fields
    $pickup_date = trim(strtolower($shipment['pickup_date']));
    $pickup = trim(strtolower($shipment['pickup']));
    $dropoff_date = trim(strtolower($shipment['dropoff_date']));
    $dropoff = trim(strtolower($shipment['dropoff']));
    $broker = trim(strtolower($shipment['broker']));

    // echo $pickup_date." ";
    // echo $pickup." ";
    // echo $dropoff_date." ";
    // echo $dropoff." ";
    // echo $broker."<br>";



    // Compare against all existing unique shipments
    foreach ($uniqueShipments as $u) {
        if (
            trim(strtolower($u['pickup_date'])) === $pickup_date &&
            trim(strtolower($u['pickup'])) === $pickup &&
            trim(strtolower($u['dropoff_date'])) === $dropoff_date &&
            trim(strtolower($u['dropoff'])) === $dropoff &&
            trim(strtolower($u['broker'])) === $broker
        ) {
            // echo "duplicate " . $i;
            // echo $u['broker'];
            // Found a match → mark as duplicate
            $isDuplicate = true;
            break;
        }
    }


    // If not duplicate, add it
    if (!$isDuplicate) {
        // $i++;
        // echo "not duplicate " . $i++;
        $uniqueShipments[] = $shipment;
    }
}

// Replace original list
$shipments = array_values($uniqueShipments);


?>

<?php include 'components/layout/header.php'; ?>
  <?php include 'components/layout/sidebar.php'; ?>
   
    <div class="flex flex-col flex-1 w-full">
     <?php include 'components/layout/topbar.php'; ?>
      <main class="h-full overflow-y-auto">
        <div class=" px-6 pb-10 mx-auto grid">
        <div class="py-8 fade-in-up" style="opacity: 1;">
                    <div class="flex items-center justify-between">
                        <div class="header-content">
                            <h1 class="text-3xl font-bold mb-2 tracking-tight neon-red-header">
                                Search Available Loads
                            </h1>
                            <p class="text-gray-600 dark:text-gray-300 text-lg">
                                Find loads that match your routes and equipment
                            </p>
                            <div class="h-1 w-20 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full mt-3 pulse-bar"></div>
                        </div>
                        <div class="glassmorphism-card px-6 py-4 hover-lift">
                            <div class="flex items-center space-x-3">
                                <div class="relative">
                                    <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                                    <div class="w-3 h-3 bg-green-400 rounded-full absolute top-0 left-0 animate-ping"></div>
                                </div>
                                <span class="text-sm font-medium text-white">Live Feed Active</span>
                                <div class="ml-2 text-xs text-white/70 font-mono"><?php echo count($shipments); ?> loads</div>
                            </div>
                        </div>
                    </div>
                </div>
         
          
          
         


<div class="glassmorphism-card mb-8 hover-lift fade-in-up animation-delay-200" style="opacity: 1;">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="icon-wrapper">
                            <i class="fas fa-search text-white text-lg"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-white">Load Search Filters</h3>
                        <div class="flex-1 h-px bg-gradient-to-r from-blue-200/50 to-transparent"></div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-end">
                        <!-- Enhanced Location Search -->
                        <div class="lg:col-span-6 fade-in-left" style="opacity: 1;">
                            <label class="block text-sm font-medium text-white mb-2">
                                <i class="fas fa-map-marker-alt mr-2 text-blue-300"></i>Search Location
                            </label>
                            <div class="relative input-group">
                                <input type="text" id="search" value="<?php echo $address; ?>" placeholder="Enter city, state, or zip code..." class="modern-input w-full pl-4 pr-10 pl-3 py-3 bg-white/20 border-2 border-blue-200/50 rounded-xl text-white placeholder-white/70 focus:border-blue-300 focus:bg-white/30 transition-all duration-300 pac-target-input" autocomplete="off">
                                <button id="clearSearch" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-white/70 hover:text-white transition-all duration-300 hover:scale-110">
                                    <i class="fas fa-times"></i>
                                </button>
                                <div class="input-shine"></div>
                            </div>
                        </div>

                        <!-- Enhanced Radius -->
                        <div class="lg:col-span-2 fade-in-up animation-delay-100" style="opacity: 1;">
                            <label class="block text-sm font-medium text-white mb-2">
                                <i class="fas fa-circle-dot mr-2 text-cyan-300"></i>Radius (miles)
                            </label>
                            <div class="select-wrapper">
                                <select id="load_radius" class="modern-select w-full py-3 px-4 bg-white/20 border-2 border-blue-200/50 rounded-xl text-white">
                                <option value="50" <?php if ($loadRadius == '50') echo 'selected'; ?>>50</option>
                                <option value="100" <?php if ($loadRadius == '100') echo 'selected'; ?>>100</option>
                                <option value="150" <?php if ($loadRadius == '150') echo 'selected'; ?>>150</option>
                                <option value="200" <?php if ($loadRadius == '200') echo 'selected'; ?>>200</option>
                                <option value="250" <?php if ($loadRadius == '250') echo 'selected'; ?>>250</option>
                                <option value="300" <?php if ($loadRadius == '300') echo 'selected'; ?>>300</option>
                                </select>
                                <!-- <i class="fas fa-chevron-down select-icon"></i> -->
                            </div>
                        </div>

                        <!-- Enhanced Equipment Type -->
                        <div class="lg:col-span-2 fade-in-up animation-delay-200" style="opacity: 1;">
                            <label class="block text-sm font-medium text-white mb-2">
                                <i class="fas fa-truck mr-2 text-green-300"></i>Equipment
                            </label>
                            <div class="select-wrapper">
                                <select id="load_type" class="modern-select w-full py-3 px-4 bg-white/20 border-2 border-blue-200/50 rounded-xl text-white">
                                <option value="all" <?php if ($loadType == 'all') echo 'selected'; ?>>All</option>
            <option value="flatbed" <?php if ($loadType == 'flatbed') echo 'selected'; ?>>Flatbed</option>
            <option value="van" <?php if ($loadType == 'van') echo 'selected'; ?>>Van</option>
            <option value="reefer" <?php if ($loadType == 'reefer') echo 'selected'; ?>>Reefer</option>
            <option value="box truck" <?php if ($loadType == 'box truck') echo 'selected'; ?>>Box Truck</option>
            <option value="stepdeck" <?php if ($loadType == 'stepdeck') echo 'selected'; ?>>Stepdeck</option>   
                                </select>
                                <!-- <i class="fas fa-chevron-down select-icon"></i> -->
                            </div>
                        </div>

                        <!-- Enhanced Search Button -->
                        <div class="lg:col-span-2 fade-in-right" style="opacity: 1;">
                            <button id="searchButton" class="modern-btn w-full py-3 px-6 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold rounded-xl transform hover:scale-105 transition-all duration-300 shadow-lg relative overflow-hidden">
                                <span class="relative z-10">
                                    <i class="fas fa-search mr-2"></i>Search Loads
                                </span>
                                <div class="button-shine"></div>
                            </button>
                        </div>
                    </div>
                </div>




<!-- Add this before the closing body tag -->
<script>
    // Initialize Google Places Autocomplete
    document.addEventListener('DOMContentLoaded', function() {
        // Load Google Maps API with Places library
        const script = document.createElement('script');
        script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyA-XmAtSvNj2CjcYT7VRfnIk58aGsdeh7k&libraries=places&callback=initAutocomplete`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    });

    // This function will be called when the Google Maps API is loaded
    window.initAutocomplete = function() {
        const searchInput = document.getElementById('search');
        const searchResults = document.getElementById('searchResults');
        const clearButton = document.getElementById('clearSearch');

        // Create autocomplete object with city and postal code suggestions
        const autocomplete = new google.maps.places.Autocomplete(searchInput, {
            types: ['(regions)'],
            componentRestrictions: {country: 'us'}, // Restrict to US addresses
            fields: ['address_components', 'geometry', 'formatted_address', 'name', 'postal_code']
        });

        // When a place is selected
        autocomplete.addListener('place_changed', function() {
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                console.log('No details available for input: ' + place.name);
                return;
            }
            
            // Get address components
            let city = '';
            let state = '';
            let postalCode = '';
            
            // Find city, state, and postal code from address components
            for (const component of place.address_components) {
                const componentType = component.types[0];
                if (componentType === 'locality') {
                    city = component.long_name;
                }
                if (componentType === 'administrative_area_level_1') {
                    state = component.short_name;
                }
                if (componentType === 'postal_code') {
                    postalCode = component.long_name;
                }
            }
            
            // If input was a zip code, format as "ZIP, City, State"
            if (searchInput.value.match(/^\d{5}(-\d{4})?$/) && city && state) {
                searchInput.value = `${postalCode || searchInput.value}, ${city}, ${state}`;
                return;
            }
            searchInput.value = place.formatted_address;
            
            console.log('Selected location:', place.formatted_address);
        });
        
        // Prevent form submission on enter key in the search input
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
            }
        });

        // Show/hide clear button based on input
        searchInput.addEventListener('input', function() {
            if (searchInput.value.length > 0) {
                clearButton.classList.remove('hidden');
            } else {
                clearButton.classList.add('hidden');
            }
        });

        // Clear search input
        clearButton.addEventListener('click', function() {
            searchInput.value = '';
            clearButton.classList.add('hidden');
            searchResults.classList.add('hidden');
            // Reset any filters here if needed
        });

        // Close dropdown when clicking outside
        // document.addEventListener('click', function(e) {
        //     if (!searchInput.contains(e.target)) {
        //         searchResults.classList.add('hidden');
        //     }
        // });
    };

    let searchButton = document.getElementById('searchButton');


    searchButton.addEventListener('click', function() {
    // Get the formatted address
    let searchInput = document.getElementById('search');
    let loadRadius = document.getElementById('load_radius').value;
    let loadType = document.getElementById('load_type').value;

        const address = searchInput.value.trim();
        console.log('Selected location:', address);
        window.location.href = 'searchLoad.php?address=' + address + '&load_radius=' + loadRadius + '&load_type=' + loadType;
        // Here you can add code to filter your table based on the selected location
        // For example: filterTableByLocation(place);
    });

</script>

<?php include 'components/table/loads.php'; ?>


         
        </div>
      </main>
    </div>
  </div>
  
</body>
</html>
