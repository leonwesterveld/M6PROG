let searchFormulier = document.getElementById('searchForm');

function searchPersoon(event) {
    event.preventDefault();
    let form = event.target;
    const data = new FormData(form);
    let url = "searchNaw.php?searchPersoon=" + data.get("searchPersoon");
    console.log(url);

    fetch(url)
        .then(async (response) => {
            let json = await response.json();
            console.log(json);
            showPersoon(json);
        });
}

searchFormulier.addEventListener('submit', (event) => {
    searchPersoon(event);
});

function showPersoon(json) {
    let person = json[0];
    document.getElementById("naam").textContent = person.naam;
    document.getElementById("id").textContent = person.idnaw;
    document.getElementById("straat").textContent = person.straat;
    document.getElementById("huisnummer").textContent = person.huisnummer;
    document.getElementById("postcode").textContent = person.postcode;
    document.getElementById("email").textContent = person.email;
    console.log(person);
}