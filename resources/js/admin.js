window._ = require("lodash");
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import { keepLinksActive } from "./components/Utils";
import sidebar from "./components/admin/Sidebar";

document.addEventListener("DOMContentLoaded", () => {
	keepLinksActive();
	sidebar();
});