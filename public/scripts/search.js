function onJson(json){
    console.log(json);
}
function onSearch(event){
    event.preventDefault();
    const content = document.querySelector('#barra').value;
    console.log(content);
    window.open(BASE_URL + "/search/" + content, "_self");
    document.querySelector('#barra').value = '';
}

travel_search = document.querySelector('#search_content');
travel_search.addEventListener('submit', onSearch);
