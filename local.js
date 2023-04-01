function menuFunction(){
    let menu = document.getElementById('hiddenNav');
    if (menu.className === "hiddenNav") {
        menu.className += " appear";
    } else {
        menu.className = "hiddenNav";
    }
}
if(session === "logged-in"){
	 document.getElementById("logout").innerHTML = "<a href='logout.php'>"
													+"Log out"
													+"</a>";
	document.getElementById("hidden-logout").innerHTML = "<a href='logout.php'>"
													+"Log out"
													+"</a>";
 }
 function addFunction(id,type,price,source){
    let storedProduct;
    let product = {
		id: id,
        type: type,
        price: price,
		source: source
    }

    if(localStorage.product){
        storedProduct = JSON.parse(localStorage.product);
    }
	else{
        storedProduct = new Array();
    }
    storedProduct.push(product);
    localStorage.product = JSON.stringify(storedProduct);
    alert('Item added to cart!');

}