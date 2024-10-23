<?php

if (is_post_method()){
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // có nhập username
    if (empty($username) == false){
        $sql = "SELECT * from user where username=?";
        $user = db_select($sql, [$username]);
        if (count($user) == 0){
            js_alert("Sai tên đăng nhập hoặc mật khẩu!");
            js_redirect_to(route("dangnhap"));
        }
        // nếu tồn tại username thì so sánh mật khẩu
        $user = $user[0];
        // nếu mật khẩu người dùng nhập vào đúng => đăng nhập thành công
        if (password_verify($password, $user["pwd"]) == true){
            // Lưu thông tin username vào session
            $_SESSION["username"] = $username;
            js_alert("Đăng nhập thành công!");
            js_redirect_to(route("qlsp"));
        }else{
            js_alert("Sai tên đăng nhập hoặc mật khẩu!");
            js_redirect_to(route("dangnhap"));
        }
        }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>

<body>
    <form method="post">
        <div style="width: 400px; border: 1px solid black; margin: auto;">
        <h1 style="text-align: center;">Đăng nhập</h1>
        <div style="width: 200px;height: 50px;" >
            <label>Tên đăng nhập:</label>
            <input type="text" name="username">
        </div>
        <div style="width: 200px;height: 50px;">
            <label>Mật khẩu:</label>
            <input type="password" name="password" >
        </div>
        <div class>
            <input type="submit" value="Đăng nhập">
        </div>
        </div>
    </form>
</body>

</html>