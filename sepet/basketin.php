<?php
require_once 'sessionBasket.php';
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sepet</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.7/holder.min.js" integrity="sha512-O6R6IBONpEcZVYJAmSC+20vdsM07uFuGjFf0n/Zthm8sOFW+lAq/OK1WOL8vk93GBDxtMIy6ocbj6lduyeLuqQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


    <meta name="theme-color" content="#7952b3">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        table, td {
            text-align: center;
        }
    </style>
    <script>

            $("form").on("submit", function(event){
                event.preventDefault();
                var formValues= $(this).serialize();
                $.post("basket.php", formValues, function(data){
                    // Display the returned data in browser
                    $("#result").html(data);
                }).then(count);
            }).then(document.location.reload());
        }
    </script>
</head>
<body>

<div id="result" style="padding: 10px; background-color: antiquewhite"></div>
<?php

if (isset($_SESSION['basket']) and count($_SESSION['basket']) > 0){
    echo '<table class="table table-hover table-sm w-100">';
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
        echo "<td><button class='btn btn-danger btn-sm' type='submit' onclick='dele($item[uid])'>Delete</form></td>";
        echo '</tr>';
    }
    echo '</table>';
}
?>
</body>
</html>
