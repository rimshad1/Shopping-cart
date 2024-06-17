<?php
session_start();
include 'includes/header.php';
include 'Functions/userfunctions.php';
?>

<section id="header">
    <div class="logo-1">
        <a href="index.php" class="fw-bold fs-4 mt-2 nav-link" style="font-family: 'Dancing Script', cursive; color: #AFC2FF;"><i class="bi bi-slack me-2"></i>Bauhinia</a>
    </div>
    <div>
        <ul id="navbar" class="mt-2">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php" class="active">Shop</a></li>
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
                        <li><a class="dropdown-item d-flex align-items-center" href="sign_in.php"><i class="bx bx-log-in-circle fs-5"></i><span>Login</span></a> </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="sign_up.php"><i class='bx bxs-user-plus'></i><span>Register</span></a> </li>
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

<section id="page-header">
    <h2>#stayhome</h2>
    <p>Save more with coupons & up to 70% off!</p>
</section>




<div class="container justify-content-center mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="fw-bold fs-1">Our Products</h2>
            <hr class="mb-5">
            <div class="row">
                <?php
                $product = getAllActive("products");

                if (mysqli_num_rows($product) > 0) {
                    foreach ($product as $item) {
                ?>
                        <div class="col-md-3 col-sm-12 mb-2 mt-2 ">
                            <a class="nav-link" href="product-view.php?product=<?= $item['slug'] ?>">
                                <div class="card shadow border-0 rounded-5 w-100">
                                    <div class="card-body">
                                        <img src="./uploads/<?= $item['image']; ?>" alt="Category Image" style="height: 300px;" class="w-100 rounded-5">
                                    </div>
                                    <h4 class="text-center"><?= $item['name']; ?></h4>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                } else {
                    echo "No data availabel";
                }
                ?>
            </div>
        </div>
    </div>
</div>


<section id="pagination" class="section-p1">
    <a href="#">1</a>
    <a href="#" onclick="window.location.href='2shop.php';">2</a>
    <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
</section>
<!--scroll Top -->
<div id="goTop">
    <a href="#" class="cm" id="goTopBtn"><i class=" bi bi-arrow-up-circle-fill"></i></a>
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
include 'includes/footer.php'
?>