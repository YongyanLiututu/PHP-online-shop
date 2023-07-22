<?php
//use PHPMailer;

require 'E:\develop\phpstorm\php_Project4.24\php_Project4.21\php_Project4.17.1\PHPMailer.php';
require 'E:\develop\phpstorm\php_Project4.24\php_Project4.21\php_Project4.17.1\SMTP.php';
require 'E:\develop\phpstorm\php_Project4.24\php_Project4.21\php_Project4.17.1\Exception.php';
session_start();
$mail = new PHPMailer\PHPMailer\PHPMailer();
if (isset($_POST['name'])) {
    $name = $_POST['name'];
} else {

    header('Location: ./index.php');
}

if (isset($_POST['address'])) {
    $address = $_POST['address'];
} else {

    header('Location: ./index.php');
}
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
} else {

    header('Location: ./index.php');
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {

    header('Location: ./index.php');
}

if (isset($_POST['suburb'])) {
    $suburb = $_POST['suburb'];
} else {

    header('Location: ./index.php');
}
if (isset($_POST['state'])) {
    $state = $_POST['state'];
} else {

    header('Location: ./index.php');
}
if (isset($_POST['country'])) {
    $country = $_POST['country'];
} else {

    header('Location: ./index.php');
}
//use PHPMailer\PHPMailer\PHPMailer();
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
// 创建一个 PHPMailer 实例
if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {

    echo 'PHPMailer class is not loaded';
    exit;
}

// 创建 PHPMailer 对象，并进一步设置和发送邮件
//$mail = new PHPMailer\PHPMailer\PHPMailer();


//// 获取用户输入
//$name = $_POST['name'];
//$email = $_POST['email'];
//$order = $_POST['order'];



$mail->isSMTP();
$mail->Host = 'smtp.qq.com';
$mail->Port = 465;

$mail->SMTPSecure = 'ssl';



$mail->SMTPAuth = true;


$mail->Username = '1109552635@qq.com';
$mail->Password = 'qbkvkzuvamiyjjfe';

$mail->setFrom('1109552635@qq.com', 'yongyan liu');
$mail->addAddress("$email", "$name");

function cost($cart)
{
    $total_cost = 0;
    foreach ($cart as $item) {

        $item_cost = $item['unitPrice'] * $item['quantity'];
        $total_cost += $item_cost;
    }
    return $total_cost;
}


$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
//$name = $_POST['name'];
//
//$address = $_POST['address'];
//$phone = $_POST['phone'];
//$email = $_POST['email'];
//echo $address;
//print_r($cartItems);



$mail->Subject = 'Order Confirmation';
$mail->Body = 'Hi! Dear ' . $name . "\r\n" .
    'Thank you for placing an order in our uts online store!!!' . "\r\n" .
    'Our store pursues 100% high-quality products and hopes to get your satisfactory feedback!!' . "\r\n" .
//    '-----------------------------' . "\r\n";
$mail->Body .= '-----------------------------' . "\r\n" .


    'Phone: ' . $phone . "\r\n" .
    'Email: ' . $email . "\r\n" .
    'Suburb: ' . $suburb . "\r\n" .
    'State: ' . $state . "\r\n" .
    'Country: ' . $country . "\r\n" .
    'Address: ' . $address . "\r\n" .
    '-----------------------------------' . "\r\n";
    '-----------------------------------' . "\r\n";

foreach ($cartItems as $item) {
    $itemName = $item['name'];
    $itemPrice = $item['unitPrice'];
    $itemQuantity = $item['quantity'];
    $itemCost = $itemPrice * $itemQuantity;
    $mail->Body .= 'Product Name: ' . $itemName . "\r\n" .
        'Unit Price: $' . $itemPrice . "\r\n" .
        'Quantity: ' . $itemQuantity . "\r\n" .
        'Item Cost: $' . $itemCost . "\r\n" .
        '-----------------------------------' . "\r\n";
}

$total_cost = cost($_SESSION['cart']);
echo 'Total Cost: ' . $total_cost;
$mail->Body .= 'Total Cost: $' . $total_cost . "\r\n";



if(!$mail->send()) {
    echo 'Fail!';
    echo 'Error message：' . $mail->ErrorInfo;
//    header('Location: ./thankyouPage.php');
} else {
    echo 'success！';
    echo $cartItems;
    header('Location: ./thankyouPage.php');

}


?>
