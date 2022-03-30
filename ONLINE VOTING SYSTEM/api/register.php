<?php

include("connect.php");

$name = $_POST['name']; 
$mobile = $_POST['mobile']; 
$password = $_POST['password']; 
$cpassword = $_POST['confirm password']; 
$address = $_POST['address']; 
$photo = $_FILES['photo']['name'];
$tmp_name = $_FILES['tmp_name']['photo'];
$role = $_POST['role'];


if($password==$cpassword)
{
    move_uploaded_file($tmp_name,"../uploads/$photo");
    $insert = mysqli_query($connect, "INSERT INTO user(name, mobile, address, password,  photo, role, status, votes, ) values('$name', '$mobile', '$address', '$password', '$photo', '$role', 0, 0, ) ");
    if($insert){
        echo '<script>
                alert("Registration successfull!");
                window.location = "../";
            </script>';
    }
    else{
        echo '<script>
                alert("ERROR!");
                window.location = "../Routes/register.html";
            </script>';
    }
}
else{
    echo'
    <script>
    alert("Passwords do not match!");
    window.location = "../Routes/register.html";
    </script>';
}

?>