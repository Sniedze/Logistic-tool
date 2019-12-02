<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <title><?= $sPageTitle ?></title>
</head>

<body id=<?= "$sPageTitle" . "Body" ?>>

    <nav>
        <a <?= $sClassActive == 'home' ? 'class="active"' : ''; ?> href="index.php">HOME</a>
        <a <?= $sClassActive == 'dashboard' ? 'class="active"' : ''; ?> href="dashboard.php">DASHBOARD</a>
        <a <?= $sClassActive == 'customers' ? 'class="active"' : ''; ?> href="customers.php">CUSTOMERS</a>
        <a <?= $sClassActive == 'orders' ? 'class="active"' : ''; ?> href="orders.php">ORDERS</a>
        <a <?= $sClassActive == 'drivers' ? 'class="active"' : ''; ?> href="drivers.php">DRIVERS</a>
        <a <?= $sClassActive == 'trucks' ? 'class="active"' : ''; ?> href="trucks.php">TRUCKS</a>

    </nav>