<?php
include("db.php");

include('includes/headerLogIn.php');

if (isset($_POST['proseslog'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registrasi WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit();
    } else {
        echo "<script>
            alert('Username dan Password Salah!');
            window.location = 'index.php';
        </script>";
    }
}

if (isset($_POST['registrasi'])) {
    header('Location: RegistUser.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DAILY NOTE</title>
    <style>
        body {
            background-image: url("img/bg.jpeg");
            font-family: Arial, sans-serif;
        }

        .box {
            width: 300px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .inputBox {
            position: relative;
            margin-bottom: 25px;
        }

        .inputBox input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #333;
            border: none;
            border-bottom: 1px solid #ccc;
            outline: none;
            background-color: transparent;
        }

        .inputBox span {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px;
            font-size: 16px;
            color: #666;
            transition: 0.5s;
            pointer-events: none;
        }

        .inputBox input:focus + span,
        .inputBox input:valid + span {
            top: -20px;
            left: 0;
            color: #0066cc;
            font-size: 12px;
        }

        .button-container {
            text-align: center;
        }

        .button-container input[type="submit"] {
            background-color: #925343;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-container input[type="submit"]:hover {
            background-color: #925343;
        }
    </style>
</head>

<body>

    <div class="box">
        <span class="borderLine"></span>
        <form action="" method="POST">
            <h2>-LOGIN HERE-</h2>
            <div class="inputBox">
                <input type="text" required="required" name="username">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" required="required" name="password">
                <span>Password</span>
                <i></i>
            </div>
            <div class="button-container">
                <input type="submit" value="Login" name="proseslog">
                <input type="submit" value="Sign In" name="Sign In" onclick="location.href='registUser.php';">
            </div>
        </form>
    </div>
</body>

</html>
