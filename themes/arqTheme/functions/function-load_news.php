<?php 
function load_news(){

    $current_page = $_POST['current_page'];

    $args = array(
        'post_type' => 'news',
        'posts_per_page' => 3,
        'paged' => $current_page
    );
    $news = get_posts($args);

    ?>

        <div class="row news">

            <?php foreach ($news as $index=>$article): 
                $article_id = $article->ID;
                $article_date = get_the_date('F j, Y', $article_id);
                $article_title = get_the_title($article_id);
                $article_fields = get_fields($article_id);
                $article_link = get_the_permalink($article_id);

                if (  ($index+1)%3 == 0){
                    $class_col = 'col-lg-12';
                    $class_big = 'big';
                }
                else {
                    $class_col = 'col-lg-6';
                    $class_big = '';
                }
                ?>

                <div class="<?php echo $class_col ?> my-3">
                    <div class="box <?php echo $class_big ?>">
                        <div class="overflow-hidden" onClick="redirectTo('<?php echo $article_link ?>')"><div class="bg-image thumbnail" style="background-image:url('<?php echo $article_fields['image']?>')"></div></div>
                        <div class="px-3 py-2">
                            <h4 class="my-3"><?php echo $article_title ?></h4>
                            <p class="date"><?php echo $article_date ?></p>
                            <div class="absolute-link">
                                <a class="link" href="<?php echo $article_link ?>">More</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>

        </div>


    <?php
    die();
}

?>