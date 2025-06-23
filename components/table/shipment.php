 <!-- New Table -->
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-nowrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Tracking #</th>
                    <th class="px-4 py-3">Pickup</th>
                    <th class="px-4 py-3">Dropoff</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Quantity</th>
                    <th class="px-4 py-3">Weight</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php foreach ($shipments as $shipment): ?>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            
                            <div>
                                <p class="font-semibold"><?= htmlspecialchars($shipment['name']) ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        #<?= htmlspecialchars($shipment['tracking_number']) ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?= htmlspecialchars($shipment['pickup']) ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?= htmlspecialchars($shipment['dropoff']) ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?= htmlspecialchars($shipment['type']) ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?= htmlspecialchars($shipment['quantity']) ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?= htmlspecialchars($shipment['weight']) ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?= htmlspecialchars($shipment['amount']) ?>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <?php
                        $statusClasses = [
                            'In Transit' => 'text-blue-700 bg-blue-100 dark:bg-blue-700  dark:text-black-900',
                            'Delivered' => 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100',
                            'Pending' => 'text-orange-700 bg-orange-100 dark:text-white dark:bg-orange-600',
                            'Cancelled' => 'text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100'
                        ];
                        $statusClass = $statusClasses[$shipment['status']] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-black';
                        ?>
                        <span class="px-2 py-1 font-semibold leading-tight rounded-full <?= $statusClass ?>">
                            <?= htmlspecialchars($shipment['status']) ?>
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?= date('M d, Y', strtotime($shipment['created_at'])) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
            Showing 1-<?= count($shipments) ?> of <?= count($shipments) ?>
        </span>
        <span class="col-span-2"></span>
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    <li>
                        <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 text-white transition-colors duration-150 bg-primary-color border border-r-0 border-primary-color rounded-md focus:outline-none focus:shadow-outline-purple">
                            1
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                </ul>
            </nav>
        </span>
    </div>
</div>   d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
              </div>
            </div>