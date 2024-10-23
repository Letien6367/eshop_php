
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EShop</title>
    <link rel="stylesheet" href="<?= asset("css/site.css");?>">
    <link rel="stylesheet" href="<?= asset("css/admin.css");?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
    <header>
        <div class="logo">Logo</div>
        <div class="search-bar">
            <form action="">
            <i class='bx bx-search-alt-2' ></i> <input type="text" placeholder="Tìm kiếm..." name="kw"
                value="<?=htmlspecialchars($_GET["kw"]?? "" )?>">
            </form>
        </div>
        <div class="menu">
            <?php
                $cart_cnt = count(get_id_from_cart());
            ?>
            <a class="<?= $cart_cnt > 0 ? "has_product" : ""; ?>" href="<?= route("gh")?>"><i class='bx bxs-cart' style="font-size: 30px;"></i></a>
            <?php if (isset($_SESSION["username"]) == false){ ?>
                <a href="<?=route("dangnhap")?>"><i class='bx bxs-user' style="font-size: 30px;"></i></a>
            <?php } else { ?>
                <a href="<?=route("qlsp")?>"><i class='bx bx-user' style="font-size: 30px;" ></i></a>
                <a href="<?=route("dangxuat")?>" 
                    onclick="return confirm('Xác nhận đăng xuất?')"><i class='bx bx-log-out-circle' style="font-size: 30px;"></i></a>
            <?php } ?>
        </div>
    </header>
        <section class="main">
            <aside>
                <nav>
                    <ul style="list-style-type: none; padding: 0; display: block;">
                        <li style="margin-bottom: 10px;"><a href="<?= route("home") ?>">Trang chủ</a></li>
                        <?php
                            $sql = "SELECT id, cate_name FROM product_cate";
                            $cates = db_select($sql);
                            foreach ($cates as $item) {
                        ?>
                            <li style="margin-bottom: 10px;"><a href="<?=route("home", ["id" => $item["id"]])?>"><?= $item["cate_name"] ?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </nav>
            </aside>
            <main>  