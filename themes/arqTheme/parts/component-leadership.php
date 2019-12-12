<?php 
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'people',
        'category_name' => 'board-of-directors'
    );
    $board = get_posts($args);

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'people',
        'category_name' => 'management-team'
    );
    $management = get_posts($args);
?>

<div class="container leadership py-5">

    <h2 class="text-center py-5">Leadership</h2>

    <div class="d-flex justify-content-center">
        <a class="open-slider mx-1 py-2 active" data-slider="management">Management team</a>
        <a class="open-slider mx-1 py-2" data-slider="board">Board</a>
    </div>

    <div class="my-4 mx-5">

        <div id="board-slider">
            <div class="board-members py-5">

                <?php foreach ($board as $person): 
                    $person_id = $person->ID;
                    $title = get_the_title($person_id);
                    $role = get_field('role', $person_id);
                    $short_bio = get_field('short_bio', $person_id);
                    $image = get_field('image', $person_id);
                    $bio = get_field('bio', $person_id);
                ?>

                    <div class="person px-md-3">
                        <div class="img-person bg-image" style="background-image:url('<?php echo $image ?>')"></div>
                        <h4 class="mt-3 mb-1"><?php echo $title ?></h4>
                        <p><strong><?php echo $role ?></strong></p>
                        <p><?php echo $short_bio ?></p>
                        <div class="absolute-link">
                            <a class="link open-person" 
                            data-bio="<?php echo $bio?>" data-image="<?php echo $image?>" data-title="<?php echo $title?>" data-role="<?php echo $role?>">More</a>
                        </div>
                    </div>

                <?php endforeach ?>

            </div>
        </div>

        <div id="management-slider">
            <div class="management-team py-5">

                <?php foreach ($management as $person): 
                    $person_id = $person->ID;
                    $title = get_the_title($person_id);
                    $role = get_field('role', $person_id);
                    $short_bio = get_field('short_bio', $person_id);
                    $image = get_field('image', $person_id);
                    $bio = get_field('bio', $person_id);
                ?>

                    <div class="person px-md-3">
                        <div class="img-person bg-image" style="background-image:url('<?php echo $image ?>')"></div>
                        <h4 class="mt-3 mb-1"><?php echo $title ?></h4>
                        <p><strong><?php echo $role ?></strong></p>
                        <p><?php echo $short_bio ?></p>
                        <div class="absolute-link">
                            <a class="link open-person" 
                            data-bio="<?php echo $bio?>" data-image="<?php echo $image?>" data-title="<?php echo $title?>" data-role="<?php echo $role?>">More</a>
                        </div>
                    </div>

                <?php endforeach ?>

            </div>
        </div>

    </div>

</div>


