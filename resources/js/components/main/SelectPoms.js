export function selectPoms() {
	const select = document.querySelector(".select");
	const selectList = document.querySelector(".select_list");
	const selected = document.querySelector(".select_selected");
	const selectedSpan = document.querySelector(".select_naming");
	const listItems = document.querySelectorAll(".select_list li");

	listItems.forEach(li => {
		li.addEventListener("click", e => {
			e.preventDefault();

			let i = e.target;
			let data = i.getAttribute("data-poms");
			let naming = data.toUpperCase();

			// come up with a better approach later
			for (let i = 0; i < listItems.length; i++) {
				listItems[i].classList.remove("show");
			}

			i.classList.add("show");
			selectedSpan.innerText = naming;
			selected.removeAttribute("data-poms");
			selected.setAttribute("data-poms", data);
		});
	});
}
