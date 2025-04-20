<?php
if(!isset($_GET['image']) || !isset($_GET['name'])) {
    header("Location: store.php");
    exit();
}

$item = [
    'image' => htmlspecialchars($_GET['image']),
    'name' => htmlspecialchars($_GET['name']),
    'price' => isset($_GET['price']) ? (float)$_GET['price'] : 0,
    'discount' => $_GET['discount'] ?? '',
    'option' => isset($_GET['option']) ? (int)$_GET['option'] : 1
];
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $item['name'] ?> - Gym Lover</title>
    <link rel="stylesheet" href="CSS/store.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
</head>
<body>
    <header class="header">
        <!-- Same header as store.php -->
    </header>

    <div class="item-details">
        <img src="<?= $item['image'] ?>" class="detail-img">
        <h2><?= $item['name'] ?></h2>
        <div class="price">$<?= number_format($item['price'], 2) ?></div>
        <?php if(!empty($item['discount'])): ?>
            <div class="discount"><?= $item['discount'] ?>% off</div>
        <?php endif; ?>
        <button onclick="window.location='store.php?option=<?= $item['option'] ?>'" 
                class="back-btn">
            ← Back to Store
        </button>
    </div>

    <footer class="footer">
        <!-- Same footer as store.php -->
    </footer>

    <script src="JS/header.js"></script>
</body>
</html>