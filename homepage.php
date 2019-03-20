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
//...... some code which will show us a notes regarding our user only, COUNT(*) ...




?>



<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Homepage SAMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" media="screen">
</head>

<body>


<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Ваша гостевая книга <?php echo $row['user_name']; ?></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Ваши записи</a>
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
                    <span class="text-muted">12</span>
                </li>
<!--                <li class="list-group-item d-flex justify-content-between lh-condensed">-->
<!--                    <div>-->
<!--                        <h6 class="my-0">продукты которые вас интересуют</h6>-->
<!--                        <small class="text-muted">радость и счастье</small>-->
<!--                    </div>-->
<!--                    <span class="text-muted">8</span>-->
<!--                </li>-->
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <a href="#"><h6 class="my-0">Просмотреть записи</h6></a>
                        <small>Check details</small>
                    </div>
                    <span class="text-success"></span>
                </li>
<!--                <li class="list-group-item d-flex justify-content-between">-->
<!--                    <span>Total (USD)</span>-->
<!--                    <strong>$20</strong>-->
<!--                </li>-->
            </ul>

        </div>

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Страница ввода данных пользователя</h4>
            <form class="needs-validation was-validated" novalidate="">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="your_name">Ваше имя</label>
                        <input type="text" class="form-control" id="your_name" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Требуется ввести ваше имя
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="your_email">Email </label>
                        <input type="text" class="form-control" id="your_email" placeholder="you@example.com" value="" required="">
                        <div class="invalid-feedback">
                            Введите ваш email.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="your_homepage">Сообщение</label>
                    <div class="input-group">
                        <textarea id="your_homepage" class="form-control" id="exampleFormControlTextarea1" rows="3" required=""></textarea>
                        <div class="invalid-feedback" style="width: 100%;">
                            Нужно ввести информацию.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Homepage <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Можете ввести адресс и ссылку на нужную информацию сюда.
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Продолжить</button>
            </form>
        </div>
    </div>
</div>




<script src="https://use.fontawesome.com/ee309940e2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>