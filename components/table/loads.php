<!-- New Table with DataTables -->

<div class="w-full overflow-hidden text-left rounded-lg shadow-xs bg-white dark:bg-gray-800 text-gray-700 dark:text-white">
    <div class="w-full overflow-x-auto">
        <table id="loadsTable" class="w-full display">
            <thead>
                <tr>
                    <th>Age</th>
                    <th class="truncate-x">Pickup Date</th>
                    <th class="truncate">Pickup</th>
                    <th>Deadhead</th>
                    <th class="truncate">Dropoff</th>
                    <th>Price</th>
                    <th>Avg Price</th>
                    <th>Type</th>
                    <th>Weight</th>
                    <th>Broker</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($shipments)){ ?>
                <tr>
                    <td colspan="10" class="text-center py-4">No shipments found</td>
                </tr>
                <?php } else{ ?>
                <?php foreach ($shipments as $shipment): ?>
                <tr class=" dark:bg-gray-800">
                <td><?= htmlspecialchars($shipment['created_at']) ?></td>   
                    <td class="truncate-x"><?= htmlspecialchars($shipment['pickup_date']) ?></td>
                    <td class="truncate"><?= htmlspecialchars(html_entity_decode($shipment['pickup']), ENT_QUOTES | ENT_HTML5) ?></td>
                    <td class="truncate"><?= htmlspecialchars(html_entity_decode($shipment['deadhead']), ENT_QUOTES | ENT_HTML5) ?></td>
                    <td class="truncate"><?= htmlspecialchars(html_entity_decode($shipment['dropoff']), ENT_QUOTES | ENT_HTML5) ?></td>
                    <td><?= htmlspecialchars($shipment['price']) ?></td>
                    <td><?= htmlspecialchars($shipment['avg_price']) ?></td>
                    <td><?= htmlspecialchars($shipment['equipment']) ?></td>
                                 
                    <td><?= htmlspecialchars($shipment['weight']) ?></td>              
                    <td class="truncate"><?= htmlspecialchars($shipment['broker']) ?></td> 
                    <td>
                        <div>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Quote</button>
                           
                        </div>
                    </td>             
                </tr>
                <?php endforeach; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<style>
    .dataTables_length,#loadsTable_filter{
        display: none;
    }
</style>

<script>
$(document).ready(function() {
    // $('#loadsTable').DataTable({
    //     responsive: true,
    //     dom: "<'flex flex-col sm:flex-row items-center justify-between p-4'<'mb-4 sm:mb-0'f><'flex items-center'<'mr-4'l><'mt-2 sm:mt-0'p>>>t<'flex flex-col sm:flex-row items-center justify-between p-4'<'mb-4 sm:mb-0'i><'mt-2 sm:mt-0'p>>",
    //     pageLength: 10,
    //     lengthMenu: [5, 10, 25, 50, 100],
    //     order: [[0, 'desc']], // Sort by created_at by default
    //     columnDefs: [
    //         { 
    //             targets: [4, 5, 8], // Price, Avg Price, Weight columns
    //             className: 'text-right',
    //             render: function(data, type, row) {
    //                 if (type === 'display' || type === 'filter') {
    //                     if (data === null || data === undefined) return 'N/A';
    //                     if (data.toString().includes('$') || data.toString().includes('N/A')) return data;
    //                     if (this[0] === 8) { // Check if it's the weight column (index 8)
    //                         return parseFloat(data) ? parseFloat(data).toLocaleString() + ' lbs' : 'N/A';
    //                     }
    //                     return '$' + (parseFloat(data) ? parseFloat(data).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '0.00');
    //                 }
    //                 return data;
    //             }
    //         },
    //         { 
    //             targets: [0, 1, 2, 3, 6, 7],
    //             className: 'text-left'
    //         }
    //     ],
    //     language: {
    //         search: "<div class='relative'><input type='text' class='pl-8 pr-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500' placeholder='Search...'><i class='fas fa-search absolute left-3 top-3 text-gray-400'></i></div>",
    //         lengthMenu: "Show _MENU_ entries",
    //         info: "Showing _START_ to _END_ of _TOTAL_ entries",
    //         infoEmpty: "No entries to show",
    //         infoFiltered: "(filtered from _MAX_ total entries)",
    //         paginate: {
    //             first: '<i class="fas fa-angle-double-left"></i>',
    //             last: '<i class="fas fa-angle-double-right"></i>',
    //             next: '<i class="fas fa-chevron-right"></i>',
    //             previous: '<i class="fas fa-chevron-left"></i>'
    //         }
    //     },
    //     initComplete: function() {
    //         // Add custom classes after table initialization
    //         $('.dataTables_wrapper .dataTables_length select').addClass('border rounded px-2 py-1 text-sm');
    //         $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('px-3 py-1 rounded hover:bg-gray-200 dark:hover:bg-gray-700');
    //         $('.dataTables_wrapper .dataTables_paginate .paginate_button.current').addClass('bg-blue-500 text-white hover:bg-blue-600');
    //     }
    // });
    $('#loadsTable').dataTable( {
  paginate: true,
 search: false,
  pageLength: 50,
} );
});
</script>