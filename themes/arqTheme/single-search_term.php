 
    <?php
        $id = get_the_ID();
        $url = get_field("link", $id);
        echo'<script> window.location=" ' .  $url .  '"; </script> ';    
    ?>


