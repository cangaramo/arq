<?php 
    $boxes = $values['boxes'];
    $anchor = $values['anchor'];
?>

<div id="<?php echo $anchor ?>" class="container four-boxes my-5 py-2">
    <div class="row">

        <?php foreach ($boxes as $box): ?>

            <div class="col-lg-3 px-lg-2">
                <div class="add-shadow h-100">
                    <img class="w-100" src="<?php echo $box['image'] ?>">
                    <div class="px-3">
                        <p class="mt-3 mb-2"><strong><?php echo $box['title']?></strong></p>
                        <p><?php echo $box['text'] ?></p>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    </div>
</div>