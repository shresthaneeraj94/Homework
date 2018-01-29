<?php
$price = 0;
$delivery = 'pickup';
$district = '';
$box = '';
$giftwrap = '';
$plastic = '';
$transcentQty = 0;
$sandiskQty = 0;
$priceBeforeTax = 0;
$samsungQty = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    if (isset($_POST['transcentQty'])) {
        $transcentQty = $_POST['transcentQty'];
    } else {
        $transcentQty = 0;
    }


    if (isset($_POST['sandiskQty'])) {
        $sandiskQty = $_POST['sandiskQty'];
    } else
        $sandiskQty = 0;


    if (isset($_POST['samsungQty'])) {
        $samsungQty = $_POST['samsungQty'];
    } else
        $samsungQty = 0;


    if (isset($_POST['box'])) {
        $box = $_POST['box'];
    } else $box = 0;

    if (isset($_POST['giftwrap'])) {
        $giftwrap = $_POST['giftwrap'];
    } else
        $giftwrap = 0;

    if (isset($_POST['plastic'])) {
        $plastic = $_POST['plastic'];
    } else
        $plastic = 0;
    $delivery = $_POST['delivery'];
    $district = $_POST['district'];

    $priceBeforeTax = (100 * $transcentQty) + (400 * $sandiskQty) + (800 * $samsungQty);
    if ($district == "ktm") {
        $price = 0.1 * $priceBeforeTax + $priceBeforeTax;
    } else {
        $price = $priceBeforeTax;
    }
    if ($box == true) {
        $price = $price + 100;
    }
    if ($giftwrap == true) {
        $price = $price + 200;
    }
    if ($box == true) {
        $price = $price + 50;
    }
    if ($delivery == "home") {
        $price = $price + 500;
    }
}
?>
<link rel="stylesheet" href="style.css">
<div class="container">
    <div class="content">
        <h1>SHOPPING HUB:USB PENDRIVE</h1>

        <form method="post">
            <p>Transcent(unit price:100)<br>
                <input type="number" min="0" name="transcentQty" value="<?= $transcentQty ?>">Quantity</p>
            <p>Sandisk(unit price:400)<br>
                <input type="number" min="0" name="sandiskQty" value="<?= $sandiskQty ?>">Quantity</p>
            <p>Samsung(unit price:800)<br>
                <input type="number" min="0" name="samsungQty" value="<?= $samsungQty ?>">Quantity</p>
            <p>Packaging<br>
                <input type="checkbox" name="box" value="true" <?= $box === 'true' ? 'checked' : '' ?>>Box(100)&nbsp;
                <input type="checkbox" name="giftwrap" value="true" <?= $giftwrap === 'true' ? 'checked' : '' ?>>Giftwrap(200)&nbsp;
                <input type="checkbox" name="plastic" value="true" <?= $plastic === 'true' ? 'checked' : '' ?>>Plastic(50)
            </p>
            <p>Delivery<br>
                <input type="radio" name="delivery" value="home" <?= $delivery === 'home' ? 'checked' : '' ?>>Home
                delivery(500)
                &nbsp;&nbsp;<input type="radio" name="delivery"
                                   value="pickup" <?= $delivery === 'pickup' ? 'checked' : '' ?>>Pickup(free)
            </p>
            <p>District
                <select name="district" id="">
                    <option value="ktm" <?= $district === 'ktm' ? 'selected' : '' ?>>Kathmandu</option>
                    <option value="bkt"<?= $district === 'bkt' ? 'selected' : '' ?>>Bhaktapur</option>
                    <option value="ltp"<?= $district === 'ltp' ? 'selected' : '' ?>>Lalitpur</option>
                </select></p>
            <p><input type="text" disabled value="<?php echo $price ?>"></p>
            <input type="submit" value="Get Price">
        </form>
    </div>
</div>