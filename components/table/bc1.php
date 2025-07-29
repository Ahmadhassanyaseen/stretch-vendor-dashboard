

<div id="myGrid" style="height: 600px; width: 100%;" class="ag-theme-alpine"></div>

<script>
// Initialize the grid first
const gridOptions = {
    // Default data is empty, will be populated by fetchData
    rowData: [],
    
    // Column Definitions: Defines the columns to be displayed.
    columnDefs: [
        { 
            headerName: "Pickup Date", 
            field: "pickupDate", 
            sortable: true, 
            filter: 'agTextColumnFilter',
            filterParams: {
                buttons: ['reset', 'apply'],
                closeOnApply: true,
            },
            width: 150
        },
        { 
            headerName: "Pickup", 
            field: "pickup", 
            sortable: true, 
            filter: 'agTextColumnFilter',
            width: 200
        },
        { 
            headerName: "Deadhead", 
            field: "deadhead", 
            sortable: true,
            width: 120
        },
        { 
            headerName: "Dropoff", 
            field: "dropoff", 
            sortable: true, 
            filter: 'agTextColumnFilter',
            width: 200
        },
        { 
            headerName: "Price", 
            field: "price", 
            sortable: true,
            width: 120,
            valueFormatter: params => params.value ? `$${parseFloat(params.value).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}` : '$0.00',
            type: 'rightAligned'
        },
        { 
            headerName: "Avg Price", 
            field: "avgPrice", 
            sortable: true,
            width: 150,
            valueFormatter: params => params.value ? `$${parseFloat(params.value).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}` : '$0.00',
            type: 'rightAligned'
        },
        { 
            headerName: "Equipment", 
            field: "equipment", 
            sortable: true, 
            filter: 'agTextColumnFilter',
            width: 150
        },
        { 
            headerName: "Date", 
            field: "date", 
            sortable: true, 
            filter: 'agDateColumnFilter',
            width: 180
        },
        { 
            headerName: "Weight", 
            field: "weight", 
            sortable: true,
            width: 120,
            valueFormatter: params => params.value ? `${parseFloat(params.value).toLocaleString()} lbs` : '0 lbs',
            type: 'rightAligned'
        }
    ],
    
    // Default Column Definition: Gets applied to every column
    defaultColDef: {
        flex: 1,
        minWidth: 100,
        resizable: true,
        sortable: true,
        filter: true,
        floatingFilter: false,
        menuTabs: ['filterMenuTab']
    },
    
    // Enable pagination
    pagination: true,
    paginationPageSize: 20,
    
    // Enable side bar for columns and filters
    sideBar: {
        toolPanels: [
            {
                id: 'columns',
                labelDefault: 'Columns',
                labelKey: 'columns',
                iconKey: 'columns',
                toolPanel: 'agColumnsToolPanel',
                toolPanelParams: {
                    suppressRowGroups: true,
                    suppressValues: true,
                    suppressPivots: true,
                    suppressPivotMode: true,
                    suppressColumnFilter: false,
                    suppressColumnSelectAll: false,
                    suppressColumnExpandAll: true
                }
            },
            {
                id: 'filters',
                labelDefault: 'Filters',
                labelKey: 'filters',
                iconKey: 'filter',
                toolPanel: 'agFiltersToolPanel',
                toolPanelParams: {}
            }
        ]
    },
    
    // Enable status bar
    statusBar: {
        statusPanels: [
            { statusPanel: 'agTotalAndFilteredRowCountComponent', align: 'left' }
        ]
    },
    
    // Other grid options
    animateRows: true,
    rowSelection: 'multiple',
    rowMultiSelectWithClick: true,
    suppressRowClickSelection: false,
    suppressCellFocus: true,
    enableCellTextSelection: true
};

// Create the grid
const gridDiv = document.querySelector('#myGrid');
const gridApi = agGrid.createGrid(gridDiv, gridOptions);

// Function to fetch and load data
const fetchData = async () => {
    try {
        // Show loading overlay
        gridApi.showLoadingOverlay();
        
        const formData = new FormData();
        formData.append('method', 'getLoadsFromTP');
        
        const response = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        });
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        console.log('API Response:', data);
        
        // Process the data and update the grid
        if (data && data.data && data.data.items) {
            const rowData = data.data.items.map(item => ({
                pickupDate: item.all_in_one_date?.pickup_day || 'N/A',
                pickup: item.pickup?.address ? 
                    `${item.pickup.address.city || ''}, ${item.pickup.address.state || ''}`.trim() : 'N/A',
                deadhead: item.pickup?.deadhead || 'N/A',
                dropoff: item.drop_off?.address ? 
                    `${item.drop_off.address.city || ''}, ${item.drop_off.address.state || ''}`.trim() : 'N/A',
                price: item.price || 0,
                avgPrice: item.avg_price || 0,
                equipment: item.equipment ? 
                    item.equipment.map(eq => eq.charAt(0).toUpperCase()).join(', ') : 'N/A',
                date: item.created_at || 'N/A',
                weight: item.weight || 0
            }));
            
            // Update the grid with the new data
            gridApi.setGridOption('rowData', rowData);
        }
        
    } catch(error) {
        console.error('Error fetching data:', error);
        // Show error overlay
        gridApi.showNoRowsOverlay();
    } finally {
        // Hide loading overlay
        gridApi.hideOverlay();
    }
};

// Call fetchData when the page loads
document.addEventListener('DOMContentLoaded', fetchData);

// Add theme class to the grid
document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#myGrid').classList.add('ag-theme-alpine');
});
</script>

<!-- Include AG Grid Community Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ag-grid-community@28.2.1/styles/ag-grid.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ag-grid-community@28.2.1/styles/ag-theme-alpine.css">