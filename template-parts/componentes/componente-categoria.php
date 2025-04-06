<?php
$categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => true
));

$current_category = get_query_var('cat');
?>

<div class="blog-filters">
    <div class="container">
        <h2 class="font-poppins fs-p mb-24 text-center">Explora nuestras categorías:</h2>
        <div class="row">
            <div class="col-12">
                <div class="customBlogCategorias d-flex justify-xl-center gap-18 mb-lg-24 mb-12">
                    <button class="font-poppins border-0 py-6 px-24 bg-primary-100 rounded-100 fs-p-small active" data-category="all">
                        Todas
                    </button>
                    <?php foreach ($categories as $category) : ?>
                        <button class="font-poppins border-0 py-6 px-24 bg-primary-100 rounded-100 fs-p-small" data-category="<?php echo $category->term_id; ?>">
                            <?php echo $category->name; ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<span class="line mb-lg-50 mb-lg-36 mb-24"></span>