<?php
include "_header.php";

$sql = "SELECT * FROM bills";
$data = db_select($sql);
?>

<table>
    <colgroup>
        <col style="width: 5%;"/>
        <col style="width: 30%;"/>
        <col style="width: 10%;"/>
        <col style="width: 20%;"/>
        <col style="width: 15%;"/>
        <col style="width: 20%;"/>
    </colgroup>
    <thead>
        <th>Id</th>
        <th>Tên Khách Hàng </th>
        <th>Địa Chỉ</th>
        <th>Số Điện Thoại</th>
        <th>Tổng Tiền</th>
        <th>Ngày Giờ</th>
        <th></th>
    </thead>
    <tbody>
        <?php
        foreach ($data as $value){
            $id = $value["id"];
            $name = $value["fullname"];
            $addr = $value["addr"];
            $phone = $value["phone"];
            $price = $value["total"];
            $date = $value["create_date"];
            
        ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $name ?></td>
                <td>
                   <?= $addr ?>
                </td>
                <td>
                    <?= $phone ?>
                </td>
                <td>
                    <?= $price ?>
                </td>
                <td>
                    <?= $date ?>
                </td>
              
               
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "_footer.php"; ?>

