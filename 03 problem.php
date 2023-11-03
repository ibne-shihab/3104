<html>
<head>
    <title>Form Submission</title>
</head>
<body>
    
    <h1 align="center">Form Submission</h1>
    <form method="post" action="03.1 connection.php" align="center">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male"> Male
        <input type="radio" id="female" name="gender" value="Female"> Female
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
