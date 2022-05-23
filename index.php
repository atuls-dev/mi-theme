<?php
 get_header();
 ?>
 <div id='primary'>
     <div id="main" class="site-main">
         <?php
		if ( have_posts() ) {
			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				the_content();
			}
		} else {
            echo "No Posts Found...";
		}
		?>
     </div>
 </div>
<?php
 get_footer();