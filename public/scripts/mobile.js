function mobileMenu(event){
    const modale = document.querySelector('#modale');
    const div1 = document.createElement('div');
    const div2 = document.createElement('div');
    const div3 = document.createElement('div');
    modale.appendChild(div1);
    modale.appendChild(div2);
    modale.appendChild(div3);
    /**
        <a href = "{{asset('favorites')}}">Preferiti</a>
        <a  href="{{asset('logged_home/')}}">Home</a>
        <a  href="{{asset('home')}}">LOGOUT</a>
     */
    const link1 = document.createElement('a');
    link1.href = BASE_URL + '/logged_home/';
    link1.innerText = "Home";
    div1.appendChild(link1);
    const link2 = document.createElement('a');
    link2.href = BASE_URL + '/favorites';
    link2.innerText = "Preferiti";
    div2.appendChild(link2);
    const link3 = document.createElement('a');
    link3.href = BASE_URL + '/home';
    link3.innerText = "Logout";
    div3.appendChild(link3);

    document.body.classList.add('no-scroll');
    modale.classList.remove('hidden');
    modale.addEventListener('click', chiudiModale);
}

const mobile_button = document.querySelector('#menu');
mobile_button.addEventListener('click', mobileMenu);
