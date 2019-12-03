<?php 
    $args = array(
        'post_type' => 'vacancies',
        'posts_per_page' => -1
    );
    $vacancies = get_posts($args);
?>

<div class="bg-dark_gray color-white">
    <div class="container py-5 vacancies">

        <h2 class="mb-5">Vacancies</h2>

        <div class="row labels pb-4">
            <div class="col-4">
                <p>Job title</p>
            </div>
            <div class="col-3">
                <p>Role</p>
            </div>
            <div class="col-3">
                <p>Date</p>
            </div>
            <div class="col-2">
            </div>
        </div>
        
        <?php foreach ($vacancies as $vacancy):
            $vacancy_id = $vacancy->ID;
            $title = get_the_title($vacancy_id);
            $role = get_field('role', $vacancy_id);
            $date = get_field('date', $vacancy_id);
            $permalink = get_the_permalink($vacancy_id);
        ?>

            <hr class="white-line">
            <div class="row py-4 vacancy">
                <div class="col-4">
                    <h4><?php echo $title ?></h4>
                </div>
                <div class="col-3">
                    <p><?php echo $role ?></p>
                </div>
                <div class="col-3">
                    <p><?php echo $date ?></p>
                </div>
                <div class="col-2">
                    <a class="link" href="<?php echo $permalink ?>">View</a>
                </div>
            </div>

        <?php endforeach ?>
    </div>
</div>