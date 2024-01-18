import { WebCamHelper } from "./webcamhelper";

class WebCamApp{
    constructor() {
        this.imageForm = document.getElementById("imageForm");
        this.link = document.getElementById("link");
        this.webapi = new WebCamHelper();
    }
    Init() {
        this.webapi.startApi();
        this.imageForm = addEventListener("submit", (event) => {
            event.preventDefault();
            this.TakePhotoClicked();
        });
    }
}

function TakePhotoClicked() {
    if (this.webapi.ready) {
        this.CapturePhoto();
    }
}

function CapturePhoto() {
    this.webapi.GrabFrame(async (imageBitmap) =>
    {
        let imageBlob = await this.webapi.GrabFrameToCanvas(imageBitmap, "canvas");
        this.SendBlob(imageBlob);
    })
}

function SendBlob() {
    let formData = new FormData();
    formData.append("image", imageBlob, "image.png");

    let options = {
        method: 'POST',
        Body: formData
    };

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

let application = new WebCamApp()
application.Init();