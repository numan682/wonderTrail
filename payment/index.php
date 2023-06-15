<!-- /*
 * @Author Kumar Vibhanshu <vibhanshumonty@gmail.com>
 * @Package Stripe Payment Gateway Integration 
 * @Stripe Payment Gateway Integration Integration
 * visit: https://vibhanshumonty.github.io/Stripe_Integration/
*/ -->

<?php
session_start();
$userName=$_SESSION['username'];
require('config.php');
$name =$_POST['name'];
$email =$_POST['email'];
$price =$_POST['price'];
$amount = $price * 100;
$id=$_POST['id'];
?>
<center><form action="submit.php" method="post">
	<input style="display:none;" class="hide" type="text" name="name" value="<?php echo $name ?>">
	<input style="display:none;" class="hide" type="text" name="email" value="<?php echo $email ?>">
	<input style="display:none;" class="hide" type="text" name="amount" value="<?php echo $amount ?>">
	<input style="display:none;" class="hide" type="text" name="id" value="<?php echo $id ?>">
	<script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="<?php echo $publishableKey?>"
		data-amount="<?php echo $amount?>"
		data-name="<?php echo $name?>"
		data-description="<?php echo $name?>"
		data-image=""
		data-currency="USD"
		data-email="<?php echo $email?>"
	>
	</script>

</form></center>
