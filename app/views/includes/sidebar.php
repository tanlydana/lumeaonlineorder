<style>
    :root {
        --primary-color: #66000E;
        --background-color: #FFF9F2;
    }
    body {
        background: var(--background-color);
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
</style>
<aside class="col-2 sticky-top p-3 text-center" style="height: 100vh; background-color: #66000E; ">
    <!-- logo -->
    <div class="w-100 py-3 text-light">
        <img src="app/assets/image/skincare.png" alt="logo" class="w-50 mb-2"/>
          <h2 class="mb-0">Luméa</h2>
          <p>Glow in every drop</p>
    </div>
    <ul class="list-unstyled">
        <a href="index.php?page=homepage" class="btn w-100 btn-outline text-light my-1">
            <li class="d-flex justify-concent-start fs-5">
              <i class="bi bi-house-door-fill me-3"></i>
              Home
            </li>
        </a>

        <a href="index.php?page=customerpage" class="btn w-100 btn-outline text-light my-1">
            <li class="d-flex justify-concent-start fs-5">
              <i class="bi bi-people-fill me-3"></i>
              Customers
            </li>
        </a>

        <a href="index.php?page=deliverypage" class="btn w-100 btn-outline text-light my-1">
            <li class="d-flex justify-concent-start fs-5">
              <i class="bi bi-tag-fill me-3"></i>
              Delivery Price
            </li>
        </a>

        <a href="index.php?page=categorypage" class="btn w-100 btn-outline text-light my-1">
            <li class="d-flex justify-concent-start fs-5">
              <i class="bi bi-hash me-3"></i>
              Category
            </li>
        </a>

        <a href="index.php?page=productpage" class="btn w-100 btn-outline text-light my-1">
            <li class="d-flex justify-concent-start fs-5">
              <i class="bi bi-bag-fill me-3"></i>
              Product
            </li>
        </a>
    </ul>

    <div class="position-absolute bottom-0 w-100 start-0 p-3">
        <button class="btn btn-danger w-100 fw-medium"                 
                data-bs-toggle="modal"
                data-bs-target="#logoutmodal">
            <i class="bi bi-box-arrow-right"></i>
            Logout
        </button>
    </div>
</aside>

<!-- modal -->
<div class="modal fade" id="logoutmodal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Logout form</h3>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form  id="formLogout">
                    <h4 class="text-center" style="color: var(--primary-color);">Are you sure you want to logout? 🤔</h4>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                        <button data-bs-toggle="modal" data-bs-target="#logoutmodal" class="btn btn-danger">
                            Yes
                        </button>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#formLogout').on('submit',function(e){
            e.preventDefault();

            $.ajax({
                url: 'index.php?page=homepage',
                method: 'POST',
                data:{
                    func:'logout'
                },
                success: function(response){
                    if(response){
                        window.location.href = 'index.php'
                    }
                }
            })
        })
    })
</script>