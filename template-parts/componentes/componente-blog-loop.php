<?php
$posts_per_page = -1;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'post_status' => 'publish'
);

$query = new WP_Query($args); 
?>

<?php if ($query->have_posts()) : ?>
    <section class="blog-section">
        <div class="container px-0" id="customEntradas">
            <?php 
            // Primera pasada - Solo para el post destacado
            $query->the_post();
            $categories = get_the_category();
            $first_category = !empty($categories) ? $categories[0]->name : '';
            $category_ids = wp_list_pluck($categories, 'term_id');
            ?>
            
            <!-- Tarjeta destacada -->
            <?php get_template_part('template-parts/componentes/componente', 'blog-tarjeta-destacada', array('first_category' => $first_category)); ?>  

            <!-- Categorias -->
            <?php get_template_part('template-parts/componentes/componente', 'categoria');?>

            <!-- Resto de los posts -->
        </div>
        <div class="container">
            <div class="row">
                <?php
                // Segunda pasada - Para el resto de posts
                while ($query->have_posts()) : 
                    $query->the_post();
                    $categories = get_the_category();
                    $first_category = !empty($categories) ? $categories[0]->name : '';
                    $category_ids = wp_list_pluck($categories, 'term_id');
                ?>
                    <div class="col-12 col-lg-4 py-18 blog-post" data-categories='<?php echo json_encode($category_ids); ?>'>
                        <?php get_template_part('template-parts/componentes/componente', 'blog-tarjeta', array('first_category' => $first_category)); ?>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.blog-filters button');
            const blogPosts = document.querySelectorAll('.blog-post');

            function filterPosts(selectedCategory) {
                blogPosts.forEach(post => {
                    if (selectedCategory === 'all') {
                        post.style.display = 'block';
                        return;
                    }

                    const postCategories = JSON.parse(post.dataset.categories);
                    post.style.display = postCategories.includes(parseInt(selectedCategory)) 
                        ? 'block' 
                        : 'none';
                });
            }

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('shadow-card'));
                    this.classList.add('shadow-card');
                    filterPosts(this.dataset.category);
                });
            });
        });
    </script>
<?php else : ?>
    <p class="text-center py-5">No hay entradas disponibles en esta categoría.</p>
<?php endif; ?>