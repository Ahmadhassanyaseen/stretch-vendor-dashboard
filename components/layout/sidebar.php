 <!-- Desktop sidebar -->
 <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500">
          <a
            class="ml-6 text-lg font-bold text-gray-800"
            href="#"
          >
            Stretch XL Freight
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3 sidebar-menu-item">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-primary-color rounded-tr-lg rounded-br-lg opacity-0"
                aria-hidden="true"
                id="sidebar_indicator">
              </span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 "
                href="index.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
            <li class="relative px-6 py-3 sidebar-menu-item">
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-500 transition-colors duration-150 hover:text-gray-800"
                href="shipments.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                  ></path>
                </svg>
                <span class="ml-4">Shipments</span>
              </a>
            </li>
            <li class="relative px-6 py-3 sidebar-menu-item">
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-500 transition-colors duration-150 hover:text-gray-800"
                href="vehicles.php"
              >
               <i class="fa-solid fa-truck"></i>
                <span class="ml-4">Vehicles</span>
              </a>
            </li>
           
          </ul>
          
        </div>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
      >
        <div class="py-4 text-gray-500">
          <a
            class="ml-6 text-lg font-bold text-gray-800"
            href="#"
          >
            Stretch XL Freight
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3 sidebar-menu-item">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-primary-color rounded-tr-lg rounded-br-lg opacity-0"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
                href="index.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
            <li class="relative px-6 py-3 sidebar-menu-item">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-primary-color rounded-tr-lg rounded-br-lg opacity-0"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-500 transition-colors duration-150 hover:text-gray-800"
                href="shipments.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                  ></path>
                </svg>
                <span class="ml-4">Shipments</span>
              </a>
            </li>
            <li class="relative px-6 py-3 sidebar-menu-item">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-primary-color rounded-tr-lg rounded-br-lg opacity-0"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-500 transition-colors duration-150 hover:text-gray-800"
                href="vehicles.php"
              >
                <i class="fa-solid fa-truck"></i>
                <span class="ml-4">Vehicles</span>
              </a>
            </li>
          </ul>
          
        </div>
      </aside>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const currentPage = window.location.pathname.split('/').pop() || 'index.php';
          const menuItems = document.querySelectorAll('.sidebar-menu-item');
          const indicator = document.getElementById('sidebar_indicator');
          
          menuItems.forEach(item => {
            const link = item.querySelector('a');
            const href = link.getAttribute('href').split('/').pop();
            
            if (href === currentPage) {
              // Clone the indicator to the active menu item
              const newIndicator = indicator.cloneNode(true);
              newIndicator.classList.remove('opacity-0');
              item.prepend(newIndicator);
              
              // Add active class to the link
              link.classList.add('text-gray-800');
              link.classList.remove('text-gray-500');
            }
            
            // Remove the original indicator if it's still there
            if (indicator && indicator.parentNode) {
              indicator.remove();
            }
            
            // Add click handler to move indicator on click
            link.addEventListener('click', function(e) {
              // Remove active class from all links
              menuItems.forEach(i => {
                const a = i.querySelector('a');
                a.classList.remove('text-gray-800');
                a.classList.add('text-gray-500');
                
                // Remove any existing indicators
                const existingIndicator = i.querySelector('.bg-primary-color');
                if (existingIndicator) {
                  existingIndicator.remove();
                }
              });
              
              // Add active class to clicked link
              this.classList.remove('text-gray-500');
              this.classList.add('text-gray-800');
              
              // Create and add new indicator
              const newIndicator = indicator.cloneNode(true);
              newIndicator.classList.remove('opacity-0');
              item.prepend(newIndicator);
            });
          });
        });
      </script>