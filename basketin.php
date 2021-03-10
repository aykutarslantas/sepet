<style>
    /* Main Button Style */
    .myprefix-button{ background:#65A343; text-shadow:1px 1px 1px #000; -webkit-border-radius: 5px;-moz-border-radius: 5px; border-radius: 5px;-webkit-box-shadow: 1px 2px 1px rgba(0, 0, 0, 0.1); -moz-box-shadow: 1px 2px 1px rgba(0, 0, 0, 0.1); box-shadow: 1px 2px 1px rgba(0, 0, 0, 0.1); cursor: pointer; display: inline-block; overflow: hidden; padding: 1px; vertical-align: middle; }

    .myprefix-button span { border-top: 1px solid rgba(255, 255, 255, 0.25); -webkit-border-radius: 5px; -moz-border-radius: 5px;border-radius: 5px; color: #fff; display: block; font-weight: bold; font-size: 1em; padding: 6px 12px; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25); }

    /* Hover */
    .myprefix-button:hover{ background: #558938; text-decoration:none; }

    /* Active */
    .myprefix-button:active{ background:#446F2D; }
</style>
<?php
require_once 'sessionBasket.php';

if (isset($_SESSION['basket']) and count($_SESSION['basket']) > 0){
    echo '<table classBasket="table table-hover table-sm w-100">';
    echo '<tr style="background-color: beige">
<td align="left">Title</td>
<td>Amount</td>
<td>Price</td>
<td>Total</td>
<td>Delete</td>
</tr>';
    foreach ($_SESSION['basket'] as $item) {
        echo '<tr>';
        echo "<td>$item[title]</td>";
        echo "<td>$item[amount]</td>";
        echo "<td>$item[price]</td>";
        echo "<td>".($item['price']*$item['amount'])." $item[currency]</td>";
        echo "<td><form><input type='hidden' name='id' value='$item[uid]'><input type='hidden' name='delete'><button class='myprefix-button' onclick='dele($item[uid])'> Delete </form></td>";
        echo '</tr>';
    }
    echo '</table>';
}
?>
