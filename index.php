<?php
session_start();

$products = [
    [
        'image'         => 'file-foto/foto_1.jpg?',
        'name'          => 'Ruangan Meeting 01',
        'description'   => 'Dapat menampung 8-12 Orang untuk keperluan rapat yang sesuai kebutuhan anda.',
        'price'         => '1050000',
    ],
    [
        'image'         => 'file-foto/foto_2.jpg',
        'name'          => 'Ruangan Meeting 02',
        'description'   => 'Dapat menampung 5 Orang untuk keperluan rapat yang sesuai kebutuhan anda.',
        'price'         => '1600000',
    ],
    [
        'image'         => 'file-foto/foto_3.jpg',
        'name'          => 'Ruangan Meeting 03',
        'description'   => 'Dapat menampung 15-50 Orang untuk keperluan rapat yang sesuai kebutuhan anda.',
        'price'         => '2000000',
    ],
    [
        'image'         => 'file-foto/foto-event-1.jpg',
        'name'          => 'Gedung Acara Tipe C',
        'description'   => 'Dapat menampung 50 - 100 Orang untuk keperluan acara pertemuan yang sesuai kebutuhan anda.',
        'price'         => '10500000',
    ],
    [
        'image'         => 'file-foto/foto-event-2.jpg',
        'name'          => 'Gedung Acara Tipe C',
        'description'   => 'Dapat menampung 100 - 300 Orang untuk keperluan acara pertemuan yang sesuai kebutuhan anda.',
        'price'         => '16000000',
    ],
    [
        'image'         => 'file-foto/foto-event-3.jpg',
        'name'          => 'Gedung Acara Tipe A',
        'description'   => 'Dapat menampung 1000 - 3000 Orang untuk keperluan acara pertemuan yang sesuai kebutuhan anda.',
        'price'         => '44000000',
    ],
];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sewa Ruangan Meeting dan Gedung Acara</title>
    <link rel="stylesheet" href="style4webl.css">
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

    <!--Star Top Post-->
    <div class="top-post">
        <div class="container">
            <div class="room-list">
                <?php
                foreach ($products as $key => $item) {
                ?>
                    <div class="room-card">
                        <div class="top">
                            <a href="https://pin.it/2z2bnJ2" target="_blank"><img src="<?php echo $item['image'] ?>" alt="Ruangan Meeting 01"></a>
                        </div>
                        <div class="buttom">
                            <a><?php echo $item['name'] ?></a>
                            <div class="room-main-price">
                                <?php echo 'Rp.' . number_format($item['price']) . ' / Sehari'  ?>
                            </div>
                            <div class="room-capacity">
                                <?php echo substr($item['description'], 0, 100) ?>
                            </div>
                            <a href="cart4webl.php?name=<?php echo $item['name'] ?>&price=<?php echo $item['price'] ?>">
                                <button>Booking</button>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--End  Top Post-->

    <br><br><br><br>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <a href="#" class="brand">Taopik QM</a>
            <p>Copyright &copy;2022. All Right Reserved</p>
        </div>
    </footer>
    <!-- FOOTER -->

</body>

</html>