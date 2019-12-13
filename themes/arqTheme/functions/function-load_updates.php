<?php 
function load_updates(){

	$current_page = $_POST['current_page'];
    $posts_per_page = $_POST['posts_per_page'];

	$args = array(
        'post_type' => 'shareholder_updates', 
		'posts_per_page' => $posts_per_page,
        'paged' => $current_page,
        'meta_key'			=> 'date',
        'orderby'			=> 'meta_value',
        'order'				=> 'DESC'
	);
	
	$updates = get_posts($args);
	$query = new WP_Query($args);
	
	?>

	<div class="row updates py-3">

		<?php foreach ($updates as $update):
			$update_id = $update->ID;
			$title = get_the_title($update_id);
            $date = get_field('date', $update_id);
            $audio = get_field('audio', $update_id);
			$icon = get_bloginfo('template_url') . '/assets/images/audio.png';
		?>

			<div class="col-4 my-4">
				<div class="p-4 box">

					<div class="d-flex align-items-center justify-content-between">
						<h4 class="m-0"><?php echo $title ?></h4>
						<img class="ml-3" style="height:35px" src="<?php echo $icon ?>">
					</div>

					<p class="mb-1"><?php echo $date ?></p>
					<div class="absolute-link">
						<a class="link play-audio activity" 
                        data-post="<?php echo $update_id?>"
                        data-audio="<?php echo $audio ?>">Listen</a>
					</div>

				</div>
			</div>

		<?php endforeach ?>

	</div>

    <?php 
    /* Pagination */
    $pagination_enabled = true;
    if($pagination_enabled){ 

            $max = $query->max_num_pages;

                if($max > 1){ 

                    $next_disabled = false;
                    $prev_disabled = false;

                    if ($current_page == $max):
                        $next_disabled = true;
                    elseif ($current_page == 1):
                        $prev_disabled = true;
                    endif;
                                        
                    $current_page_prev_prev = $current_page - 2;
                    $current_page_prev = $current_page - 1;
                    $current_page_next = $current_page + 1;
                    $current_page_next_next = $current_page + 2;
                    ?>

                    <div class="w100 d-flex justify-content-center pagination mt-5 mb-4" >

                        <form >
                            <!-- Prev button -->
                            <?php if (!$prev_disabled) : ?>
                                <input type="button"  id="prev-btn" class="align-middle prev-btn"> 
                            <?php else: ?>
                                <input type="button"  id="prev-btn" disabled class="align-middle prev-btn"> 
                            <?php endif; ?>

                            <!-- First item -->
                            <?php if ( ($current_page > 2) && ($max>3) ): ?>
                                <input type="button" value="1" class="changePage"> 
                                <!-- Hide ellipsis -->
                                <?php if ( ($current_page > 3) && ($max>4) ) : ?>
                                    <input type="button" value="..." class="dots"> 
                                <?php endif ?>
                            <?php endif ?>

                            <!-- Go to other page -->
                            <!-- First page is active -->
                            <?php if ($current_page == 1): ?>
                                <input type="button" value="<?php echo $current_page?>" class="active changePage"> 
                                <input type="button" value="<?php echo $current_page_next?>" class="changePage"> 
                                <?php if ($current_page_next_next <= $max): ?>
                                    <input type="button" value="<?php echo $current_page_next_next?>" class="changePage"> 
                                <?php endif ?>
                            <!-- Last page is active -->
                            <?php elseif ($current_page == $max): ?>
                                <?php if ($current_page_prev > 1): ?>
                                    <input type="button" value="<?php echo $current_page_prev_prev?>" class="changePage"> 
                                <?php endif ?>
                                <input type="button" value="<?php echo $current_page_prev?>" class="changePage"> 
                                <input type="button" value="<?php echo $current_page?>" class="active changePage"> 
                            <?php else: ?>
                                <input type="button" value="<?php echo $current_page_prev?>" class="changePage"> 
                                <input type="button" value="<?php echo $current_page?>" class="active changePage"> 
                                <input type="button" value="<?php echo $current_page_next?>" class="changePage"> 
                            <?php endif ?>
                            

                            <!-- Last item -->
                            <?php if ( ($current_page < ($max-1)) && ($max>3) ): ?>
                                <!-- Hide ellipsis -->
                                <?php if (($current_page < ($max-2)) && ($max>4) ): ?>
                                    <input type="button" value="..." class="dots"> 
                                <?php endif ?>
                                <input type="button" value="<?php echo $max?>" class="changePage"> 
                            <?php endif ?>

                            <!-- Next button -->
                            <?php if (!$next_disabled) : ?>
                                <input type="button" value="" class="next-btn align-middle">
                            <?php else: ?>
                                <input type="button" value="" disabled class="next-btn align-middle"> 
                            <?php endif; ?>
                        
                        </form>
                    
                    </div>
                <?php
            }
    } 

    die();

}
?>