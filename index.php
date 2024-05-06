<?php
session_start();
$sanPhams = [
    [   
        "ten" => "Trà sữa truyền thống",
        "gia" =>" 30.000 VND",
    ],
    [
        "ten" => "Trà sữa kem cheese",
        "gia" => " 40.000 VND", 
    ],
    [
        "ten" => "Trà sữa kem trứng nướng winggo",
        "gia" => " 35.000 VND",  
    ],
    [
        "ten" => "Hồng trà",
        "gia" => " 25.000 VND",  
    ],
    [
        "ten" => "Cà phê đen đá",
        "gia" => " 30.000 VND",  
    ],
    [
        "ten" => "Bạc xỉu",
        "gia" => " 30.000 VND",  
    ],
    [
        "ten" => "Cà phê sữa",
        "gia" => " 30.000 VND",  
    ],
    [
        "ten" => "Kem tươi",
        "gia" => " 15.000 VND",  
    ],
    [
        "ten" => "Kem ly các vị (xoài,táo,socola,vali,...)",
        "gia" => " 25.000 VND",  
    ],
    [
        "ten" => "Chân gà sốt Thái",
        "gia" => " 35.000 VND",  
    ],
    [
        "ten" => "Đồ ăn vặt (bánh tráng,hướng dương,khô gà,bò xé sợi,...)",
        "gia" => " 25.000 VND",  
    ],
];
if(isset($_GET['action']) && $_GET['action'] === 'add_to_cart' && isset($_GET['id'])) {
    $sanPhamId = $_GET['id'];
    if(isset($sanPhams[$sanPhamId])) {
        $sanPham = $sanPhams[$sanPhamId];
        if(isset($_SESSION['cart'][$sanPhamId])) {
            // Nếu mặt hàng đã tồn tại trong giỏ hàng, tăng số lượng lên 1
            $_SESSION['cart'][$sanPhamId]['so_luong']++;
        } else {
            // Nếu mặt hàng chưa tồn tại trong giỏ hàng, thêm mới vào giỏ hàng với số lượng là 1
            $_SESSION['cart'][$sanPhamId] = $sanPham;
            $_SESSION['cart'][$sanPhamId]['so_luong'] = 1;
        }
    }
}

// Xử lý xóa mặt hàng khỏi giỏ hàng
if(isset($_GET['action']) && $_GET['action'] === 'remove_from_cart' && isset($_GET['id'])) {
    $sanPhamId = $_GET['id'];
    if(isset($_SESSION['cart'][$sanPhamId])) {
        unset($_SESSION['cart'][$sanPhamId]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TiệmCủaPhong</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="menu">
    <div class="menu-left">
        <h1>Menu TiệmCủaPhong</h1>
    </div>
    <div class="menu-right">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Nhập từ khóa...">
            <button type="submit" name="submit">Tìm kiếm</button>
        </form>
    </div>
</div>
<table border="1" class="table-container">
    <thead>
        <tr>
            <th>Menu</th>
            <th>Giá</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($sanPhams as $id => $sanPham) { ?>
            <tr>
                <td><?= $sanPham["ten"] ?></td>
                <td><?= $sanPham["gia"] ?></td>
                <td><a href="?action=add_to_cart&id=<?= $id ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                    </a></td>
            </tr>
        <?php } ?> 
    </tbody>
</table><br><br>
<div>
    <a href="cart.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708"/>
        </svg>
</a>
</div>
</body>
</html>