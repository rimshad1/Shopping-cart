<?php
include 'Functions/userfunctions.php';
include 'includes/header.php';
include './authenticate.php';
?>

<section id="header">
    <div class="logo-1">
        <a href="index.php" class="fw-bold fs-4 mt-2 nav-link" style="font-family: 'Dancing Script', cursive; color: #AFC2FF;"><i class="bi bi-slack me-2"></i>Bauhinia</a>
    </div>
    <div>
        <ul id="navbar" class="mt-2">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="categories.php">Collections</a></li>
            <li><a href="contact.php">Contact</a></li>
            <a href="#" id="close"><i class="far fa-times"></i></a>
            <?php
            if (isset($_SESSION['auth'])) {
            ?>
            <li><a href="my-orders.php">My Orders</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <div class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="white me-2"><?= $_SESSION['auth_user'][''] ?></button>
                        <p><small>Hello <?= $_SESSION['auth_user']['name']; ?></small></p>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center" href="profile.php"><i class="bx bx-log-in-circle fs-5"></i><span>Profile</span></a> </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class='bx bxs-user-plus'></i><span>Logout</span></a> </li>
                    </ul>
                </div>
            <?php
            } else {
            ?>
                <li class="nav-item dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center" href="account.php"><i class="bx bx-log-in-circle fs-5"></i><span>Login</span></a> </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="account.php"><i class='bx bxs-user-plus'></i><span>Register</span></a> </li>
                    </ul>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<div class="py-3">
    <div class="container">
        <a href="index.php" class="text-black  nav-link">
            Home
            <a href="" class=" disabled nav-link mx-1">/</a>
        </a>
        <a href="Categories.php" class="text-black  nav-link mx-1">
            cart
        </a>
    </div>
</div>



<div class="py-5">
    <div class="container justify-content-center">
        <div class="table table-light text-center shadow">
            <div class="row">
                <div class="col-md-12">
                    <?php $items = getCartItems();
                    if (mysqli_num_rows($items) > 0) {
                    ?>
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <h6>Product</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Name</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Price</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Quantity</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Subtotal</h6>
                            </div>
                            <div class="col-md-2">
                                <h6></h6>
                            </div>
                        </div>
                        <?php

                        foreach ($items as $citem) {
                            $sub_total = $citem['selling_price'] * $citem['prod_qty']
                        ?>
                            <div class="table product_data mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80px">
                                    </div>
                                    <div class="col-md-2">
                                        <h5><?= $citem['name'] ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Rs<?= $citem['selling_price'] ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                        <div class="input-group mb-3" style="width:130px;">
                                            <button class="input-group-text decrement updateQty">-</button>
                                            <input type="text" class="form-control text-center bg-white qty" value="<?= $citem['prod_qty'] ?>" disabled>
                                            <button class="input-group-text increment updateQty">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Rs<?= $sub_total ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="deleteitem border-0" value="<?= $citem['cid'] ?>"><i class="bi bi-x-circle-fill mx-5 text-danger"></i></button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {


                        ?>
                        <div class="card card-body border-0 shadow ">
                            <h4 class="py-3">Your cart is empty</h4>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="cart-add" class="section-p1">
    <div id="coupon">
    </div>

    <div id="subtotal">
        <a href="checkout.php" class="nav-link w-50 text-center fw-bold normal">Process to chekout</a>
    </div>
</section>




<!--scroll Top -->
<div id="goTop">
    <a href="#" class="cm" id="goTopBtn"><i class="p-3 bi bi-arrow-up-circle-fill"></i></a>
</div>
<!-- End scroll Top -->

<script>
    let goTopBtn = document.getElementById("goTopBtn");
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
            goTopBtn.style.display = "flex";
        } else {
            goTopBtn.style.display = "none";
        }
    }
</script>
<?php
include 'includes/footer.php';
?>


<!-- <section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <td>Image</td>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Subtotal</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php

            $total = 0;

            $items = getCartItems();
            foreach ($items as $citem) {
                $sub_total = $citem['selling_price'] * $citem['prod_qty'];
                $total = $total + $sub_total;
            ?>
                    <tr>
                        <td><img src="uploads/<?= $citem['image'] ?>" alt="img" width="50"></td>
                        <td><?= $citem['name'] ?></td>
                        <td>Rs <?= $citem['selling_price']; ?></td>
                        <td><?= $citem['prod_qty']; ?></td>
                        <td>Rs <?= $sub_total; ?></td>
                        <td>
                            <a href="#"><i class="bi bi-x-circle-fill text-danger"></i></a>
                        </td>
                    </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</section>

<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Apply Coupon</h3>
        <div>
            <input type="text" placeholder="Enter Your Coupon">
            <button class="normal">Apply</button>
        </div>
    </div>

    <div id="subtotal" class="section-p1">
        <h3>Cart Total</h3>
        <table>
            <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>Rs <?= $total; ?></strong></td>
            </tr>

        </table>
        <div id="coupon">
            <div>
                <input type="text" placeholder="Enter Delivery Address" class="w-100" style="font-size: 12px;">
            </div>
        </div>
        <button class="normal" name="order">Procees to chekout</button>
    </div>
</section> -->