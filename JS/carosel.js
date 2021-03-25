var slideIndex = 0;

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {

    var slides = document.getElementsByClassName("slide");

    if (n > slides.length-1) {slideIndex = slides.length-1}
    if (n < 0) {slideIndex = 0}

    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    if (slideIndex == slides.length-1) {
        document.getElementById("addFlight").style.display = "block";
    } else {
        document.getElementById("addFlight").style.display = "none";
    }

    slides.item(slideIndex).style.display = "block";
}

window.addEventListener("load", showSlides(slideIndex));