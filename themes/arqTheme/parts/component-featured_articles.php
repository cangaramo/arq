<?php 
    $title = $values['title'];
    $articles = $values['articles'];
    $anchor = $values['anchor'];
?>

<div id="<?php echo $anchor ?>" class="container my-lg-5 py-5">

    <?php if ($title): ?>
        <h2 class="text-center pb-5"><?php echo $title ?></h2>
    <?php endif ?>

    <div class="row boxes">
        
        <?php foreach ($articles as $article): 
            $title = get_the_title($article);
            $permalink = get_the_permalink($article);
            $all_fields = get_fields($article);
            $article_date = get_the_date('F j, Y', $article);
        ?>
            <div class="col-lg-4 my-3">
                <div class="box">
                    <div class="overflow-hidden" onClick="redirectTo('<?php echo $permalink ?>')"><div class="bg-image thumbnail" style="background-image:url('<?php echo $all_fields['image']?>')"></div></div>
                    <div class="px-3 py-2">
                        <?php if ($title): ?>
                            <h3 class="my-3"><?php echo $title ?></h3>
                        <?php endif ?>
                        <p><?php echo $article_date ?></p>
                        <p><?php echo $all_fields['description']?></p>
                        <div class="absolute-link">
                            <a class="link" href="<?php echo $permalink ?>">More</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </div>
</div>