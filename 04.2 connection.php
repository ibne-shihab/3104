<?php
$connect=mysqli_connect("localhost","root","","sayeeda khan");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
}if($connect){
    $insert="insert into khan(Name,Password,Phone,Email,Gender) 
    values ('$name','$password','$phone','$email','$gender')";
    $result= mysqli_query($connect,$insert);
    if($result){
        echo "Data inserted successfully in Khan Table";
    }
}else{
    echo "An error occurred ";
}
?>