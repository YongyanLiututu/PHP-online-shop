<?php
//echo phpinfo();
// 数据库连接参数
$servername = "localhost"; // 数据库主机名
$username = "root"; // 数据库用户名
$password = "123456"; // 数据库密码
$dbname = "assignment1"; // 数据库名称
$port = "3308"; // 数据库端口号

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// 检查连接是否成功
//if (!$conn) {
 //   die("连接失败: " . mysqli_connect_error());
//}
//echo "连接成功";

$sql = "SELECT
	products.product_id, 
	products.product_name, 
	products.unit_price, 
	products.unit_quantity, 
	products.in_stock,
    products.description,
    products.photo
FROM
	products";


$result = mysqli_query($conn, $sql);
$itemList = array();
while ($row = mysqli_fetch_assoc($result)) {
    $itemList[] = $row;
}

define('APP', 'ass1');
require './index.php';
?>

<!--入口文件-->
