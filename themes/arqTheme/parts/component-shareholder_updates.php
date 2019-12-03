<?php 
    $args = array(
        'post_type' => 'shareholder_updates', 
        'posts_per_page' => -1
    );
    $updates = get_posts($args);
?>

<div class="bg-dark_gray">
    <div class="container py-5">

        <h2 class="color-white pt-3">Shareholder updates</h2>

        <div class="row updates py-3">

            <?php foreach ($updates as $update):
                $update_id = $update->ID;
                $title = get_the_title($update_id);
                $date = get_field('date', $update_id);
                $permalink = get_the_permalink($update_id);
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
                            <a class="link" href="<?php echo $permalink ?>">Listen</a>
                        </div>

                    </div>
                </div>

            <?php endforeach ?>
        
        </div>

    </div>
</div>