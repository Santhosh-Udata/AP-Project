<?php

$page = isset($_GET['page']) ? $_GET['page'] : null;

$lines = file("data/chest.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$allExercises = [];
$exerciseDetail = [];

foreach ($lines as $line) {

    $parts = explode("|", $line);

    if (count($parts) === 5) {
        $id = $parts[0];
        $allExercises[$id] = [
            "name" => $parts[1],
            "img" => $parts[2],
            "target" => $parts[3],
            "reps" => $parts[4]
        ];
    }

    if (count($parts) === 3) {
        $id = $parts[0];
        $key = $parts[1];
        $value = $parts[2];

        if ($id === $page) {
            if (!isset($exerciseDetail[$key])) {
                $exerciseDetail[$key] = [];
            }
            $exerciseDetail[$key][] = $value;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title><?= ucfirst($page) ?></title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/main-menu.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/chest.css">
    <link rel="stylesheet" href="CSS/bench-press.css">
    <link rel="stylesheet" href="CSS/modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anybody:ital,wght@0,100..900;1,100..900&family=Joti+One&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anybody:ital@0;1&family=Joti+One&display=swap"
        rel="stylesheet">

</head>

<body data-page=<?= $page ?>>

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

    <div class="main-menu">
        <div></div>
        <?php
        // key => label
        $sections = [
            'chest' => 'Chest',
            'back' => 'Back',
            'biceps' => 'Biceps',
            'shoulders' => 'Shoulders',
            'legs' => 'Legs',
            'triceps' => 'Triceps',
        ];
        foreach ($sections as $key => $label): ?>
            <div class="<?= $key ?> main-list">
                <a href="layout.php?page=<?= urlencode($key) ?>"><?= htmlspecialchars($label) ?></a>
            </div>
        <?php endforeach; ?>
        <div></div>
    </div>

    <?php if ($page === 'chest'): ?>
        <!-- Show all chest exercises -->
        <div class="chest-exercises">
            <?php foreach ($allExercises as $id => $item): ?>
                <div style="background-color: white; color: black;" class="chest-exercise" id="<?= $id ?>">
                    <img src="<?= $item['img'] ?>" alt="">
                    <div>
                        <h3><?= $item['name'] ?></h3>
                        <p>Target: <?= $item['target'] ?></p>
                        <p>Reps: <?= $item['reps'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <script>
            document.querySelectorAll('.chest-exercise').forEach(box => {
                box.addEventListener('click', function () {
                    window.location.href = "layout.php?page=" + this.id;
                });
            });
        </script>

    <?php else: ?>
        <div class="container">
            <div class="left-section">

                <h1 class="title">
                    <?= $exerciseDetail['Title'][0] ?? '' ?>
                </h1>
                <div class="image-container">
                    <img src="<?= $exerciseDetail['Image'][0] ?? '' ?>" alt="" width="300">
                </div>

                <div class="bottom-box">
                    <div class="detail">
                        <p><span class="bullet"><img src="images/bullet.png"></span><u>Type:</u>
                            <?= $exerciseDetail['Type'][0] ?? '' ?>
                        </p>
                    </div>
                    <div class="detail">
                        <p><span class="bullet"><img src="images/bullet.png"></span><u>Movement:</u>
                            <?= $exerciseDetail['Movement'][0] ?? '' ?>
                        </p>
                    </div>
                    <div class="detail">
                        <p><span class="bullet"><img src="images/bullet.png"></span><u>Equipment:</u>
                            <?= $exerciseDetail['Equipment'][0] ?? '' ?>
                        </p>
                    </div>
                </div>

            </div>

            <div class="right-section">
                <div class="panel">
                    <h3>Target Muscle Group</h3>
                    <p><strong>Primary:</strong>
                        <?= $exerciseDetail['Primary Target'][0] ?? '' ?>
                    </p>
                    <p><strong>Secondary:</strong>
                        <?= $exerciseDetail['Secondary Target'][0] ?? '' ?>
                    </p>
                </div>

                <div class="panel">
                    <h3>Recommended Reps &amp; Sets</h3>
                    <ul>
                        <li>For Muscle Growth:
                            <?= $exerciseDetail['Reps For Growth'][0] ?? '' ?>
                        </li>
                        <li>For Strength:
                            <?= $exerciseDetail['Reps For Strength'][0] ?? '' ?>
                        </li>
                        <li>For
                            <?= $exerciseDetail['Reps For Endurance'][0] ?? '' ?>
                        </li>
                    </ul>
                </div>

                <div class="panel">
                    <h3>Key Benefits</h3>
                    <ul>
                        <?php foreach ($exerciseDetail['Benefit'] ?? [] as $b): ?>
                            <li>
                                <?= $b ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>

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
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="partners.html">Our partners</a></li>
                        <li><a href="aboutus.html">About Us</a></li>
                        <li><a href="#">Guidelines</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="JS/main-menu.js"></script>
    <script src="JS/header.js"></script>
</body>

</html>