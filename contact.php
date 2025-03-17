<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - Technique Plus</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="contact.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <!-- Header Section -->
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
      <!-- Contact Form Section -->
      <section class="contact-section">
        <h2>Contact Us</h2>
        <p>Have questions? Reach out to us and we'll be happy to assist you!</p>

        <form id="contactForm" method="POST" class="contact-form">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" />
          <div class="error-message" id="nameError"></div>

          <label for="email">Email</label>
          <input type="email" id="email" name="email" />
          <div class="error-message" id="emailError"></div>

          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5"></textarea>
          <div class="error-message" id="messageError"></div>

          <button type="submit" class="submit-btn">Send Message</button>
        </form>

        <div id="successOverlay" class="success-overlay">
          <button id="closeModal" class="close-btn">×</button>
          <div class="success-message">Message sent successfully!</div>
        </div>
      </section>

      <!-- Address Section -->
      <section class="address-section">
        <h2>Our Office</h2>
        <p>Visit us at our office or send mail to the following address:</p>
        <address>
          Technique Plus<br />
          Ul. Mikołajczyka 5<br />
          Opole, Poland<br />
          ZIP: 45-271
        </address>
        <img src="images/elements/office.jpg" alt="Our office" />
      </section>
    </main>

    <footer>
      <p class="text-animation">
        &copy; 2024 Technique Plus. All rights reserved.
      </p>
    </footer>

    <script src="script.js"></script>
    <script src="contact.js"></script>
  </body>
</html>
