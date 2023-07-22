<form id="order-form" method="post" action="submit_order.php">
    <input type="text" name="name" placeholder="姓名" required>
    <input type="email" name="email" placeholder="电子邮件" required>
    <input type="tel" name="phone" placeholder="电话号码" required>
    <textarea name="address" placeholder="收货地址" required></textarea>

    <button type="submit" onclick="redirectToOrderConfirmation()">提交order</button>
</form>

<script>
    function redirectToOrderConfirmation() {
        // 使用JavaScript submit()方法提交表单
        document.getElementById('order-form').submit();

        // window.location.href = "./order_confirmation.php";
    }
</script>
