<?php include "_header.php ";
if(is_post_method()){
    $username = $_POST["username"] ?? "";
    $pwd = $_POST["pwd"] ?? "";
    if(empty($username) == false){
        $sql = "insert into user(username,pwd) values(?,?)";
        $pwd = password_hash($pwd,null);
        $data = [$username,$pwd];
        $ket_qua = db_execute($sql,$data);
        if($ket_qua == true){
            js_alert("them danh muc thanh cong!");
        }
    }
}
?>
<link rel="stylesheet" href="admin.css" />
<form action="" method="post">
<h2>Them Tai Khoan</h2>
<div class="control">
     <label>Ten:</label>
    <input type="text" name ="username" required/>
    <label>mk:</label>
     <input type="password" name="pwd" required />
</div>
<div class="control">
        <input type="submit" value="them danh muc">
 </div>
</form>

<?php include "_foader.php" ?>