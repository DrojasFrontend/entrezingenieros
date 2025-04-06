import $ from "jquery";

const $customMenu = $(".customMenu");
const $customSearch = $(".customSearch");

$("[data-toggle-search]").on("click", function () {
	$customMenu.toggleClass("active");
	$customSearch.toggleClass("active");
});

$(document).on("click", function(event) {
	if (!$customSearch.has(event.target).length && !$(event.target).is("[data-toggle-search]")) {
		$customMenu.removeClass("active");
		$customSearch.removeClass("active");
	}
});

$customSearch.on("click", function(event) {
	event.stopPropagation();
});
