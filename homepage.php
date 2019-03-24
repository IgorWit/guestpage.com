<?php
session_start();

if(!isset($_SESSION['user_session']))
{
    header("Location: index.php");
}

include_once 'dbconfig.php';

$stmt = $db->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);


//checking how much notes we have in total in our DB
$sql = "SELECT COUNT(*) as notes FROM tbl_images"; //request for checking total notes
$request_for_total = $db->prepare($sql);
$request_for_total->execute();
$amount_of_notes = $request_for_total->fetchColumn();



//...... some code which will show us a notes regarding our user only, COUNT(*) ...

//loading data from DB
$mysqliconnection = mysqli_connect("localhost", "root", "", "samsbd");
if(isset($_POST["insert"])){
    //$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));



    //Filling our array with data
//        $data = [
//          'date_and_time' => date("Y-m-d H:i:s"),
//          'user_name' => $row['user_name'],
//          'email' => 'some email',
//          'homepage' => 'some address',
//          'text' => 'some text',
//          'image' => '$file'
//        ];
//        $load_data = 'INSERT INTO user_notes(date_and_time, user_name, email, homepage, text, image) VALUES (?, ?, ?, ?, ?, ?)';
//        if($stmt->$db->prepare($load_data)){
//            echo '<script>alert("Image Inserted into Database")</script>';
//            $stmt->execute($data);
//        }else{
//            echo '<script>alert("We were not able to upload your image")</script>';
//        }
//BY SOME REASON PDO REQUEST DOESN"T WORK I WAS PUSHED TO USE MYSQLI() REQUEST

//THIS PART WORKS PERFECTLY
    //$current_date_time = date("Y-m-d H:i:s"); //current date
//    $query = "INSERT INTO tbl_images(name) VALUES ('$file')";
//    if(mysqli_query($mysqliconnection, $query)){
//        echo '<script> alert("Image inserted into database")</script>';
//    }

    $name_p = $_POST['your_name'];
    $email_p = $_POST['your_email_input'];
    $homepage_p = $_POST['your_homepage'];
    $your_message_p = $_POST['your_message'];

    echo "<script> console.log('$name_p')</script>";
    echo "<script> console.log('$email_p')</script>";
    echo "<script> console.log('$homepage_p')</script>";
    echo "<script> console.log('$your_message_p')</script>";

    try{
        if(!empty($name_p) && !empty($email_p) && !empty($your_message_p)){
            if(!empty($_FILES['image']['tmp_name'])
                && file_exists($_FILES['image']['tmp_name'])) {
                $file= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            }
            $current_date_time = date("Y-m-d H:i:s"); //current date
            $query = "INSERT INTO tbl_images(user_name, email, homepage, text, date, image_name) VALUES ('$name_p', '$email_p', '$homepage_p', '$your_message_p', '$current_date_time','$file')";
            if(mysqli_query($mysqliconnection, $query)){
                echo '<script> alert("Image inserted into database")</script>'; //change on popup later
            }
            //echo "ok"; // success
        }
        else{
            //echo "Fill data!"; // wrong details
        }
    }catch(Exception $e){
        echo $e->getMessaage();
    }
}


?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Homepage SAMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" media="screen">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/ee309940e2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/ee309940e2.js"></script>
</head>

<body>


<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Ваша гостевая книга <?php echo $row['user_name']; ?></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="your_notes.php">Ваши записи</a>
        <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
    </nav>
    <!--<a class="btn btn-outline-primary" href="#">Sign up</a>-->
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Ваши данные</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Количество записей</h6>
                        <small class="text-muted">то что есть в базе</small>
                    </div>
                    <span class="text-muted"><?php echo $amount_of_notes?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <a href="#"><h6 class="my-0">Просмотреть записи</h6></a>
                        <small>Check details</small>
                    </div>
                    <span class="text-success"></span>
                </li>

            </ul>

        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Страница ввода данных пользователя</h4>
            <div id="homepage_error" class="col-md-6 mb-3">
                <!-- error will be shown here ! -->
                <!--<span class="glyphicon glyphicon-info-sign">22</span>-->
            </div>
            <form method="post" class="needs-validation was-validated" novalidate="" enctype="multipart/form-data" id="add-note-homepage-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="your_name">Ваше имя</label>
                        <input type="text" class="form-control" id="your_name" name="your_name" placeholder="" value="<?php echo $row['user_name'];?>" required="">
                        <div class="invalid-feedback">
                            Требуется ввести ваше имя
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="your_email">Email </label>
                        <input type="text" class="form-control" id="your_email" placeholder="you@example.com" value="" required="" name="your_email_input">
                        <div class="invalid-feedback">
                            Введите ваш email.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="your_message">Сообщение</label>
                    <div class="input-group">
                        <textarea id="your_homepage" class="form-control" id="exampleFormControlTextarea1" rows="3" required="" name="your_message"></textarea>
                        <div class="invalid-feedback" style="width: 100%;">
                            Нужно ввести информацию.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="your_homepage">Homepage <span class="text-muted">(Optional)</span> </label>
                    <input type="text" class="form-control" id="your_homepage" placeholder="you@example.com" value="nosite" required="" name="your_homepage" >
                    <div class="invalid-feedback ">
                        Введите ваш email.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="your_image">Добавте картинку</label><br>
                    <input type="file" name="image" id="image" />
                </div>
                <hr class="mb-4">
                <div class="form-group">
                    <input class="btn btn-primary btn-lg btn-block" type="submit" name="insert" id="insert" value="Продолжить"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>