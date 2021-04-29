<nav class="navigation pagination " role="navigation">
	<?php 
		
        $big = 999999999;
		the_posts_pagination( array(
			'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'current' => max( 1, get_query_var('paged') ),
			'total'   => $args["max_num_pages"],

			'mid_size' => 2,
			'prev_next'    => true,
		) ); 	

        
	?>
</nav>