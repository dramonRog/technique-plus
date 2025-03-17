$(document).ready(function () {
    // Завантаження даних із сесії при завантаженні сторінки
    $.ajax({
        url: "getSessionData.php",
        method: "GET",
        success: function (response) {
            if (response.status === "success") {
                updateProfileContent(response.data); // Оновити контент сторінки
            }
        },
        error: function () {
            console.error("Could not fetch session data.");
        }
    });

    // Відкрити модальне вікно реєстрації
    $("#registerBtn").on("click", function () {
        $(".error-message").hide();
        $("#registerModal").addClass("show");
        $("body").addClass("no-scroll");
    });

    // Відкрити модальне вікно входу
    $("#loginBtn").on("click", function () {
        $(".error-message").hide();
        $("#loginModal").addClass("show");
        $("body").addClass("no-scroll");
    });

    // Закрити модальні вікна
    $("#closeRegister, #closeLogin").on("click", function () {
        closeModal();
    });

    // Закриття успішного повідомлення
    $(".success-overlay .close-btn").on("click", function () {
        $(this).closest(".success-overlay").removeClass("show");
        $("body").removeClass("no-scroll");
    });

    // Обробка форми реєстрації
    $("#registrationForm").on("submit", function (event) {
        event.preventDefault();

        let valid = validateRegistrationForm();
        if (valid) {
            const formData = new FormData(this);

            $.ajax({
                url: "register.php",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === "success") {
                        updateProfileContent(response.data); // Оновити контент сторінки
                        $("#registrationForm")[0].reset();
                        closeModal();
                    } else {
                        if (response.message) alert(response.message);
                        if (response.emailError) $("#emailError").text(response.emailError).show();
                        if (response.usernameError) $("#nameError").text(response.usernameError).show();
                    }
                },
                error: function () {
                    alert("Registration failed. Please try again.");
                }
            });
        }
    });

    // Обробка форми логіну
    $("#loginForm").on("submit", function (event) {
        event.preventDefault();

        const formData = {
            email: $("#login-email").val().trim(),
            password: $("#login-password").val().trim(),
        };

        $(".error-message").hide();

        $.ajax({
            url: "login.php",
            method: "POST",
            data: formData,
            success: function (response) {
                if (response.status === "success") {
                    updateProfileContent(response.data); // Оновити контент сторінки
                    $("#loginForm")[0].reset();
                    closeModal();
                }
            },
            error: function (xhr) {
                const response = JSON.parse(xhr.responseText);
                if (response.emailError) $("#loginEmailError").text(response.emailError).show();
                if (response.passwordError) $("#loginPasswordError").text(response.passwordError).show();
            }
        });
    });

    // Обробка виходу з системи
    $("#logoutBtn").on("click", function () {
        $.ajax({
            url: "logout.php",
            method: "POST",
            success: function () {
                location.reload(); // Перезавантажити сторінку
            },
            error: function () {
                alert("Error logging out. Please try again.");
            }
        });
    });

    // Перевірка полів форми реєстрації
    function validateRegistrationForm() {
        let valid = true;

        const username = $("#username").val().trim();
        const email = $("#email").val().trim();
        const password = $("#password").val();
        const confirmPassword = $("#confirm-password").val();
        const birthdate = $("#birthdate").val().trim();

        $(".error-message").hide();

        if (!username || username.length < 3 || /^\d/.test(username) || /[^a-zA-Z0-9]/.test(username)) {
            $("#nameError").text("Invalid username.").show();
            valid = false;
        }

        if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
            $("#emailError").text("Invalid email.").show();
            valid = false;
        }

        if (password.length < 6) {
            $("#passwordError").text("Password must be at least 6 characters long.").show();
            valid = false;
        }

        if (password !== confirmPassword) {
            $("#confirmPasswordError").text("Passwords do not match.").show();
            valid = false;
        }

        if (!validateBirthdate(birthdate)) {
            $("#birthdateError").text("Invalid birthdate. You must be at least 13 years old.").show();
            valid = false;
        }

        return valid;
    }

    // Перевірка дати народження
    function validateBirthdate(birthdate) {
        if (!birthdate) return false;

        const today = new Date();
        const birthDate = new Date(birthdate);
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        return age >= 13;
    }

    // Закрити всі модальні вікна
    function closeModal() {
        $("#registerModal").removeClass("show");
        $("#loginModal").removeClass("show");
        $("body").removeClass("no-scroll");
    }

    // Оновити інформацію профілю
    function updateProfileContent(userData) {
        $(".why-register").html(`
            <h3>Your Account Details:</h3>
            <ul>
                <li><strong>Username:</strong> ${userData.username}</li>
                <li><strong>Email:</strong> ${userData.email}</li>
                <li><strong>Birthdate:</strong> ${userData.birthdate}</li>
                <li><strong>Gender:</strong> ${userData.gender}</li>
            </ul>
        `);

        if (userData.profile_picture && userData.profile_picture.trim() !== "") {
            $(".user-actions").html(`
                <img src="${userData.profile_picture}" alt="Profile Picture" class="profile-img-user" />
            `);
        }

        $("#authActions").hide();
        $("#loggedInActions").show();
        $("#welcomeUser").text(`Hello, ${userData.username}!`);
    }
});

$("#logoutBtn").on("click", function () {
    $.ajax({
        url: "logout.php",
        method: "POST",
        success: function () {
            location.reload(); // Перезавантажити сторінку, щоб відобразити початкові дані
        },
    });
});