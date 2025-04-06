import $ from "jquery";

$("[data-toggle-menu]").on("click", function () {
	$(this).toggleClass("active");
	$("[data-menu-mobile]").toggleClass("active");
	// Reset cualquier submenú abierto cuando se cierra el menú principal
	if (!$(this).hasClass("active")) {
		$(".submenu-container").removeClass("active");
		$(".menu-item").removeClass("d-none");
		$(".menu-item-header").removeClass("d-none");
	}
});

$(".submenu-toggle").on("click", function (e) {
	e.preventDefault();
	e.stopPropagation();
	const $menuItem = $(this).closest("li");
	const $submenu = $menuItem.find(".submenu-container").first();

	// Activar el submenú con slide
	$submenu.addClass("active");
	// Ocultar los items del nivel actual
	// $menuItem.siblings().addClass("d-none");
	// Ocultar el header del item actual
	// $menuItem.find(".menu-item-header").first().addClass("d-none");
});

// Botón de retroceso
$(".back-button").on("click", function (e) {
	e.preventDefault();
	e.stopPropagation();
	const $submenu = $(this).closest(".submenu-container");
	const $parentItem = $submenu.closest("li");

	// Desactivar el submenú actual
	$submenu.removeClass("active");
	// Mostrar los items del nivel anterior
	$parentItem.siblings().removeClass("d-none");
	// Mostrar el header del item actual
	$parentItem.find(".menu-item-header").first().removeClass("d-none");
});
