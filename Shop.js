function opendiv(){

    const div = document.getElementById("myDiv");
    if (div.style.display == "none"){
      { div.style.display = "block";
      }
    }else{
        div.style.display = "none";
    }
return false;
}


function search(){
    const searchbox=document.getElementById("search-item").value.toUpperCase();
    const store=document.getElementById("store-products");
    const product=store.querySelectorAll(".product");
    const node = document.createElement("h3");
    node.textContent='There are no such products';  
    let elem=store.lastElementChild;
    if(elem.classList.contains("no-products"))
    {
        store.removeChild(elem);
        store.style.display="grid";

    }  
    var count=0;
    for (var i=0; i<product.length ; i++)
      {   
             
   let match=product[i].getElementsByTagName("a")[0];
                                                                
if(match)
{

    let textvalue=match.textContent || match.innerHTML;

    if(textvalue.toUpperCase().indexOf(searchbox) > -1)
    {
        
        product[i].style.display="";

    }
else 
{
    product[i].style.display="none";
    count++;
    

}

}

      }
  

 if(count==product.length)

      {
        store.style.display="block";
        node.classList.add("no-products");
        store.appendChild(node);
        
      }

   

}
window.onload=function(){
const all=document.getElementById("all");
const deluxe=document.getElementById("deluxe");
const promoted=document.getElementById("promoted");
const t=document.getElementById("title");
all.onclick=function(){
    t.innerHTML="List Of Products";
    if(all.classList.contains("Active")==false)
   { all.classList.add("Active");
if(deluxe.classList.contains("Active"))
{
    deluxe.classList.remove("Active");
}
if(promoted.classList.contains("Active"))
{
    promoted.classList.remove("Active");
}
}

}

promoted.onclick=function(){
    t.innerHTML="Top Of Our Deals";
    if(promoted.classList.contains("Active")==false)
   { promoted.classList.add("Active");
if(deluxe.classList.contains("Active"))
{
    deluxe.classList.remove("Active");
}
if(all.classList.contains("Active"))
{
    all.classList.remove("Active");
}

}

}

deluxe.onclick=function(){
   t.innerHTML="Only Luxuary Products"
    if(deluxe.classList.contains("Active")==false)
   { deluxe.classList.add("Active");
if(promoted.classList.contains("Active"))
{
    promoted.classList.remove("Active");
}
if(all.classList.contains("Active"))
{
    all.classList.remove("Active");
}

}

}



const menu=document.getElementById("menu");
const btns=menu.getElementsByTagName("a");
for(var i=0; i<btns.length ; i++ )
{
    btns[i].addEventListener("click", (e)=> {

e.preventDefault();
const filter=e.target.dataset.filter;
categorie.value=filter;
show_product();


    })

}
let container=document.getElementById("store-products");
let products=Array.from(container.children);
let select=document.getElementById("sort");
let ar=[];

for(let product of products)
{   
if(product.querySelector("p").firstElementChild.textContent=="")
{
    product.querySelector("p").style.display="none";
    product.querySelector("div").style.marginTop="39px";
}

const price=product.lastElementChild;
const x=price.textContent.trim();
const y=Number(x.substring(1));
product.setAttribute("data-price",y);
ar.push(product);


}

select.onchange=function() {
     
    if(this.value==="Default")
    {
        while(container.firstChild)
        {
            container.removeChild(container.firstChild);
        }
      
        container.append(...ar);
    }
    if(this.value==="By Price"){

      SortElem(container,products,true);
    }



      }
     const rates=document.querySelectorAll("h6");
      rates.forEach((rate)=>{
     let ar=Array.from(rate.children);
     const n= parseInt(rate.getAttribute("rate"));
     for(var i=0;i<n;i++)
     {
         ar[i].style.color="yellow";
     }

      })
   

}

function myFunction1() {
    var x=document.getElementById("colors").value;
    const color=document.getElementById("color");
    color.value=x;
    show_product();
    }

function myFunction2() {
    var x=document.getElementById("templates").value;
    const template=document.getElementById("template");
    template.value=x;
    show_product();
    }

function SortElem(container,products,asc){
let dm,sortproduct;
dm=asc ? 1 : -1;
sortproduct=products.sort((a,b)=>{
    const ax=a.getAttribute("data-price");
    const bx=b.getAttribute("data-price");
    return ax > bx ? (1*dm) : (-1*dm);
    
    });


while(container.firstChild)
{
    container.removeChild(container.firstChild);
}
container.append(...sortproduct);

}
function show_product(){
const categorie=document.getElementById("categorie");
const color=document.getElementById("color");
const template=document.getElementById("template");
const products=document.querySelectorAll(".product");
var x = categorie.value;
var y= color.value;
var z= template.value;
products.forEach((product)=>{
if(x=="All"){
    if(y=="All Colors" && z=="All Templates")
    {
    product.style.display="block";
    }
    else if(y=="All Colors")
    {
        if(product.classList.contains(z))
        {
            product.style.display="block";
        }
        else{
            product.style.display="none";
    
        }
    }
    else if(z=="All Templates")
    {
        if(product.classList.contains(y))
        {
            product.style.display="block";
        }
        else{
            product.style.display="none";
    
        }
    }
    else 
    {
        if(product.classList.contains(y) && product.classList.contains(z))
        {
            product.style.display="block";
        }
        else{
            product.style.display="none";
    
        }
    }
}
else if(x=="Promoted" || x=="Deluxe"){
    if(y=="All Colors" && z=="All Templates")
    {
        if(product.classList.contains(x))
        {
            product.style.display="block";
        }
        else{
            product.style.display="none";
    
        }
    }
    else if(y=="All Colors")
    {
        if(product.classList.contains(z) && product.classList.contains(x))
        {
            product.style.display="block";
        }
        else{
            product.style.display="none";
    
        }
    }
    else if(z=="All Templates")
    {
        if(product.classList.contains(y)&& product.classList.contains(x))
        {
            product.style.display="block";
        }
        else{
            product.style.display="none";
    
        }
    }
    else 
    {
        if(product.classList.contains(y) && product.classList.contains(z) && product.classList.contains(x))
        {
            product.style.display="block";
        }
        else{
            product.style.display="none";
    
        }
    }
}
})


    }