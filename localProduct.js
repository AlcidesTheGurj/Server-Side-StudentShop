//load array of products from local storage
var localProducts =  JSON.parse(localStorage.product);
var productIndex = 0;
//showing the product
localProducts.forEach(product=>{
    document.getElementById("products").innerHTML +=
        "<div class='individualProducts'>"
        +"<br>"
        +"<br>"
        +productIndex
        +"</div>"
        +"<div>"
        +"<img src=' "+product.source+" ' width ='75' height='75' alt='logo'>"
        +"</div>"
        +"<div class='individualProducts' id='cartDescription'>"
        +"<br>"
        +"<br>"
        +product.type
        +"</div>"
        +"<div class='individualProducts'>"
        +"<br>"
        +"<br>"
        +product.price
        +"</div>"
        +"<div>"
        +"<a href='' onclick='removeFunction("+productIndex+")'>"
        +'X'
        +"</a>"
        +"</div>";
    productIndex++;
});
localProducts.forEach(product=>{
	document.getElementById("checkoutForm").innerHTML +=
	"<input type='hidden' name='order[]' value='"+product.id+"'>";
	});
//removing product at index, setting array again without that product
function removeFunction(index){
    localProducts.splice(index,1);
    localStorage.setItem('product',JSON.stringify(localProducts))
}
//removing whole array
function clearCart(){
	if(!(localStorage.product)){
        alert("Cart is empty!");
    }
    localStorage.removeItem("product");
}
