import { query, queryAll } from "./../Utils";

// TODO: write another script for no-js browsers
export function selectPoms() {
	const classOptions = queryAll(".select__section--class li");
	const colorOptions = queryAll(".select__section--color li");

	highlightSelected(classOptions);
	highlightSelected(colorOptions);

	function highlightSelected(o) {
		o.forEach(li => {
			li.addEventListener("click", e => {
				e.preventDefault();
				let i = e.target;
				// let data = i.getAttribute("data-poms");

				for (let i = 0; i < o.length; i++) {
					o[i].classList.remove("active");
				}

				i.classList.add("active");
			});
		});
	}
}
