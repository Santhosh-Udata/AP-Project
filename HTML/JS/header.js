const thresholdheight = window.innerHeight * 0.7;

function header1() {
    document.querySelector(".header-title").style.color = "white";
    document.querySelectorAll(".header-tag").forEach(tag => tag.style.color = "white");
    document.querySelector(".header").style.backgroundColor = "rgba(0, 0, 0, 0.5)";
    document.querySelector(".profile").src = "images/login-icon-white.png";
    document.querySelector(".store").src = "images/store-icon-white.png";
};

function header2() {
    document.querySelector(".header-title").style.color = "black";
    document.querySelectorAll(".header-tag").forEach(tag => tag.style.color = "black");
    document.querySelector(".header").style.backgroundColor = "rgb(211,211,211)";
    document.querySelector(".profile").src = "images/login-icon.png";
    document.querySelector(".store").src = "images/store-icon.png";
};

document.addEventListener("DOMContentLoaded", function () {
    const head_param = document.body.dataset.page;
    if (head_param == "project") {
        window.onscroll = function () {
            if (window.scrollY <= thresholdheight) {
                header1();
                console.log("header1");
            }
            else {
                header2();
                console.log("header2");
            }
            document.querySelector(".header").style.transition = "all 0.5s";
            document.querySelector(".header-title").style.transition = "all 0.5s";
            document.querySelectorAll(".header-tag").forEach(tag => tag.style.transition = "all 0.5s");
            document.querySelector(".profile").style.transition = "all 0.5s";
            document.querySelector(".store").style.transition = "all 0.5s";
        };
    }
    else {
        header2();
    }
});


document.addEventListener('DOMContentLoaded', () => {
    // Inject both modals:
    document.body.insertAdjacentHTML('beforeend', `
        <!-- Login Modal -->
        <div id="login-modal" class="modal-overlay hidden">
        <div class="modal">
        <div style="font-family: Arial, Helvetica, sans-serif;" class="login-container">
        <h1>Login Page</h1><br>
        <form action="PHP/login.php" method="POST">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Login" name="submit">
                </form><br>
            <button id="register-switch" class="switch">Don't have an account? Register</button><br><br>
            <button class="back">Back</button>
        </div>
        </div>
        </div>
        
      <!-- Register Modal -->
      <div id="register-modal" class="modal-overlay hidden">
        <div class="modal">
    <div style="font-family: Arial, Helvetica, sans-serif;" class="register-container">
    <h1>Register Page</h1><br>
        <form action="PHP/register.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <label for="confirm-password">Confirm Password:</label><br>
            <input type="password" id="confirm-password" name="confirm-password" required><br><br>
            <input type="submit" value="Register" name="submit">
            </form><br>
            <button id="login-switch" class="switch">Already have an account? Login</button><br><br>
        <button class="back">Back</button>
        </div>
        </div>
      </div>
      `);

    // Grab elements
    const loginModal = document.getElementById('login-modal');
    const registerModal = document.getElementById('register-modal');
    const openLogin = () => { loginModal.classList.remove('hidden'); document.body.style.overflow = 'hidden'; };
    const openRegister = () => { registerModal.classList.remove('hidden'); document.body.style.overflow = 'hidden'; };
    const closeAll = () => {
        loginModal.classList.add('hidden');
        registerModal.classList.add('hidden');
        document.body.style.overflow = '';
    };

    // Expose for global access
    window.openLogin = openLogin;
    window.openRegister = openRegister;
    window.closeAll = closeAll;

    // Switch between modals
    document.getElementById('login-switch').addEventListener('click', () => {
        closeAll();
        openLogin();
    });
    document.getElementById('register-switch').addEventListener('click', () => {
        closeAll();
        openRegister();
    });

    // Cancel buttons
    document.querySelectorAll('.back').forEach(button => {
        button.addEventListener('click', closeAll);
    });
});


document.addEventListener('DOMContentLoaded', function () {

    const urlParams = new URLSearchParams(window.location.search);
    const urlUsername = urlParams.get('username');
    if (urlUsername) {
        sessionStorage.setItem('currentUser', urlUsername);
    }

    if (urlParams.has('login_error')) {
        const errorMsg = urlParams.get('login_error') === '1' 
            ? 'Invalid username or password.' 
            : 'Login failed. Please try again.';
        alert(errorMsg);
        openLogin();
    }

    if (urlParams.has('register_error')) {
        let errorMsg = 'Registration failed. ';
        switch(urlParams.get('register_error')) {
            case '1':
                errorMsg += 'Passwords do not match.';
                break;
            case '2':
                errorMsg += 'Username already exists.';
                break;
            default:
                errorMsg += 'Please try again.';
        }
        alert(errorMsg);
        openRegister();
    } else if (urlParams.has('register_success')) {
        alert('Registration successful! Please login.');
        openLogin();
    }

    const username = sessionStorage.getItem('currentUser');

    document.querySelectorAll('.nav-link').forEach(link => {
        link.onmouseover = function () {
            link.style.cursor = "pointer";
        }
        const basePath = link.dataset.href;
        link.onclick = function (e) {
            if (link.classList.contains('require-login') && !username) {
                e.preventDefault();
                alert('Please login to access membership!');
                openLogin();
                return;
            }

            window.location.href = username ?
                `${basePath}?username=${username}` :
                basePath;
        };
    });
});

document.querySelector('#profile-link').onmouseover = function () {
    document.querySelector('#profile-link').style.cursor = "pointer";
};

function handleProfileClick() {
    const username = sessionStorage.getItem('currentUser');
    if (!username) {
        openLogin();
    } else {
        window.location.href = `profile.php?username=${username}`;
    }
};

function logout() {
    sessionStorage.removeItem('currentUser');
    window.location.href = 'profile.php';
}