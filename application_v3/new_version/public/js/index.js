let query = "";
let category = "";
let rssCacheList;

let tmpRssList = {
	rssList: [],
	query: "",
	category: "",
};

const fetchOptions = {
	method: "GET",
	headers: { "Content-type": "application/x-www-form-urlencoded" },
};

const resetTmpRssList = () => {
	tmpRssList.rssList = [];
	tmpRssList.category = "";
	tmpRssList.query = "";
};

const viewRssList = () => {
	let list = tmpRssList.rssList;
	list && list.length > 0 ? console.log(tmpRssList) : console.log(rssCacheList);
};

const sortList = (selectedItem) => {
	let list = tmpRssList.rssList;
	list = list.length > 0 ? tmpRssList.rssList : rssCacheList;
	switch (selectedItem) {
		case "1":
			return list.sort((a, b) => new Date(b.date) - new Date(a.date));
		case "2":
			return list.sort((a, b) => a.title.localeCompare(b.title));
		case "3":
			return list.sort((a, b) => b.title.localeCompare(a.title));
		case "4":
			return list.sort((a, b) => a.description.localeCompare(b.description));
		case "5":
			return list.sort((a, b) => b.description.localeCompare(a.description));
		case "6":
			return list.sort((a, b) => new Date(a.date) - new Date(b.date));
		default:
			return;
	}
};

const sortBy = () => {
	let selectedItem = document.getElementById("sortSelect").value;
	try {
		tmpRssList.rssList = sortList(selectedItem);
		
		feedPagination();
	} catch (error) {
		console.error(error);
	}
};

const updateContainer = async (response, container) => {
	if (response.ok) {
		document.getElementById(container).innerHTML = await response.text();
	} else {
		console.error(`Error ${response.status}`);
		document.getElementById(
			"container"
		).innerHTML = `<h1 align='center'>ERROR ${response.status}</h1>`;
	}
};

const searchQuery = () => {
	try {
		query = document.getElementById("searchBox").value.toLowerCase();
		category = "";
		tmpRssList.category = category;

		// Si no se ha cambiado la búsqueda:
		if (query !== "" && query === tmpRssList.query) {
			
			feedPagination();
			return;
		}
		let tmp = [];
		tmpRssList.query = query;

		const queryWords = query.split(" "); // separar la cadena de consulta en palabras

		// Se busca dentro de la lista de rss en caché:
		rssCacheList.forEach((rss) => {
			let categories = rss.categories.toLowerCase();
			let description = rss.description.toLowerCase();
			let title = rss.title.toLowerCase();

			// comprobar si alguna de las palabras de la consulta aparece en el título, descripción o categorías del RSS
			const matchesQuery = queryWords.some((word) => {
				return (
					categories.includes(word) ||
					description.includes(word) ||
					title.includes(word)
				);
			});

			if (matchesQuery) {
				tmp.push(rss);
			}
		});

		if (tmp.length > 0) {
			tmpRssList.rssList = tmp;
			sortBy();
		}
	} catch (error) {
		console.error(error);
	}
};

const searchCategory = (categoryString) => {
	try {
		query = "";
		tmpRssList.query = query;

		category = categoryString.toLowerCase();

		// Si no se ha cambiado la búsqueda:
		if (category !== "" && category === tmpRssList.category) {
			
			feedPagination();
			return;
		}
		let tmp = [];
		tmpRssList.category = category;

		rssCacheList.forEach((rss) => {
			if (rss.categories.toLowerCase() === category) {
				tmp.push(rss);
			}
		});

		if (tmp.length > 0) {
			tmpRssList.rssList = tmp;
			sortBy();
		}
	} catch (error) {
		console.error(error);
	}
};

const getCategories = async () => {
	try {
		const response = await fetch(
			"router/router.php?src=categories",
			fetchOptions
		);
		await updateContainer(response, "link-categories");
	} catch (error) {
		console.error(error);
	}
};

const getRssList = async () => {
	try {
		resetTmpRssList();
		if (Array.isArray(rssCacheList) && rssCacheList.length > 0) {
			getCategories(); // Se muestra el listado de categorías.
			 // Se muestra la lista de rss.
			feedPagination();
			return;
		}
		const response = await fetch("router/router.php?src=reader", fetchOptions);
		rssCacheList = await response.json(); // Se almacena la lista de los rss.
		if (Array.isArray(rssCacheList) && rssCacheList.length > 0) {
			getCategories(); // Se muestra el listado de categorías.
			 // Se muestra la lista de rss.
			feedPagination();
		}
	} catch (error) {
		console.error(error);
	}
};

const updateRssList = async () => {
	try {
		resetTmpRssList();
		const response = await fetch("router/router.php?src=update", fetchOptions);
		rssCacheList = await response.json(); // Se almacena la lista de los rss.
		if (Array.isArray(rssCacheList) && rssCacheList.length > 0) {
			getCategories(); // Se muestra el listado de categorías.
			 // Se muestra la lista de rss.
			feedPagination();
		}
	} catch (error) {
		console.error(error);
	}
};
