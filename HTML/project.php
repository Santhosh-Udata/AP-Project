<?php if (isset($_GET['username'])): ?>
    <script>
        // Store username immediately
        sessionStorage.setItem('currentUser', '<?php echo $_GET['username']; ?>');
    </script>
<?php endif; ?>

<!-- Your normal PHP content here -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Lover</title>
    <link rel="stylesheet" href="css/intro.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/project.css">
    <link rel="stylesheet" href="CSS/tips.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anybody:ital,wght@0,100..900;1,100..900&family=Joti+One&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body data-page="project">


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


    <div class="front-page-img"><img src="images/front_page 1.png" alt="Background image" class="bg-image"></div>
    <div class="motivation">
        <div class="text-in-motive">
            <h1 class="text-of-motive">NEVER UNDERESTIMATE THE INVESTMENT YOU MAKE IN YOURSELF.</h1>
        </div>
    </div>


    <div class="menu-page">
        <div class="menu-container">
            <div class="menu"><a href="chest.html"><img src="images/chest.png"></a>
                <p class="menu-title">CHEST</p>
            </div>
            <div class="menu"><a href="#"><img src="images/back.png"></a>
                <p class="menu-title">BACK</p>
            </div>
            <div class="menu"><a href="#"><img src="images/biceps.png"></a>
                <p class="menu-title">BICEPS</p>
            </div>
        </div>
        <br><br><br>
        <div class="menu-container">
            <div class="menu"><a href="#"><img src="images/shoulder.png"></a>
                <p class="menu-title">SHOULDER</p>
            </div>
            <div class="menu"><a href="#"><img src="images/legs.png"></a>
                <p class="menu-title">LEGS</p>
            </div>
            <div class="menu"><a href="#"><img src="images/triceps.png"></a>
                <p class="menu-title">TRICEPS</p>
            </div>
        </div>
    </div>


    <div class="tips-page">
        <img src="images/Tips.png" alt="Background image" class="bg--image">
        <div class="tips-container">
            <div class="tips-title">TIPS BEFORE STARTING WORKOUT :</div>
            <br><br>
            <div class="tip-item">
                <div class="icon"><img src="images/dumbel-icon.png"></div>
                <div class="tip-text">
                    <span>Warm Up : </span> Start with stretches and light cardio to prevent injuries.
                </div>
            </div>

            <div class="tip-item">
                <div class="icon"><img src="images/dumbel-icon.png"></div>
                <div class="tip-text">
                    <span>Form First : </span> Focus on proper technique over heavy weights.
                </div>
            </div>

            <div class="tip-item">
                <div class="icon"><img src="images/dumbel-icon.png"></div>
                <div class="tip-text">
                    <span>Hydrate : </span> Drink water before, during, and after your workout.
                </div>
            </div>

            <div class="tip-item">
                <div class="icon"><img src="images/dumbel-icon.png"></div>
                <div class="tip-text">
                    <span>Mix It Up : </span> Combine cardio, strength, and flexibility exercises.
                </div>
            </div>

            <div class="tip-item">
                <div class="icon"><img src="images/dumbel-icon.png"></div>
                <div class="tip-text">
                    <span>Recovery : </span> Rest days are essential for muscle repair and growth.
                </div>
            </div>

            <div class="tip-item">
                <div class="icon"><img src="images/dumbel-icon.png"></div>
                <div class="tip-text">
                    <span>Nutrition : </span> Fuel your body with balanced meals and protein.
                </div>
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
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="partners.html">Our partners</a></li>
                        <li><a href="aboutus.html">About Us</a></li>
                        <li><a href="#">Guidelines</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <script src="JS/header.js"></script>
    <script src="JS/intro.js"></script>
    <script src="JS/menu.js"></script>
    <script src="JS/project.js"></script>
</body>

</html>