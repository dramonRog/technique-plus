<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Technique Plus</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="home.css" />
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
      <!-- Comments Section -->
      <section class="comments">
        <h2>What Our Customers Say</h2>
        <div class="comment-items">
          <div class="comment">
            <p>"Amazing service and fast delivery!"</p>
            <span>- John Doe</span>
          </div>
          <div class="comment">
            <p>"Great quality products at affordable prices."</p>
            <span>- Jane Smith</span>
          </div>
          <div class="comment">
            <p>"I love my new phone, it's exactly what I needed!"</p>
            <span>- Alex Brown</span>
          </div>
        </div>
      </section>

      <!-- Product Slider Section -->
      <section class="product-slider">
        <h2>Popular Products</h2>

        <div class="slider-container">
          <div class="slider">
            <div class="slider-item active">
              <div class="slider-item-content">
                <img src="images/products/smartphone.png" alt="Phone" />
                <div class="text">
                  <h3>Phone</h3>
                  <p>
                    Latest smartphone with advanced features, an excellent
                    camera, and fast processing.
                  </p>
                </div>
              </div>
            </div>

            <div class="slider-item">
              <div class="slider-item-content">
                <img src="images/products/tablet.png" alt="Tablet" />
                <div class="text">
                  <h3>Tablet</h3>
                  <p>
                    Portable tablet with high-definition screen, fast
                    performance, and a lightweight design.
                  </p>
                </div>
              </div>
            </div>

            <div class="slider-item">
              <div class="slider-item-content">
                <img src="images/products/laptop.png" alt="Laptop" />
                <div class="text">
                  <h3>Laptop</h3>
                  <p>
                    Powerful laptop with the latest processor, extended battery
                    life, and ultra-fast performance.
                  </p>
                </div>
              </div>
            </div>

            <div class="slider-item">
              <div class="slider-item-content">
                <img src="images/products/headphones.png" alt="Headphones" />
                <div class="text">
                  <h3>Headphones</h3>
                  <p>
                    Experience immersive sound with these sleek, noise-canceling
                    headphones for music, calls, or gaming on the go.
                  </p>
                </div>
              </div>
            </div>

            <div class="slider-item">
              <div class="slider-item-content">
                <img src="images/products/smartwatch.png" alt="Smartwatch" />
                <div class="text">
                  <h3>Smartwatch</h3>
                  <p>
                    Stylish smartwatch with fitness tracking, heart rate
                    monitoring, and real-time notifications.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="slider-panel">
            <button class="slide-button prev-slide">
              <img src="images/products/left-arrow.png" alt="Prev" />
            </button>
            <div class="dots-container">
              <span class="dot active"></span>
              <span class="dot"></span>
              <span class="dot"></span>
              <span class="dot"></span>
              <span class="dot"></span>
            </div>
            <button class="slide-button next-slide">
              <img src="images/products/right-arrow.png" alt="Next" />
            </button>
          </div>
        </div>
      </section>

      <!-- Product Categories and Prices Section -->
      <section class="product-categories">
        <div class="product-categories-elements">
          <h2>Product Categories</h2>
          <table>
            <thead>
              <tr>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Products</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Electronics</td>
                <td>Devices and gadgets</td>
                <td>Smartphones, Laptops</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Appliances</td>
                <td>Home and kitchen appliances</td>
                <td>Refrigerators, Microwaves</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Accessories</td>
                <td>Complementary items</td>
                <td>Headphones, Chargers</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Sections for Info Bar -->
      <section id="free-shipping" class="info-section">
        <div class="info-container">
          <img src="images/nav/shipping-icon.png" alt="Free Shipping" />
          <div class="info-section-text">
            <h3>Free Shipping</h3>
            <p>
              Enjoy free shipping on all orders over 99 zł. Get your products
              delivered quickly without any additional shipping costs. Shop now
              and save on delivery!
            </p>
          </div>
        </div>
      </section>

      <section id="pick-up" class="info-section">
        <div class="info-container">
          <img src="images/nav/pickup-icon.png" alt="Pick Up" />
          <div class="info-section-text">
            <h3>Pick Up</h3>
            <p>
              Choose to pick up your order in just 1 hour. We have multiple
              locations where you can quickly and easily pick up your products
              at your convenience.
            </p>
          </div>
        </div>
      </section>

      <section id="delivery" class="info-section">
        <div class="info-container">
          <img src="images/nav/delivery-icon.png" alt="Delivery" />
          <div class="info-section-text">
            <h3>Delivery</h3>
            <p>
              Get your order delivered the very next day. Our fast and reliable
              delivery service ensures that you receive your products as quickly
              as possible, straight to your door.
            </p>
          </div>
        </div>
      </section>

      <section id="installments" class="info-section">
        <div class="info-container">
          <img src="images/nav/installments-icon.png" alt="Installments" />
          <div class="info-section-text">
            <h3>Installments</h3>
            <p>
              We offer 0% installments and leasing options. Now you can enjoy
              the latest products without breaking the bank. Get your products
              today and pay in easy, affordable installments.
            </p>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <p class="text-animation">
        &copy; 2024 Technique Plus. All rights reserved.
      </p>
    </footer>

    <script src="script.js"></script>
    <script src="home.js"></script>
  </body>
</html>
