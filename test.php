<?php
/**
 * Created by PhpStorm.
 * User: Daisy
 * Date: 3/22/2019
 * Time: 11:03 AM
 */
session_start();

if(!isset($_SESSION['user_session']))
{
    header("Location: index.php");
}

include_once 'dbconfig.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $total;
        $sql = "SELECT COUNT(*) as notes FROM tbl_images";
        foreach ($db->query($sql) as $row){
        }
        echo "new total amount of notes in table is: ".$total."   and ".$row['notes'];

        $sql = "SELECT COUNT(*) as notes FROM tbl_images";
        $request_for_total = $db->prepare($sql);
        $request_for_total->execute();
        $amount_of_notes = $request->fetchColumn();

        echo "Your amount of notes is int total: ".$amount_of_notes;



    ?>
</body>
</html>
