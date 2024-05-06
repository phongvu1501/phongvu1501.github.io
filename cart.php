<?php
session_start();

// Kiểm tra xem giỏ hàng có tồn tại không
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = [];
}

// Xử lý xóa một mặt hàng khỏi giỏ hàng
if(isset($_GET['action']) && $_GET['action'] === 'remove_one_from_cart' && isset($_GET['id'])) {
    $sanPhamId = $_GET['id'];
    if(isset($cart[$sanPhamId])) {
        if($cart[$sanPhamId]['so_luong'] > 1) {
            // Nếu số lượng mặt hàng lớn hơn 1, giảm số lượng đi 1
            $cart[$sanPhamId]['so_luong']--;
        } else {
            // Nếu số lượng mặt hàng là 1, xóa mặt hàng khỏi giỏ hàng
            unset($cart[$sanPhamId]);
        }
        $_SESSION['cart'] = $cart;
    }
}

// Xử lý xóa mặt hàng khỏi giỏ hàng
if(isset($_GET['action']) && $_GET['action'] === 'remove_from_cart' && isset($_GET['id'])) {
    $sanPhamId = $_GET['id'];
    if(isset($cart[$sanPhamId])) {
        unset($cart[$sanPhamId]);
        $_SESSION['cart'] = $cart;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Giỏ hàng của bạn</h1>
    <table border="1"  class="table-container">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php foreach($cart as $id => $sanPham) { ?>
                <tr>
                    <td><?= $id + 1 ?></td>
                    <td><?= $sanPham["ten"] ?></td>
                    <td><?= $sanPham["gia"] ?></td>
                    <td><?= $sanPham['so_luong'] ?></td>
                    <td>
                        <a href="?action=remove_one_from_cart&id=<?= $id ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                            <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                            <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
                        </svg>
                        </a><br><br>
                        <a href="?action=remove_from_cart&id=<?= $id ?>" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                            <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                            <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
                        </svg>
                        </a>
                    </td>
                </tr>
                <?php $total += (float) str_replace(['VND', ',', ' '], '', $sanPham['gia']) * $sanPham['so_luong']; ?>
            <?php } ?> 
        </tbody>
    </table>
    <p>Tổng tiền: <?= number_format($total, 0, ',', '.') ?>.000 VND</p><br><br>
    <a href="php.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
            </svg>
    </a>
</body>
</html>
