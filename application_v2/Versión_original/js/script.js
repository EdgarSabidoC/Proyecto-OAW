let query = "";
let category = "";

const saveQuery = (queryString) => {
	query = queryString;
	category = "";
};

const fetchOptions = {
	method: "GET",
	headers: { "Content-type": "application/x-www-form-urlencoded" },
};

const updateContainer = async (response, container) => {
	if (response.ok) {
		document.getElementById(container).innerHTML = await response.text();
	} else {
		console.error(`Error ${response.status}`);
		document.getElementById(
			"container"
		).innerHTML = `<h1 align="center">ERROR ${response.status}</h1>`;
	}
};

const loadPhp = async (url) => {
	try {
		const response = await fetch(url, {
			...fetchOptions,
			method: "POST",
			body: `searchtext=${document.getElementById("searchBox").value}`,
		});
		await updateContainer(response, "container");

		if (url === "controllers/rss_update.php") {
			getCategories();
		}
	} catch (error) {
		console.error(error);
	}
};

const sortBy = async () => {
	if (!query) {
		query = "";
	}
	if (!category) {
		category = "";
	}
	let selectedItem = document.getElementById("sortSelect").value;
	try {
		const response = await fetch(
			`controllers/rss_sort.php?searchBox=${query}&sortSelect=${selectedItem}&category=${category}`,
			fetchOptions
		);
		await updateContainer(response, "container");
	} catch (error) {
		console.error(error);
	}
};

const searchCategory = async (categoryString) => {
	try {
		const response = await fetch(
			`controllers/rss_search_category.php?category=${categoryString}`,
			fetchOptions
		);
		await updateContainer(response, "container");
		category = categoryString;
	} catch (error) {
		console.error(error);
	}
};

const getCategories = async () => {
	try {
		const response = await fetch(
			"controllers/rss_get_categories.php",
			fetchOptions
		);
		await updateContainer(response, "link-categories");
	} catch (error) {
		console.error(error);
	}
};
