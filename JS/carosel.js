var slideIndex = 0;

function setup() {
    document.getElementById("flightNumber").addEventListener("keyup", validateFlight);
    showSlides(slideIndex);
}
// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function validateFlight() {
    let code = document.getElementById("flightNumber").value;
    if (((! isNaN(code)) || code.length == 0) && code.length <=3 ) {
        console.log("VALID");
        document.getElementById("code-error").style.display = "none";
        return true;
    } else {
        console.log("INVALID");
        document.getElementById("code-error").style.display = "inline";
        return false;
    }
}

function showSlides(n) {

    var slides = document.getElementsByClassName("slide");

    if (n > slides.length-1) {slideIndex = slides.length-1}
    if (n < 0) {slideIndex = 0}

    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    if (slideIndex == slides.length-1) {
        document.getElementById("nextButton").disabled = true;
        document.getElementById("nextButton").style.opacity = 0.5;
        if (validateFlight()) {
            document.getElementById("addFlight").style.opacity = 1;
            document.getElementById("addFlight").disabled = false;
        } else {
            document.getElementById("addFlight").style.opacity = 0.5;
            document.getElementById("addFlight").disabled = true;
        }
    } else {
        document.getElementById("nextButton").disabled = true;
        document.getElementById("nextButton").style.opacity = 1;
        document.getElementById("addFlight").style.opacity = 0.5;
        document.getElementById("addFlight").disabled = true;
    }

    if (slideIndex == 0) {
        document.getElementById("previousButton").disabled = true;
        document.getElementById("previousButton").style.opacity = 0.5;
    } else {
        document.getElementById("previousButton").disabled = false;
        document.getElementById("previousButton").style.opacity = 1;
    }

    slides.item(slideIndex).style.display = "block";
}

window.addEventListener("load", setup());