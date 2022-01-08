<?php
if (isset($_Get['action'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['quantity'] as $key => $val) {
            if ($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;
            }
        }
    }
}

?>

<section class="container topHeader">
    <div class="topHeaderContent">
        <article>
            <ul>
                <!--  <?php if (strlen($_SESSION['login'])) {   ?>
                    <li><a href="#">Bienvenido - <?php echo htmlentities($_SESSION['username']); ?></a></li>
                <?php } ?> -->

                <li><a href="myAccount.php">Mi cuenta</a></li>
                <li><a href="myWishlist.php">Lista de deseos</a></li>
                <li><a href="myCart.php">Mi carrito</a></li>
                <!--  <?php if (strlen($_SESSION['login']) == 0) {   ?>
                    <li><a href="./view/login.php">Iniciar sesión</a></li>
                <?php } else { ?>

                    <li><a href="./view/logout.php">Cerrar sesión</a></li>
                <?php } ?> -->
            </ul>
        </article>
        <article>
            <ul>
                <li>
                    <a href="./view/trackOrders.php" class="btn btn-info">Seguimiento de pedidos</a>
                </li>
            </ul>
        </article>
    </div>
</section>


<section class="container py-2 midHeader">
    <div class="row justify-content-center">
        <article class="col-12 col-md-3">
            <div class="logo">
                <a href="index.php">
                    <h2>Niya Lenceria</h2>
                </a>
            </div>
        </article>
        <article class="col-12 col-md-6 searchArea">            
                <form name="search" method="post" action="search-result.php">
                   <!--  <div class="control-group d-flex">
                        <input class="form-control" placeholder="Buscar aqui..." name="product" required="required" />
                        <button class="search-button" type="submit" name="search">Buscar</button>
                    </div> -->
                    <div class="input-group mb-3">
                        <input class="form-control" placeholder="Buscar aqui..." name="product"  />
                        <button class="btn btn-outline-secondary" type="submit" name="search">Buscar</button>
                    </div>
                </form>            
        </article>
        <article class="col-12 col-md-3">
            <?php
            if (!empty($_SESSION['cart'])) {
            ?>
                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                        <div class="items-cart-inner">
                            <div class="total-price-basket">
                                <span class="lbl">Carrito -</span>
                                <span class="total-price">
                                    <span class="sign">$.</span>
                                    <span class="value"><?php echo $_SESSION['tp']; ?></span>
                                </span>
                            </div>
                            <div class="basket">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </div>
                            <div class="basket-item-count"><span class="count"><?php echo $_SESSION['qnty']; ?></span></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">

                        <?php
                        $sql = "SELECT * FROM products WHERE id IN(";
                        foreach ($_SESSION['cart'] as $id => $value) {
                            $sql .= $id . ",";
                        }
                        $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
                        $query = mysqli_query($con, $sql);
                        $totalprice = 0;
                        $totalqunty = 0;
                        if (!empty($query)) {
                            while ($row = mysqli_fetch_array($query)) {
                                $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                                $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge'];
                                $totalprice += $subtotal;
                                $_SESSION['qnty'] = $totalqunty += $quantity;

                        ?>
                                <li>
                                    <div class="cart-item product-summary">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="image">
                                                    <a href="detail.html"><img src="admin/productimages/<?php echo $row['id']; ?>/<?php echo $row['productImage1']; ?>" width="35" height="50" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-7">

                                                <h3 class="name"><a href="index.php?page-detail"><?php echo $row['productName']; ?></a></h3>
                                                <div class="price">$.<?php echo ($row['productPrice'] + $row['shippingCharge']); ?>*<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?></div>
                                            </div>

                                        </div>
                                    </div>

                            <?php }
                        } ?>
                            <div class="clearfix"></div>
                            <hr>

                            <div class="clearfix cart-total">
                                <div class="pull-right">

                                    <span class="text">Total :</span><span class='price'>$.<?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>

                                </div>

                                <div class="clearfix"></div>

                                <a href="my-cart.php" class="btn btn-upper btn-primary btn-block m-t-20">Mi carrito</a>
                            </div>

                                </li>
                    </ul>
                </div>
            <?php } else { ?>
                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                        <div class="items-cart-inner">
                            <div class="total-price-basket">
                                <span class="lbl">carrito -</span>
                                <span class="total-price">
                                    <span class="sign">$.</span>
                                    <span class="value">00.00</span>
                                </span>
                            </div>
                            <div class="basket">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </div>
                            <div class="basket-item-count"><span class="count">0</span></div>

                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="">
                                <div class="row">
                                    <div class="col-12">
                                        Carrito de compras vacio.
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix cart-total">

                                <div class="clearfix"></div>

                                <a href="index.php" class="btn btn-upper btn-primary btn-block m-t-20">Seguir comprando</a>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php } ?>
        </article>
    </div>
</section>


<section class="menu bottomHeader">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="index.php">TIENDA</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <?php $sql = mysqli_query($con, "SELECT id,categoryName  FROM category LIMIT 6");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                        <li class="nav-item ">
                            <a class="nav-link " href="category.php?cid=<?php echo $row['id']; ?>"> <?php echo $row['categoryName']; ?></a>

                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>
</section>