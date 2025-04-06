/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/frontend/react-js/components/DefaultLayout.jsx":
/*!************************************************************!*\
  !*** ./src/frontend/react-js/components/DefaultLayout.jsx ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "./node_modules/@wordpress/i18n/build-module/index.js");
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-router-dom */ "./node_modules/react-router/dist/index.js");
/* harmony import */ var _FlashMessages__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FlashMessages */ "./src/frontend/react-js/components/FlashMessages.jsx");



var navigationData = [{
  name: 'Home',
  path: '/',
  label: 'Home'
}];
var DefaultLayout = function DefaultLayout() {
  return /*#__PURE__*/React.createElement("div", {
    className: "mxsfwn-react-js-app-container"
  }, /*#__PURE__*/React.createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_2__.Outlet, null), /*#__PURE__*/React.createElement(_FlashMessages__WEBPACK_IMPORTED_MODULE_1__["default"], null));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (DefaultLayout);

/***/ }),

/***/ "./src/frontend/react-js/components/FlashBox/index.js":
/*!************************************************************!*\
  !*** ./src/frontend/react-js/components/FlashBox/index.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   FlashBox: () => (/* binding */ FlashBox)
/* harmony export */ });
var FlashBox = function FlashBox(_ref) {
  var _ref$className = _ref.className,
    className = _ref$className === void 0 ? 'fo-success' : _ref$className,
    children = _ref.children,
    index = _ref.index,
    onClose = _ref.onClose;
  return /*#__PURE__*/React.createElement("div", {
    key: index,
    className: "fo-flash-message ".concat(className)
  }, /*#__PURE__*/React.createElement("div", {
    className: "fo-icon"
  }, className === 'fo-error' ? /*#__PURE__*/React.createElement("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor",
    strokeWidth: "2",
    "aria-hidden": "true",
    className: "error-x-icon"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M18 6L6 18M6 6l12 12"
  })) : className === 'fo-warning' ? /*#__PURE__*/React.createElement("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor",
    strokeWidth: "2",
    "aria-hidden": "true",
    className: "warning-icon"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
  })) : /*#__PURE__*/React.createElement("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor",
    strokeWidth: "2"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M20 6L9 17l-5-5"
  }))), /*#__PURE__*/React.createElement("div", {
    className: "fo-content"
  }, /*#__PURE__*/React.createElement("div", {
    className: "fo-flash-description"
  }, children)), /*#__PURE__*/React.createElement("button", {
    onClick: onClose,
    className: "fo-close"
  }, /*#__PURE__*/React.createElement("svg", {
    width: "16",
    height: "16",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor",
    strokeWidth: "2"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M18 6L6 18M6 6l12 12"
  }))));
};

/***/ }),

/***/ "./src/frontend/react-js/components/FlashMessages.jsx":
/*!************************************************************!*\
  !*** ./src/frontend/react-js/components/FlashMessages.jsx ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/dist/react-redux.mjs");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @reactJs/store/slices/notify/notifySlice */ "./src/frontend/react-js/store/slices/notify/notifySlice.js");
/* harmony import */ var _FlashBox__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./FlashBox */ "./src/frontend/react-js/components/FlashBox/index.js");




var expTime = {
  successTime: null,
  warningTime: null,
  errorTime: null
};
var lifePeriod = 10000;
var FlashMessages = function FlashMessages() {
  var dispatch = (0,react_redux__WEBPACK_IMPORTED_MODULE_3__.useDispatch)();
  var success = (0,react_redux__WEBPACK_IMPORTED_MODULE_3__.useSelector)(function (state) {
    return state.notify.success;
  });
  var warnings = (0,react_redux__WEBPACK_IMPORTED_MODULE_3__.useSelector)(function (state) {
    return state.notify.warnings;
  });
  var errors = (0,react_redux__WEBPACK_IMPORTED_MODULE_3__.useSelector)(function (state) {
    return state.notify.errors;
  });
  var emptySuccess = function emptySuccess() {
    if (success.length === 0) return;
    clearTimeout(expTime.successTime);
    expTime.successTime = setTimeout(function () {
      dispatch((0,_reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_1__.clearSuccess)());
    }, lifePeriod);
  };
  var emptyWarnings = function emptyWarnings() {
    if (warnings.length === 0) return;
    clearTimeout(expTime.warningTime);
    expTime.warningTime = setTimeout(function () {
      dispatch((0,_reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_1__.clearWarnings)());
    }, lifePeriod);
  };
  var emptyErrors = function emptyErrors() {
    if (errors.length === 0) return;
    clearTimeout(expTime.errorTime);
    expTime.errorTime = setTimeout(function () {
      dispatch((0,_reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_1__.clearErrors)());
    }, lifePeriod);
  };
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {
    emptySuccess();
    emptyWarnings();
    emptyErrors();
  }, [success, warnings, errors]);
  var handleSuccessClose = function handleSuccessClose(type, index) {
    dispatch((0,_reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_1__.clearSuccess)({
      index: index,
      type: type
    }));
  };
  var handleWarningsClose = function handleWarningsClose(type, index) {
    dispatch((0,_reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_1__.clearWarnings)({
      index: index,
      type: type
    }));
  };
  var handleErrorsClose = function handleErrorsClose(type, index) {
    dispatch((0,_reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_1__.clearErrors)({
      index: index,
      type: type
    }));
  };
  return success.length > 0 || warnings.length > 0 || errors.length > 0 ? /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'fixed',
      right: '20px',
      bottom: '20px',
      zIndex: '9'
    }
  }, success.length > 0 && success.map(function (message, index) {
    return /*#__PURE__*/React.createElement(_FlashBox__WEBPACK_IMPORTED_MODULE_2__.FlashBox, {
      key: "success-".concat(index),
      index: index,
      className: "fo-success",
      onClose: function onClose() {
        return handleSuccessClose('success', index);
      }
    }, message);
  }), warnings.length > 0 && warnings.map(function (warning, index) {
    return /*#__PURE__*/React.createElement(_FlashBox__WEBPACK_IMPORTED_MODULE_2__.FlashBox, {
      key: "warning-".concat(index),
      index: index,
      className: "fo-warning",
      onClose: function onClose() {
        return handleWarningsClose('warnings', index);
      }
    }, warning);
  }), errors.length > 0 && errors.map(function (error, index) {
    return /*#__PURE__*/React.createElement(_FlashBox__WEBPACK_IMPORTED_MODULE_2__.FlashBox, {
      key: "error-".concat(index),
      index: index,
      className: "fo-error",
      onClose: function onClose() {
        return handleErrorsClose('errors', index);
      }
    }, error);
  })) : '';
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FlashMessages);

/***/ }),

/***/ "./src/frontend/react-js/helpers/index.js":
/*!************************************************!*\
  !*** ./src/frontend/react-js/helpers/index.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   updateLocalStorage: () => (/* binding */ updateLocalStorage)
/* harmony export */ });
var updateLocalStorage = function updateLocalStorage(key, data) {
  if (data && (Array.isArray(data) ? data.length > 0 : Object.keys(data).length > 0)) {
    localStorage.setItem(key, JSON.stringify(data));
  } else {
    localStorage.removeItem(key);
  }
};

/***/ }),

/***/ "./src/frontend/react-js/index.js":
/*!****************************************!*\
  !*** ./src/frontend/react-js/index.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_dom_client__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-dom/client */ "./node_modules/react-dom/client.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/dist/react-redux.mjs");
/* harmony import */ var _reactJs_store__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @reactJs/store */ "./src/frontend/react-js/store/index.js");
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react-router-dom */ "./node_modules/react-router-dom/dist/index.js");
/* harmony import */ var _reactJs_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @reactJs/router */ "./src/frontend/react-js/router/index.jsx");
/* harmony import */ var _reactJs_assets_css_main_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @reactJs/assets/css/main.scss */ "./src/frontend/react-js/assets/css/main.scss");








// Function to render React components
var renderReactJsApp = function renderReactJsApp() {
  var rootElement = document.getElementById('mxsfwnReactJsApp');
  if (!rootElement) return;
  var root = (0,react_dom_client__WEBPACK_IMPORTED_MODULE_1__.createRoot)(rootElement);
  root.render( /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement((react__WEBPACK_IMPORTED_MODULE_0___default().StrictMode), null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_redux__WEBPACK_IMPORTED_MODULE_5__.Provider, {
    store: _reactJs_store__WEBPACK_IMPORTED_MODULE_2__["default"]
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_6__.RouterProvider, {
    router: _reactJs_router__WEBPACK_IMPORTED_MODULE_3__["default"]
  }))));
};

// Call the render function when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', renderReactJsApp);

/***/ }),

/***/ "./src/frontend/react-js/pages/Home.jsx":
/*!**********************************************!*\
  !*** ./src/frontend/react-js/pages/Home.jsx ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "./node_modules/@wordpress/i18n/build-module/index.js");

var Home = function Home() {
  return /*#__PURE__*/React.createElement("h1", null, "Hello!");
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Home);

/***/ }),

/***/ "./src/frontend/react-js/pages/NotFound.jsx":
/*!**************************************************!*\
  !*** ./src/frontend/react-js/pages/NotFound.jsx ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var NotFound = function NotFound() {
  return /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h1", {
    className: "mxsfwn-not-found"
  }, "404"));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (NotFound);

/***/ }),

/***/ "./src/frontend/react-js/router/index.jsx":
/*!************************************************!*\
  !*** ./src/frontend/react-js/router/index.jsx ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react-router-dom */ "./node_modules/react-router-dom/dist/index.js");
/* harmony import */ var _reactJs_components_DefaultLayout__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @reactJs/components/DefaultLayout */ "./src/frontend/react-js/components/DefaultLayout.jsx");
/* harmony import */ var _reactJs_pages_Home__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @reactJs/pages/Home */ "./src/frontend/react-js/pages/Home.jsx");
/* harmony import */ var _reactJs_pages_NotFound__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @reactJs/pages/NotFound */ "./src/frontend/react-js/pages/NotFound.jsx");

// Layouts


// Pages


var router = (0,react_router_dom__WEBPACK_IMPORTED_MODULE_3__.createHashRouter)([{
  path: '/',
  element: /*#__PURE__*/React.createElement(_reactJs_components_DefaultLayout__WEBPACK_IMPORTED_MODULE_0__["default"], null),
  children: [{
    index: true,
    element: /*#__PURE__*/React.createElement(_reactJs_pages_Home__WEBPACK_IMPORTED_MODULE_1__["default"], null)
  }, {
    path: '*',
    element: /*#__PURE__*/React.createElement(_reactJs_pages_NotFound__WEBPACK_IMPORTED_MODULE_2__["default"], null)
  }]
}]);
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (router);

/***/ }),

/***/ "./src/frontend/react-js/services/API.js":
/*!***********************************************!*\
  !*** ./src/frontend/react-js/services/API.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _reduxjs_toolkit_query_react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @reduxjs/toolkit/query/react */ "./node_modules/@reduxjs/toolkit/dist/query/rtk-query.modern.mjs");
/* harmony import */ var _reduxjs_toolkit_query_react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @reduxjs/toolkit/query/react */ "./node_modules/@reduxjs/toolkit/dist/query/react/rtk-query-react.modern.mjs");
/* harmony import */ var _reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @reactJs/store/slices/notify/notifySlice */ "./src/frontend/react-js/store/slices/notify/notifySlice.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }


var baseQuery = (0,_reduxjs_toolkit_query_react__WEBPACK_IMPORTED_MODULE_1__.fetchBaseQuery)({
  baseUrl: "".concat(window.location.origin, "/wp-json/wpp-generator/v1"),
  credentials: 'same-origin',
  prepareHeaders: function prepareHeaders(headers, _ref) {
    var getState = _ref.getState;
    headers.set('Content-Type', 'application/json');
    headers.set('Accept', 'application/json');

    // Add WordPress REST API nonce
    headers.set('X-WP-Nonce', mxsfwnReactJsLocalizer.nonce);
    return headers;
  }
});
var handleResponse = /*#__PURE__*/function () {
  var _ref2 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(args, api, extraOptions) {
    var _result$data, _result$data3;
    var result, _result$data2, _result$data4, _result$error;
    return _regeneratorRuntime().wrap(function _callee$(_context) {
      while (1) switch (_context.prev = _context.next) {
        case 0:
          _context.next = 2;
          return baseQuery(args, api, extraOptions);
        case 2:
          result = _context.sent;
          if ((result === null || result === void 0 || (_result$data = result.data) === null || _result$data === void 0 ? void 0 : _result$data.status) === 'success') {
            api.dispatch((0,_reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_0__.setSuccess)({
              message: result === null || result === void 0 || (_result$data2 = result.data) === null || _result$data2 === void 0 ? void 0 : _result$data2.message
            }));
          } else if ((result === null || result === void 0 || (_result$data3 = result.data) === null || _result$data3 === void 0 ? void 0 : _result$data3.status) === 'warning') {
            api.dispatch((0,_reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_0__.setWarnings)({
              message: result === null || result === void 0 || (_result$data4 = result.data) === null || _result$data4 === void 0 ? void 0 : _result$data4.message
            }));
          } else {
            api.dispatch((0,_reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_0__.setErrors)({
              message: result === null || result === void 0 || (_result$error = result.error) === null || _result$error === void 0 || (_result$error = _result$error.data) === null || _result$error === void 0 ? void 0 : _result$error.message
            }));
          }
          return _context.abrupt("return", result);
        case 5:
        case "end":
          return _context.stop();
      }
    }, _callee);
  }));
  return function handleResponse(_x, _x2, _x3) {
    return _ref2.apply(this, arguments);
  };
}();
var API = (0,_reduxjs_toolkit_query_react__WEBPACK_IMPORTED_MODULE_2__.createApi)({
  baseQuery: handleResponse,
  endpoints: function endpoints(builder) {
    return {};
  }
});
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (API);

/***/ }),

/***/ "./src/frontend/react-js/store/index.js":
/*!**********************************************!*\
  !*** ./src/frontend/react-js/store/index.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _reduxjs_toolkit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @reduxjs/toolkit */ "./node_modules/@reduxjs/toolkit/dist/redux-toolkit.modern.mjs");
/* harmony import */ var _reactJs_services_API__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @reactJs/services/API */ "./src/frontend/react-js/services/API.js");
/* harmony import */ var _reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @reactJs/store/slices/notify/notifySlice */ "./src/frontend/react-js/store/slices/notify/notifySlice.js");
/* harmony import */ var _reactJs_store_slices_taskList_taskListSlice__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @reactJs/store/slices/taskList/taskListSlice */ "./src/frontend/react-js/store/slices/taskList/taskListSlice.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }




var store = (0,_reduxjs_toolkit__WEBPACK_IMPORTED_MODULE_3__.configureStore)({
  reducer: _defineProperty(_defineProperty(_defineProperty({}, _reactJs_services_API__WEBPACK_IMPORTED_MODULE_0__["default"].reducerPath, _reactJs_services_API__WEBPACK_IMPORTED_MODULE_0__["default"].reducer), "notify", _reactJs_store_slices_notify_notifySlice__WEBPACK_IMPORTED_MODULE_1__["default"]), "taskList", _reactJs_store_slices_taskList_taskListSlice__WEBPACK_IMPORTED_MODULE_2__["default"]),
  middleware: function middleware(getDefaultMiddleware) {
    return getDefaultMiddleware().concat(_reactJs_services_API__WEBPACK_IMPORTED_MODULE_0__["default"].middleware);
  },
  devTools: false
});
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (store);

/***/ }),

/***/ "./src/frontend/react-js/store/slices/notify/notifySlice.js":
/*!******************************************************************!*\
  !*** ./src/frontend/react-js/store/slices/notify/notifySlice.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   clearErrors: () => (/* binding */ clearErrors),
/* harmony export */   clearSuccess: () => (/* binding */ clearSuccess),
/* harmony export */   clearWarnings: () => (/* binding */ clearWarnings),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   setErrors: () => (/* binding */ setErrors),
/* harmony export */   setSuccess: () => (/* binding */ setSuccess),
/* harmony export */   setWarnings: () => (/* binding */ setWarnings)
/* harmony export */ });
/* harmony import */ var _reduxjs_toolkit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @reduxjs/toolkit */ "./node_modules/@reduxjs/toolkit/dist/redux-toolkit.modern.mjs");

var initialState = {
  success: [],
  warnings: [],
  errors: []
};
var notifySlice = (0,_reduxjs_toolkit__WEBPACK_IMPORTED_MODULE_0__.createSlice)({
  name: 'notify',
  initialState: initialState,
  reducers: {
    setSuccess: function setSuccess(state, action) {
      var message = action.payload.message;
      if (!message) return;
      state.success.push(message);
    },
    clearSuccess: function clearSuccess(state, action) {
      var _action$payload, _action$payload2;
      if (action !== null && action !== void 0 && (_action$payload = action.payload) !== null && _action$payload !== void 0 && _action$payload.type && typeof (action === null || action === void 0 || (_action$payload2 = action.payload) === null || _action$payload2 === void 0 ? void 0 : _action$payload2.index) === 'number') {
        var _action$payload3 = action.payload,
          type = _action$payload3.type,
          index = _action$payload3.index;
        state[type].splice(index, 1);
      } else {
        state.success = [];
      }
    },
    setWarnings: function setWarnings(state, action) {
      var message = action.payload.message;
      if (!message) return;
      state.warnings.push(message);
    },
    clearWarnings: function clearWarnings(state, action) {
      var _action$payload4, _action$payload5;
      if (action !== null && action !== void 0 && (_action$payload4 = action.payload) !== null && _action$payload4 !== void 0 && _action$payload4.type && typeof (action === null || action === void 0 || (_action$payload5 = action.payload) === null || _action$payload5 === void 0 ? void 0 : _action$payload5.index) === 'number') {
        var _action$payload6 = action.payload,
          type = _action$payload6.type,
          index = _action$payload6.index;
        state[type].splice(index, 1);
      } else {
        state.warnings = [];
      }
    },
    setErrors: function setErrors(state, action) {
      var message = action.payload.message;
      if (!message) return;
      state.errors.push(message);
    },
    clearErrors: function clearErrors(state, action) {
      var _action$payload7, _action$payload8;
      if (action !== null && action !== void 0 && (_action$payload7 = action.payload) !== null && _action$payload7 !== void 0 && _action$payload7.type && typeof (action === null || action === void 0 || (_action$payload8 = action.payload) === null || _action$payload8 === void 0 ? void 0 : _action$payload8.index) === 'number') {
        var _action$payload9 = action.payload,
          type = _action$payload9.type,
          index = _action$payload9.index;
        state[type].splice(index, 1);
      } else {
        state.errors = [];
      }
    }
  }
});
var _notifySlice$actions = notifySlice.actions,
  setSuccess = _notifySlice$actions.setSuccess,
  clearSuccess = _notifySlice$actions.clearSuccess,
  setWarnings = _notifySlice$actions.setWarnings,
  clearWarnings = _notifySlice$actions.clearWarnings,
  setErrors = _notifySlice$actions.setErrors,
  clearErrors = _notifySlice$actions.clearErrors;

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (notifySlice.reducer);

/***/ }),

/***/ "./src/frontend/react-js/store/slices/taskList/taskListSlice.js":
/*!**********************************************************************!*\
  !*** ./src/frontend/react-js/store/slices/taskList/taskListSlice.js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   addToCart: () => (/* binding */ addToCart),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   deleteFromCart: () => (/* binding */ deleteFromCart)
/* harmony export */ });
/* harmony import */ var _reduxjs_toolkit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @reduxjs/toolkit */ "./node_modules/@reduxjs/toolkit/dist/redux-toolkit.modern.mjs");
/* harmony import */ var _reactJs_helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @reactJs/helpers */ "./src/frontend/react-js/helpers/index.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _toConsumableArray(r) { return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _iterableToArray(r) { if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r); }
function _arrayWithoutHoles(r) { if (Array.isArray(r)) return _arrayLikeToArray(r); }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }


var initialState = {
  cartItems: localStorage.getItem('reactJsAppTaskItems') ? JSON.parse(localStorage.getItem('reactJsAppTaskItems')) : []
};
var taskListSlice = (0,_reduxjs_toolkit__WEBPACK_IMPORTED_MODULE_1__.createSlice)({
  name: 'react-js-task-list',
  initialState: initialState,
  reducers: {
    addToCart: function addToCart(state, action) {
      var _item$timestamps;
      if (!action.payload) return;
      var item = action.payload.item;
      var itemCopy = _objectSpread(_objectSpread({}, item), {}, {
        timestamps: _objectSpread(_objectSpread({}, item.timestamps), {}, {
          addedToCart: _objectSpread(_objectSpread({}, ((_item$timestamps = item.timestamps) === null || _item$timestamps === void 0 ? void 0 : _item$timestamps.addedToCart) || {}), {}, {
            utc: new Date().toISOString()
          })
        })
      });
      state.cartItems = [].concat(_toConsumableArray(state.cartItems), [itemCopy]);
      (0,_reactJs_helpers__WEBPACK_IMPORTED_MODULE_0__.updateLocalStorage)('reactJsAppTaskItems', state.cartItems);
    },
    deleteFromCart: function deleteFromCart(state, action) {
      if (!action.payload) return;
      var itemIndex = action.payload.itemIndex;

      // Validate index is within bounds
      if (itemIndex >= 0 && itemIndex < state.cartItems.length) {
        state.cartItems = state.cartItems.filter(function (_, index) {
          return index !== itemIndex;
        });
      }
      (0,_reactJs_helpers__WEBPACK_IMPORTED_MODULE_0__.updateLocalStorage)('reactJsAppTaskItems', state.cartItems);
    }
  }
});
var _taskListSlice$action = taskListSlice.actions,
  addToCart = _taskListSlice$action.addToCart,
  deleteFromCart = _taskListSlice$action.deleteFromCart;

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (taskListSlice.reducer);

/***/ }),

/***/ "./src/frontend/react-js/assets/css/main.scss":
/*!****************************************************!*\
  !*** ./src/frontend/react-js/assets/css/main.scss ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			id: moduleId,
/******/ 			loaded: false,
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/create fake namespace object */
/******/ 	(() => {
/******/ 		var getProto = Object.getPrototypeOf ? (obj) => (Object.getPrototypeOf(obj)) : (obj) => (obj.__proto__);
/******/ 		var leafPrototypes;
/******/ 		// create a fake namespace object
/******/ 		// mode & 1: value is a module id, require it
/******/ 		// mode & 2: merge all properties of value into the ns
/******/ 		// mode & 4: return value when already ns object
/******/ 		// mode & 16: return value when it's Promise-like
/******/ 		// mode & 8|1: behave like require
/******/ 		__webpack_require__.t = function(value, mode) {
/******/ 			if(mode & 1) value = this(value);
/******/ 			if(mode & 8) return value;
/******/ 			if(typeof value === 'object' && value) {
/******/ 				if((mode & 4) && value.__esModule) return value;
/******/ 				if((mode & 16) && typeof value.then === 'function') return value;
/******/ 			}
/******/ 			var ns = Object.create(null);
/******/ 			__webpack_require__.r(ns);
/******/ 			var def = {};
/******/ 			leafPrototypes = leafPrototypes || [null, getProto({}), getProto([]), getProto(getProto)];
/******/ 			for(var current = mode & 2 && value; typeof current == 'object' && !~leafPrototypes.indexOf(current); current = getProto(current)) {
/******/ 				Object.getOwnPropertyNames(current).forEach((key) => (def[key] = () => (value[key])));
/******/ 			}
/******/ 			def['default'] = () => (value);
/******/ 			__webpack_require__.d(ns, def);
/******/ 			return ns;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/node module decorator */
/******/ 	(() => {
/******/ 		__webpack_require__.nmd = (module) => {
/******/ 			module.paths = [];
/******/ 			if (!module.children) module.children = [];
/******/ 			return module;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"frontend/react-js": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkmxsfwn_npm_handler"] = self["webpackChunkmxsfwn_npm_handler"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["dependencies/vendors"], () => (__webpack_require__("./src/frontend/react-js/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map