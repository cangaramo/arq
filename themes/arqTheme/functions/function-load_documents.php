<?php 
function load_documents() { 

    $current_page = $_POST['current_page'];
    $posts_per_page = $_POST['posts_per_page'];

    $args = array(
        'post_type' => 'investor_documents', 
        'paged' => $current_page,
        'posts_per_page' => $posts_per_page,
        'meta_key'			=> 'date',
        'orderby'			=> 'meta_value',
        'order'				=> 'DESC'
    );
    
    $documents = get_posts($args);
    $query = new WP_Query($args);

    ?>

    <div class="row documents">

        <?php foreach ($documents as $document): 
            $document_id = $document->ID;
            $title = get_the_title($document_id);
            $description = get_field('description', $document_id);
            $date = get_field('date', $document_id);
            $type = get_field('type', $document_id);
            $permalink = get_the_permalink($document_id);

            switch ($type){
                case 'Financial':
                    $icon = get_bloginfo('template_url') . '/assets/images/financial.png';
                    $label = "Read";
                    $link = $permalink;
                break;
                case 'Investor':
                    $icon = get_bloginfo('template_url') . '/assets/images/investor.png';
                    $label = "Download";
                    $file = get_field('file', $document_id);
                    $link = $permalink;
                    //$target = "_blank";
                break;
                case 'Film':
                    $icon = get_bloginfo('template_url') . '/assets/images/film.png';
                    $label = "Play";
                    $link = $permalink;
                break;
                case 'Audio':
                    $icon = get_bloginfo('template_url') . '/assets/images/audio.png';
                    $label = "Listen";
                    $link = $permalink;
                break;
                case 'Article':
                    $icon = get_bloginfo('template_url') . '/assets/images/article.png';
                    $label = "Read";
                    $link = $permalink;
                break;
                case 'PDF':
                    $icon = get_bloginfo('template_url') . '/assets/images/pdf.png';
                    $label = "Download";
                    $file = get_field('file', $document_id);
                    $link = $permalink;
                    //$target = "_blank";
                break;
            }
        ?>

            <div class="col-4 my-4">
                <div class="p-4 box">
                    <img src="<?php echo $icon ?>">
                    <h4 class="mt-4 mb-3"><?php echo $title ?></h4>
                    <p class="mb-1"><?php echo $date ?></p>
                    <p><?php echo $description ?></p>
                    <div class="absolute-link">
                        <a class="link activity"  
                        target="<?php echo $target ?>" href="<?php echo $link ?>"
                        data-post="<?php echo $document_id?>"><?php echo $label ?></a>
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

                    <div class="w100 d-flex justify-content-center pagination mt-5 mb-4 pt-3" >

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