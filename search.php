<?php
// 获取搜索参数
$minPrice = $_GET['min'];
$maxPrice = $_GET['max'];
$productName = $_GET['name'];
//$minPrice = 0;
//$maxPrice = 5;
//$productName = "Fish Fingers";
echo "$minPrice";
echo "$maxPrice";

echo "$productName";
$servername = "localhost"; // 数据库主机名
$username = "root"; // 数据库用户名
$password = "123456"; // 数据库密码
$dbname = "assignment1"; // 数据库名称
$port = "3308"; // 数据库端口号


$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// 检查连接是否成功
//if (!$conn) {
//    die("连接失败: " . mysqli_connect_error());
//}
//echo "连接成功";
// 使用查询条件查询数据库
$sql = "SELECT products.product_id, 
	products.product_name, 
	products.unit_price, 
	products.unit_quantity, 
	products.in_stock,
       products.photo,
       products.description
FROM products WHERE LOWER(products.product_name) LIKE LOWER('%$productName%' )
    AND products.unit_price BETWEEN $minPrice AND $maxPrice";
$result = mysqli_query($conn, $sql);

$itemList = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $itemList[] = $row;
    }
}
//print_r($itemList) ;
define('APP', 'ass1');
require './index.php';
?>


