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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/components/Utils.js":
/*!******************************************!*\
  !*** ./resources/js/components/Utils.js ***!
  \******************************************/
/*! exports provided: randomNum, cursorIntoArrows, keepLinksActive */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "randomNum", function() { return randomNum; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "cursorIntoArrows", function() { return cursorIntoArrows; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "keepLinksActive", function() { return keepLinksActive; });
// generate random num
var randomNum = function randomNum(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}; // cursor into arrows on home page

function cursorIntoArrows(e) {
  var positionX = e.offsetX / window.innerWidth - 0.5;
  var b = document.body;
  return positionX >= 0 ? b.className = "right-arr" : b.className = "left-arr";
} // links: prevent default if '#' and add active class if current page

function keepLinksActive() {
  var anchorTags = document.querySelectorAll("a");
  var currentUrl = window.location.pathname;
  anchorTags.forEach(function (element) {
    var anchorAttr = element.getAttribute("href");
    element.addEventListener("click", function (e) {
      if (anchorAttr === "#") {
        // this is for removing # from url
        e.preventDefault();
      } else {
        // this is for smooth transition between pages
        var thisTargetUrl = e.target.href;
        e.preventDefault();
        setTimeout(function () {
          document.querySelector(".main").classList.remove("main__on-load");
          window.location = thisTargetUrl;
        }, 250);
      }
    });

    if (anchorAttr == currentUrl) {
      element.closest("a").classList.add("active");
    }
  });
}

/***/ }),

/***/ "./resources/js/components/common/Bubbles.js":
/*!***************************************************!*\
  !*** ./resources/js/components/common/Bubbles.js ***!
  \***************************************************/
/*! exports provided: runBubbles, stopBubbles */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "runBubbles", function() { return runBubbles; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "stopBubbles", function() { return stopBubbles; });
/* harmony import */ var _Utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../Utils */ "./resources/js/components/Utils.js");


function createBubbles() {
  var area = document.querySelector(".nav__brand");
  var bubble = document.createElement("span");
  var maxWidth = area.offsetWidth * 0.9;
  var size = Object(_Utils__WEBPACK_IMPORTED_MODULE_0__["randomNum"])(15, 50);
  bubble.className = "b";
  bubble.style.width = 5 + size + "px";
  bubble.style.height = 5 + size + "px";
  bubble.style.left = Math.random() * maxWidth + "px";
  area.appendChild(bubble);
  setTimeout(function () {
    bubble.remove();
  }, 3000);
}

var interval = null;

var runBubbles = function runBubbles() {
  return interval = setInterval(createBubbles, 300);
};

var stopBubbles = function stopBubbles() {
  return clearInterval(interval);
};



/***/ }),

/***/ "./resources/js/components/main/CursorIntoBubble.js":
/*!**********************************************************!*\
  !*** ./resources/js/components/main/CursorIntoBubble.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return cursorIntoBubble; });
// cursor into bubble on hover
function cursorIntoBubble(targets) {
  window.addEventListener('mousemove', listenToCursorMove);
  var cursor = document.getElementById('cursor');

  function listenToCursorMove(e) {
    cursor.style.top = e.pageY + 'px';
    cursor.style.left = e.pageX + 'px';
  }

  targets.forEach(function (l) {
    l.addEventListener('mouseover', function () {
      cursor.classList.add('grow');
    });
    l.addEventListener('mouseleave', function () {
      cursor.classList.remove('grow');
    });
  });
}

/***/ }),

/***/ "./resources/js/components/main/ToggleMenu.js":
/*!****************************************************!*\
  !*** ./resources/js/components/main/ToggleMenu.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return toggleMenu; });
/* harmony import */ var _common_Bubbles__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../common/Bubbles */ "./resources/js/components/common/Bubbles.js");
 // menu trigger / brand

function toggleMenu() {
  var brand = document.querySelector(".brand");
  var menu = document.querySelector(".nav");
  var cursor = document.getElementById("cursor");
  brand.addEventListener("click", function (e) {
    Object(_common_Bubbles__WEBPACK_IMPORTED_MODULE_0__["runBubbles"])();
    brand.classList.add("hide");
    menu.classList.add("show");
    if (cursor) cursor.classList.remove("cursor");
    document.body.classList = "no-arr";
  });
  document.querySelector(".nav__close").addEventListener("click", function (e) {
    e.stopPropagation();
    Object(_common_Bubbles__WEBPACK_IMPORTED_MODULE_0__["stopBubbles"])();
    brand.classList.remove("hide");
    menu.classList.remove("show");
    if (cursor) cursor.classList.add("cursor");
  });
}

/***/ }),

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_main_ToggleMenu__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/main/ToggleMenu */ "./resources/js/components/main/ToggleMenu.js");
/* harmony import */ var _components_main_CursorIntoBubble__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/main/CursorIntoBubble */ "./resources/js/components/main/CursorIntoBubble.js");
/* harmony import */ var _components_Utils__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/Utils */ "./resources/js/components/Utils.js");



document.addEventListener("DOMContentLoaded", function () {
  Object(_components_main_ToggleMenu__WEBPACK_IMPORTED_MODULE_0__["default"])();
  Object(_components_Utils__WEBPACK_IMPORTED_MODULE_2__["keepLinksActive"])();
  document.querySelector(".main").classList.add("main-loaded"); // home page

  if (document.querySelector(".wrapper.home")) {// const swiper = new Swiper('.swiper-container', {
    // 	effect: 'fade',
    // 	speed: 1500,
    // 	observer: true,
    // 	observeParents: true,
    // 	loop: true,
    // 	autoplay: {
    // 		delay: 4000,
    // 		disableOnInteraction: false
    // 	},
    // });
    // document.addEventListener('mousemove', cursorIntoArrows);
    // document.addEventListener('click', () => {
    // 	return document.body.classList == 'left-arr' ? swiper.slidePrev() : swiper.slideNext();
    // });
  } // pomeranians page


  if (document.querySelector(".wrapper.poms")) {
    var galleryItems = document.querySelectorAll(".gallery-item");
    Object(_components_main_CursorIntoBubble__WEBPACK_IMPORTED_MODULE_1__["default"])(galleryItems);
    galleryItems.forEach(function (el) {
      el.style.width = randomNum(10, 20) + "%";
      el.style.height = randomNum(300, 500) + "px";
      el.style.marginTop = randomNum(5, 105) + "px";
    });
  }
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**************************************************************!*\
  !*** multi ./resources/js/main.js ./resources/sass/app.scss ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\bofc\resources\js\main.js */"./resources/js/main.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\bofc\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });