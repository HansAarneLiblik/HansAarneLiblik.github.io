function changeSize (el) {

	var doc = document.getElementById(el);
//	alert(doc.clientWidth);

	if (doc.style.width != "800px")
		doc.style.width = "800px";
	else
		doc.style.width = "200px";

}
