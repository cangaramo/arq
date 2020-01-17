<?php 
    $args = array(
        'post_type' => 'products',
        'posts_per_page' => -1
    );
    $products = get_posts($args);
    $anchor = $values['anchor'];
?>

<div class="bg-image" style="background-image:url('<?php echo get_bloginfo('template_url')?>/assets/images/bg-1.png')">
<div id="<?php echo $anchor ?>" class="container products py-5">

    <h2 class="text-center py-5">Products</h2>

    <div class="row">

        <?php foreach ($products as $index=>$product): 
            $product_id = $product->ID;
            $image = get_field('image', $product_id);
            $title = get_the_title($product_id);
            $description = get_field('description', $product_id);
        ?>
                <!-- Even -->
                <div class="col-lg-6">

                    <div class="row product py-3 py-lg-5" id="product<?php echo $index ?>">

                        <!-- Text -->
                        <div class="col-lg-5 px-lg-0">
                            <img class="product-img d-block mx-lg-auto float-left float-lg-none" src="<?php echo $image ?>">
                        </div>

                        <!-- Image -->
                        <div class="col-lg-7">
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <div class="w-100">
                                    <h3 class="pfdin color-red mt-2 mt-lg-0"><?php echo $title ?></h3>
                                    <p><?php echo $description ?></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

        <?php endforeach ?>

    </div>

</div>
</div>