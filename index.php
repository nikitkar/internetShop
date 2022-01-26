<?php
    print_r(headers_list());
    if(isset($_POST['submit'])){
        $err = [];

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $err[] = "Не корректный ввод email";
        
        if(strlen($_POST['email']) < 3 or strlen($_POST['email']) > 50)$err[] = "email должен быть не меньше 3-х символов и не больше 50";


        // $query = mysqli_query($link, 'SELECT * FROM user WHERE Email IN ("' . $_POST['email'] . '")');
        // if(mysqli_num_rows($query) > 0) $err[] = "Пользователь с таким email уже существует";

        if(count($err) == 0){
            $login = $_POST['login'];
            $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

            // mysqli_query($link,"INSERT INTO user SET Email='" . $email . "', Password='" . $password."'");
            print_r(headers_list());
            header("Location: login.php");
        }
        else{
            print '<p class="warning">При регистрации произошли следующие ошибки:</p>';
            foreach($err as $item) print $item .'<br>';
            print '<button onclick="history.back()">Вернуться</button>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop page</title>
    </head>
    <body>
        <?php
            include 'php/connectBD.php';
        ?>
        
        <form method="POST">
            <input class="email" name="email" type="text" required placeholder="Email">
            <input class="password" name="password" type="password" required placeholder="Пароль">
            <input name="submit" type="submit" value="Зарегистрироваться">
        </form>
    </body>
</html>