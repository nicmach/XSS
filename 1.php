<?
  if ( !isset($_COOKIE["cart"]) )
    {
      setcookie("cart","nonsense item,2,7.5;other item,1,3.2",time()+86400);
    }
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Sample Script</title>
  </head>
  <body>
    <h1>Sample page</h1>
<?
  if ( !isset($_COOKIE["cart"]) )
    {
?>
    <p>Let's assume this is your shopping cart. Reload this page to find some items in your cart. 
       They will be stored in a cookie.</p>
<?
    }
  else
    { 
?>
    <table>
      <tr>
        <th>Product</th>
        <th>Price per item</th>
        <th>Items</th>
        <th>Total</th>
      </tr>
<?
      $lines = explode(";",$_COOKIE["cart"]);
      foreach ($lines as $line)
        {
          list ($name,$count,$price) = explode(",",$line);
          printf("<tr><td>%s</td><td>%d</td><td>%d</td><td>%1.2f</td></tr>\n",
                 $name,$price,$count,$count*$price);
        }
?>
     </table>
  <form method="get"> 
    <p>Payment details</p>
    <p>Credit Card Issuer: <input type="text" name="cc_name" /></p>
    <p>Credit Card Number: <input type="text" name="cc_number" /></p>
    <p>Credit Card Validity: <input type="text" name="cc_valid" /></p>
    <p>Name on Credit card: <input type="text" name="cc_name" /></p>
    <p><input type="submit" value="Submit" /></p>
  </form>
<?
    }
?>
  </body>
</html>
