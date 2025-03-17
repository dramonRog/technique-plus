<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="profile.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
  <header class="header">
      <div class="header-content">
        <div class="logo">
          <a href="home.php"><h1>Technique Plus</h1></a>
        </div>

        <nav class="nav-center">
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>

        <div class="user-actions">
          <a href="profile.php" class="profile-icon">
            <img src="images/nav/profile-icon.png" alt="Profile" width="32px" />
          </a>
          <div class="burger">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
          </div>
        </div>
      </div>

      <div class="info-bar">
        <a href="home.php#free-shipping" class="info-bar-link">
          <img
            src="images/nav/shipping-icon.png"
            alt="Free Shipping"
            class="info-bar-icon"
          />
          Free shipping from 99 zł
        </a>
        <a href="home.php#pick-up" class="info-bar-link">
          <img
            src="images/nav/pickup-icon.png"
            alt="Pick Up"
            class="info-bar-icon"
          />
          Pick up in 1 hour
        </a>
        <a href="home.php#delivery" class="info-bar-link">
          <img
            src="images/nav/delivery-icon.png"
            alt="Delivery"
            class="info-bar-icon"
          />
          Delivery tomorrow
        </a>
        <a href="home.php#installments" class="info-bar-link">
          <img
            src="images/nav/installments-icon.png"
            alt="Installments"
            class="info-bar-icon"
          />
          0% installments and leasing
        </a>
      </div>
    </header>

    <main>
      <section class="profile-container">
        <h2>Welcome to Your Profile</h2>

        <div class="why-register">
          <h3>Why Create an Account?</h3>
          <p>
            Creating an account gives you access to personalized features and
            benefits:
          </p>
          <ul>
            <li>
              <strong>Track Your Orders:</strong> Easily view your order history
              and check the status of ongoing purchases.
            </li>
            <li>
              <strong>Save Your Preferences:</strong> Save favorite products and
              shipping details for quicker checkouts.
            </li>
            <li>
              <strong>Exclusive Offers:</strong> Gain access to exclusive
              promotions and discounts available only for registered users.
            </li>
            <li>
              <strong>Faster Checkout:</strong> Enjoy a quicker, more secure
              checkout process with your stored payment and address information.
            </li>
          </ul>
        </div>

        <div class="data-security">
          <h3>Your Data is Safe With Us</h3>
          <p>
            We take your privacy and security seriously. All personal
            information is encrypted, and we comply with the latest data
            protection regulations.
          </p>
          <ul>
            <li>
              Your personal data is protected with state-of-the-art encryption.
            </li>
            <li>
              We never share your information with third parties without your
              consent.
            </li>
            <li>
              Our payment system is fully secure, ensuring safe transactions
              every time.
            </li>
          </ul>
        </div>

        <div class="profile-actions" id="authActions">
          <button id="registerBtn" class="btn btn-primary">Register</button>
          <button id="loginBtn" class="btn btn-secondary">Log In</button>
        </div>
        <div
          class="profile-logged-in"
          id="loggedInActions"
          style="display: none"
        >
          <p id="welcomeUser"></p>
          <button id="logoutBtn" class="btn btn-danger">Log Out</button>
        </div>
      </section>
    </main>

    <!-- Modal for Registration -->
    <div id="registerModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeRegister">&times;</span>
    <h2>Register</h2>
    <form id="registrationForm" action="register.php" method="POST" enctype="multipart/form-data">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required />
    <div class="error-message" id="nameError">
        Please enter a valid username.
    </div>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required />
    <div class="error-message" id="emailError">
        Please enter a valid email address.
    </div>

    <label for="password">Password (Min. 6 characters)</label>
    <input type="password" id="password" name="password" required minlength="6" />
    <div class="error-message" id="passwordError">
        The password must be at least 6 characters.
    </div>

    <label for="confirm-password">Confirm Password</label>
    <input type="password" id="confirm-password" name="confirm-password" required />
    <div class="error-message" id="confirmPasswordError">
        Passwords do not match.
    </div>

    <!-- Нове поле для завантаження файлу -->
    <label for="profile_picture">Profile Picture</label>
    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" />

    <!-- Нове поле для вибору дати -->
    <label for="birthdate">Birthdate</label>
    <input type="date" id="birthdate" name="birthdate" required />

    <!-- Нове поле для вибору статі -->
    <label for="gender">Gender</label>
    <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <button type="submit" class="btn btn-primary">Register</button>
</form>

  </div>
</div>


    <!-- Modal for Login -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeLogin">&times;</span>
        <h2>Log In</h2>
        <form id="loginForm">
            <label for="login-email">Email</label>
            <input type="email" id="login-email" name="email" />
            <div class="error-message" id="loginEmailError">
                Please enter a valid email.
            </div>

            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password" />
            <div class="error-message" id="loginPasswordError">
                Password is incorrect.
            </div>
            <button type="submit" class="btn btn-primary">Log In</button>
        </form>
    </div>
</div>


    <footer>
      <p class="text-animation">
        &copy; 2024 Technique Plus. All rights reserved.
      </p>
    </footer>
    
    <script src="script.js"></script>
    <script src="profile.js"></script>
  </body>
</html>
