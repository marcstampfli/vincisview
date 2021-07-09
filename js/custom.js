jQuery(document).ready(function () {
	new WOW({
		mobile: false,
	}).init();
});

function toggleMenu() {
	jQuery("body").toggleClass("if-menu-active");
}

jQuery(document).on("click", '[data-toggle="lightbox"]', function (event) {
	event.preventDefault();
	jQuery(this).ekkoLightbox({
		alwaysShowClose: false,
	});
});
