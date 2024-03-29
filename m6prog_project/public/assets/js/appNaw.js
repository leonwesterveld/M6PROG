
function FormToDictionary(form) {
    const data = new FormData(form);
    let formKeyValue = {};
    for (const [name, value] of data) {
        formKeyValue[name] = value;
    }
    return formKeyValue;
}

let nawForm = document.getElementById("nawForm");

nawForm.addEventListener("submit", (event) => {
    event.preventDefault();
    addPerson(event);
});

function addPerson(event) {
    let form = event.target;
    let jsonForm = FormToDictionary(form);
    console.log(jsonForm);
    
    let options = {
        method: "POST",
        cache: "no-cache",
        header: { "Content-Type": "application/json" },
        body: JSON.stringify(jsonForm),
    };
    
    fetch("nawOpslaan.php", options)
    .then((response) => response.json())
    .then((data) => {
        if (false === data.success) {
            document.getElementById("error").textContent = data.error;

            return false;
        }
        if (true === data.success) { 
            document.getElementById("error").textContent = "";
        }

            console.log("Je data is toegevoegd met id:" + data.id);
        });
}
