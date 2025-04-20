<?php
// Helper function to read items
function get_store_items($option)
{
    $file = "data/option$option.txt";
    $items = [];

    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $parts = explode('|', $line);
            $item = [];
            foreach ($parts as $part) {
                list($key, $value) = explode('=', $part);
                $item[trim($key)] = trim($value);
            }
            $items[] = $item;
        }
    }
    return $items;
}

$selected_option = isset($_GET['option']) ? max(1, min(8, (int) $_GET['option'])) : 1;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/store.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anybody:ital,wght@0,100..900;1,100..900&family=Joti+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="CSS/footer.css">
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


    <div class="container">
        <img src="images/container_store.png" class="container_img">
    </div>

    <div class="Store">
        <div class="side-bar">
            <?php for ($i = 1; $i <= 8; $i++): ?>
                <button class="sidebar-btn <?= $i === $selected_option ? 'active' : '' ?>" data-option="<?= $i ?>">
                    Option <?= $i ?>
                </button>
            <?php endfor; ?>
        </div>

        <div class="items-grid">
            <?php foreach (get_store_items($selected_option) as $item): ?>
                <div class="item-cell"
                    onclick="window.location='individual_item.php?<?= http_build_query($item) ?>&option=<?= $selected_option ?>'">
                    <div class="item">
                        <img src="<?= htmlspecialchars($item['image']) ?>" class="item_img">
                    </div>
                    <div class="item_info">
                        <div class="item_name"><?= htmlspecialchars($item['name']) ?></div>
                        <div class="price_and_discount">
                            <div class="price">$<?= number_format($item['price'], 2) ?></div>
                            <?php if (!empty($item['discount'])): ?>
                                <div class="discount"><?= $item['discount'] ?>% off</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
    <script src="JS/store.js"></script>
</body>

</html>