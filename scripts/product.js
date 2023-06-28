window.onload=function(){

var button= document.getElementById('left');
button.onclick=function(){

var container=document.getElementById('box');
sideScroll(container,'left',25,1000,10);
};

var back=document.getElementById('right');
back.onclick=function(){
var container=document.getElementById('box');
sideScroll(container,'right',25,1000,10);

};


function sideScroll(element,direction,speed,distance,step){
var scrollAmount=0;
var slideTimer=setInterval(function(){
if(direction=='left'){
    element.scrollLeft+=step;
}else{

    element.scrollLeft-=step;
}
scrollAmount+=step;
if (scrollAmount>=distance){
    window.clearInterval(slideTimer);
}

},speed);


};



}


function myFunction(prodid,Qty){
    var elements=document.querySelectorAll(".element");
    for (var i=0; i<elements.length;i++)
    {   const button=elements[i].querySelector(".click");
        const quantity=elements[i].querySelector("input[type=number]");
        var id=elements[i].id.toString();
        if(id==prodid){
         quantity.value=Qty;
         var parent= button.parentNode;
         parent.removeChild(button);
         const node = document.createElement("div");
         const textnode = document.createTextNode("ADDED!");
         node.appendChild(textnode);
         parent.appendChild(node);
        
                }
    }
  
    
}
function myFunction1(button)
{

    const div= button.parentNode;
    const form=div.parentNode;
    const node = document.createElement("div");
    const textnode = document.createTextNode("ADDED!");
    button.setAttribute('type', 'hidden');
    form.submit();
    div.removeChild(button);
    div.appendChild(node);
    node.appendChild(textnode);
   
  
}

function myFunction2(select){
    const div= select.parentNode.parentNode;
    if(div.lastElementChild.nodeName=="DIV")
    {
        const form=div.parentNode;
        select.setAttribute('type', 'hidden');
        form.submit();
        select.setAttribute('type', 'number');

    }
}