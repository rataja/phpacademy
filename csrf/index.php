<?php
session_start();
require_once './classes/Token.php';
if (isset($_POST['quantity'], $_POST['product'], $_POST['token']))
{
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    if (!empty($product) && !empty($quantity))
    {
        if (Token::check($_POST['token']))
        {
            echo 'Token is valid';
        } else
        {
            echo 'Token is not valid';
        }
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
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                </div>
            </div>
        </form>
    </body>

</html>