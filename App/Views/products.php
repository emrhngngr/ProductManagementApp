<?php
if (isset($_SESSION['error_message'])) {
    echo "<script>alert('" . $_SESSION['error_message'] . "');</script>";
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="/scandiweb/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <form action="/scandiweb/deleteproduct" method="post">
    <div class="navbar">
        <h1>Product List</h1>
        <div class="buttons">
            <a class="button" value="ADD" href='addproduct'>ADD</a>
            <input class="button" type="submit" value="MASS DELETE" name = "delete"/>
        </div>
    </div>
    <hr>        
    <div class="grid-container">
    <?php
                    foreach ($products as $productInfo){
                        ?><div class="grid-item">
                            <input type="checkbox" class=".delete-checkbox" name="deletesku[]" value="<?=$productInfo["sku"]?>">
                            <?=$productInfo["sku"]?></br>
                            <?=$productInfo["name"]?></br>
                            <?=$productInfo["price"]?></br>
                            <?=$productInfo["type"]?></br>
                            <?=$productInfo["attribute"]?>
                        </div>
                    <?php } ?>
        </div>
    </form>
</body>
</html>