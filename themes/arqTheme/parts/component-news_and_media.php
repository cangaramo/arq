<?php 
$args = array(
    'post_type' => 'news',
    'posts_per_page' => -1,
);
$news = get_posts($args);

$query = new WP_Query($args);
$count = $query->post_count;
$anchor = $values['anchor'];
?>

<div id="<?php echo $anchor ?>" class="position-relative">

    <div class="absolute-top w-100 h-100 overflow-hidden">
        <div id="trigger-shapeArq"></div>
        <img class="shapeArq" src="<?php echo get_bloginfo('template_url')?>/assets/images/arq-bg.png">
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div id="news-response" data-total="<?php echo $count ?>"></div>
                <a id="more-news" class="mt-4 link">More</a>
            </div>
        </div>
    </div>

</div>
