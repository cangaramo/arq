<?php
/*
Template Name: Parallax
*/
$fields = get_fields(get_the_ID());
$banner = $fields['banner'];

$args = array(
    'post_type' => 'news',
    'posts_per_page' => 5
);
$news = get_posts($args);

$event = $fields['event'];
$event_title = get_the_title($event);
$event_fields = get_fields($event);
$event_permalink = get_the_permalink($event);
?>

<?php get_header(); ?>

<div>
			
	<main>

        <div class="parallax">

            <!-- Group 1 -->
            <div id="group1" class="parallax__group" style="height:320px; background:white; z-index: 5">

               <?php require('nav-header.php') ?>

                <div class="bg-image banner position-relative" style="background-image:url('<?php echo $banner['image'] ?>')">
                    <div class="layer h-100 w-100">
                        <div class="container h-100">
                            <div class="d-flex h-100 align-items-center">
                                <h1><?php echo $banner['title'] ?></h1>
                            </div>
                        </div>
                    </div>
                </div> 

            </div>

            <!-- Group 2 -->
            <div id="group2" class="parallax__group" style="z-index: 3; height: 1300px;">

                <div class="parallax__layer parallax__layer--base">

                    <div class="container py-5">

                        <div class="row">
                            <div class="col-8 offset-2">
                                <div class="row news">

                                    <?php foreach ($news as $index=>$article): 
                                        $article_id = $article->ID;
                                        $article_date = get_the_date('F j, Y', $article_id);
                                        $article_title = get_the_title($article_id);
                                        $article_fields = get_fields($article_id);


                                        if ($index == 2){
                                            $class_col = 'col-12';
                                            $class_big = 'big';
                                        }
                                        else {
                                            $class_col = 'col-6';
                                            $class_big = '';
                                        }
                                    ?>

                                        <div class="<?php echo $class_col ?> my-3">
                                            <div class="box <?php echo $class_big ?>">
                                                <div class="bg-image thumbnail" style="background-image:url('<?php echo $article_fields['image']?>')"></div>
                                                <div class="px-3 py-2">
                                                    <h4 class="my-3"><?php echo $article_title ?></h4>
                                                    <p class="date"><?php echo $article_date ?></p>
                                                </div>
                                            </div>
                                        </div>


                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="parallax__layer parallax__layer--back" style="background:white">
                    <div class="w-100 h-100 bg-image" style="background-image:url('<?php echo get_bloginfo('template_url')?>/assets/images/arq-bg.png'); ">
                    </div>
                </div>

            </div>

            <!-- Group 3 -->
            <div id="group3" class="parallax__group" style="height:450px; background:white; z-index: 5">

                <div class="position-relative bg-dark_gray color-white">

                    <div class="container position-relative" style="z-index: 2">
                        <div class="row">
                            <div class="col-5">
                                <div class="more-padding-top">
                                    <h2><?php echo $event_title ?></h2>
                                    <div class="my-4"><?php echo $event_fields['description'] ?></div>
                                    <a class="link" href="<?php echo $event_permalink ?>">More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 h-100 absolute-top">
                        <div class="row h-100">
                            <div class="col-6 offset-6 h-100">
                                <div class="w-100 h-100 bg-image" style="background-image:url('<?php echo $event_fields['image'] ?>')"></div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <?php require('nav-footer.php') ?>
               
            </div>

        </div>


	</main> <!-- end #content -->

<?php get_footer(); ?>
