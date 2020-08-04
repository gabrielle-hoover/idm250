window.onresize = adjustMenu;
window.onload = setMenu;

function setMenu() {
    if(window.innerWidth < 480) {
        document.getElementById("my_site_header_nav").classList.add('visible');
    }
}

function adjustMenu() {
    if(window.innerWidth > 480) {
        document.getElementById("my_site_header_nav").classList.remove('visible');
    }
    if(window.innerWidth < 480) {
        document.getElementById("my_site_header_nav").classList.add('visible');
        document.getElementById("navbg").classList.remove('visible');
    }
}

function toggleFunction(e){
  //e.target.classList.toggle('open');
  document.getElementById("nav_icon_burger_x").classList.toggle('open');
  document.getElementById("my_site_header_nav").classList.toggle('visible');
}

