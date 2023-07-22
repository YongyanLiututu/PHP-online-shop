<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
    <link rel="stylesheet" type="text/css" href="style(3)(1).css">
</head>
<body>
<header>
<!--    It's a separate page and doesn't have any jumps in the main page, but it helps me see the data I added in the cartc-->
    <h1>My Cart</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Search</</a></li>
            <li><a href="orders.php">Orders</a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>Cart Items</h2>
    <!-- 购物车内容区域 -->

    <?php
    //echo phpinfo();
    // 数据库连接参数
    $servername = "localhost"; // 数据库主机名
    $username = "root"; // 数据库用户名
    $password = "123456"; // 数据库密码
    $dbname = "assignment1"; // 数据库名称
    $port = "3308"; // 数据库端口号

    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

    if (!$conn) {
        die("fail: " . mysqli_connect_error());
    }
    echo "success";

    $sql = "SELECT
	products.product_id, 
	products.product_name, 
	products.unit_price, 
	products.unit_quantity, 
	products.in_stock
FROM
	products";


    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
     
        echo "<table class='my-table'>";
        echo "<thead><tr><th>product_id</th><th>product_name</th><th>unit_price</th><th>unit_quantity</th><th>in_stock</th></tr></thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["product_id"] . "</td><td>" .
                $row["product_name"] . "</td><td>" .
                $row["unit_price"] . "</td><td>" .
                $row["unit_quantity"] . "</td><td>"
                . $row["in_stock"] . "</td></tr>";
        }
        echo "</tbody></table>";


    }
    // 检查是否有数据
    //    if (mysqli_num_rows($result) > 0) {
    //        // 输出数据
    //        while($row = mysqli_fetch_assoc($result)) {
    //            echo "product_id: " . $row["product_id"].
    //                " - product_name: " . $row["product_name"].
    //                " - unit_price: " . $row["unit_price"].
    //                " - in_stock: " . $row["in_stock"].
    //                " - unit_quantity: " . $row["unit_quantity"]. "<br>";
    //        }
    //    } else {
    //        echo "没有数据";
    //    }
    //
    //    // 关闭连接
    //    mysqli_close($conn);
    ?>
</main>
<footer>
<!--    <p>Footer</p>-->
</footer>
<script src="script.js"></script>

</body>
</html>
