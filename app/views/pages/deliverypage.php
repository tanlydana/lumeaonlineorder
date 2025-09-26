<!-- Delivery Price Section -->
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

  .form-control,
  .form-select {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 0.75rem;
    font-size: 0.9rem;
  }

  .form-control:focus,
  .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.1rem rgba(102, 0, 14, 0.1);
  }
</style>

<section class="p-4 border-top">
  <div class="d-flex justify-content-between align-items-center">
    <div>
      <h2 class="welcome-title">Delivery Overview</h2>
      <p class="welcome-subtitle">You can customize delivery price.</p>
    </div>
    <button 
      class="btn process-btn" 
      data-bs-toggle="modal" 
      data-bs-target="#addDel">
      Add Delivery Price +
    </button>
  </div>

  <div class="table-container">
    <table class="table m-0 text-dark">
      <thead>
        <tr>
          <th>#</th>
          <th>Category</th>
          <th>Delivery Price</th>
          <th>Created At</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody id="tb"></tbody>
    </table>

    <!-- Add delivery price modal -->
    <div class="modal fade" id="addDel" data-bs-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Add Delivery Price</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body px-4">
            <form id="addDeliveryForm">
              <input 
                type="hidden" 
                name="user_id" 
                id="user_id" 
                value="<?= $_SESSION['person']['user_id'] ?? '' ?>"
              >

              <div class="d-flex mb-2">
                <div class="col-6 pe-2">
                  <label class="fw-medium form-label">Category*</label>
                  <input 
                    required 
                    class="form-control shadow-none border mt-2" 
                    type="text" 
                    name="category" 
                    id="add_category" 
                    placeholder="Enter type of delivery"
                  >
                </div>
                <div class="col-6">
                  <label class="fw-medium form-label">Delivery Price*</label>
                  <input 
                    required 
                    class="form-control shadow-none border mt-2" 
                    type="text" 
                    name="price" 
                    id="add_price" 
                    placeholder="Enter category price"
                  >
                </div>
              </div>

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

    <!-- Delete delivery price modal -->
    <div class="modal fade" id="deleteDeliveryModal" data-bs-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Delete This Delivery</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body px-4">
            <form id="formDelete">
              <input type="hidden" name="del_id" id="del_id"> 
              <h4 class="text-center" style="color: var(--primary-color);">
                Are you sure you want to
                <span class="text-danger">delete</span>? 😕
              </h4>
              <div class="modal-footer">
                <button 
                  type="submit" 
                  class="btn btn-secondary" 
                  data-bs-dismiss="modal"
                >
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

    <!-- Edit delivery price modal -->
    <div class="modal fade" id="editDeliveryPrice" data-bs-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Update Delivery Price</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body px-4">
            <form id="editDeliveryForm">
              <input type="hidden" name="up_id" id="up_id"> 
              <div class="d-flex mb-2">
                <div class="col-6 pe-2">
                  <label class="fw-medium form-label">Update Category*</label>
                  <input 
                    required 
                    class="form-control shadow-none border mt-2" 
                    type="text" 
                    name="up_category" 
                    id="up_category" 
                    placeholder="Change Category"
                  >
                </div>
                <div class="col-6">
                  <label class="fw-medium form-label">Update Delivery Price*</label>
                  <input 
                    required 
                    class="form-control shadow-none border mt-2" 
                    type="text" 
                    name="up_price" 
                    id="up_price" 
                    placeholder="Change Price"
                  >
                </div>
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
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function() {
    // read 
    function fetchAllData() {
      $.ajax({
        url: "index.php?page=deliverypage",
        method: "POST",
        data: {
          func: 'read',
          userid: $('#user_id').val()
        },
        success: function(res) {
          $('#tb').html('');
          $('#tb').html(res);
        }
      })
    }
    fetchAllData();

    // add
    $('#addDeliveryForm').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url: 'index.php?page=deliverypage',
        method: 'POST',
        data: {
          func: 'create',
          userid: $('#user_id').val(),
          category: $('#add_category').val(),
          delivery_price: $('#add_price').val()
        },
        success: function(res) {
          $('#addDel').modal('hide');
          res = res.trim();
          if (res == 'success') {
            console.log('Create Success');
            Swal.fire({
              title: "Add Success",
              icon: "success",
              timer: 1300,
              showCloseButton: true,
              showConfirmButton: false
            });
            fetchAllData();
            $('#add_category').val('');
            $('#add_price').val('');
          } else {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: res
            });
          }
        }
      });
    });

    // delete
    $(document).on('click', '.btn-delete-delivery', function(e) {
      $('#del_id').val($(this).data('id'));
    });

    $('#formDelete').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url: "index.php?page=deliverypage",
        method: "POST",
        data: {
          func: 'delete',
          id: $('#del_id').val()
        },
        success: function(res) {
          $('#deleteDeliveryModal').modal('hide');
          res = res.trim();
          if (res == 'success') {
            console.log('Delete Success');
            Swal.fire({
              title: "Deleted Success",
              icon: "success",
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
      })
    });

    // update
    $(document).on('click','.btn-edit-delivery',function(e){
      // console.log($(this).data('category'),$(this).data('price'),)
      $('#up_id').val($(this).data('id'));
      $('#up_category').val($(this).data('category'));
      $('#up_price').val($(this).data('price')); 
    })
    $('#editDeliveryForm').on('submit', function(e){
      e.preventDefault();
      $.ajax({
        url: "index.php?page=deliverypage",
        method: "POST",
        data: {
          func: 'update',
          id: $('#up_id').val(),
          category: $('#up_category').val(),
          delivery_price: $('#up_price').val() 
        },
        success: function(res) {
          $('#editDeliveryPrice').modal('hide'); 
          res = res.trim();
          if(res == 'success'){
            Swal.fire({
              title: "Updated Successfully",
              icon: "success",
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
