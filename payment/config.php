<!-- /*
 * @Author Kumar Vibhanshu <vibhanshumonty@gmail.com>
 * @Package Stripe Payment Gateway Integration 
 * @Stripe Payment Gateway Integration Integration
 * visit: https://vibhanshumonty.github.io/Stripe_Integration/
*/ -->

<?php
require('stripe-php-master/init.php');

// your_publishable_key
$publishableKey="pk_test_51NHKuXFWOUC6a0NAkiNdMQir8C1kxn4e6AAtGPWIcMGsuHGcxcIxXicNeuI67G4IDYZOtCU10ZZENw2T42wG4xOv00gD0XeGgB";

// your_secret_key
$secretKey="sk_test_51NHKuXFWOUC6a0NAy0PMCwoZrbzLN1o1xnAiLKuHSGZl0WOA1uPTpIVBoO0UUNQxiKk1vSERR0ydmmnzCxUsHosB00REyu0M5D";

\Stripe\Stripe::setApiKey($secretKey);
?>