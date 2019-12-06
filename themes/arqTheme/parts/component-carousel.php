<?php 
    $items = $values['items'];
?>

<!-- Carousel -->
<div id="carouselHome" class="carousel slide" data-ride="carousel" style="">

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php 
        if (sizeof($items) > 1): ?>

            <?php foreach ($items as $index=>$item): ?>

                <?php if ($index == 0): ?>
                    <li data-target="#carouselHome" data-slide-to="<?php echo $index?>" class="active"></li>
                <?php else: ?>
                    <li data-target="#carouselHome" data-slide-to="<?php echo $index?>"></li>
                <?php endif; ?>

            <?php endforeach ?>

        <?php endif; ?>
    </ol>

    <div class="carousel-inner">

        <?php foreach ($items as $index=>$item): ?>

            <?php if ($index == 0): ?>
                <div class="carousel-item active">
            <?php else: ?>
                <div class="carousel-item">
            <?php endif; ?>

                    <div class="position-relative">
                        <div class="bg-image item" style="background-image:url('<?php echo $item['image'] ?>');"></div>
                    </div>

                    <div class="layer h-100 w-100">
                        <div class="container px-lg-5 px-lg-0 h-100">
                            <div class="col-lg-6 h-100">
                                <div class="d-flex align-items-center h-100 w-100">
                                    <div>
                                        <h1 class="heading mb-4"><?php echo $item['title'] ?></h1>
                                        <a class="link" href="<?php echo $item['button_link'] ?>"><?php echo $item['button_label'] ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        <?php endforeach ?>

    </div>

    <!-- Arrows -->
    <?php if (sizeof($items) > 1): ?>

        <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    <?php endif; ?>

</div> <!-- carousel -->