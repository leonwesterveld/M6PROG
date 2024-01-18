
function FormToDictionary(form) {
    const data = new FormData(form);
    let formKeyValue = {};
    for (const [name, value] of data) {
        formKeyValue[name] = value;
    }
    return formKeyValue;
}

let imageForm = document.getElementById("imageForm");

imageForm.addEventListener("submit", (event) => {
    event.preventDefault();
    uploadFromFile(event);
});

function uploadFromFile(event) {
    let form = event.target;
    let options = 
    {
        method: "POST",
        body: new FormData(form)
    }

    fetch("imagereceive.php", options)
    .then(async (response) => {
        console.log(response);
        let json = await response.json();
        console.log(json);
        showLink(json)
    });
}

function showLink(json) {
    var link = document.getElementById("link");
    link.textContent = "download het plaatje"
    link.setAttribute("href", json.downloadlink)
}