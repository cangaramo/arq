<?php 
    $args = array(
        'post_type' => 'products',
        'posts_per_page' => -1
    );
    $products = get_posts($args);
?>

<div class="products">
    <?php foreach ($products as $index=>$product): 
        $product_id = $product->ID;
        $image = get_field('image', $product_id);
        $title = get_the_title($product_id);
        $description = get_field('description', $product_id);

        if ($index%2 ==0) : ?>

            <!-- Even -->
            <div class="bg-image" style="background-image:url('<?php echo get_bloginfo('template_url')?>/assets/images/bg-1.png)">
                <div class="container py-5">

                    <div class="row product" id="product<?php echo $index ?>">

                        <!-- Text -->
                        <div class="col-lg-6 order-last order-lg-first">
                            <img class="product-img d-block mx-auto" src="<?php echo $image ?>">
                        </div>

                        <!-- Image -->
                        <div class="col-lg-6 order-first order-lg-last">
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <div class="w-lg-75">
                                    <h3 class="pfdin color-red"><?php echo $title ?></h3>
                                    <p><?php echo $description ?></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        <?php else: ?>

            <!-- Odd -->
            <div class="bg-image" style="background-image:url('<?php echo get_bloginfo('template_url')?>/assets/images/bg-2.png)">
                <div class="container py-5">

                    <div class="row product" id="product<?php echo $index ?>">

                        <!-- Text -->
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <div class="w-lg-75">
                                    <h3 class="pfdin color-red"><?php echo $title ?></h3>
                                    <p><?php echo $description ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="col-lg-6">
                            <img class="d-block mx-auto product-img" style="height: 300px" src="<?php echo $image ?>">
                        </div>
                    </div>

                </div>
            </div>
                
        <?php endif ?>
            
    <?php endforeach ?>
</div>