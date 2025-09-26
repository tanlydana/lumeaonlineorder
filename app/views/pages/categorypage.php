<!-- Category Section -->
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
        height: 650px;
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

    .process-btn {
        background: var(--primary-color);
        border: none;
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
    }

    .process-btn:hover {
        background: #4a0009;
        color: white;
    }

    .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
        opacity: 0.8;
    }
    
    .btn-close:hover {
        opacity: 1;
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
</style>

<!-- Hidden User ID -->
<input type="hidden" name="userid" id="userid" value="<?= $_SESSION['person']['user_id'] ?? '' ?>">

<!-- Main Section -->
<section class="p-4 border-top">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="welcome-title">Category Overview</h2>
            <p class="welcome-subtitle">You can customize your own Category of your product</p>
        </div>
        <button class="process-btn" data-bs-toggle="modal" data-bs-target="#addtype">
            Add Category +
        </button>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        <table class="table m-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>User</th>
                    <th>Created At</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="tb">
                <!-- Data will be populated here -->
            </tbody>
        </table>
    </div>
</section>

<!-- Modals Section -->

<!-- Add Category Modal -->
<div class="modal fade" id="addtype" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add Type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body px-4">
                <form id="addCate">
                    <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['person']['user_id'] ?? '' ?>">
                    <label for="type" class="fw-medium form-label">Type Product *</label>
                    <input required class="form-control shadow-none border mt-2" type="text" name="type" id="type" placeholder="Enter type of Product">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-dark">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Category Modal -->
<div class="modal fade" id="delete-category" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete Type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body px-4">
                <form id="delCate">
                    <input type="hidden" id="del_id" name="del_id">
                    <h4 class="text-center" style="color: var(--primary-color);">
                        Are you sure you want to
                        <span class="text-danger">delete</span>? 😕
                    </h4>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            No
                        </button>
                        <button type="submit" class="btn btn-dark">
                            Yes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="upType" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Update Type of Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body px-4">
                <form id="updateCate">
                    <div class="mb-3">
                        <input type="hidden" id="up_id" name="up_id">
                        <label for="up_type" class="fw-medium form-label">Update Type *</label>
                        <input required class="form-control shadow-none border" type="text" name="up_type" id="up_type" placeholder="Change Type of Product">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-dark">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Fetch all categories
        function fetchAllData() {
            $.ajax({
                url: "index.php?page=categorypage",
                method: "POST",
                data: {
                    func: 'read',
                    userid: $('#userid').val()
                },
                success: function(res) {
                    $('#tb').html(res);
                }
            });
        }

        // Initial data fetch
        fetchAllData();

        // Add category form submission
        $('#addCate').on('submit', function(e) {
            e.preventDefault();
            
            let type = $('#type').val();
            let userid = $('#user_id').val();

            $.ajax({
                url: 'index.php?page=categorypage',
                method: 'post',
                data: {
                    func: 'create',
                    userid: userid,
                    type: type
                },
                success: function(res) {
                    $('#addtype').modal('hide');
                    res = res.trim();
                    
                    if (res == 'success') {
                        Swal.fire({
                            icon: "success",
                            title: "Add Success!",
                            text: 'This category has been added successfully.',
                            timer: 1300,
                            showCloseButton: true,
                            showConfirmButton: false
                        });
                        fetchAllData();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: res,
                        });
                    }
                    $('#type').val('');
                }
            });
        });

        // Delete category - get ID
        $(document).on('click', '.btn-delete', function(e) {
            let id = $(this).data("id");
            $('#del_id').val(id);
        });

        // Delete category form submission
        $('#delCate').on('submit', function(e) {
            e.preventDefault();
            
            let id = $('#del_id').val();
            
            $.ajax({
                url: "index.php?page=categorypage",
                method: "POST",
                data: {
                    func: 'delete',
                    id: id
                },
                success: function(res) {
                    $('#delete-category').modal('hide');
                    res = res.trim();
                    
                    if (res == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'This Category has been deleted successfully.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        fetchAllData();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                }
            });
        });

        // Edit category - get data
        $(document).on('click', '.btn-edit', function(e) {
            let id = $(this).data("id");
            let type = $(this).data("type");
            $('#up_id').val(id);
            $('#up_type').val(type);
        });

        // Update category form submission
        $('#updateCate').on('submit', function(e) {
            e.preventDefault();
            
            let up_id = $('#up_id').val();
            let up_type = $('#up_type').val();
            
            $.ajax({
                url: "index.php?page=categorypage",
                method: "POST",
                data: {
                    func: 'update',
                    id: up_id,
                    type: up_type
                },
                success: function(res) {
                    $('#upType').modal('hide');
                    res = res.trim();
                    
                    if (res == 'success') {
                        Swal.fire({
                            icon: "success",
                            title: "Update Success!",
                            text: 'This category has been updated successfully.',
                            timer: 1300,
                            showCloseButton: true,
                            showConfirmButton: false
                        });
                        fetchAllData();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                }
            });
        });
    });
</script>