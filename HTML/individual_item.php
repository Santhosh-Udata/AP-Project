<?php
// Redirect back if required parameters are missing
if (!isset($_GET['image']) || !isset($_GET['name'])) {
    header('Location: store.php');
    exit;
}

// Build item array
$item = [
    'image' => htmlspecialchars($_GET['image']),
    'name' => htmlspecialchars($_GET['name']),
    'basePrice' => 7.99,       // price before discount
    'discount' => 60,         // percent off
];
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= $item['name'] ?> - Gym Lover</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/individual_item.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anybody:ital,wght@0,100..900;1,100..900&family=Joti+One&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header_part1 nav-link" data-href="project.php">
            <img src="images/logo.png" alt="Logo" class="logo">
            <h1 class="header-title">Gym
                Lover</h1>
        </div>
        <div class="header_part2">
            <div class="part2_a"></div>
            <div class="part2_b">
                <div class="nav-link require-login" data-href="membership.html">
                    <p class="header-tag">MEMBERSHIP</p>
                </div>
                <div class="nav-link" data-href="store.php">
                    <p class="header-tag">STORE</p>
                </div>
            </div>
            <div class="part2_c"></div>
        </div>
        <div class="header_part3">
            <img src="images/login-icon-white.png" class="profile" id="profile-link" onclick="handleProfileClick()"
                alt="Profile Icon">
            <img class="store nav-link" src="images/store-icon-white.png" data-href="store.php" alt="store">
        </div>
    </header>

    <div class="item-details">
        <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="detail-img">
        <div class="details">
            <h2><?= $item['name'] ?></h2>
            <div class="price-section">
                <div id="price">$<?= number_format($item['basePrice'], 2) ?></div>
                <div class="discount"><?= $item['discount'] ?>% off</div>
            </div>
            <div class="sizes" id="sizes">
                <?php foreach (['S', 'M', 'L', 'XL', 'XXL'] as $sz): ?>
                    <button class="size-btn" data-size="<?= $sz ?>"><?= $sz ?></button>
                <?php endforeach; ?>
            </div>
            <select id="quantity">
                <?php for ($i = 1; $i <= 6; $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
            <button id="buy-now" class="buy-btn">Buy Now</button>
            <div class="description">
                <h3>Description:</h3>
                <p>Experience peak performance with our lightweight, breathable vest designed for maximum mobility and
                    durability. Whether you're training or relaxing, this vest keeps you looking sharp and feeling
                    great.</p>
            </div>
        </div>
    </div>

  <!-- Modal -->
  <div id="modal-overlay" class="modal-overlay hidden">
    <div class="modal">
      <p id="modal-text">Final Amount: $0.00</p>
      <div class="modal-actions">
        <button id="confirm-btn">Confirm</button>
        <button id="cancel-btn">Cancel</button>
      </div>
    </div>
  </div>

   

    <footer class="footer">
        <div class="foot-container">
            <div class="row">
                <div class="footer-col">
                    <h4>Contact Us:</h4>
                    <ul class="icon-list">
                        <li><span class="material-icons">email</span>gymlover@gmail.com</li>
                        <li><span class="material-icons">phone</span>140 254 1234</li>
                        <li><span class="material-icons">place</span>Andhra pradesh</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Social-Media-Handles:</h4>
                    <div class="social-media">
                        <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://x.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Quick-links:</h4>
                    <ul class="icon-list-1">
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="partners.html">Our partners</a></li>
                        <li><a href="aboutus.html">About Us</a></li>
                        <li><a href="#">Guidelines</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>
    <script src="JS/header.js"></script>
    <script>
        window.itemConfig = {
            basePrice: <?= $item['basePrice'] ?>,
            discountRate: <?= $item['discount'] ?> / 100
        };
    </script>
    <script src="JS/individual_item.js"></script>

</body>

</html>