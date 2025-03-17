<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products - Technique Plus</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="products.css" />
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

    <!-- Main Section -->
    <main>
      <!-- Products Section -->
      <section class="products-section">
        <h2>Our Products</h2>
        <div class="categories-and-products">
          <!-- Categories Panel -->
          <div class="categories-panel">
            <h3>Categories</h3>
            <ul class="main-categories" id="categories-list">
              <!-- Categories will be dynamically added here -->
            </ul>
          </div>

          <!-- Products Container -->
          <div class="product-container" id="product-container">
            <!-- Products will be dynamically loaded here -->
          </div>
        </div>
      </section>

      <!-- Add Product Section -->
      <section class="add-product-section">
        <button id="openAddProductModal" class="btn btn-primary">Add Product</button>
        <button id="openAddCategoryModal" class="btn btn-secondary">Add Category</button>
      </section>
    </main>

    <!-- Modal for Adding Product -->
    <div class="modal" id="addProductModal">
      <div class="modal-content">
        <div class="modal-header">
          <h2>Add a New Product</h2>
          <button id="closeAddProductModal" class="close-modal">&times;</button>
        </div>
        <form id="addProductForm" enctype="multipart/form-data">
          <input
            type="text"
            id="productName"
            name="name"
            placeholder="Product Name"
            required
            class="input-field"
          />
          <input
            type="number"
            id="productPrice"
            name="price"
            placeholder="Price"
            step="0.01"
            required
            class="input-field"
          />
          <select id="productCategory" name="category_id" required class="input-field">
            <option value="">Select Category</option>
            <!-- Categories will be dynamically loaded here -->
          </select>
          <input
            type="file"
            id="productImage"
            name="image"
            accept="image/*"
            required
            class="input-field"
          />
          <textarea
            id="productDescription"
            name="description"
            placeholder="Description"
            required
            class="input-field"
          ></textarea>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

    <!-- Modal for Adding Category -->
    <div class="modal" id="addCategoryModal">
      <div class="modal-content">
        <div class="modal-header">
          <h2>Add a New Category</h2>
          <button id="closeAddCategoryModal" class="close-modal">&times;</button>
        </div>
        <form id="addCategoryForm">
          <input
            type="text"
            id="categoryName"
            name="name"
            placeholder="Category Name"
            required
            class="input-field"
          />
          <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
      </div>
    </div>

    <footer>
      <p>&copy; 2024 Technique Plus. All rights reserved.</p>
    </footer>

    <script src="products.js"></script>
  </body>
</html>
