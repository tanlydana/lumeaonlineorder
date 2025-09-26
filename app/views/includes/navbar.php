<!-- header section -->
<header class="py-2 border-bottom px-3 d-flex justify-content-between" >
    <div class="d-flex align-items-center">
        <div
  class="rounded-circle bg-secondary me-2 overflow-hidden"
  style="height: 50px; width: 50px; border: 2px solid #66000E;"
>
            <img src="app/assets/image/image.png" class="w-100 h-100 object-fit-cover" alt="user-image" />
        </div>
        <h6 class="m-0" style="color: #66000E"> 
            Mr.<?= $_SESSION['person']['username'] ?? null ?></h6>
    </div>
</header>