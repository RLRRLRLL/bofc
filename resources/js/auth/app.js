const { Popper } = require("popper.js");

window._ = require("lodash");
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// react
require("../components/react/Example");
