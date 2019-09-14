<?php

session_start();

$conn = mysqli_connect('localhost', 'id10872016_root', '', 'id10872016_contactdb');

if (isset($_POST['submit'])){
$fullname = $_POST['fname'];
$email = $_POST['email'];
$title = $_POST['title'];
$message = $_POST['message'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<script>alert('Invalid email')</script>";
}else if (strlen($fullname) < 4){
    echo "<script>alert('Name cannot be less than 4 characters')</script>";
    
}else if (strlen($message) < 20){
    echo "<script>alert('Message Length too short')</script>";
    
}else{
	
    $sql = "INSERT INTO contact(fullname, email, title, msg) VALUES ('$fullname', '$email', '$title', '$message')";
    $query = mysqli_query($conn, $sql);
    
    if ($query){
        echo "<script>alert('Feedback Recieved. Thanks!')</script>";
    }else{
        echo "<script>alert('Oops! Problem Encountered.')</script>";
    }
}
}
?>
