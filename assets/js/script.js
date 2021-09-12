// ---------------------------------------------------------------------------------------------
    /* CHANGEMENT ICÔNE BURGER */
    var imageBurger = document.getElementsByClassName('mobile');
    console.log(imageBurger);

    var navBar = document.getElementsByTagName ('nav');
    console.log(navBar);

    imageBurger[0].addEventListener('click', ouvreMenu);

    function ouvreMenu() {
        if(navBar[0].style.display=='none'){
            navBar[0].style.display='block';
            imageBurger[0].src="assets/img/close.png";
        } else{
            navBar[0].style.display='none';
            imageBurger[0].src="assets/img/burger.png";
        }
    }
