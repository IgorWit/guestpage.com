<?php
/**
 * Created by PhpStorm.
 * User: Daisy
 * Date: 3/22/2019
 * Time: 6:29 PM
 */
session_start();
if(!isset($_SESSION['user_session']))
{
    header("Location: index.php");
}
include_once 'dbconfig.php';
$column_query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'tbl_images' LIMIT 7";
$sql_table_content = "SELECT * FROM tbl_images";

$stmt = $db->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);







?>
<!doctype html>
<html lang="`">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Your notes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link href="css/table-bootstrap-auto.css" rel="stylesheet" media="screen">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
<!--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">-->
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/ee309940e2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/ee309940e2.js"></script>
    <script type="text/javascript" src="js/bootstrap-table-auto.js"></script>
<!--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
    <script type="text/javascript" charset="utf8" src="js/datatables.min.js"></script>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Ваша гостевая книга <?php echo $row['user_name']; ?></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="homepage.php">Добавить запись </a>
<!--        <a class="p-2 text-dark" href="#">Ваши записи</a>-->
        <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
    </nav>
</div>
<div>
    <div>
        <table id="user_notes" class="display">
            <thead>
            <tr>
<!--                <th>Column 1</th>-->
<!--                <th>Column 2</th>-->
                <th>id</th>
                <th>User Name</th>
                <th>e-mail</th>
                <th>Date</th>
                <th>Image</th>

            </tr>
            </thead>
             <tbody>
                <?php
                foreach ($db->query($sql_table_content) as $table_details){
                    echo "<tr>"
                        ."<td>".$table_details['id']."</td>"
                        ."<td>".$table_details['user_name']."</td>"
                        ."<td>".$table_details['email']."</td>"
                        ."<td>".$table_details['text']."</td>"
                        ."<td>".'<img src="data:image/jpeg;base64,'.base64_encode($table_details['image_name'] ).'" height="30" width="35" class="img-thumnail"/>'."</td>"
                        ."</tr>";
                }
//                ."<td>".'<img src="https://dummyimage.com/320x240/707070/fff.png" alt="your image" style="width: 30px; height: 20px">'."</td>"
                ?>
            </tbody>
        </table>
    </div>
<div>
    <?php
//    $result;
//    foreach ($db->query($sql_table_content) as $table_details){
//        echo $table_details['id'];
//        echo $table_details['user_name'];
//    }
//    $db = null; //closing
    ?>
</div>
</body>
</html>
