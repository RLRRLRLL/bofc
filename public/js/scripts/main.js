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

// bubble on cursor
var cursor = document.querySelector('.cursor');
var nav_links = document.querySelectorAll('.nav__top li');
window.addEventListener('mousemove', listenToCursorMove);

function listenToCursorMove(e) {
  cursor.style.top = e.pageY + 'px';
  cursor.style.left = e.pageX + 'px';
}

nav_links.forEach(function (l) {
  l.addEventListener('mouseover', function () {
    cursor.classList.add('grow');
  });
  l.addEventListener('mouseleave', function () {
    cursor.classList.remove('grow');
  });
}); // slider

var swiper = new Swiper('.swiper-container', {
  effect: 'fade',
  speed: 1500,
  observer: true,
  observeParents: true,
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false
  }
});
$(document).mousemove(function (event) {
  // Detect mouse position
  var xPos = event.clientX / $(window).width() - 0.5; // var yPos = (event.clientY / $(window).height()) - 0.5;

  if (xPos >= 0) {
    document.body.classList.remove('left-arr');
    document.body.classList.add('right-arr');
  } else {
    document.body.classList.add('left-arr');
    document.body.classList.remove('right-arr');
  }
});
$('body').on('click', function (e) {
  if ($('body').hasClass('left-arr')) {
    swiper.slidePrev();
  } else if ($('body').hasClass('right-arr')) {
    swiper.slideNext();
  }
}); // menu trigger / brand 

var brand = document.querySelector('.brand');
var menu = document.querySelector('.nav');
var closeMenu = document.querySelector('.nav__close');
brand.addEventListener('click', function (e) {
  e.stopPropagation();
  brand.classList.add('hide');
  menu.classList.add('show');
});
closeMenu.addEventListener('click', function (e) {
  e.stopPropagation();
  brand.classList.remove('hide');
  menu.classList.remove('show');
});

/***/ }),

/***/ "./resources/sass/admin/admin.scss":
/*!*****************************************!*\
  !*** ./resources/sass/admin/admin.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/main/main.scss":
/*!***************************************!*\
  !*** ./resources/sass/main/main.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!******************************************************************************************************!*\
  !*** multi ./resources/js/main.js ./resources/sass/main/main.scss ./resources/sass/admin/admin.scss ***!
  \******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\bofc\resources\js\main.js */"./resources/js/main.js");
__webpack_require__(/*! C:\xampp\htdocs\bofc\resources\sass\main\main.scss */"./resources/sass/main/main.scss");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\bofc\resources\sass\admin\admin.scss */"./resources/sass/admin/admin.scss");


/***/ })

/******/ });