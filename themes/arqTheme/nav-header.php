<?php 
    $user = wp_get_current_user();
    $user_role = (array) $user->roles; 
    $role = $user_role[0];

    if ($role == "investor" || $role == "administrator"): 
        $logged_in = true;
    else:
        $logged_in = false;
    endif;    
?>

<header class="position-relative" style="background: transparent">

    <div class="container" style="z-index: 3;position: relative; background: white">

        <!-- Mobile bar -->
        <div class="d-block d-lg-none h-100 py-4">
            <div class="container">
                <div class="d-flex justify-content-between">

                    <div></div>

                    <!-- Logo -->
                    <div class="">
                        <a class="text-center" href="<?php echo home_url(); ?>"><img class="img-logo" height="40" src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/arq-logo.svg" alt="Logo"></a>
                    </div>

                    <!-- Open menu -->
                    <button class="navbar-toggler collapsed" type="button"  data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>	
                    </button>

                </div>
            </div>
        </div>

        <div class="w-100 d-none d-lg-block"> 
            <div class="d-flex justify-content-end">

                <!-- Logout -->
                <?php if ($logged_in): ?>
                    <div><a class="logout mr-2" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></div>
                    <div><a class="logout mr-2" href="/account">Account</a></div>
                <?php endif ?>

                <!-- Investors area -->
                <?php if ($logged_in): ?>
                    <div><a href="/arq-investor-area/" class="link mr-3" >Investors</a></div>
                <?php else: ?>
                    <div><a href="/login" class="link mr-4 pt-3" >Investors Login</a></div>
                <?php endif ?>

                <div class="pt-1 top-icons">
                    <a href="https://www.twitter.com/ArqCompany" target="_blank" class="ml-3"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/company/arq-group-limited/" target="_blank" class="ml-2 pl-1"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.facebook.com/ArqCompany" target="_blank" class="ml-2 pl-1"><i class="fab fa-facebook-f"></i></a>
                </div>
                
            </div>
        </div>
        
        <nav class="navbar navbar-expand-lg py-0 py-lg-3 px-lg-0 w-100" >

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                <a class="text-center d-none d-lg-block" href="<?php echo home_url(); ?>"><img height="40" src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/arq-logo.svg" alt="Logo"></a>

                <div class="navbar-nav w-100 d-flex justify-content-lg-end pt-1">
                    
                    <hr class="mt-2">

                    <?php 
                    $menu_name = 'main'; 
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

                    foreach ($menuitems as $index=> $menuitem):

                        $parent = $menuitem->menu_item_parent;
                        $title = $menuitem->title;
                        $url = $menuitem->url;
                        $id = $menuitem->ID;
                        $target = $menuitem->target;

                        $current_title = get_the_title();
                        if ($current_title == $title) {
                            $class= "active";
                        }
                        else {
                            $class = "";
                        }

                        $parent = $menuitem->menu_item_parent; 
                        if ($parent == 0 ): 

                            $dropdown = false;
                            foreach ($menuitems as $menusubitem):
                                $parentsubitem = $menusubitem->menu_item_parent;
                                if ($parentsubitem == $id ):
                                    $dropdown = true;
                                endif; 
                            endforeach; 

                            /* Dropdown item */
                            if ($dropdown): ?>

                            <div class="dropdown">

                                <!-- Mobile -->
                                <div class="d-flex justify-content-center align-items-center d-inline-block d-lg-none">
                                    <a href="<?php echo $url ?>" class="nav-item nav-link mobile-toggle dropdown-toggle <?php echo $class ?>" id="dropdownMenuButton" ><span><?php echo $title ?></span></a>
                                    <a class="mt-1"><i class="ml-2 fas fa-chevron-down"></i></a>
                                </div>
                                
                                <div class="links d-lg-none">
                                    <?php foreach ($menuitems as $menusubitem):
                                            $parentsubitem = $menusubitem->menu_item_parent;
                                            $titlesubitem = $menusubitem->title;
                                            $urlsubitem = $menusubitem->url;
                                            $idsubitem = $menusubitem->object_id;
                                                        
                                            if ($parentsubitem == $id ): ?>   
                                                <a class="nav-item nav-link sublink" href="<?php echo $urlsubitem?>"><?php echo $titlesubitem;?></a>
                                            <?php endif; 
                                    endforeach; ?>
                                </div>

                                <!-- Desktop -->
                                <a href="<?php echo $url ?>" class="nav-item nav-link <?php echo $class ?> d-none d-lg-block" id="dropdownMenuButton" ><?php echo $title ?></a>

                               <!-- Dropdown -->
                                <div class="dropdown-menu m-0" aria-labelledby="dropdownMenuLink">

                                    <div class="arrow-up"></div>

                                    <?php foreach ($menuitems as $menusubitem):
                                        $parentsubitem = $menusubitem->menu_item_parent;
                                        $titlesubitem = $menusubitem->title;
                                        $urlsubitem = $menusubitem->url;
                                        $idsubitem = $menusubitem->object_id;
                                                    
                                        if ($parentsubitem == $id ): ?>   
                                            <div><a class="dropdown-item" href="<?php echo $urlsubitem?>"><?php echo $titlesubitem;?></a></div>
                                        <?php endif; 
                                    endforeach; ?>
                                </div>

                                <hr>

                            </div>

                            <!-- Normal item -->
                            <?php else: ?>
                               
                                <a class="nav-item nav-link px-lg-0 mx-lg-3 <?php echo $class ?>" href="<?php echo $url?>" target="<?php echo $target ?>"><span><?php echo $title ?></span></a>
                                <hr>
                            <?php endif; ?>
                        
                        <?php endif; ?>

                         
                    <?php endforeach ?>
                    
                    <!-- Investors area -->
                    <?php if ($logged_in): ?>
                        <a class="nav-item nav-link px-lg-0 mx-lg-3 d-block d-lg-none" href="/arq-investor-area/"><span>Investors</span></a>
                        <hr>
                        <a class="nav-item nav-link px-lg-0 mx-lg-3 d-block d-lg-none" href="<?php echo wp_logout_url( home_url() ); ?>">Account</a>
                        <hr>
                        <a class="nav-item nav-link px-lg-0 mx-lg-3 d-block d-lg-none" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
                    <?php else: ?>
                        <a class="nav-item nav-link px-lg-0 mx-lg-3 d-block d-lg-none" href="/login"><span>Investors Login</span></a>
                    <?php endif ?>

                    <hr>

                    <a class="nav-item pl-lg-3 search-btn open-search text-center"><img src="<?php echo get_bloginfo('template_url')?>/assets/images/search.png"></a>
                    <hr>

                    <div class="d-flex justify-content-center mt-2 d-lg-none top-icons pb-5">
                        <a href="https://www.twitter.com/ArqCompany" target="_blank" class="mx-3"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/company/arq-group-limited/" target="_blank" class="mx-3"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.facebook.com/ArqCompany" target="_blank" class="mx-3"><i class="fab fa-facebook-f"></i></a>
                    </div>

                </div>
            </div>

        </nav>

    </div>



</header>

<div id="red" class="open-nav-bg" style="">
</div>


<?php require 'parts/part-search.php';
