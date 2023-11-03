<?php
$connect=mysqli_connect("localhost","root","","problem3");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        /*echo "Name: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Phone: " . $phone . "<br>";
        echo "Password: " . $password . "<br>";
        echo "Gender: " . $gender . "<br>";*/

    }
if($connect){
    $insert="insert into `information table` (name, email, phone, password, gender)
     values('$name', '$email', '$phone', '$password','$gender')";
    $result=mysqli_query($connect,$insert);
    if($result){
        echo "Data Inserted Successfully";
    } 
}else{
    echo "Error Occured";
}

?>