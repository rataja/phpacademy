<?php
session_start();
require_once './classes/Token.php';
if (isset($_POST['quantity'], $_POST['product']))
{
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    if (!empty($product) && !empty($quantity))
    {
	
    }
}
?>
<!DOCTYPE>
<html>
    <head>
	<title>CSRF Protection</title>
    </head>
    <body>
	<form action="" method="post">
	    <div class="product">
		<strong>A product</strong>
		<div class="field">
		    Quantity: <input type="text" name="quantity">
		    <input type="submit" value="Order">
		    <input type="hidden" name="product" value="1">
		    <input type="hidden" name="token" value="">
		</div>
	    </div>
	</form>
    </body>

</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

