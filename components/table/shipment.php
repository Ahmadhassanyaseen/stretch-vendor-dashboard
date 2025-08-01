<!-- New Table with DataTables -->

<div class="w-full overflow-hidden rounded-lg shadow-xs bg-white dark:bg-gray-800 text-gray-700 dark:text-white">
    <div class="w-full overflow-x-auto">
        <table id="shipmentsTable" class="w-full display">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Tracking #</th>
                    <th>Pickup</th>
                    <th>Dropoff</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Weight</th>
                    <th>Amount</th>
                    <th class="truncate">Lead Status</th>
                    <th class="truncate">Vendor Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($shipments)){ ?>
                <tr>
                    <td colspan="10" class="text-center py-4 text-gray-700 dark:text-white bg-gray-100 dark:bg-gray-700">No shipments found</td>
                </tr>
                <?php } else{ ?>
                <?php foreach ($shipments as $shipment): ?>
                <tr class=" dark:bg-gray-800">
                    <td class="truncate"><?= htmlspecialchars(html_entity_decode($shipment['name']), ENT_QUOTES | ENT_HTML5) ?></td>
                    <td>#<?= htmlspecialchars($shipment['tracking_number']) ?></td>
                    <td class="truncate"><?= htmlspecialchars(html_entity_decode($shipment['pickup']), ENT_QUOTES | ENT_HTML5) ?></td>
                    <td class="truncate"><?= htmlspecialchars(html_entity_decode($shipment['dropoff']), ENT_QUOTES | ENT_HTML5) ?></td>
                    <td><?= htmlspecialchars($shipment['type']) ?></td>
                    <td><?= htmlspecialchars($shipment['quantity']) ?></td>
                    <td><?= htmlspecialchars($shipment['weight']) ?></td>
                    <td><?= htmlspecialchars($shipment['amount']) ?></td>

                    <td>
                        <?php
                        $statusClasses = [
                            
                            'Converted' => 'text-green-700 bg-green-100',
                            'Pending' => 'text-orange-700 bg-orange-100',
                            'Assigned' => 'text-orange-700 bg-orange-100',
                            'Deleted' => 'text-red-700 bg-red-100',
                            'Dead' => 'text-red-700 bg-red-100'
                        ];
                        $statusClass = $statusClasses[$shipment['status']] ?? 'bg-gray-100 text-gray-800';
                        ?>
                        <span class="px-2 py-1 text-xs font-semibold leading-tight rounded-full <?= $statusClass ?>">
                            <?= htmlspecialchars($shipment['status']) ?>
                        </span>
                    </td>
                    <td>
                        <?php
                        $statusClasses = [
                            
                            '1' => 'text-green-700 bg-green-100',
                            '0' => 'text-orange-700 bg-orange-100',
                            '-1' => 'text-red-700 bg-red-100'
                        ];
                        $statusClass = $statusClasses[$shipment['vendor_status']] ?? 'bg-gray-100 text-gray-800';
                        ?>
                        <span class="px-2 py-1 text-xs font-semibold leading-tight rounded-full <?= $statusClass ?>">
                            <?= htmlspecialchars($shipment['vendor_status'] == '1' ? 'Accepted' : ($shipment['vendor_status'] == '0' ? 'Pending' : 'Rejected')) ?>
                        </span>
                    </td>
                    <td class="truncate"><?= date('m-d-Y', strtotime($shipment['created_at'])) ?></td>
                    <td class="flex">
                        <button class="cursor-pointer  text-white py-2 px-4 rounded mr-2 edit-shipment 
                        <?php 
                        if($shipment['vendor_status'] == '-1' || $shipment['status'] == 'Dead' || $shipment['status'] == 'Deleted') {
                            echo 'bg-gray-600 hover:bg-gray-400';
                        } else {
                            echo 'bg-blue-600 hover:bg-blue-400';
                        } ?>
                        " 

                        <?php 
                        if($shipment['vendor_status'] == '-1' || $shipment['status'] == 'Dead' || $shipment['status'] == 'Deleted') {
                            echo 'disabled';
                        } ?>

                        data-id="<?= $shipment['id'] ?>"
                        >
                           <i class="fas fa-edit"></i>
                        </button>
                        <button class="cursor-pointer  text-white py-2 px-4 rounded delete-shipment
                         <?php 
                         if($shipment['vendor_status'] != '0' || $shipment['status'] == 'Dead' || $shipment['status'] == 'Deleted' || $shipment['vendor_status'] == '1') {
                            echo 'bg-gray-600 hover:bg-gray-400';
                        } else {
                            echo 'bg-red-600 hover:bg-red-400';
                        } ?>
                        "
                        <?php 
                        if($shipment['vendor_status'] != '0' || $shipment['status'] == 'Dead' || $shipment['status'] == 'Deleted' || $shipment['vendor_status'] == '1') {
                            echo 'disabled';
                        } ?>
                        data-id="<?= $shipment['id'] ?>">
                           <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<script>

$(document).ready(function() {
    $('#shipmentsTable').DataTable({
        dom: "<'p-4'<'mb-4't>p>", // Simplified DOM structure
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
        order: [[10, 'desc']],
        columnDefs: [
            { 
                orderable: true, 
                targets: '_all' 
            },
            { 
                className: 'text-center', 
                targets: [4,5,6,7,8] 
            }
        ],
        language: {
            search: "", // Hide search
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "No entries to show",
            infoFiltered: "",
            paginate: {
                first: '<i class="fas fa-angle-double-left"></i>',
                last: '<i class="fas fa-angle-double-right"></i>',
                next: '<i class="fas fa-chevron-right"></i>',
                previous: '<i class="fas fa-chevron-left"></i>'
            }
        }
    });
});

$(document).on('click', '.edit-shipment', function() {
    var shipmentId = $(this).data('id');
    window.location.href = 'editShipment.php?id=' + shipmentId;
    console.log(shipmentId);
});

$(document).on('click', '.delete-shipment', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var shipmentId = $(this).data('id');
            window.location.href = 'helper/shipment/delete.php?id=' + shipmentId;
            console.log(shipmentId);
        }
    });
});

</script>