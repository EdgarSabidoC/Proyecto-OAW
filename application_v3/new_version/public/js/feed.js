const show = (id) => {
	document.getElementById(id).style.display = "block";
};
const hide = (id) => {
	document.getElementById(id).style.display = "none";
};
const successload = (id) => {
	setTimeout(() => {
		hide(id);
	}, 5000);
	setTimeout(() => {
		show("success");
	}, 5000);
	setTimeout(() => {
		hide("success");
	}, 7000);
};
const failload = (id) => {
	setTimeout(() => {
		hide(id);
	}, 5000);
	setTimeout(() => {
		show("danger");
	}, 5000);
	setTimeout(() => {
		hide("danger");
	}, 7000);
};
const loadFile = async (src) => {
	let textArea = document.getElementById("textArea").value;
	if (src === "save" && textArea === "") {
		return;
	}
	show("loading");
	const xmlhttp = new XMLHttpRequest();
	const method = "POST";
	const async = true;
	xmlhttp.open(method, "../../public/router/router.php", async);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = () => {
		if (xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200) {
			successload("loading");
		}
	};
	xmlhttp.onload = () => {
		if (xmlhttp.status >= 400) {
			console.error(`Error ${xmlhttp.status}`);
			document.getElementById(
				"container"
			).innerHTML = `<h1 align='center'>ERROR ${xmlhttp.status}</h1>`;
			if (url !== "") failload("loading");
		}
	};
	xmlhttp.send(`feedurl=${textArea}&src=${src}`);
};
