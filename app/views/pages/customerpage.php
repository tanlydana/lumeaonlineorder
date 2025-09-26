<!-- Customer Overview Section -->
<style>
    :root {
        --primary-color: #66000E;
        --background-color: #FFF9F2;
    }
    
    body {
        background: var(--background-color);
    }
    
    .welcome-title {
        color: var(--primary-color);
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .welcome-subtitle {
        color: var(--primary-color);
        font-size: 1rem;
        font-weight: 400;
        opacity: 0.8;
        margin-bottom: 2rem;
    }

    .table-container {
        max-height: 400px;
        overflow-y: auto;
    }

    .table thead th {
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 1rem;
        font-weight: 500;
        font-size: 0.9rem;
        position: sticky;
        top: 0;
    }

    .table tbody tr:hover {
        background: rgba(102, 0, 14, 0.03);
    }

    .table td {
        padding: 1rem;
        vertical-align: middle;
        border-color: #f0f0f0;
    }

    .modal-content {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .modal-header {
        background: var(--primary-color);
        color: white;
        border-radius: 12px 12px 0 0;
        padding: 1.2rem 1.5rem;
    }

    .modal-title {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .form-label {
        color: var(--primary-color);
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 0.75rem;
        font-size: 0.9rem;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.1rem rgba(102, 0, 14, 0.1);
    }

    .modal-footer {
        border: none;
        padding: 1rem 1.5rem 1.5rem;
    }

    .modal-footer .btn {
        padding: 0.7rem 1.2rem;
        border-radius: 8px;
        font-size: 0.9rem;
    }

    .modal-footer .btn-secondary {
        background: #6c757d;
        border: none;
    }

    .modal-footer .btn-dark {
        background: var(--primary-color);
        border: none;
    }

    .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
        opacity: 0.8;
    }

    .btn-close:hover {
        opacity: 1;
    }
</style>

<!-- Main Section -->
<section class="main-section p-4">
    <div class="mb-4">
        <h2 class="welcome-title">Customer Overview</h2>
        <p class="welcome-subtitle">You can order Skincare for your customer now.</p>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        <table class="table m-0" id="customerTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Tel</th>
                    <th>Location</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated here -->
            </tbody>
        </table>
    </div>

    <!-- Delete Customer Modal -->
    <div class="modal fade" id="delete-cus" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Delete Customer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="deleteForm">
                        <input type="hidden" id="deleteCustomerId" name="customer_id">
                        <h4 class="text-center" style="color: var(--primary-color);">
                            Are you sure you want to
                            <span class="text-danger">delete</span> this customer?😕
                        </h4>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                No
                            </button>
                            <button type="submit" class="btn btn-dark">
                                Yes, Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden User ID -->
    <input type="hidden" id="user_id" value="<?= $_SESSION['person']['user_id'] ?>">
</section>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Fetch customers data
        function fetchCustomers() {
            var userid = $('#user_id').val();
            console.log("Fetching customers for user ID:", userid);
            
            $.post("index.php?page=customerpage", 
                { 
                    func: 'read', 
                    userid: userid 
                }, 
                function(res) {
                    console.log("Server response:", res);
                    $('#customerTable tbody').html(res);
                }
            ).fail(function(xhr, status, error) {
                console.error("Error fetching customers:", error);
                $('#customerTable tbody').html(
                    '<tr><td colspan="9" class="text-center text-danger py-4">Error loading customers</td></tr>'
                );
            });
        }

        // Initial data fetch
        fetchCustomers();

        // Delete button click handler
        $(document).on('click', '.delete-btn', function() {
            let customerId = $(this).data('customer-id');
            console.log("Delete button clicked - Customer ID:", customerId);
            $('#deleteCustomerId').val(customerId);
        });

        // Delete form submission
        $('#deleteForm').submit(function(e) {
            e.preventDefault();
            console.log("Delete form submitted");
            
            $.post('index.php?page=customerpage', {
                func: 'delete',
                customer_id: $('#deleteCustomerId').val(),
                userid: $('#user_id').val()
            }, function(res) {
                console.log("Delete response:", res);
                
                if (res.trim() == 'Success') {
                    $('#delete-cus').modal('hide');
                    fetchCustomers();
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Customer has been deleted successfully.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error: ' + res,
                    });
                }
            }).fail(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Network Error',
                    text: 'Please check your connection and try again.',
                });
            });
        });
    });
</script>