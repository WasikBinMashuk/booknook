let carts = document.querySelectorAll('.ADDTOCART');
let products =[
    {
     name:'অনুরাধা',
     tag:'ONU',
     price:80,
     incart:0
    },
    {
        name:'চোখের বালি',
        tag:'COKH',
        price:100,
        incart:0 
    },
   {
    name:'পুঁইমাচা',
    tag:'PUI',
    price:90,
    incart:0 

},
{
        name:'প্যারাডক্সিকাল সাজিদ',
        tag:'PERA',
        price:110,
        incart:0 
},
{
    name:'ডট কম রহস্য',
    tag:'DOT',
    price:95,
    incart:0  
},
{
     name:'আমি তপু',
     tag:'AMI',
     price:90,
     incart:0 
},
{
    name:'অবনীল',
    tag:'OBN',
    price:90,
    incart:0 
},
{
    name:'কর্নেল-সমগ্র',
    tag:'COR',
    price:90,
    incart:0 
}

];
for(let i=0; i< carts.length; i++){
    
    carts[i].addEventListener('click',()=>{
        cartNumbers(products[i]);
        totalCost(products[i]);

    })
}
function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');
    if(productNumbers){
        document.querySelector('.cart span').textContent = productNumbers;
    }
}
function cartNumbers(product){
    let productNumbers = localStorage.getItem('cartNumbers');
    

    productNumbers = parseInt(productNumbers);
    if(productNumbers){
        localStorage.setItem('cartNumbers',productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;

    }
    else{
        localStorage.setItem('cartNumbers',1);
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(product);
    
}
function setItems(product){
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if(cartItems != null){
        if(cartItems[product.tag] == undefined){
            cartItems = {
                ...cartItems,
                [product.tag]:product
            }
        }
        
        cartItems[product.tag].incart += 1;
    }
    else{
        product.incart = 1;
        cartItems ={
            [product.tag]:product
        }
    }
    
    localStorage.setItem("productsInCart",JSON.stringify(cartItems));
 

}
function totalCost(product){
    let cartCost = localStorage.getItem('totalCost');
    
     
    if(cartCost !=null){
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost",cartCost + product.price );

    }else{
        localStorage.setItem("totalCost",product.price);

    }
    
}
function displayCart(){
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    let productContainer = document.querySelector(".products");
    let cartCost = localStorage.getItem('totalCost');

    if(cartItems && productContainer ){
        productContainer.innerHTML ='';
        Object.values(cartItems).map(item =>{
            productContainer.innerHTML += `
            <div class="product">
            <ion-icon name="trash"></ion-icon>
            <img style="height:80px;width:80px;"; src="./image/${item.tag}.png">
            <span>${item.name}</span>
            </div>
            <div class="price">${item.price}</div>
            <div class="quantity">
            <ion-icon class="decrease" name="arrow-dropleft-circle"></ion-icon>
            <span>${item.incart}</span>
            <ion-icon class="increase" name="arrow-dropright-circle"></ion-icon>
            
            </div>
            <div class="total">
            ${item.incart * item.price}
            </div>
            
             `;

             
            
            });
        productContainer.innerHTML +=`
        <div class="basketTotalContainer">
        <h4 class="basketTotalTitle">Basket Total
        </h4>
        <h4 class="basketTotal">${cartCost}</h4>
        `;
        

    }

}
onLoadCartNumbers();
displayCart();