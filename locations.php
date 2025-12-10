  

  <?php include 'config/config.php'; ?>

<?php include 'components/layout/header.php'; ?>
  <?php include 'components/layout/sidebar.php'; ?>
  <?php
    
    if (isset($_COOKIE['vendor'])) {
      $userData = json_decode($_COOKIE['vendor'], true);
    } else {
      $userData = [];
    }

    
    
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
                // Get the formatted address
                let searchInput = document.getElementById('search');

                if(searchInput.value.trim() == ''){
                    alert("Kindly enter a location");
                return;
                }

                const fd = new FormData();
                // TODO: replace with your actual server method and keys
                fd.append('method', 'saveTopLocation'); // ← confirm/change
                fd.append('id', '<?php echo $userData['id']; ?>');
                fd.append('location', searchInput.value);
                try{
                    const resp = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
                        method: 'POST',
                        body: fd
                    });
                    const json = await resp.json();
                    if (json && (json.success === true || json.status === 200)){
                        Swal.fire('Saved', 'Location preference saved successfully.', 'success');
                    }else{
                        const msg = (json && (json.message || json.error)) || 'Unable to save location.';
                        Swal.fire('Error', msg, 'error');
                    }
                    }catch(err){
                    console.error(err);
                    Swal.fire('Network error', 'Could not reach the server.', 'error');
                    }

                


                
                });

            </script>
          

         
        </div>
       
      </main>
    </div>
  </div>
  
</body>
</html>
