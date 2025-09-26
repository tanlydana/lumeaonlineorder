<!-- Home Section -->
<style>
    :root {
        --primary-color: #66000E;
        --background-color: #FFF9F2;
    }

    body {
        background: var(--background-color);
    }

    .main-section {
        background: var(--background-color);
        padding: 2rem;
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

    .stats-card {
        background: white;
        border: 1px solid #e8e9ea;
        border-radius: 12px;
        padding: 1.8rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.2s ease;
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    }

    .stats-card h4 {
        color: var(--primary-color);
        font-weight: 500;
        font-size: 0.95rem;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stats-card h1 {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .stats-card .trend-text {
        color: var(--primary-color);
        font-size: 0.85rem;
        opacity: 0.6;
    }

    .content-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .search-header {
        padding: 1.5rem;
        background: #fafafa;
        border-bottom: 1px solid #e8e9ea;
    }

    .search-form {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background: white;
    }

    .search-input {
        border: none;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }

    .search-btn {
        background: var(--primary-color);
        border: none;
        color: white;
        padding: 0.75rem 1.2rem;
    }

    .search-btn:hover {
        background: #4a0009;
        color: white;
    }

    .search-form .input-group {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
    }

    .search-form .form-control {
        border: none;
        box-shadow: none;
    }

    .search-form .btn {
        border: none;
        border-left: 1px solid #ddd;
        border-radius: 0;
    }

    .export-btn {
        background: transparent;
        border: 1px solid var(--primary-color);
        color: var(--primary-color);
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .export-btn:hover {
        background: var(--primary-color);
        color: white;
    }

    .table-container {
        height: 343px;
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

    .product-name {
        font-weight: 500;
        color: #333;
        margin-bottom: 0.2rem;
        padding-left: 5px;
    }

    .product-type {
        font-size: 0.8rem;
        color: #666;
        padding-left: 5px;
    }

    .stock-badge {
        background: #e8f5e8;
        color: #2d5a2d;
        padding: 0.3rem 0.6rem;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .price-text {
        color: var(--primary-color);
        font-weight: 600;
    }

    .add-btn {
        background: var(--primary-color);
        border: none;
        color: white;
        padding: 0.5rem 0.8rem;
        border-radius: 6px;
        font-size: 0.9rem;
    }

    .add-btn:hover {
        background: #4a0009;
        color: white;
    }

    .cart-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        padding: 1.8rem;
    }

    .cart-header {
        text-align: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f0f0f0;
    }

    .cart-title {
        color: var(--primary-color);
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 0.2rem;
    }

    .cart-subtitle {
        color: #666;
        font-size: 0.9rem;
    }

    .cart-table-container {
        height: 180px;
        overflow-y: auto;
        border: 1px solid #f0f0f0;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .cart-table th {
        background: #fafafa;
        color: #666;
        font-size: 0.8rem;
        font-weight: 500;
        padding: 0.8rem 0.5rem;
        border: none;
    }

    .empty-cart {
        padding: 2rem;
        text-align: center;
        color: #999;
    }

    .cart-footer {
        background: #fafafa;
        padding: 1.2rem;
        border-radius: 8px;
        display: flex;
        justify-content: between;
        align-items: center;
    }

    .total-amount {
        color: var(--primary-color);
        font-size: 1.3rem;
        font-weight: 600;
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
    <section class="main-section">
        <!-- Welcome Header -->
        <div class="mb-4">
            <h2 class="welcome-title">Welcome Back Admin <?= $_SESSION['person']['username'] ?? null ?></h2>
            <p class="welcome-subtitle">You can order Skincare for your customer now.</p>
        </div>

        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-3"><div class="stats-card"><h4>Total Orders</h4><h1 id="totalOrders">0</h1></div></div>
            <div class="col-3"><div class="stats-card"><h4>Total Customers</h4><h1 id="totalCustomers">0</h1></div></div>
            <div class="col-3"><div class="stats-card"><h4>Total Income</h4><h1 id="totalIncome">$0.00</h1></div></div>
            <div class="col-3"><div class="stats-card"><h4>Total Products</h4><h1 id="totalProducts">0</h1></div></div>

        </div>



        <!-- Main Content Section -->
        <div class="row g-4">
            <!-- Product Table Section -->
            <div class="col-lg-7">
                <div class="content-section">
                    <div class="search-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <form class="search-form">
                                    <div class="input-group">
                                        <input required type="text" class="form-control" placeholder="Search products...">
                                        <button class="btn search-btn" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="export-btn">
                                    Export to Excel
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-container">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item/Type</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tableProduct">
                                <input type="hidden" id="user_id" value="<?= $_SESSION['person']['user_id'] ?>">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Cart Section -->
            <div class="col-lg-5">
                <div class="cart-section">
                    <div class="cart-header">
                        <h4 class="cart-title">Luméa</h4>
                        <p class="cart-subtitle m-0">Cart</p>
                    </div>
                    
                    <div class="cart-table-container">
                        <table class="table table-sm m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="cartBody">
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="cart-footer">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span class="total-amount">Total: $9.00</span>
                            <button class="process-btn" data-bs-toggle="modal" data-bs-target="#process-order">
                                Process Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Modal -->
    <div class="modal fade" id="process-order" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title">Customer Destination</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form id="formOrder"> <!-- ✅ put form here -->
            <div class="modal-body p-4">
            <!-- Customer Tel -->
            <div class="mb-3">
                <label class="form-label">Customer Tel *</label>
                <input name="tel" id="tel" required type="text" class="form-control" placeholder="Enter Customer Tel (+855)">
            </div>

            <!-- Province -->
            <div class="mb-3">
                <label class="form-label">Customer Location *</label>
                <select name="location" id="location" class="form-select border shadow-none mb-2" required>
                <option value="" disabled selected>Select Province</option>
                <option value="Banteay Meanchey">Banteay Meanchey</option>
                <option value="Battambang">Battambang</option>
                <option value="Kampong Cham">Kampong Cham</option>
                <option value="Kampong Chhnang">Kampong Chhnang</option>
                <option value="Kampong Speu">Kampong Speu</option>
                <option value="Kampong Thom">Kampong Thom</option>
                <option value="Kampot">Kampot</option>
                <option value="Kandal">Kandal</option>
                <option value="Kep">Kep</option>
                <option value="Koh Kong">Koh Kong</option>
                <option value="Kratie">Kratie</option>
                <option value="Mondulkiri">Mondulkiri</option>
                <option value="Phnom Penh">Phnom Penh</option>
                <option value="Preah Sihanouk">Preah Sihanouk</option>
                <option value="Preah Vihear">Preah Vihear</option>
                <option value="Pursat">Pursat</option>
                <option value="Ratanakiri">Ratanakiri</option>
                <option value="Siem Reap">Siem Reap</option>
                <option value="Stung Treng">Stung Treng</option>
                <option value="Svay Rieng">Svay Rieng</option>
                <option value="Takeo">Takeo</option>
                <option value="Oddar Meanchey">Oddar Meanchey</option>
                <option value="Kampong Seila">Kampong Seila</option>
                <option value="Tboung Khmum">Tboung Khmum</option>
                <option value="Pailin">Pailin</option>
                </select>
            </div>

            <!-- Delivery -->
            <div class="mb-3">
                <label class="form-label">Delivery Price *</label>
                <select name="delivery_id" id="delivery" class="form-select" required>
                <option value="" disabled selected>Select Delivery Price</option>
                </select>
            </div>
            </div>

            <!-- ✅ Now footer is inside the form -->
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark">Confirm Order</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <input type="hidden" id="user_id" value="<?= $_SESSION['person']['user_id'] ?>">        

<!-- Home Section -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(e){
        fetchStats();
        function fetchData(){
            $.ajax({
                url: "index.php?page=homepage",
                method: "POST",
                data:{
                  func: 'getProduct',
                  userid:$('#user_id').val()
                },
                success: function(echo){
                $('#tableProduct').html(echo);
              }
            })
        }
        fetchData();

        function fetchDelivery(){
            $.ajax({
                url: 'index.php?page=homepage',
                method: 'post',
                data:{
                    func:'getDelivery',     // ✅ match the router
                    userid:$('#user_id').val()
                },
                success:function(echo){
                    $('#delivery').html(echo);
                }
            })
        }
        fetchDelivery();

        let cart = [];
        if(cart.length == 0){
            $('.process-btn').prop('disabled',true)
        }
        function renderCart(){
            let cartBody = $('#cartBody');
            cartBody.empty();

            if(cart.length === 0){
                cartBody.html(`<tr> <td colspan="5" class="empty-cart"> No items in cart...</td> </tr>`);
                $('.total-amount').text('Total: $0.00');
                $('.process-btn').prop('disabled',true)
                return;
            }

            let total = 0;

            cart.forEach((item, index) => {
                total += item.subTotal;
                cartBody.append(`
                    <tr class="align-middle">
                        <td>${index+1}</td>
                        <td>${item.name}</td>
                        <td>$${item.price.toFixed(2)}</td>
                        <td class="col-2">
                            <input min="0" value="${item.qty}" type="number" name=""
                                data-id="${item.id}" 
                                class="p-1 form-control shadow-none border qty-item">
                        </td>
                        <td>$${item.subTotal.toFixed(2)}</td>
                    </tr>
                `);
            });

            let totals = cart.reduce((prev,cur)=>prev + cur.subTotal,0);
            $('.total-amount').text(`Total: $${total.toFixed(2)}`);

            if(cart.length > 0){
                $('.process-btn').prop('disabled',false)
            }
        }

        renderCart();
        $(document).on('click','.add-btn',function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = parseFloat($(this).data('price')); // make sure it's a number

            let existItem = cart.find(item => item.id === id);
            if(existItem){
                existItem.qty += 1;
                existItem.subTotal = existItem.qty * existItem.price;
            }else{
                cart.push({id:id, name:name, price:price, qty:1, subTotal:price});
            }

            renderCart();
        })


        $(document).on('input','.qty-item',function(){
            let id = $(this).data('id');
            let qty = parseInt($(this).val());
            let item = cart.find(p => p.id == id);

            if(item){
                item.qty = qty > 0 ? qty : 0;
                item.subTotal = item.qty * item.price;
            }
            if(qty == 0){
                cart = cart.filter((item)=>item.id != id)
            }
            renderCart();
        })

        $('#formOrder').on('submit', function(e){
            e.preventDefault();

            let tel = $('#tel').val();
            let location = $('#location').val();
            let delivery_id = $('#delivery').val();
            let userid = $('#user_id').val();   
            let payload = {
                tel: tel,
                location: location,
                delivery_id: delivery_id,
                userid: userid,
                cart: cart  
            };

            $.ajax({
                url: 'index.php?page=homepage',
                method: 'post',
                data: {
                    func: 'order',
                    tel: tel,
                    location: location,
                    delivery_id: delivery_id,
                    userid: userid,
                    cart: JSON.stringify(cart)  
                },
                success: function(res){
                    res = res.trim();
                    console.log('SERVER RESP:', res);
                    if(res === 'Success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Order placed!',
                            text: 'Customer order has been processed successfully.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        cart = []; // reset cart
                        renderCart();
                        $('#process-order').modal('hide');
                        fetchStats();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res
                        });
                    }
                }
            });
        });

        function fetchStats() {
            $.ajax({
                url: "index.php?page=homepage",
                method: "POST",
                data: { func: "getStats", userid: $("#user_id").val() },
                dataType: "json",
                success: function (res) {
                    $('#user_id').val()
                    console.log(res); // for debugging
                    $("#totalOrders").text(res.orders ?? 0);
                    $("#totalCustomers").text(res.customers ?? 0);
                    $("#totalIncome").text(`$${parseFloat(res.income ?? 0).toFixed(2)}`);
                    $("#totalProducts").text(res.products ?? 0);
                },
                error: function (xhr, status, error) {
                    console.error("fetchStats error:", error, xhr.responseText);
                }
            });
        }

    })
</script>