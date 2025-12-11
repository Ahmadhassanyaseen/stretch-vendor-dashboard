  

  <?php include 'config/config.php'; ?>

<?php include 'components/layout/header.php'; ?>
  <?php include 'components/layout/sidebar.php'; ?>
  <?php

if (isset($_COOKIE['vendor'])) {
    $userData = json_decode($_COOKIE['vendor'], true);
} else {
    $userData = [];
}
$data['id'] = $userData['id'];
$response = fetchVendorTopLocations($data);
// print_r($response);

?>
    
   
    <div class="flex flex-col flex-1 w-full">
     <?php include 'components/layout/topbar.php'; ?>
      <main class="h-full overflow-y-auto">
        
         
         <div class=" px-6 pb-10 mx-auto grid">
        <div class="py-8 fade-in-up" style="opacity: 1;">
                    <div class="flex items-center justify-between">
                        <div class="header-content">
                            <h1 class="text-3xl font-bold mb-2 tracking-tight neon-red-header">
                                Add Top Locations
                            </h1>
                            <p class="text-gray-600 dark:text-gray-300 text-lg">
                                Add the pickup spots you use most frequently.
                            </p>
                            <div class="h-1 w-20 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full mt-3 pulse-bar"></div>
                        </div>
                        <div class="glassmorphism-card px-6 py-4 hover-lift">
                            <div class="flex items-center space-x-3">
                                
                                <span class="text-sm font-medium text-white">You can add up to 5 locations</span>
                                <div class="ml-2 text-xs text-white/70 font-mono"></div>
                            </div>
                        </div>
                    </div>
                </div>
         
          
          
         


            <div class="glassmorphism-card mb-8 hover-lift fade-in-up animation-delay-200" style="opacity: 1;">
                               
                                
                                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-end">
                                    <!-- Enhanced Location Search -->
                                    <div class="lg:col-span-10 fade-in-left" style="opacity: 1;">
                                        <label class="block text-sm font-medium text-white mb-2">
                                            <i class="fas fa-map-marker-alt mr-2 text-blue-300"></i>Search Location
                                        </label>
                                        <div class="relative input-group">
                                            <input type="text" id="search" value="" placeholder="Enter city, state, or zip code..." class="modern-input w-full pl-4 pr-10 pl-3 py-3 bg-white/20 border-2 border-blue-200/50 rounded-xl text-white placeholder-white/70 focus:border-blue-300 focus:bg-white/30 transition-all duration-300 pac-target-input" autocomplete="off">
                                            <button id="clearSearch" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-white/70 hover:text-white transition-all duration-300 hover:scale-110">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <div class="input-shine"></div>
                                        </div>
                                    </div>

                                   

                                    <!-- Enhanced Search Button -->
                                    <div class="lg:col-span-2 fade-in-right" style="opacity: 1;">
                                        <button id="searchButton" class="modern-btn w-full py-3 px-6 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold rounded-xl transform hover:scale-105 transition-all duration-300 shadow-lg relative overflow-hidden">
                                            <span class="relative z-10">
                                                <i class="fas fa-search mr-2"></i>Add Location
                                            </span>
                                            <div class="button-shine"></div>
                                        </button>
                                    </div>
                                </div>
            </div>

            <?php
             $locations = [];
            // Normalize locations from API response
            // $response is likely an array from curlRequest; adjust selectors as needed
            $locationsRaw = $response;

            if (is_string($locationsRaw)) {
                $locations = array_values(array_filter(array_map('trim', explode('|', $locationsRaw))));
            } elseif (is_array($locationsRaw)) {
                // If backend already returns an array, map to plain strings
                $locations = array_values(array_filter(array_map(function ($it) {
                    // Support either scalar or array item with a 'location' field
                    if (is_array($it))
                        return trim((string) ($it['location'] ?? $it['name'] ?? ''));
                    return trim((string) $it);
                }, $locationsRaw)));
            } else {
                $locations = [];
            }
            ?>

<div class="mt-6">
  <h2 class="text-xl font-semibold mb-4 ">Your Top Locations</h2>

  <?php if (empty($locations)) { ?>
    <div class="p-6 rounded-xl border border-dashed border-blue-300/50 bg-white/10 text-white/80">
      No saved locations yet. Use the search above to add one.
    </div>
  <?php } else { ?>
    <div id="topLocations" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
      <?php foreach ($locations as $loc): ?>
        <div class="relative p-4 rounded-xl bg-white dark:bg-gray-800 shadow border border-gray-200/60 dark:border-gray-700 hover:shadow-lg transition">
          <button
            type="button"
            class="remove-location absolute text-white -top-2 -right-2 w-8 h-8 flex items-center justify-center rounded-full bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 shadow"
            title="Remove"
            onClick="removeLocation('<?= htmlspecialchars($loc, ENT_QUOTES, 'UTF-8') ?>')"
           
          >
            <i class="fas fa-times text-sm"></i>
          </button>
          <div class="flex items-start">
            <div class="mr-3 mt-1 text-blue-600 dark:text-blue-400">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div>
              <div class="font-semibold text-gray-800 dark:text-white"><?= htmlspecialchars($loc, ENT_QUOTES, 'UTF-8') ?></div>
              <!-- <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Preferred pickup</div> -->
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php } ?>
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

                   
                };

                let searchButton = document.getElementById('searchButton');


                searchButton.addEventListener('click', async function() {

                    let locationsCount = '<?php echo count($locations); ?>';
                    // console.log(locationsCount);
                    // return;

                    if(locationsCount >= 5){
                        Swal.fire('Limit Exceeded', 'You can only add 5 locations.', 'warning');
                        return;
                    }

                    let searchInput = document.getElementById('search');

                        if(searchInput.value.trim() == ''){
                            alert("Kindly enter a location");
                        return;
                        }

                   let allLocations = '<?php echo addslashes(is_string($response) ? $response : (is_array($locations) ? implode('|', $locations) : '')); ?>';
const newLoc = searchInput.value.trim();
if (!newLoc) {
  Swal.fire('Enter a location', 'Please type a location first.', 'warning');
  return;
}

// Normalize existing list
const list = allLocations
  ? allLocations.split('|').map(s => s.trim()).filter(Boolean)
  : [];

// Exact match (case-insensitive) check
const exists = list.some(s => s.toLowerCase() === newLoc.toLowerCase());
if (exists) {
  Swal.fire('Already added', 'This location already exists in your list.', 'info');
  return;
}

// Safe new string to send
const newLocations = [...list, newLoc].join('|');
console.log('Will save:', newLocations);

// Proceed to send newLocations
const fd = new FormData();
fd.append('method', 'saveTopLocationsVendor'); // adjust if backend differs
fd.append('id', '<?php echo $userData['id']; ?>');
fd.append('locations', newLocations);

try {
  const resp = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
    method: 'POST',
    body: fd
  });
  const json = await resp.json();
  if (json && (json.success === true || json.status === 200)) {
    Swal.fire('Saved', 'Location preference saved successfully.', 'success');
      window.location.reload();
    // Optionally append a new card to the grid here without reloading
  } else {
    const msg = (json && (json.message || json.error)) || 'Unable to save location.';
    Swal.fire('Error', msg, 'error');
  }
} catch (err) {
  console.error(err);
  Swal.fire('Network error', 'Could not reach the server.', 'error');
}

                


                
                });



                async function removeLocation(location) {
  // Original pipe-delimited list from server
  let allLocations = '<?php echo addslashes(is_string($response) ? $response : (is_array($locations) ? implode('|', $locations) : '')); ?>';

  // Normalize to array
  const items = allLocations
    .split('|')
    .map(s => s.trim())
    .filter(Boolean);

  // Remove the selected item (exact match)
  const updated = items.filter(item => item !== location);

  // If nothing changed, stop
  if (updated.length === items.length) {
    Swal.fire('Not found', 'Location not present in your list.', 'info');
    return;
  }

  // Confirm deletion
  const confirmRes = await Swal.fire({
    title: 'Remove location?',
    text: location,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#ef4444',
    cancelButtonColor: '#6b7280',
    confirmButtonText: 'Remove'
  });
  if (!confirmRes.isConfirmed) return;

  const newString = updated.join('|');

  // Update server (choose one approach below)

  // Approach A: overwrite the full list (common when backend expects entire string)
  const fd = new FormData();
  fd.append('method', 'saveTopLocationsVendor'); // or 'updateTopLocationsVendor' if your API has it
  fd.append('id', '<?php echo $userData['id']; ?>');
  fd.append('locations', newString); // send full updated list

  try {
    const resp = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
      method: 'POST',
      body: fd
    });
    const json = await resp.json();
    if (json && (json.success === true || json.status === 200)) {
      // Remove the card from DOM
      const btn = document.querySelector(`.remove-location[data-location="${CSS.escape(location)}"]`) || null;
      const card = btn ? btn.closest('.relative.p-4') : null;
      if (card) card.remove();

      // Optionally update your local variable/state
      allLocations = newString;

      // If nothing left, swap grid to empty-state
      const grid = document.getElementById('topLocations');
      if (grid && grid.children.length === 0) {
        grid.outerHTML = '<div class="p-6 rounded-xl border border-dashed border-blue-300/50 bg-white/10 text-white/80">No saved locations yet. Use the search above to add one.</div>';
      }

      Swal.fire('Removed', 'Location removed successfully.', 'success');
      window.location.reload();
    } else {
      const msg = (json && (json.message || json.error)) || 'Failed to remove location.';
      Swal.fire('Error', msg, 'error');
    }
  } catch (e) {
    console.error(e);
    Swal.fire('Network error', 'Could not reach the server.', 'error');
  }

 
}
              
             </script>
          

         
        </div>
       
      </main>
    </div>
  </div>
  
</body>
</html>
