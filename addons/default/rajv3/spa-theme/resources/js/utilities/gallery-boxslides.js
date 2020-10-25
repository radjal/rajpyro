/* 
 * https://www.w3schools.com/howto/howto_js_lightbox.asp
 */
 
var slideBoxIndex = 1; 

function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
} 

function plusBoxSlides(n) {
  showBoxSlides(slideBoxIndex += n);
}

function currentBoxSlide(n) {
  showBoxSlides(slideBoxIndex = n);
}

function showBoxSlides(n) {
  var i;
  var slides = document.getElementsByClassName("myBoxSlides"); 
  if( slides.length <= 0 ) return;
  //if( typeof slides === 'undefined' ) return;
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("box-caption");
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