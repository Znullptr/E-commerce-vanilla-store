function myFunction(button){
const li=button.parentNode.parentNode;
button.setAttribute('type', 'hidden');
const form=li.parentNode;
const ul=form.parentNode;
 const price=Number(li.querySelector(".price").firstElementChild.textContent.trim().substring(1));
 const quantity=Number(li.querySelector("input[type=number]").value);
const x=Number(document.getElementById("items").textContent.trim());
document.getElementById("items").textContent=(x-quantity)+' ';
const y= Number(document.getElementById("total").textContent.trim().substring(1));
document.getElementById("total").textContent='$'+(y-price*quantity).toFixed(2);
form.submit();
button.setAttribute('type', 'button');
ul.removeChild(form);
let num=ul.childElementCount;
if(num==0)
{
  
  ul.innerHTML="<h2 style='width:100%;height:150px; text-align:center;margin-top:50px;'> There are no products in the cart </h2>";
}

}
function myFunction1(select){
    const form=select.parentNode.parentNode.parentNode.parentNode;
    const prices=document.querySelectorAll(".price");
    var nb_items=0;
    var total=0;
    var ar=document.querySelectorAll("input[type=number]");
    for(var i=0;i<ar.length;i++)
    {
        nb_items+=Number(ar[i].value);
        var price=Number(prices[i].querySelector("b").textContent.trim().substring(1));
        total+=Number(ar[i].value)*Number(price);
      
    }
    document.getElementById("total").textContent='$'+total.toFixed(2);
    document.getElementById("items").textContent=nb_items+' '; 
    select.setAttribute('type', 'hidden');
    form.submit();
    select.setAttribute('type', 'number');

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