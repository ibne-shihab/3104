<?php
$connect = mysqli_connect("localhost", "root", "", "Programmer");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["insert"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $img = $_FILES["img"]["name"];
    $passHash = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $imagePath = "images/" . $img; // Create a separate variable for the image path

    // Use prepared statement to insert data
    $insertQuery = "INSERT INTO Stu_Reg (ID, Name, Image, Password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $insertQuery);

    if (!$stmt) {
        die("Error: " . mysqli_error($connect));
    }

    mysqli_stmt_bind_param($stmt, "ssss", $id, $name, $imagePath, $passHash);

    if (mysqli_stmt_execute($stmt)) {
        $uploadDirectory = "images/";

        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadDirectory . $img)) {
            echo "Successfully inserted your record!";
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "Unsuccessful";
    }

    mysqli_stmt_close($stmt);
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];

    // Use prepared statement to select user by ID
    $selectQuery = "SELECT * FROM Stu_Reg WHERE ID = ?";
    $stmt = mysqli_prepare($connect, $selectQuery);

    if (!$stmt) {
        die("Error: " . mysqli_error($connect));
    }

    mysqli_stmt_bind_param($stmt, "s", $id);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        if ($row) {
            // Verify the password
            if (password_verify($password, $row['Password'])) {
                $image = $row['Image'];
                unlink($image);

                // Use prepared statement to delete user
                $deleteQuery = "DELETE FROM Stu_Reg WHERE ID = ?";
                $stmt = mysqli_prepare($connect, $deleteQuery);

                if (!$stmt) {
                    die("Error: " . mysqli_error($connect));
                }

                mysqli_stmt_bind_param($stmt, "s", $id);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Successfully deleted your record";
                } else {
                    echo "Unsuccessful";
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Invalid password";
            }
        } else {
            echo "User not found";
        }
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

if (isset($_POST["select"])) {
    $query = "SELECT * FROM Stu_Reg";
    $result = mysqli_query($connect, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Display the table
            echo "<table cellpadding='10' border='1'>";
            echo "<tr><th>ID</th><th>Name</th><th>Image</th></tr>";

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td style='color:black'>" . $row['ID'] . "</td>";
                echo "<td style='color:black'>" . $row['Name'] . "</td>";
                echo "<td style='color:black'><img width='100px' height='80px' src='" . $row['Image'] . "'></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No Data Found!";
        }
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>


<html>
<head>
<script>
function change(event)
{
    var output=document.getElementById('image_change');
    output.src=URL.createObjectURL(event.target.files[0]);
}
</script>

<style type="text/css">
    table
    {
        margin: auto;
        font-size: 25px;
        text-align: left;
    }
    input
    {
        font-size: 20px;
        width: 100%;
    }
    button
    {
        width: 100%;
        font-size: 20px;
        background-color: rgb(203, 202, 202);
        color: rgb(2, 2, 2);
        cursor: pointer;
    }
</style>
</head>
<body>
    <h1 style="text-align:center;">Programmer Registration Form</h1>
<form method="post" action="" enctype="multipart/form-data">
    <table border="0">
        <tr>
            <th>ID:</th>
            <td colspan="2"><input type="text"name="id" required> </td>
        </tr>
        <tr>
            <th>Name:</th>
            <td colspan="2"> <input type="text"name="name"></td>
        </tr>
        <tr >
            <th colspan="3"><img id="image_change" src="DSA Index.png" 
            height="400px" width="100%" border="1"></th>
        </tr>
        <tr> 
            <th >Image:</th>
            <td><input type="file" name="img" id="img_id"onchange="change(event)"></td>
        </tr>
        <tr>
            <th>Password:</th>
            <td colspan="2"><input type="password" name="password" required></td>
        </tr>
        <tr >
            <th><button name="insert">Insert</button></th>
            <th><button name="select">Show</button></th>
            <th><button name="delete">Delete</button></th>
        </tr>
        <tr>
            <td colspan="3">
                N.B. 1. To delete a record inter your ID and Password.<br>
                2. To show all records enter your ID and Password.
            </td>
        </tr>
        
</table>
</form>
</body>
</html>
