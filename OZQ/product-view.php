<?php
session_start();
include 'includes/header.php';
include 'Functions/userfunctions.php';

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getslugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
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
                    <li><a href="categories.php" class="active">Collections</a></li>
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

        <div class="py-3">
            <div class="container">
                <a href="index.php" class="text-black  nav-link">
                    Home
                    <a href="" class=" disabled nav-link mx-1">/</a>
                </a>
                <a href="Categories.php" class="text-black  nav-link mx-1">
                    Collection
                    <a href="" class=" disabled nav-link mx-1">/</a>
                </a>
                <a href="#" class="nav-link disabled"><?= $product['name'] ?></a>
            </div>
        </div>
        <div class="bg-light py-3">
            <div class="container product_data mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="rounded-4 px-3">
                            <img src="./uploads/<?= $product['image'] ?>" alt="Product Image" class="w-100 rounded-5">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold"><?= $product['name'] ?>
                            <span class="float-end text-danger"><?php if ($product['trending']) {
                                                                    echo "Trending";
                                                                } ?></span>
                        </h4>
                        <hr>
                        <div class="col-md-12">
                            <h6>Product Description:</h6>
                            <p><small><?= $product['description'] ?></small></p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h5>Rs <s class="text-danger"><?= $product['original_price']; ?></s></h6>
                                    <h6>Rs <span class="fw-bold"><?= $product['selling_price']; ?></span>
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width:130px;">
                                    <button class="input-group-text decrement">-</button>
                                    <input type="text" class="form-control text-center bg-white qty" value="1" disabled>
                                    <button class="input-group-text increment">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-6">
                                <button class="btn btn-success rounded-5 addtocartBtn px-4 mb-2" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    } else {
        echo "Product Not Found";
    }
} else {
    echo "somthing went wrong";
}
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    $product = getAllActive("products");

                    if (mysqli_num_rows($product) > 0) {
                        foreach ($product as $item) {
                    ?>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a class="nav-link" href="product-view.php?product=<?= $item['slug'] ?>">
                                    <div class="card shadow border-0 w-100 rounded-5">
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
</div>
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
    };
</script>





<?php
include 'includes/footer.php';
?>