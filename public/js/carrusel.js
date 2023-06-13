function initCarousel() {
    var carouselContainer = document.querySelector(".carousel-container");
    var slides = document.querySelectorAll(".slide");
    var currentSlide = 0;
    var slideWidth = slides[0].clientWidth;

    function showSlide(n) {
        if (n < 0) {
            currentSlide = slides.length - 1;
        } else if (n >= slides.length) {
            currentSlide = 0;
        } else {
            currentSlide = n;
        }

        carouselContainer.style.transform = "translateX(-" + currentSlide * slideWidth + "px)";
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function previousSlide() {
        showSlide(currentSlide - 1);
    }

    showSlide(currentSlide);

    var prevButton = document.querySelector(".prev");
    var nextButton = document.querySelector(".next");

    prevButton.addEventListener("click", previousSlide);
    nextButton.addEventListener("click", nextSlide);
}

document.addEventListener("DOMContentLoaded", function() {
    initCarousel();
});