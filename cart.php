<?php
session_start();

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'destroy') {
        unset($_SESSION['cart']);
    }
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart = $_SESSION['cart'];

if (isset($_GET['name']) && isset($_GET['price'])) {
    $exist = false;
    foreach ($cart as $key => $item) {
        if ($item['name'] == $_GET['name']) {
            $exist = $key;
        }
    }

    if ($exist === false) {
        array_push($cart, [
            'name'  => $_GET['name'],
            'qty'  => 1,
            'price' => $_GET['price']
        ]);

        echo "Menambah Produk ke cart!";
    } else {
        $qty = $cart[$exist]['qty'];
        $cart[$exist]['qty'] = (int)$qty + 1;
        echo "Menambah QTY Produk!";
    }

    $_SESSION['cart'] = $cart;

    header('Location: cart.php');
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sewa Ruangan Meeting dan Gedung Acara</title>
    <link rel="stylesheet" href="style4webl.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <!--Star Header-->
    <header>
        <div class="container">
            <a href="index.php">
                <h1>Hourly meeting room rental</h1>
                <h3>Best Price Guaranteed</h3>
            </a>
        </div>
    </header>
    <!--End Header-->

    <div class=" container">
        <br><br>
        <h5>Jumlah Barang: <?php echo count($cart) ?></h5>
        <a href="cart.php?type=destroy" class="">Kosongkan Data</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;

                foreach ($cart as $key => $item) {

                    $price = (int)$item['price'] * (int)$item['qty'];
                    $total = $total + $price;
                ?>

                    <tr>
                        <th scope="row"><?php echo $key + 1 ?></th>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['qty'] ?></td>
                        <td><?php echo 'Rp. ' . number_format($item['price']) ?></td>
                        <td><?php echo 'Rp. ' . number_format($price) ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4" class="text-right">Total Harga</td>
                    <td><?php echo 'Rp. ' . number_format($total) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <!-- FOOTER -->
    <footer>
        <div class="container">
            <a href="index.php" class="brand">Taopik QM</a>
            <p>Copyright &copy;2022. All Right Reserved</p>
        </div>
    </footer>
    <!-- FOOTER -->

</body>

</html>