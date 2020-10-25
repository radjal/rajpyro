/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./addons/default/rajv3/spa-theme/resources/js/utilities/gallery-multiboxslides.js":
/*!*****************************************************************************************!*\
  !*** ./addons/default/rajv3/spa-theme/resources/js/utilities/gallery-multiboxslides.js ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* 
 * https://www.w3schools.com/howto/howto_js_lightbox.asp
 */
var slideBoxIndex = 1;
var slideSelectedModal = false;

function launchSlides() {
  var n = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
  var id = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "myModal";
  openSlidesModal(id);
  currentBoxSlide(n);
}

function openSlidesModal() {
  var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : slideSelectedModal;
  slideSelectedModal = id;
  document.getElementById(id).style.display = "block";
}

function closeSlidesModal() {
  var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : slideSelectedModal;
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
  var slides = document.querySelectorAll('#' + slideSelectedModal + ' .myBoxSlides'); //var slides = document.getElementsByClassName("myBoxSlides"); 

  if (slides.length <= 0) return; //if( typeof slides === 'undefined' ) return;

  var dots = document.querySelectorAll('#' + slideSelectedModal + ' .box-slide'); //  var dots = document.getElementsByClassName("demo");

  var captionText = document.querySelectorAll('#' + slideSelectedModal + ' .box-caption'); //  var captionText = document.getElementById("box-caption");

  if (n > slides.length) {
    slideBoxIndex = 1;
  }

  if (n < 1) {
    slideBoxIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideBoxIndex - 1].style.display = "block";
  dots[slideBoxIndex - 1].className += " active";
  captionText.innerHTML = dots[slideBoxIndex - 1].alt;
}

/***/ }),

/***/ 3:
/*!***********************************************************************************************!*\
  !*** multi ./addons/default/rajv3/spa-theme/resources/js/utilities/gallery-multiboxslides.js ***!
  \***********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\radjav3\addons\default\rajv3\spa-theme\resources\js\utilities\gallery-multiboxslides.js */"./addons/default/rajv3/spa-theme/resources/js/utilities/gallery-multiboxslides.js");


/***/ })

/******/ });