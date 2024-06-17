<?php
session_start();
include 'includes/header.php';
include 'Functions/userfunctions.php';
?>
<section id="header">
    <div class="logo-1">
        <a href="index.php" class="fw-bold mt-2 fs-4 nav-link" style="font-family: 'Dancing Script', cursive; color: #AFC2FF;"><i class="bi bi-slack me-2"></i>Bauhinia</a>
    </div>
    <div>
        <ul id="navbar" class="mt-2">
            <li><a href="index.php" class="active">Home</a></li>
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
                    <button class="white me-2"></button><p><small>Hello <?= $_SESSION['auth_user']['name']; ?></small></p>
                       
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


<div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/hr1.jpeg" class="d-block w-100" style="height: 700px;" alt="...">
            <div class="carousel-caption">
                <h4 class="fs-1 fw-bold">Trade-in-offer</h4>
                <h2 class="fw-bold text-dark">Super value deals</h2>
                <h1 class="fw-bold">On all products</h1>
                <p class="fw-bold text-center">Save more with coupons & up to 70% off!</p>
                <button class="normal" style="margin-right: 150px;" onclick="window.location.href='shop.php';">Shop Now</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/2.jpg" class="d-block w-100" style="height: 700px;" alt="...">
            <div class="carousel-caption">
                <h4 class="fs-1 fw-bold">Trade-in-offer</h4>
                <h2 class="fw-bold text-dark">Super value deals</h2>
                <h1 class="fw-bold">On all products</h1>
                <p class="fw-bold text-center">Save more with coupons & up to 70% off!</p>
                <button class="normal" style="margin-right: 150px;" onclick="window.location.href='shop.php';">Shop Now</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/3.jpg" class="d-block w-100" style="height: 700px;" alt="...">
            <div class="carousel-caption">
                <h4 class="fs-1 fw-bold">Trade-in-offer</h4>
                <h2 class="fw-bold text-dark">Super value deals</h2>
                <h1 class="fw-bold">On all products</h1>
                <p class="fw-bold text-center">Save more with coupons & up to 70% off!</p>
                <button class="normal" style="margin-right: 150px;" onclick="window.location.href='shop.php';">Shop Now</button>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<section id="feature" class="section-p1">
    <div data-aos="fade-left" class="fe-box">
        <img src="img/features/f1.png" alt="">
        <h6>Free shipping</h6>
    </div>
    <div data-aos="fade-right" class="fe-box">
        <img src="img/features/f2.png" alt="">
        <h6>Online Order</h6>
    </div>
    <div data-aos="fade-left" class="fe-box">
        <img src="img/features/f3.png" alt="">
        <h6>Save Money</h6>
    </div>
    <div data-aos="fade-right" class="fe-box">
        <img src="img/features/f4.png" alt="">
        <h6>Promotions</h6>
    </div>
    <div data-aos="fade-left" class="fe-box">
        <img src="img/features/f5.png" alt="">
        <h6>Happy Sell</h6>
    </div>
    <div data-aos="fade-right" class="fe-box">
        <img src="img/features/f6.png" alt="">
        <h6>24/7 Support</h6>
    </div>
</section>



<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold fs-1">Our Collections</h2>
                <hr class="mb-5">
                <div class="row">
                    <?php
                    $category = getAllActive("categories");

                    if (mysqli_num_rows($category) > 0) {
                        foreach ($category as $item) {
                    ?>
                            <div data-aos="fade-up" class="col-md-3 col-sm-12 mb-4">
                                <a class="nav-link" href="product.php?category=<?= $item['slug'] ?>">
                                    <div class="card shadow border-0 rounded-5 w-100">
                                        <div class="card-body">
                                            <img src="./uploads/<?= $item['image']; ?>" alt="Category Image" style="height: 200px;" class="w-100 rounded-5">
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
</div>

<section id="banner" class="section-m1">
    <h4>Repair Service</h4>
    <h2>Up to <span>70% off</span> - All t-Shirts & Accessories</h2>
    <button class="normal">Explore More</button>
</section>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold fs-1">Our Products</h2>
                <hr class="mb-5">
                <div class="row">
                    <?php
                    $products = getAllActive("products");

                    if (mysqli_num_rows($products) > 0) {
                        foreach ($products as $item) {
                    ?>
                            <div data-aos="fade-up" class="col-md-3 mb-2">
                                <a class="nav-link" href="product-view.php?product=<?= $item['slug'] ?>">
                                    <div class="card shadow border-0 rounded-5" style="width: 300px;">
                                        <div class="card-body">
                                            <img src="./uploads/<?= $item['image']; ?>" alt="Category Image" style="height: 200px;" class="w-100 rounded-5">
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
</div>

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

include 'includes/footer.php';
?>