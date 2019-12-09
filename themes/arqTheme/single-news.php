<?php get_header(); ?>
<?php require('nav-header.php') ?>

<?php 
    $title = get_the_title();
    $all_fields = get_fields();
    $related_articles = $all_fields['related_articles'];
    $event_id = $all_fields['event'];
?>

<main>

    <hr class="red-line">

    <div class="container pt-4">
        <p class="breadcrumbs"><span class="mr-2">> </span><a href="/news-media">News & Media </a><span class="color-red mx-2">></span> <?php echo $title ?> </p>
    </div>

    <!-- Title and copy -->
    <div class="container py-3 py-lg-5">

        <div class="row">

            <div class="col-lg-5 mb-4">
                <h2><?php echo $title ?></h2>
                <img class="w-100 mt-4" src="<?php echo $all_fields['image'] ?>">
            </div>

            <div class="col-lg-6 offset-lg-1">
                <?php echo $all_fields['copy'] ?>
            </div>

        </div>
    </div>

    <!-- Related articles -->
    <div class="bg-ligth_gray">

        <div class="container py-lg-5">

            <h3 class="pt-4">More articles</h3>


            <div class="row boxes py-5">

                <?php foreach ($related_articles as $related_article): 
                    $article_id = $related_article->ID;
                    $title = get_the_title($article_id);
                    $article = get_fields($article_id);
                ?>
                    <div class="col-lg-4 mb-4">
                        <div class="box">
                            <div class="overflow-hidden" onClick="redirectTo('<?php echo $permalink ?>')"><div class="bg-image thumbnail" style="background-image:url('<?php echo $article['image']?>')"></div></div>
                            <div class="px-3 py-2">
                                <?php if ($title): ?>
                                    <h3 class="my-3"><?php echo $title ?></h3>
                                <?php endif ?>
                                <p><?php echo $article['description']?></p>
                                <div class="absolute-link">
                                    <a class="link" href="<?php echo $permalink ?>">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
        
                <?php endforeach ?>

            </div>

        </div>
    </div>


    <!-- Event -->
    <?php 
    $event_title = get_the_title($event_id);
    $event_fields = get_fields($event_id);
    $event_permalink = get_the_permalink($event_id);
    ?>
    <div class="position-relative color-white bg-dark_gray">

        <div class="container position-relative py-4 py-lg-0" style="z-index: 2">
            <div class="row">
                <div class="col-md-5 py-5 py-lg-0">
                    <div class="more-padding-top">
                        <h2><?php echo $event_title ?></h2>
                        <div class="my-4"><?php echo $event_fields['description'] ?></div>
                        <a class="link-white" href="<?php echo $event_permalink ?>">More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 h-100 absolute-top d-none d-md-block">
            <div class="row h-100">
                <div class="col-md-6 offset-md-6 h-100">
                    <div class="w-100 h-100 bg-image" style="background-image:url('<?php echo $event_fields['image'] ?>')"></div>
                </div>
            </div>
        </div>

        <img class="w-100 d-block d-md-none" src="<?php echo $event_fields['image'] ?>">

    </div>

</main>


<?php require('nav-footer.php') ?>
<?php get_footer(); ?>
