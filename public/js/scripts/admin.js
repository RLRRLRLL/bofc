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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_Utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/Utils */ "./resources/js/components/Utils.js");
/* harmony import */ var _components_admin_Burger__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/admin/Burger */ "./resources/js/components/admin/Burger.js");


document.addEventListener("DOMContentLoaded", function () {
  Object(_components_Utils__WEBPACK_IMPORTED_MODULE_0__["keepLinksActive"])();
  Object(_components_admin_Burger__WEBPACK_IMPORTED_MODULE_1__["default"])();
});

/***/ }),

/***/ "./resources/js/components/Utils.js":
/*!******************************************!*\
  !*** ./resources/js/components/Utils.js ***!
  \******************************************/
/*! exports provided: query, queryAll, randomNum, cursorIntoArrows, keepLinksActive, smoothScroll, classToggler */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "query", function() { return query; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "queryAll", function() { return queryAll; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "randomNum", function() { return randomNum; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "cursorIntoArrows", function() { return cursorIntoArrows; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "keepLinksActive", function() { return keepLinksActive; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "smoothScroll", function() { return smoothScroll; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "classToggler", function() { return classToggler; });
// aliases for js selectors
var query = document.querySelector.bind(document);
var queryAll = document.querySelectorAll.bind(document); // generate random num

var randomNum = function randomNum(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}; // cursor into arrows on home page

function cursorIntoArrows(e) {
  var positionX = e.offsetX / window.innerWidth - 0.5;
  var b = document.body;
  return positionX >= 0 ? b.className = "right-arr" : b.className = "left-arr";
} // links: prevent default if '#' and add active class if current page

function keepLinksActive() {
  var anchorTags = queryAll("a");
  var currentUrl = window.location.pathname;
  anchorTags.forEach(function (element) {
    var anchorAttr = element.getAttribute("href");
    var cropped;
    element.addEventListener("click", function (e) {
      if (anchorAttr === "#") {
        // this is for removing # from url
        e.preventDefault();
      } else {
        // this is for smooth transition between pages
        var thisTargetUrl = e.target.href;
        e.preventDefault();
        setTimeout(function () {
          document.querySelector(".main").classList.remove("main-loaded");
          window.location = thisTargetUrl;
        }, 250);
      }
    });

    if (anchorAttr.includes("//localhost:3000")) {
      cropped = anchorAttr.replace("//localhost:3000", "");
    } else if (anchorAttr.includes("//bubblesofchampain.com")) {
      cropped = anchorAttr.replace("//bubblesofchampain.com", "");
    }

    if (cropped == currentUrl || anchorAttr == currentUrl) {
      element.closest("a").classList.add("active");
    }
  });
} // scroll to section

function smoothScroll() {
  var aboutTrigger = query(".stripes"),
      backToTop = query("#backToTop");

  function scrollToSection(trigger) {
    trigger.addEventListener("click", function (e) {
      e.preventDefault();
      var thisAttr = this.getAttribute("data-target"),
          target = document.querySelector(thisAttr),
          targetPos = target.offsetTop,
          startPos = window.pageYOffset,
          distance = targetPos - startPos,
          duration = 700;
      var start = null;
      window.requestAnimationFrame(step);

      function step(timestamp) {
        if (!start) start = timestamp;
        var progress = timestamp - start;
        window.scrollTo(0, exponentialEasing(progress, startPos, distance, duration));
        if (progress < duration) window.requestAnimationFrame(step);
      }
    });
  } // element which will be clicked passed to fn


  scrollToSection(backToTop);
  scrollToSection(aboutTrigger); // easing fns reference: http://www.gizma.com/easing/

  function exponentialEasing(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
    t--;
    return c / 2 * (-Math.pow(2, -10 * t) + 2) + b;
  }
} // class toggler

function classToggler(el, className) {
  if (el.classList.contains(className)) {
    el.classList.remove(className);
  } else {
    el.classList.add(className);
  }
}

/***/ }),

/***/ "./resources/js/components/admin/Burger.js":
/*!*************************************************!*\
  !*** ./resources/js/components/admin/Burger.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Burger; });
/* harmony import */ var _Utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../Utils */ "./resources/js/components/Utils.js");

function Burger() {
  var burgerTrigger = Object(_Utils__WEBPACK_IMPORTED_MODULE_0__["query"])(".burger");
  var grid = Object(_Utils__WEBPACK_IMPORTED_MODULE_0__["query"])(".grid");
  burgerTrigger.addEventListener("click", function (e) {
    e.preventDefault();
    grid.classList.toggle("nav-close");
  });
}

/***/ }),

/***/ 1:
/*!*************************************!*\
  !*** multi ./resources/js/admin.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/bofc/resources/js/admin.js */"./resources/js/admin.js");


/***/ })

/******/ });