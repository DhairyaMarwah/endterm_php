<?php
$name=$_POST["name"];
$email=$_POST["email"];

if(empty($name)){
    echo "Name Cant be empty";
}
else{
     if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$email)){
        echo "email valid";
        echo $name;
    echo $email;
    }
    else {
        echo "email not valid";
    }
    
}
?>
