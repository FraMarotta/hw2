function onJsonSearch(json) {
    //console.log(json);
    if(json.hits.length){
        const dim = 0;
        for(let i = 0; i < json.hits.length; i++ ){
            main_div = document.querySelector('.slideshow-container');

            div = document.createElement('div');
            div.classList.add('mySlides');
            div.classList.add('fade');
            main_div.appendChild(div);

            number = document.createElement('div');
            number.classList.add('numbertext');
            number.innerHTML = i+1 + "/" + json.hits.length;
            div.appendChild(number);

            img = document.createElement('img');
            img.style = "width:100%";
            img.src = json.hits[i].webformatURL;
            div.appendChild(img);

        } showSlides(slideIndex);
    } else {
            h = document.createElement('h3');
            h.innerHTML = 'Nessuna immagine trovata';
            document.querySelector('body').appendChild(h);
    }
}
function onResponse(response) {
    //console.log(response);
    return response.json();
}
const meta = document.querySelector('#hiddenInfo').value;
//console.log(meta); //funziona!
let slideIndex = 1;
fetch(BASE_URL + "/search_imgs/" + meta).then(onResponse).then(onJsonSearch);



// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}
