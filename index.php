  <?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; ?>
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto">
          <div class="container px-6 pb-10 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Dashboard
            </h2>
           
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
             <?php 
             $stats = [[
              'title' => 'Total Shipments',
              'value' => '6,389',
              'icon' => 'boxes-stacked',
              'color' => 'orange'
             ],
             [
              'title' => 'In Progress Shipments',
              'value' => '100',
              'icon' => 'clock',
              'color' => 'blue'
             ],
             [
              'title' => 'Completed Shipments',
              'value' => '376',
              'icon' => 'check',
              'color' => 'green'
             ],
             [
              'title' => 'Cancelled Shipments',
              'value' => '35',
              'icon' => 'xmark',
              'color' => 'red'
             ],
            ];
              
             foreach ($stats as $stat) {
             include 'components/cards/stats.php'; 
             } ?>
              <!-- Card -->
              <!-- <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Account balance
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    $ 46,760.89
                  </p>
                </div>
              </div>
              
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    New sales
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    376
                  </p>
                </div>
              </div>
              
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Pending contacts
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    35
                  </p>
                </div>
              </div> -->
            </div>
            <?php
            
           // Function to generate random date within last 30 days
function randomDate() {
    $start = strtotime("-30 days");
    $end = time();
    return date('Y-m-d', mt_rand($start, $end));
}

// Function to generate random tracking number
function generateTrackingNumber() {
    return 'TRK' . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
}

$shipments = [
    [
        'name' => 'John Smith',
        'quantity' => rand(1, 20),
        'type' => 'Boxes',
        'tracking_number' => generateTrackingNumber(),
        'pickup' => 'New York, NY',
        'dropoff' => 'Los Angeles, CA',
        'amount' => '$' . rand(50, 500),
        'status' => 'In Transit',
        'weight' => rand(1, 50) . ' kg',
        'created_at' => randomDate(),
    ],
    [
        'name' => 'Acme Corp',
        'quantity' => rand(5, 30),
        'type' => 'Pallets',
        'tracking_number' => generateTrackingNumber(),
        'pickup' => 'Chicago, IL',
        'dropoff' => 'Houston, TX',
        'amount' => '$' . rand(200, 800),
        'status' => 'Delivered',
        'weight' => rand(20, 100) . ' kg',
        'created_at' => randomDate(),
    ],
    [
        'name' => 'Global Imports',
        'quantity' => rand(10, 50),
        'type' => 'Crates',
        'tracking_number' => generateTrackingNumber(),
        'pickup' => 'Miami, FL',
        'dropoff' => 'Atlanta, GA',
        'amount' => '$' . rand(100, 700),
        'status' => 'Pending',
        'weight' => rand(30, 120) . ' kg',
        'created_at' => randomDate(),
    ],
    [
        'name' => 'Tech Solutions Inc',
        'quantity' => rand(2, 15),
        'type' => 'Parcels',
        'tracking_number' => generateTrackingNumber(),
        'pickup' => 'Seattle, WA',
        'dropoff' => 'Portland, OR',
        'amount' => '$' . rand(80, 400),
        'status' => 'In Transit',
        'weight' => rand(5, 30) . ' kg',
        'created_at' => randomDate(),
    ],
    [
        'name' => 'Fresh Foods Ltd',
        'quantity' => rand(5, 25),
        'type' => 'Refrigerated',
        'tracking_number' => generateTrackingNumber(),
        'pickup' => 'Denver, CO',
        'dropoff' => 'Salt Lake City, UT',
        'amount' => '$' . rand(300, 1000),
        'status' => 'Cancelled',
        'weight' => rand(50, 200) . ' kg',
        'created_at' => randomDate(),
    ],
    [
        'name' => 'Fashion Forward',
        'quantity' => rand(15, 40),
        'type' => 'Garments',
        'tracking_number' => generateTrackingNumber(),
        'pickup' => 'Los Angeles, CA',
        'dropoff' => 'Las Vegas, NV',
        'amount' => '$' . rand(150, 600),
        'status' => 'Delivered',
        'weight' => rand(10, 50) . ' kg',
        'created_at' => randomDate(),
    ],
    [
        'name' => 'Office Supplies Co',
        'quantity' => rand(8, 35),
        'type' => 'Cartons',
        'tracking_number' => generateTrackingNumber(),
        'pickup' => 'Boston, MA',
        'dropoff' => 'Philadelphia, PA',
        'amount' => '$' . rand(200, 900),
        'status' => 'In Transit',
        'weight' => rand(25, 100) . ' kg',
        'created_at' => randomDate(),
    ],
    [
        'name' => 'Auto Parts Express',
        'quantity' => rand(1, 10),
        'type' => 'Heavy Machinery',
        'tracking_number' => generateTrackingNumber(),
        'pickup' => 'Detroit, MI',
        'dropoff' => 'Cleveland, OH',
        'amount' => '$' . rand(400, 1200),
        'status' => 'Pending',
        'weight' => rand(100, 500) . ' kg',
        'created_at' => randomDate(),
    ]
];
            ?>

           <?php include 'components/table/shipment.php'; ?>

            <!-- Charts -->
            <!-- <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Charts
            </h2>
            <div class="grid gap-6 mb-8 md:grid-cols-2">
              <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                  Revenue
                </h4>
                <canvas id="pie"></canvas>
                <div
                  class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                >
                 
                  <div class="flex items-center">
                    <span
                      class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"
                    ></span>
                    <span>Shirts</span>
                  </div>
                  <div class="flex items-center">
                    <span
                      class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                    ></span>
                    <span>Shoes</span>
                  </div>
                  <div class="flex items-center">
                    <span
                      class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                    ></span>
                    <span>Bags</span>
                  </div>
                </div>
              </div>
              <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                  Traffic
                </h4>
                <canvas id="line"></canvas>
                <div
                  class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                >
                  
                  <div class="flex items-center">
                    <span
                      class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                    ></span>
                    <span>Organic</span>
                  </div>
                  <div class="flex items-center">
                    <span
                      class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                    ></span>
                    <span>Paid</span>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
