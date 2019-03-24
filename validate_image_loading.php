<?php
/**
 * Created by PhpStorm.
 * User: Daisy
 * Date: 3/24/2019
 * Time: 12:37 AM
 */
session_start();
require_once 'dbconfig.php';
$mysqliconnection = mysqli_connect("localhost", "root", "", "samsbd");



if(isset($_POST['insert'])){
    $name_p = $_POST['your_name'];
    $email_p = $_POST['your_email_input'];
    $homepage_p = $_POST['your_homepage'];
    $your_message_p = $_POST['your_message'];
    if(!empty($_FILES['image']['tmp_name'])
        && file_exists($_FILES['image']['tmp_name'])) {
        $file= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    }
try{

    if(!empty($name_p)){
        $current_date_time = date("Y-m-d H:i:s"); //current date
        $query = "INSERT INTO tbl_images(user_name, email, homepage, text, date, image_name) VALUES ('$name_p', '$email_p', '$homepage_p', '$your_message_p', '$current_date_time','$file')";
        if(mysqli_query($mysqliconnection, $query)){
            //echo '<script> alert("Image inserted into database")</script>'; //change on popup later

        }
        echo "ok"; // success
    }
    else{
        echo "Fill data!"; // wrong details
    }
}catch(Exception $e){
    echo $e->getMessaage();
}
}


?>