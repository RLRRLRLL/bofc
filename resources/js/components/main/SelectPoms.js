import { query, queryAll } from "./../Utils";

// TODO: write another script for no-js browsers

export function selectPoms() {
	const select = query(".select__in"),
		selected = query(".select__in--selected"),
		selectedSpan = query(".select__in--selected-naming"),
		listItems = queryAll(".select__in--list li"),
		hoverClass = "mouse-over";

	select.addEventListener("mouseover", e => {
		select.classList.add(hoverClass);
	});

	select.addEventListener("mouseleave", e => {
		select.classList.remove(hoverClass);
	});

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

			select.classList.remove(hoverClass);
		});
	});
}
