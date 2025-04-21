<?php
        // DB connection setup
        $conn = new mysqli("localhost", "root", "", "users");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // 1. Get the current username (e.g., from session)
        session_start();
        if (!isset($_SESSION['username'])) {
            die("User not logged in");
        }
        $username = $_SESSION['username'];

        // 2. Get user ID from login table
        $stmt = $conn->prepare("SELECT id FROM login WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            die("Username not found in login table");
        }
        $user = $result->fetch_assoc();
        $login_id = $user['id'];

        // 3. Check if profile already exists
        $check = $conn->prepare("SELECT * FROM profile WHERE id = ?");
        $check->bind_param("i", $login_id);
        $check->execute();
        $check_result = $check->get_result();

        // 4. Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
            // Only process if profile doesn't exist
            if ($check_result->num_rows === 0) {
                $name = $_POST['name'] ?? '';
                $phone = $_POST['phone'] ?? '';  // Fixed: was using 'ph_no' but form has 'phone'
                $email = $_POST['email'] ?? '';
                $gender = $_POST['gender'] ?? '';

                $insert = $conn->prepare("INSERT INTO profile (id, name, ph_no, email, gender) VALUES (?, ?, ?, ?, ?)");
                $insert->bind_param("isiss", $login_id, $name, $phone, $email, $gender);

                if ($insert->execute()) {
                    // Refresh the page to show the new profile
                    header("Location: profile.php");
                    exit;
                } else {
                    echo "Error saving profile: " . $conn->error;
                }
            }
        }

        // Get profile data for display
        if ($check_result->num_rows > 0) {
            $result = $check_result->fetch_assoc();
        }
        ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anybody:ital,wght@0,100..900;1,100..900&family=Joti+One&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/profile.css">
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


    <div class="side-bar">
        <div class="username">
            <img src="images/profile.png" class="profile-pic">
            <h1 class="user-name">Username</h1>
        </div>
        <hr class="line">
        <div class="side-bar-links">
            <div class="orders">
                <a href="store.php" class="order-tag">Orders</a>
                <span class="material-icons">shopping_cart</span>
            </div>
            <div class="Log-out">
                <a href="project.php" class="logout-tag" onclick="logout()">Log-out</a>
                <span class="material-icons">logout</span>
            </div>
        </div>
    </div>
    <div class="profile-container">
        <div class="profile-photo-div">
            <img src="images/profile.png" class="profile-photo">
        </div>
        <div class="profile-info">
            <?php if ($check_result->num_rows === 0): ?>
                <form action="profile.php" method="POST" class="profile-form">
                    <div class="form-group">
                        <div class="details-1">
                            <div class="name-div">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="phone-div">
                                <label for="phone">Phone:</label>
                                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                            </div>
                            <div class="email-div">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="details-2">
                            <div class="gender-div">
                                <p class="Gender">Gender :</p>
                                <input type="radio" id="male" name="gender" value="male" required>
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" value="female" required>
                                <label for="female">Female</label>
                                <input type="radio" id="other" name="gender" value="other" required>
                                <label for="other">Other</label>
                            </div>
                            <div class="save-button-div">
                                <button type="submit" class="save-button" name="save">Save Details</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <div class="profile-content">
                    <p><strong>Name : </strong><?= htmlspecialchars($result['name'] ?? '') ?></p>
                    <p><strong>PHONE NO. : </strong><?= htmlspecialchars($result['ph_no'] ?? '') ?></p>
                    <p><strong>EMAIL : </strong><?= htmlspecialchars($result['email'] ?? '') ?></p>
                    <p><strong>GENDER : </strong><?= htmlspecialchars($result['gender'] ?? '') ?></p>
                </div>
            <?php endif ?>
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
    <script src="JS/profile.js"></script>
</body>

</html>