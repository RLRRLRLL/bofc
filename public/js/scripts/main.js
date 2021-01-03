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

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

// links: prevent default if '#' and add active class if current page
var anchorTags = document.querySelectorAll('a');
var currentUrl = window.location.pathname;
anchorTags.forEach(function (element) {
  var anchorAttr = element.getAttribute('href');
  element.addEventListener('click', function (e) {
    if (anchorAttr === '#') {
      // this is for removing # from url
      e.preventDefault();
    } else {
      // this is for smooth transition between pages
      var thisTargetUrl = e.target.href;
      e.preventDefault();
      console.log(thisTargetUrl);
      setTimeout(function () {
        document.querySelector('.main').classList.remove('main__on-load');
        window.location = thisTargetUrl;
      }, 250);
    }
  });

  if (anchorAttr == currentUrl) {
    element.closest('a').classList.add('active');
  }
}); // cursor into bubble on hover

function cursorIntoBubble(targetElements) {
  var cursor = document.querySelector('.cursor');
  var targets = document.querySelectorAll(targetElements);
  window.addEventListener('mousemove', listenToCursorMove);

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
} // generate random num


function randomNum(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

document.addEventListener('DOMContentLoaded', function () {
  document.querySelector('.main').classList.add('main__on-load'); // home page

  if (document.querySelector('.wrapper.home')) {
    console.log('this page is home page');
    var swiperOptions = {
      effect: 'fade',
      speed: 1500,
      observer: true,
      observeParents: true,
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false
      }
    };
    var swiper = new Swiper('.swiper-container', swiperOptions);
    document.addEventListener('mousemove', function (event) {
      var positionX = event.offsetX / window.innerWidth - 0.5;

      if (positionX >= 0) {
        document.body.classList = 'right-arr';
      } else {
        document.body.classList = 'left-arr';
      }
    });
    document.addEventListener('click', function (e) {
      if (document.body.classList === 'left-arr') {
        swiper.slidePrev();
      } else {
        swiper.slideNext();
      }
    });
  } // pomeranians page


  if (document.querySelector('.wrapper.poms')) {
    console.log('there are my poms!'); // gallery
    // const galleryItems = document.querySelectorAll('.gallery__item');
    // galleryItems.forEach((el) => {
    //     // el.style.width = randomNum(10, 20) + '%';
    //     el.style.height = randomNum(300, 500) + 'px';
    //     el.style.marginTop = randomNum(5, 45) + 'px';
    // });
  }
}); /////////////////
////////////////////
// menu trigger / brand 

var brand = document.querySelector('.brand');
var menu = document.querySelector('.nav');
brand.addEventListener('click', function (e) {
  brand.classList.add('hide');
  menu.classList.add('show');
});
document.querySelector('.nav__close').addEventListener('click', function (e) {
  e.stopPropagation();
  brand.classList.remove('hide');
  menu.classList.remove('show');
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