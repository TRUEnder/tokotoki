// fitting image

var frame = document.getElementsByClassName("product-photo");

console.log(frame);

for (var i = 0; i < frame.length; i++) {
    var image = frame[i].getElementsByTagName("img");
    console.log(image);
    var natural_width = image[0].naturalWidth;
    var natural_height = image[0].naturalHeight;

    var frame_width = frame[i].clientWidth;
    var frame_height = frame[i].clientHeight;

    width_gap = Math.abs(frame_width - natural_width);
    height_gap = Math.abs(frame_height - natural_height);

    if (width_gap <= height_gap) {
        image[0].style.width = "auto";
        image[0].style.height = "100%";
    } else {
        image[0].style.width = "100%";
        image[0].style.height = "auto";
    }
}

var slideIndex = 1;
category = [
    'foods',
    'shampoo',
    'accessories',
    'medicine',
    'others'
]

for (i = 0; i < category.length; i++) {
    showSlides(slideIndex, category[i]);
}

// Next/previous controls
function plusSlides(n, target) {
    showSlides(slideIndex += n, target);
}

// Thumbnail image controls
function currentSlide(n, target) {
    showSlides(slideIndex = n, target);
}

function showSlides(n, target) {
    var i;
    var category = document.getElementById(target);
    var slides = category.getElementsByClassName("slide");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    index = slideIndex;

    for (i = 0; i < 5; i++) {
        if (index > slides.length) { index = 1; }

        console.log(slides[index - 1].textContent);
        slides[index - 1].style.order = i + 1;
        slides[index - 1].style.display = "flex";

        index += 1;
    }
}