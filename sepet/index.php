<?php
$site = '127.0.0.1'.DIRECTORY_SEPARATOR.'sepet'.DIRECTORY_SEPARATOR;
require_once 'sessionBasket.php';
require_once 'autoload.php';
use basket\GetTheBasket;

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
        .dropdown-menu{
            width: 400px !important;
        }
    </style>
    <script>
        function basket(){
            let url = 'basketin.php';
            fetch(url).then(res => res.text().then((data)=>{
                document.getElementById('basketvalues').innerHTML = data;
            }))
        }
        function count(){
            let url = 'basketdatas.php';
            fetch(url).then(res=>res.text()).then((out)=>{
                console.log(out);
                document.getElementById('basket').innerHTML = out;
            }).catch(err => {throw err}).then(basket);
        }
        $(document).ready(function(){
            $("form").on("submit", function(event){
                event.preventDefault();
                var formValues= $(this).serialize();
                $.post("basket.php", formValues, function(data){
                    // Display the returned data in browser
                    $("#result").html(data);
                }).then(count);
            });
        });
    </script>

    <script>
        function dele(){
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
<body onload="count()">

<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm">
    <p class="h5 my-0 me-md-auto fw-normal">Sepet</p>

    <!-- Example single danger button -->
    <div class="btn-group">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Basket <span class="badge bg-danger" id="basket"></span>
        </button>
        <div class="dropdown-menu p-1">
            <div id="basketvalues"></div>
            <a href="basketin.php">Go to Basket</a>
        </div>
    </div>

</header>

<main class="container">
    <div id="result" style="padding: 10px; background-color: antiquewhite"></div>
    <a href="sessionDestroy.php" target="_self">Session Destroy</a>
    <div class="row row-cols-1 row-cols-md-4 mb-3 text-center">
        <?php

        $data = new basket\GetTheBasket();
        foreach ($data->fecthData() as $product){
            ?>

            <div class="col">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal"><?=$product->category?></h4>
                    </div>
                    <img src="holder.js/305x210?random=yes&text=<?=$product->title?>" class="card-img-top img-fluid">
                    <div class="card-body">

                        <h3 class="mt-2 card-title"><?=$product->price?> <?=$product->currency?></h3>
                        <p><?=$product->features?></p>

                        <div class="row">
                            <form>
                                <div class="col">
                                    <input type="number" name="amount" class="form-control form-control-sm" value="1">
                                </div>
                                <div class="col">
                                    <input type="hidden" name="id" value="<?=$product->uid;?>">
                                </div>
                                <div class="col">
                                    <button type="submit" class="full-expand btn btn-sm btn-outline-primary">Add to Basket</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    require_once 'inc/footer.php';
    ?>


</main>
</body>
</html>
