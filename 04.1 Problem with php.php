<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    
    <h1 align="center">Registration Form</h1>
    <form method="post" action="04.2 connection.php" align="center">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male">Male
        <input type="radio" id="female" name="gender" value="female">Fmale
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var password = document.getElementById('password').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;

            // Name should contain alphabets and be at least 6 characters long.
            if (!/^[a-zA-Z ]{6,}$/.test(name)) {
                alert("Invalid name. It should contain at least 6 alphabetic characters.");
                return false;
            }

            // Password should be at least 6 characters long.
            if (password.length < 6) {
                alert("Password should be at least 6 characters long.");
                return false;
            }

            // Email validation (a basic pattern, not comprehensive).
            if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email)) {
                alert("Invalid email address.");
                return false;
            }

            // Phone number should contain exactly 10 digits.
            if (!/^\d{10}$/.test(phone)) {
                alert("Invalid phone number. It should contain 10 digits only.");
                return false;
            }

            return true; // Form submission is allowed if all validations pass.
        }
    </script>
</body>
</html>
