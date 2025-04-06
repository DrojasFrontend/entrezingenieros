jQuery(document).ready(function($) {
    let currentPage = 1;
    let isLoading = false;
    
    function loadFilteredProjects() {
        if (isLoading) return;
        isLoading = true;
        
        if (typeof ajax_object === 'undefined') {
            console.error('ajax_object no está definido');
            return;
        }
        
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_projects',
                year: $('#year-filter').val() || '',
                sector: $('#sector-filter').val() || '',
                page: currentPage
            },
            success: function(response) {
                if (currentPage === 1) {
                    $('#customProyectos .row').html(response.html);
                } else {
                    $('#customProyectos .row').append(response.html);
                }
                
                // Mostrar los elementos que estaban ocultos
                setTimeout(function() {
                    $('#customProyectos .postItem').removeClass('d-none');
                }, 100);
                
                $('[data-load-more]').toggle(response.has_more);
                isLoading = false;
            },
            error: function(xhr, status, error) {
                console.error('Error en la petición AJAX:', error);
                isLoading = false;
            }
        });
    }
    
    $('#year-filter, #sector-filter').on('change', function() {
        currentPage = 1;
        loadFilteredProjects();
    });
    
    $('[data-load-more]').on('click', function() {
        currentPage++;
        loadFilteredProjects();
    });
    
    // Cargar proyectos iniciales
    loadFilteredProjects();
});