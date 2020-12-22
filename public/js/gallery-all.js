/* 
 * https://www.w3schools.com/howto/howto_js_slideshow_gallery.asp
 */
 
var slideIndex = 1; 

//showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if( slides.length <= 0 ) return;
  // if(!slides) return;
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
} 


/* 
 * https://www.w3schools.com/howto/howto_js_lightbox.asp
 */
 
var slideBoxIndex = 1; 
var slideSelectedModal = false; 
  
function launchSlides(n=1, id="myModal") {
	openSlidesModal(id);
	currentBoxSlide(n);
}

function openSlidesModal(id=slideSelectedModal) {
	slideSelectedModal = id;
	document.getElementById(id).style.display = "block";
}

function closeSlidesModal(id=slideSelectedModal) {
	document.getElementById(id).style.display = "none";
	slideSelectedModal = false;
}

function plusBoxSlides(n) {
  showBoxSlides(slideBoxIndex += n);
}

function currentBoxSlide(n) {
  showBoxSlides(slideBoxIndex = n);
}

function showBoxSlides(n) {
  var i;
  var slides = document.querySelectorAll('#'+slideSelectedModal+' .myBoxSlides');
  //var slides = document.getElementsByClassName("myBoxSlides"); 
  if( slides.length <= 0 ) return;
  //if( typeof slides === 'undefined' ) return;
  var dots = document.querySelectorAll('#'+slideSelectedModal+' .box-slide');
//  var dots = document.getElementsByClassName("demo");
  var captionText = document.querySelectorAll('#'+slideSelectedModal+' .box-caption');
//  var captionText = document.getElementById("box-caption");
  if (n > slides.length) {slideBoxIndex = 1}
  if (n < 1) {slideBoxIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideBoxIndex-1].style.display = "block";
  dots[slideBoxIndex-1].className += " active";
  captionText.innerHTML = dots[slideBoxIndex-1].alt;
}