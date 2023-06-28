window.onload=function(){
    const rate=document.querySelector("h4");
    let ar=Array.from(rate.children);
    const n= parseInt(rate.getAttribute("rate"));
    for(var i=0;i<n;i++)
    {
        ar[i].style.color="yellow";
    }
}

function myFunction1(select){
    const price=Number(document.getElementById("price").textContent.trim().substring(1));
    var nb_items=Number(select.value);
    var total=nb_items*price;
    document.getElementById("total").textContent='$'+total.toFixed(2);
    let add=document.querySelector(".add");
    if(add.getAttribute("name")=="To cart")
    {
        const form=add.parentNode;
        select.setAttribute('type', 'hidden');
        form.submit();
        select.setAttribute('type', 'number');

    }

        }

function myFunction2(add){
    if(add.getAttribute("name")=="add")
    {
    const form=add.parentNode;
    add.style.backgroundColor="white";
    add.value="Go To Cart";
    add.setAttribute('type', 'hidden');
    form.submit();
    add.setAttribute('type', 'button');
    add.setAttribute("name","To cart");

    }
    else{
        window.location.replace("Cart.php");
    }
    

}

function changeToCartlogo(){
    let button=document.querySelector("input[type=button]");
    button.style.backgroundColor="white";
    button.value="Go To Cart";
    button.setAttribute("name","To cart");

}
function change (element) {
    element.style.color="red";
    element.style.fontSize="20px";
  }
  function normal (element) {
    element.style.color="blue";
    element.style.fontSize="18px";
  }
function login_alert(){
Swal.fire({
    icon: 'info',
    title: 'Oops...',
    text: 'You must be logged in to perform this action!',
    footer: '<a style="color:blue; font-size:18px " href="./Login.php" onmouseover="change(this)" onmouseout="normal(this)"  >Log Me In?</a>'
  })
}
function success_alert(){
    const form=document.getElementById("myForm");
    form.removeAttribute("target");
  
      }