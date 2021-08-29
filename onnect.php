<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $website = $_POST['website'];
  $message = $_POST['message'];

  $conn = new mysqli('localhost','root','','test');
  if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
  }else{
    $stmt = $conn->prepare("insert into registration(name, email, phone, website, message)values(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss",$name, $email, $phone, $website, $message);
    $stmt->execute();
    echo "Message has been sent Successfully....";
    $stmt->close();
    $conn->close();
  }
?>