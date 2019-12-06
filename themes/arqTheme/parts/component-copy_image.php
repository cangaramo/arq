<?php 
    $title = $values['title'];
    $copy = $values['copy'];
    $image = $values['image'];
    $button_label = $values['button_label'];
    $button_link = $values['button_link'];
?>

<div class="position-relative bg-whitesmoke copy-image" id="copy-image<?php echo $component_index?>">

    <!-- Mobile -->
    <img class="w-100 d-block d-md-none" src="<?php echo $image ?>">

    <div class="container position-relative" style="z-index: 2">
        <div class="row">
            <div class="col-md-5">
                <div class="py-5 my-lg-5 text position-relative" style="opacity:0; top: 40px">
                    <h2><?php echo $title ?></h2>
                    <div class="my-4"><?php echo $copy ?></div>
                    <a class="link" href="<?php echo $button_link ?>"><?php echo $button_label?></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Desktop -->
    <div class="w-100 h-100 absolute-top d-none d-md-block">
        <div class="row h-100">
            <div class="col-6 offset-6 h-100">
                <div class="w-100 h-100 bg-image" style="background-image:url('<?php echo $image ?>')"></div>
            </div>
        </div>
    </div>

</div>

<hr class="red-line">

