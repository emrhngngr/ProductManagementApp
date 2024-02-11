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