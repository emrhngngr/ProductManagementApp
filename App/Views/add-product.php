<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="script.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
    <link rel="stylesheet" href="/scandiweb/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <form action="/scandiweb/addproduct" method="post" id="product_form">
    <div class="navbar">
        <h1>Product Add</h1>
        <div class="buttons">
            <input class="button" type="submit" value="SAVE" name="save"/>
            <input class="button" type="button" value="CANCEL" onclick="history.back();"/>
        </div>
    </div>
    <hr>
        <div class="form-box">
            <div class="form-member">
                <p>SKU</p>
                <input type="text" id="sku" name="sku" required>
            </div>
            <div class="form-member">
                <p>Name</p>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-member">
                <p>Price ($)</p>
                <input type="number" id="price" name="price" required>
            </div>
            <div class="form-member">
                <p>Switch</p>
                <select id="productType" name="productType" onChange="prodType(this.value);" required>
                    <option value="">Type Switcher</option>
                    <option value="DVD">DVD</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                </select>
            </div>
        </div>
        <div class="dynamic">
            <div class="fieldbox" id="DVD-f">
            <label>Size (MB)</label>
            <input type="number" name="size" id="size">
            <p>Please, provide size</p>
            </div>
            
            <div class="fieldbox" id="Furniture-f">
            <label>Height (CM)</label>
            <input type="number" name="height" id="height">
            <label>Width (CM)</label>
            <input type="number" name="width" id="width">
            <label>Length (CM)</label>
            <input type="number" name="length" id="lenght">
            <p>Please, provide dimensions</p>
            </div>
            
            <div class="fieldbox" id="Book-f">
            <label>Weight (KG)</label>
            <input type="number" name="weight" id="weight"><br>
            <p>Please, provide weight</p>
            </div>
        </div>
    </form>
    <script>
        function prodType(option){
            var DVD = document.getElementById("DVD-f");
            var Furniture = document.getElementById("Furniture-f");
            var Book = document.getElementById("Book-f");
            
            DVD.style.display="none";
            Furniture.style.display="none";
            Book.style.display="none";
            
            if(option=="DVD"){
            DVD.style.display="block";
            }else if(option=="Furniture"){
            Furniture.style.display="block";
            }else if(option=="Book"){
            Book.style.display="block";
            }
        }

        function validateForm() {
            var sku = document.getElementById("sku").value;
            var name = document.getElementById("name").value;
            var price = document.getElementById("price").value;
            var productType = document.getElementById("productType").value;
            var weight = document.getElementById("weight").value;
            var height = document.getElementById("height").value;
            var width =document.getElementById("width").value;
            var lenght =document.getElementById("lenght").value;
            var size =document.getElementById("size").value;


            if (sku === "" || name === "" || price === "" || productType === "") {
                alert("Please, submit required data");
                return false;
            }

            if (productType === "Book") {
                if (weight === "") {
                    alert("Please, provide weight");
                    return false;
                }
            }
            if (productType === "Furniture") {
                if (height === "" || length === "" || width === "") {
                    alert("Please, provide dimension HxHxH");
                    return false;
                }
            }
            if (productType === "DVD") {
                if (size === "") {
                    alert("Please, provide size(MB)");
                    return false;
                }
            }

            return true;
        }

        document.getElementById("product_form").addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    </script>

</body>
</html>