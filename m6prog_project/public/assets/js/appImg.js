
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
    .then((response) => response.json())
    .then((data) => {
        if (true === data.succeeded) { 
            console.log("ja geupload");
        }
        if (false === data.succeeded) {
            console.log("nee ging iets fout");
        }
    });
}