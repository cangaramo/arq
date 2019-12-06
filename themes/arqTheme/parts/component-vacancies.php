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

        <div class="row labels pb-4 d-none d-lg-block">
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
        
        <?php foreach ($vacancies as $index=>$vacancy):
            $vacancy_id = $vacancy->ID;
            $title = get_the_title($vacancy_id);
            $role = get_field('role', $vacancy_id);
            $date = get_field('date', $vacancy_id);
            $copy = get_field('copy', $vacancy_id);
        ?>

            <hr class="white-line">
            <div class="row py-4 vacancy" data-toggle="collapse" href="#collapsJob<?php echo $index ?>">
                <div class="col-lg-4 py-1">
                    <h4><?php echo $title ?></h4>
                </div>
                <div class="col-lg-3">
                    <p><?php echo $role ?></p>
                </div>
                <div class="col-lg-3 py-1">
                    <p><?php echo $date ?></p>
                </div>
                <div class="col-2 pt-3">
                    <a class="link open">View</a>
                </div>
            </div>
            <div class="collapse" id="collapsJob<?php echo $index ?>">
                <div class="pt-3 pb-4 pr-3">
                    <?php echo $copy ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>