function show_user_error(){

    let id = null;
    const elem = document.getElementById("error");  
    elem.innerHTML="<i class='fa fa-times-circle'></i>"+"Username is already used!"+"<span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span> "
    elem.style.display="block";
    let pos = 0;
    clearInterval(id);
    id = setInterval(frame, 5);
    function frame() {
      if (pos == 300) {
        clearInterval(id);
      } else {
        pos+=3; 
        elem.style.right = pos + "px"; 
      }
    }

}

function show_email_error(){

    let id = null;
    const elem = document.getElementById("error");  
    elem.innerHTML="<i class='fa fa-times-circle'></i>"+"Email is already used!"+ "<span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span> ";
    elem.style.display="block";
    let pos = 0;
    clearInterval(id);
    id = setInterval(frame, 5);
    function frame() {
      if (pos == 300) {
        clearInterval(id);
      } else {
        pos+=3; 
        elem.style.right = pos + "px"; 
      }
    }

}
function show_data_error(){

  let id = null;
  const elem = document.getElementById("error");  
  elem.innerHTML="<i class='fa fa-times-circle'></i>"+"Please enter some valid data!"+"<span class='closebtn' onclick=this.parentElement.style.display='none';>&times;</span> ";
  elem.style.display="block";
  let pos = 0;
  clearInterval(id);
  id = setInterval(frame, 5);
  function frame() {
    if (pos == 300) {
      clearInterval(id);
    } else {
      pos+=3; 
      elem.style.right = pos + "px"; 
    }
  }
  
}