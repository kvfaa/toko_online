<?php
include "header.php";

// Initialize subtotal
$subtotal = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update quantities in the session cart
    if (isset($_POST['qty'])) {
        foreach ($_POST['qty'] as $key_produk => $qty) {
            // Ensure the quantity is a positive number
            if ($qty > 0) {
                $_SESSION['cart'][$key_produk]['qty'] = $qty;
            }
        }
    }

    // If products are selected for checkout, calculate subtotal
    if (isset($_POST['selected_products'])) {
        $selected_products = $_POST['selected_products'];
        $cart = $_SESSION['cart'];

        foreach ($selected_products as $key) {
            $subtotal += $cart[$key]['harga'] * $cart[$key]['qty'];
        }
    }
}
?>

<style>
    .content {
        margin-top: 100px;
    }

    .subtotal-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<div class="container content">
    <h2>Keranjang</h2>
    <form action="keranjang.php" method="post"> <!-- Form to update cart quantities -->
        <table class="table table-hover striped">
            <thead>
                <tr>
                    <th>Select</th>
                    <th></th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION['cart'] as $key_produk => $val_produk): ?>
                    <tr>
                        <td>
                            <!-- Checkbox to select products for checkout -->
                            <input type="checkbox" name="selected_products[]" value="<?= $key_produk ?>"
                                <?= isset($_POST['selected_products']) && in_array($key_produk, $_POST['selected_products']) ? 'checked' : '' ?>>
                        </td>
                        <td>
                            <img src="<?= htmlspecialchars($val_produk['foto_produk']) ?>" alt="Product Image"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </td>
                        <td><?= htmlspecialchars($val_produk['nama_produk']) ?></td>
                        <td style="text-align: center;">
                            <!-- Enable quantity input with onchange event to update subtotal -->
                            <input type="number" name="qty[<?= $key_produk ?>]"
                                value="<?= htmlspecialchars($val_produk['qty']) ?>" min="1" class="form-control"
                                style="width: 60px;" onchange="updateSubtotal()">
                        </td>
                        <td>
                            Rp. <span class="harga"><?= number_format($val_produk['harga'], 0, ',', '.') ?></span>

                        </td>
                        <td>
                            <a href="hapus_cart.php?id=<?= $key_produk ?>" class="btn btn-danger"><strong>X</strong></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="subtotal-container">
            <h3>Subtotal: Rp. <span id="subtotal"><?= number_format($subtotal, 0, ',', '.') ?></span></h3>
            <button type="submit" formaction="checkout.php" class="btn btn-success">Check Out</button>
        </div>
    </form>
</div>

<script>
    function updateSubtotal() {
        let subtotal = 0;
        const selectedCheckboxes = document.querySelectorAll('input[name="selected_products[]"]:checked');

        selectedCheckboxes.forEach(checkbox => {
            const row = checkbox.closest('tr');
            const qty = row.querySelector('input[name^="qty"]').value;
            const price = row.querySelector('.harga').innerText.replace(/\./g, '').replace('Rp. ', '').replace(',', '.');
            subtotal += qty * parseFloat(price);
        });

        document.getElementById('subtotal').innerText = subtotal.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }
</script>

<?php
include "footer.php";
?>