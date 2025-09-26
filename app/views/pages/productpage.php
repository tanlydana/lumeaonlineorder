        <!-- product section -->
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
      
      /* Make the close button white on hover */
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
      <section class="p-4 border-top">
          <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="welcome-title">Product Overview</h2>
                <p class="welcome-subtitle">You can add Skincare for your customer now.</p>
            </div>
            <button class="process-btn"                      
                      data-bs-toggle="modal"
                      data-bs-target="#addpro">Add Category +</button>
          </div>

          <div class="table-container">
            <table class="table m-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image/Name</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Type</th>
                  <th>User</th>
                  <th >Create at</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody id="tabledata">

              </tbody>
            </table>

            <!-- Add delivery price modal -->
            <div class="modal fade" id="addpro" data-bs-backdrop="static">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5">Product Modal</h1>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                    ></button>
                  </div>

                  <div class="modal-body px-4">
                    <form id="formAdd">
                      <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['person']['user_id'] ?? '' ?>">
                      <div>
                        <div class="w-100 bg-secondary-subtle rounded-2 overflow-hidden" style="height: 230px;">
                          <img id="preview" src="app/assets/image/placeholder.png" alt="" class="w-100 h-100 object-fit-cover">
                        </div>
                        <input type="file" name="image" id="image" class="form-control shadow-none border mt-3">
                      </div>

                      <div class="d-flex mt-4">
                        <div class="col-6 pe-2">
                          <label for="" class="fw-medium form-label">Product Name*</label>
                          <input type="text" name="proname" id="proname" class="form-control shadow-none border mt-2" placeholder="Product Name">
                        </div>

                      <div class="col-6 pe-2">
                        <label for="" class="fw-medium form-label">Product Type*</label>
                        <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['person']['user_id'] ?? '' ?>">
                        <select name="protype" id="protype" class="form-control shadow-none border mt-2">
                          <option value="" disabled selected>Select type</option>
                        </select>
                      </div>
                     </div>
                   
                     <hr>
                     <div class="d-flex mt-3">
                      <div class="col-6 pe-2">
                        <label for="" class="fw-medium form-label">Product Stock*</label>
                        <input type="number" min="0" name="prostock" id="prostock" class="form-control shadow-none border mt-2" placeholder="Product Stock">
                      </div>
                        <div class="col-6 pe-2">
                        <label for="" class="fw-medium form-label">Product Price*</label>
                        <input type="text" name="proprice" id="proprice" class="form-control shadow-none border mt-2" placeholder="Product Price">
                      </div>
                     </div>
                     
                      <div class="modal-footer">
                        <button
                          type="button"
                          class="btn btn-secondary"
                          data-bs-dismiss="modal"
                        >
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

            <!-- delete delivery price modal  -->
            <div class="modal fade" id="deletepro" data-bs-backdrop="static">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5">Delete Product</h1>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                    ></button>
                  </div>
                  <div class="modal-body px-4">
                    <form id="FormDel">
                      <h4 class="text-center" style="color: var(--primary-color);">
                        Are you sure you want to
                        <span class="text-danger">delete</span>? 😕
                      </h4>
                      <input type="hidden" name="itemiddel" id="itemiddel">
                      <input type="hidden" name="imagename" id="imagename">
                      <div class="modal-footer">
                        <button
                          type="button"
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

            <!-- edit delivery price modal -->
            <div class="modal fade" id="uppro" data-bs-backdrop="static">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5">Update Product</h1>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                    ></button>
                  </div>

                  <div class="modal-body px-4">
                    <form id="formUp">
                      <input type="hidden" name="upid" id="upid">
                      <div>
                        <div class="w-100 bg-secondary-subtle rounded-2 overflow-hidden" style="height: 230px;">
                          <img id="uppreview" src="app/assets/image/placeholder.png" alt="" class="w-100 h-100 object-fit-cover">
                        </div>
                        <input type="hidden" name="oldimage" id="oldimage">
                        <input type="file" name="upimage" id="upimage" class="form-control shadow-none border mt-3">
                      </div>

                      <div class="d-flex mt-4">
                        <div class="col-6 pe-2">
                          <label for="" class="fw-medium form-label">Product type*</label>
                          <input type="text" name="upname" id="upname" class="form-control shadow-none border mt-2" placeholder="Product Name">
                        </div>

                      <div class="col-6 pe-2">
                        <label for="" class="fw-medium form-label">Product Name*</label>
                        <select name="uptype" id="uptype" class="form-control shadow-none border mt-2">
                          <option value="" disabled selected>Select type</option>
                          <option value="">Form</option>
                        </select>
                      </div>
                     </div>
                   
                     <hr>
                     <div class="d-flex mt-3">
                      <div class="col-6 pe-2">
                        <label for="" class="fw-medium form-label">Product Stock*</label>
                        <input type="number" min="0" name="upstock" id="upstock" class="form-control shadow-none border mt-2" placeholder="Product Stock">
                      </div>
                        <div class="col-6 pe-2">
                        <label for="" class="fw-medium form-label">Product Price*</label>
                        <input type="text" name="upprice" id="upprice" class="form-control shadow-none border mt-2" placeholder="Product Price">
                      </div>
                     </div>
                     
                      <div class="modal-footer">
                        <button
                          type="button"
                          class="btn btn-secondary"
                          data-bs-dismiss="modal"
                        >
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
         
        </section>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          $(document).ready(function(e){

            function fetchData(){
              $.ajax({
                url: "index.php?page=productpage",
                method: "POST",
                data:{
                  func: 'read',
                  userid:$('#user_id').val()
                },
              success: function(echo){
                $('#tabledata').html(echo);
              }
            })
            }
            fetchData();
            // fetch category 
            const getCategory = () => {
              $.ajax({
                url: 'index.php?page=productpage',
                method: 'POST',
                data:{
                  func:'getType',
                  userid:$('#user_id').val()
                },
                success: function(echo){
                  $("#protype").html(echo)
                  $("#uptype").html(echo)
                }
              })
            }
            getCategory();

            $('#formAdd').on('submit',function(e){
              e.preventDefault();
              let formData = new FormData(this)
              formData.append('func','create');

              // console.log(formData);
              for (let [name,value] of formData.entries()){
                console.log(name,value);
              }
              $.ajax({
                url: 'index.php?page=productpage',
                method: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(echo){
                  console.log(echo)
                  echo = echo.trim();

                  if(echo == 'success'){
                    Swal.fire({
                        title: "Good Job!",
                        text: "You clicked the button!",
                        icon: "success",
                        timer: 1300,
                        showCloseButton: true,
                        showConfirmButton: false
                      });
                      fetchData();
                  
                  $("#addpro").modal('hide');
                  $("#formAdd")[0].reset();
                  $("#preview").attr('src', 'app/assets/images/placeholder.png');
                    }
                  
                }
              })
            })

            $(document).on('click','.btn-del',function(){
              // alert($(this).data('id'))
              // alert($(this).data('image'))

              $('#itemiddel').val($(this).data('id'))
              $('#imagename').val($(this).data('image'))
            })

            $('#FormDel').on('submit', function(e) {
            e.preventDefault();
            let itemid = $('#itemiddel').val();
            let imagename = $('#imagename').val();
            $.ajax({
              url: "index.php?page=productpage",
              method: "POST",
              data: {
                func: 'delete',
                itemid:itemid,
                imagename:imagename
              },
              success: function(res) {
                console.log(res)
                res = res.trim();
                if (res == 'success') {
                  Swal.fire({
                    title: "Deleted Success",
                    icon: "success",
                    timer: 1300,
                    showCloseButton: true,
                    showConfirmButton: false
                  });
                  fetchData();
                } else {
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: "Something went wrong!",
                    });
                }
                $('#deletepro').modal('hide');
              }
            })
            });

            $(document).on('click','.btn-update',function(){
              console.log(
                $(this).data('id'),
                $(this).data('name'),
                $(this).data('price'),
                $(this).data('stock'),
                $(this).data('image'),
                $(this).data('type_id'),
              );
               $('#upid').val($(this).data('id'))
              $('#upname').val($(this).data('name'))
              $('#upprice').val($(this).data('price'))
              $('#upstock').val($(this).data('stock'))
              $('#uptype').val($(this).data('type_id'))
              $('#oldimage').val($(this).data('image'))
              $('#uppreview').attr('src','app/assets/uploads/'+$(this).data('image'));
            })
            $('#upimage').on('change', function (e) {
              const file = e.target.files[0];
              if (file) {
                  const reader = new FileReader();
                  reader.onload = function (e) {
                      $('#uppreview').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(file);
              }
          });
          
             $('#formUp').on('submit',function(e){
              e.preventDefault();
              let formData = new FormData(this)
              formData.append('func','update');

              // console.log(formData);
              // for (let [name,value] of formData.entries()){
              //   console.log(name,value);
              // }
              $.ajax({
                url: 'index.php?page=productpage',
                method: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(echo){
                  console.log(echo)
                  echo = echo.trim();

                  if(echo == 'success'){
                    Swal.fire({
                        title: "Good Job!",
                        text: "You clicked the button!",
                        icon: "success",
                        timer: 1300,
                        showCloseButton: true,
                        showConfirmButton: false
                      });
                      fetchData();
                  
                  $("#uppro").modal('hide');
                  $("#formAdd")[0].reset();
                  // $("#preview").attr('src', 'app/assets/images/placeholder.png');
                    }
                  
                }
              })
          })
        })
        </script>