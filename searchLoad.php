  

  <?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime('now', new DateTimeZone('UTC'));
    $ago = new DateTime('@' . $datetime, new DateTimeZone('UTC'));
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
if(isset($_GET['address'])){
    $address = $_GET['address'];
}else{

  $address = $userData['city'] . ', ' . $userData['state'] . ', USA';
  if($address == ', , '){
    $address = 'Glen Burnie,MD,US';
  }
}



$data['id'] = $userData['id'];
$data['address'] = $address;
$response = getLoadsFromTP($data);


?>

<?php include 'components/layout/header.php'; ?>
  <?php include 'components/layout/sidebar.php'; ?>
   
    <div class="flex flex-col flex-1 w-full">
     <?php include 'components/layout/topbar.php'; ?>
      <main class="h-full overflow-y-auto">
        <div class=" px-6 pb-10 mx-auto grid">
          <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-white"
          >
            Search Load
          </h2>
         
          <pre>
            <?php //print_r($response); ?>
          </pre>
          <!-- Cards -->
          <!-- <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
          
                            <?php

                            // $data['id'] = $userData['id'];
                          

                            // $stats = [
                            //     [
                            //         'title' => 'Total Shipments',
                            //         'value' => count($response),
                            //         'icon' => 'boxes-stacked',
                            //         'color' => 'orange'
                            //     ],
                            //     [
                            //         'title' => 'In Progress Shipments',
                            //         'value' => array_reduce($response, function ($carry, $item) {
                            //             return $carry + (in_array(strtolower($item['status_c']), ['assigned', 'in progress', 'in_progress', 'inprocess']) ? 1 : 0);
                            //         }, 0),
                            //         'icon' => 'clock',
                            //         'color' => 'blue'
                            //     ],
                            //     [
                            //         'title' => 'Completed Shipments',
                            //         'value' => array_reduce($response, function ($carry, $item) {
                            //             return $carry + (strtolower($item['status_c']) === 'completed' ? 1 : 0);
                            //         }, 0),
                            //         'icon' => 'check',
                            //         'color' => 'green'
                            //     ],
                            //     [
                            //         'title' => 'Cancelled/Dead Shipments',
                            //         'value' => array_reduce($response, function ($carry, $item) {
                            //             return $carry + (in_array(strtolower($item['status_c']), ['cancelled', 'dead', 'deleted']) ? 1 : 0);
                            //         }, 0),
                            //         'icon' => 'xmark',
                            //         'color' => 'red'
                            //     ]
                            // ];

                            // foreach ($stats as $stat) {
                            //     include 'components/cards/stats.php';
                            // }
                            ?>
            
          </div> -->
         
          <?php
          $loads = $response['data']['items'];

foreach ($loads as $key => $value) {
    if($value['drop_off']['address']['city'] && $value['drop_off']['address']['state']){
        $dropoff = $value['drop_off']['address']['city'] . ', ' . $value['drop_off']['address']['state'];
    }else{
        $dropoff = 'N/A';
    }
    if(!empty($value['equipment'])){
        $equipmentInitials = array_map(function($eq) {
            return strtoupper(substr($eq, 0, 1));
        }, $value['equipment']);
        $equipment = implode(',', array_unique($equipmentInitials));
    } else {
        $equipment = 'N/A';
    }
  $shipments[] = [
    "pickup_date" => $value['all_in_one_date']['pickup_day'] ?? 'N/A',
   "pickup" => $value['pickup']['address']['city'] . ', ' . $value['pickup']['address']['state'] ,
   "deadhead" => number_format($value['pickup']['deadhead'], 2),
   "dropoff" => $dropoff,
   "broker" => $value['broker']['company'] ?? 'N/A',
   "price" => $value['price'] ?? 0,
   "avg_price" => $value['avg_price'] ?? 0,
   "distance_total" => $value['distance_total'] ?? 0,
   "weight" => $value['weight'] ?? 0,
   "created_at" => time_elapsed_string($value['created_at'] / 1000), // Show relative time (e.g., '2 hours ago')
   "equipment" => $equipment,
  ];
}

?>

<!-- Google Places Autocomplete Search -->
<div class="mb-6 max-w-2xl">
    <div class="relative flex gap-4">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </div>
        <input 
            type="text" 
            id="search" 
            value="<?php echo $address; ?>"
            placeholder="Search by city, state, or zip..." 
            class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
        >
        <button id="clearSearch" class="absolute inset-y-0 right-[110px] pr-3 flex items-center text-gray-400 hover:text-gray-600">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
        </button>
        <button id="searchButton" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Search</button>
    </div>
    <div id="searchResults" class="mt-2 hidden bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
        <!-- Search results will be populated here -->
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

    // Create autocomplete object with city-level suggestions
    const autocomplete = new google.maps.places.Autocomplete(searchInput, {
        types: ['(cities)'],
        componentRestrictions: {country: 'us'}, // Restrict to US addresses
        fields: ['address_components', 'geometry', 'formatted_address', 'name']
    });

    // When a place is selected
    autocomplete.addListener('place_changed', function() {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            console.log('No details available for input: ' + place.name);
            return;
        }
        
        // Get the city and state
        // let city = '';
        // let state = '';
        
        // // Find city and state from address components
        // for (const component of place.address_components) {
        //     const componentType = component.types[0];
        //     if (componentType === 'locality') {
        //         city = component.long_name;
        //     }
        //     if (componentType === 'administrative_area_level_1') {
        //         state = component.short_name;
        //     }
        // }
        
        // Format as "City, ST"
        // const formattedAddress = city && state ? `${city}, ${state}` : place.name;
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
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });
};

let searchButton = document.getElementById('searchButton');


searchButton.addEventListener('click', function() {
  // Get the formatted address
  let searchInput = document.getElementById('search');

    const address = searchInput.value.trim();
    console.log('Selected location:', address);
    window.location.href = 'searchLoad.php?address=' + address;
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
