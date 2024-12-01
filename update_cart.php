<?php
session_start();

if ($_POST) {
    // Update quantities in the cart
    foreach ($_POST['qty'] as $key => $qty) {
        $_SESSION['cart'][$key]['qty'] = intval($qty); // Update the quantity
    }

    // Redirect back to the cart after updating
    header('Location: keranjang.php');
    exit();
}
?>