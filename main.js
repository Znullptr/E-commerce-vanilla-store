window.onscroll = function(){
    var stars = document.getElementById('stars');
    var moon = document.getElementById('moon');
    var mountain3 = document.getElementById('mountain3');
    var mountain4 = document.getElementById('mountain4');
    var river = document.getElementById('river');
    var boat = document.getElementById('boat');
    var vanilla = document.querySelector('.vanilla');
    var value = scrollY;
    stars.style.left=value+'px';
    moon.style.top=value*4 +'px';
    mountain3.style.top=value*2+'px';
    mountain4.style.top=value*1.5+'px';
    river.style.top=value+'px';
    boat.style.top=value+'px';
    boat.style.left=value*3+'px';
    vanilla.style.fontSize=value+'px';
    if(scrollY>=67)
    {
      vanilla.style.fontSize=67+'px';
      vanilla.style.position='fixed';
    
    
    if(scrollY>=400)
    {
      vanilla.style.display='none';
    }
    else
    {
      vanilla.style.display='block';
    
    }
    
    if(scrollY>112)
        document.querySelector('.main').style.background='linear-gradient('+'#24406c'+','+'#10001f'+')';
else
    {  
    document.querySelector('.main').style.background='linear-gradient('+'#200016'+','+'#10001f'+')';

    } 

}
}

    