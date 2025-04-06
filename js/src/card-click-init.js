import $ from "jquery";

export const initClickableCards = (cardSelector) => {
	$(cardSelector)
		.on("click", function (e) {
			let url = $(this).find("a").attr("href");
			if (url) {
				location.href = url;
			}
		})
		.css("cursor", "pointer");

	$(`${cardSelector} a`).on("click", function (e) {
		e.stopPropagation();
	});
};
