<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        if(isset($_SESSION['person'])){
            header('Location: index.php?page=homepage');
        }
    include 'app/views/includes/head.php' ?>
</head>
<style>
    input::placeholder{color: rgb(171, 169, 169) !important;}
</style>
<body class="font-quicksand">
    <div class="container-fluid bg-dark d-none d-lg-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-4 rounded-3 shadow-lg px-5 py-3">
            <div class="text-center">
                <img src="app/assets/image/skincare.png" alt="" width="120px">
                <h2 class="mb-0 text-light">Luméa</h2>
                <p class="text-light">Skincare Management System</p>  
                <h3 class="text-white">Login Form</h3>
            </div>
            <form action="" id="loginForm">
                <div id="alertPlaceholder"></div>
                <input required type="text" name="nameoremail" id="nameoremail" class="form-control shadow-none my-3 bg-transparent border text-white" placeholder="Username Or Email">
                <input required type="password" name="password" id="password" class="form-control shadow-none my-3 bg-transparent border text-white" placeholder="Password">

                <button class="btn btn-primary w-100">
                    Login
                </button>
                <hr class="text-white">
                <p class="text-white text-center">
                    Don't have account?
                    <a href="index.php?page=register">Register</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Page not found -->
    <?php include 'app/views/includes/notfound.php' ?>
    <!-- Page not found -->
</body>
<script>
        $(document).ready(function(){
        $('#loginForm').on('submit',function(e){
            
            e.preventDefault();
            
            let nameoremail = $('#nameoremail').val();
            let password = $('#password').val();

            // console.log(nameoremial,password);

            $.ajax({
                url: 'index.php?page=login',
                method: 'post',
                data: {
                    func:'loginUser',
                    nameoremail:nameoremail,
                    password:password
                },
                success: function(res){
                    res = res.trim();
                    // Clear previous alerts
                    $('#alertPlaceholder').html('');

                    if(res == 'success'){
                        window.location.href = 'index.php?page=homepage';
                    }else{
                        let alertHtml = `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Invalid Something
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `;
                            $("#alertPlaceholder").html(alertHtml);
                    }
                }
            })
        })
    })
</script>
</html>