<!-- New Table with DataTables -->

<div class="w-full overflow-hidden rounded-lg shadow-xs bg-white dark:bg-gray-800 text-gray-700 dark:text-white">
    <div class="w-full overflow-x-auto">
        <table id="shipmentsTable" class="w-full display">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Capacity</th>
                    <th>Quantity</th>
                    <th>Hourly Rate</th>
                    <th>Pickup Address</th>
                    <th>Availability</th>
                    <th>Fuel Percentage</th>
                    <th>Gratuity Percentage</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($vehicles)){ ?>
                <tr>
                    <td colspan="10" class="text-center py-4">No vehicles found</td>
                </tr>
                <?php } else{ ?>
                <?php foreach ($vehicles as $vehicle): ?>
                <tr class=" dark:bg-gray-800">
                    <td><?= htmlspecialchars($vehicle['name']) ?></td>
                    <td><?= htmlspecialchars($vehicle['capacity']) ?></td>
                    <td><?= htmlspecialchars($vehicle['quantity']) ?></td>
                    <td><?= htmlspecialchars($vehicle['hourly_rate']) ?></td>
                    <td><?= htmlspecialchars($vehicle['pickup_address']) ?></td>
                    <td><?= htmlspecialchars($vehicle['availability']) ?></td>
                    <td><?= htmlspecialchars($vehicle['fuel_percentage']) ?></td>
                    <td><?= htmlspecialchars($vehicle['gratuity_percentage']) ?></td>
                 
                    
                   
                    <td>
                        <?php
                        $statusClasses = [
                            
                            'Yes' => 'text-green-700 bg-green-100',
                            'No' => 'text-red-700 bg-red-100'
                        ];
                        $statusClass = $statusClasses[$vehicle['status']] ?? 'bg-gray-100 text-gray-800';
                        ?>
                        <span class="px-2 py-1 text-xs font-semibold leading-tight rounded-full <?= $statusClass ?>">
                            <?= htmlspecialchars($vehicle['status']) ?>
                        </span>
                    </td>
                    <td><?= date('M d, Y', strtotime($vehicle['created_at'])) ?></td>
                    <td class="flex">
                        <button class="bg-blue-600 hover:bg-blue-600 text-white py-2 px-4 rounded mr-2 edit-vehicle" data-id="<?= $vehicle['id'] ?>"
                        >
                           <i class="fas fa-edit"></i>
                        </button>
                        <button class="bg-red-600 hover:bg-red-600 text-white py-2 px-4 rounded delete-vehicle" data-id="<?= $vehicle['id'] ?>">
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
        order: [[9, 'desc']],
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

$(document).on('click', '.edit-vehicle', function() {
    var vehicleId = $(this).data('id');
    window.location.href = 'editVehicle.php?id=' + vehicleId;
    console.log(vehicleId);
});

$(document).on('click', '.delete-vehicle', function() {
    var vehicleId = $(this).data('id');
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
            $.ajax({
                url: 'helper/vehicle/delete.php',
                type: 'POST',
                data: { id: vehicleId },
                success: function(response) {
                    // console.log(response);
                    Swal.fire(
                        'Deleted!',
                        'Vehicle has been deleted.',
                        'success'
                    );
                    location.reload();
                }
            });
        }
    });
});
</script>