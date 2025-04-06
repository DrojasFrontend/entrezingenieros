import $ from "jquery";

export function initLoadMore() {
  function initializeLoadMore(container, initialCount, loadMoreCount) {
    const $container = $(container);
    const $postItems = $container.find(".postItem");

    $postItems.slice(0, initialCount).addClass('d-block').show();
    $postItems.filter(".visible").last().addClass("last-visible");
    $container.find("[data-load-more]").click(function(e) {
      e.preventDefault();

      $postItems.filter(":hidden").slice(0, loadMoreCount).fadeIn("slow").addClass('d-block');
      $postItems.filter(".visible.last-visible").removeClass("last-visible");
      $postItems.filter(".visible").last().addClass("last-visible");

      const visibleItems = $container.find(".postItem.d-block").length;
      const totalItems = $postItems.length;

      if (visibleItems >= totalItems) {
        $(this).addClass('d-none');
      }
    });
  }

  initializeLoadMore('#customProyectos', 3, 3);
}
