<?php 
    $footer = get_field('footer', 'option'); 
    $addresses = $footer['addresses'];
?>

<footer >

    <div class="bg-ligth_gray">
        <div class="container py-5">
            <div class="d-md-flex align-items-center justify-content-center">
                <p class="signup">Sign up for updates</p>
                <div class="ml-md-4"><?php echo gravity_form( 2, false, false, false, '', true ); ?></div>
            </div>
        </div>
    </div>

    <div class="bg-black">
        <div class="container pt-5">
            <div class="row">
                <?php foreach ($addresses as $address): ?>
                    <div class="col-sm py-4">
                        <div class="address px-3">
                            <?php echo $address['address']?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <p class="text-center py-5">© 2019 Arq | Privacy Policy </p>
        </div>
    </div>

</footer>

<!-- Peson modal -->
<div class="modal fade" id="modalPerson" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header d-block pb-0">
                <a data-dismiss="modal" href="" class="float-right mb-3 mb-sm-0"><img height="20" src="<?php echo get_bloginfo('template_url')?>/assets/images/close.png"></a>
            </div>

            <div class="modal-body pt-0 pb-4">
                <div class="row">
                    <div class="col-sm-4 pr-4">
                        <img class="image w-100 mb-4">
                    </div>
                    <div class="col-sm-8">
                        <h2 class="title color-red"></h2>
                        <p class="role mb-4">Role</p>
                        <div class="bio"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
