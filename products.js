$(document).ready(function () {
  function loadCategories() {
    $.ajax({
        url: "fetch_categories.php",
        method: "GET",
        dataType: "json",
        success: function (categories) {
            const categoriesList = $("#categories-list");
            const categoryDropdown = $("#productCategory");

            categoriesList.empty();
            categoryDropdown.empty();

            categoriesList.append(`<li class="category-item" data-id="0">All</li>`);
            categoryDropdown.append(`<option value="0">All</option>`);

            categories.forEach((category) => {
                categoriesList.append(`
                    <li class="category-item" data-id="${category.id}">
                        ${category.name}
                        <button class="delete-category-btn" data-id="${category.id}">x</button>
                    </li>
                `);
                categoryDropdown.append(
                    `<option value="${category.id}">${category.name}</option>`
                );
            });
        },
        error: function () {
            alert("Failed to load categories. Please try again.");
        }
    });
}

$(document).on("click", ".delete-category-btn", function () {
  const categoryId = $(this).data("id");

  if (confirm("Are you sure you want to delete this category?")) {
      $.ajax({
          url: "delete_category.php", 
          method: "POST",
          data: { id: categoryId },
          success: function (response) {
              const result = JSON.parse(response);
              if (result.status === "success") {
                  alert("Category deleted successfully!");
                  loadCategories(); 
              } else {
                  alert("Error: " + result.message);
              }
          },
          error: function () {
              alert("Failed to delete the category. Please try again.");
          }
      });
  }
});


function loadProducts(categoryId = 0) {
      $.ajax({
          url: "fetch_products.php",
          method: "GET",
          data: { category_id: categoryId },
          dataType: "json",
          success: function (products) {
              const productContainer = $(".product-container");
              productContainer.empty();

              if (products.length === 0) {
                  productContainer.html("<p>No products found for this category.</p>");
                  return;
              }

              products.forEach((product) => {
                  productContainer.append(`
                      <div class="product-item" data-category="${product.category}">
                          <img src="${product.image}" alt="${product.name}" />
                          <div class="product-details">
                              <h3>${product.name}</h3>
                              <p class="description">${product.description}</p>
                              <div class="price-container">
                                  <p class="price">${product.price} $</p>
                                  <button class="add-to-cart">Add to Cart</button>
                                  <button class="delete-product" data-id="${product.id}">Delete</button>
                              </div>
                          </div>
                      </div>
                  `);
              });
          },
          error: function () {
              alert("Failed to load products. Please try again.");
          }
      });
  }

  $(document).on("click", ".category-item", function () {
      const categoryId = $(this).data("id");

      $(".category-item").removeClass("active");
      $(this).addClass("active");

      loadProducts(categoryId); 
  });

  $(document).on("click", ".delete-product", function () {
      const productId = $(this).data("id");

      $.ajax({
          url: "delete_product.php",
          method: "POST",
          data: { id: productId },
          success: function (response) {
              const result = JSON.parse(response);
              if (result.status === "success") {
                  alert("Product deleted successfully!");
                  loadProducts();
              } else {
                  alert("Error: " + result.message);
              }
          },
          error: function () {
              alert("Failed to delete the product. Please check the server logs.");
          }
      });
  });

  $("#addProductForm").on("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(this);

      $.ajax({
          url: "add_product.php",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function () {
              alert("Product added successfully!");
              $("#addProductForm")[0].reset();
              $("#addProductModal").hide();
              loadProducts();
          },
          error: function () {
              alert("Failed to add the product. Please try again.");
          }
      });
  });

  $("#addCategoryForm").on("submit", function (e) {
      e.preventDefault();

      const categoryName = $("#categoryName").val().trim();

      if (!categoryName) {
          alert("Category name cannot be empty.");
          return;
      }

      $.ajax({
          url: "add_category.php",
          method: "POST",
          data: { name: categoryName },
          success: function (response) {
              const result = JSON.parse(response);

              if (result.status === "success") {
                  alert(result.message);
                  $("#addCategoryForm")[0].reset();
                  $("#addCategoryModal").hide();
                  loadCategories();
              } else {
                  alert(result.message);
              }
          },
          error: function () {
              alert("An error occurred while adding the category. Please try again.");
          }
      });
  });

  $("#openAddProductModal").on("click", function () {
      $("#addProductModal").css("display", "flex");
  });

  $("#closeAddProductModal").on("click", function () {
      $("#addProductModal").hide();
  });

  $("#openAddCategoryModal").on("click", function () {
      $("#addCategoryModal").css("display", "flex");
  });

  $("#closeAddCategoryModal").on("click", function () {
      $("#addCategoryModal").hide();
  });

  $(window).on("click", function (e) {
      if ($(e.target).is("#addProductModal")) {
          $("#addProductModal").hide();
      }
      if ($(e.target).is("#addCategoryModal")) {
          $("#addCategoryModal").hide();
      }
  });

  loadCategories();
  loadProducts();
});
