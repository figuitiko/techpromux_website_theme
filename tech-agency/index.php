<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 22/04/2017
 * Time: 02:02 PM
 */
get_header();
?>

<section>
    <div class="container">
    <div class="row">

        <div class="col-sm-9 ">
            <h2 class="section-heading">Our Blog</h2>
            <h3 class="section-subheading text-muted">Catch us with Us</h3>






            <?php
            if (have_posts()) :
                ?>


                <?php
                while (have_posts()) : the_post();
                    ?>

                    <?php

                    get_template_part('content');

                endwhile;



            else :
                echo '<p>No content found</p>';

            endif;

            ?>
        </div>
        <div class="col-md-3">

            <?php get_sidebar()?>
        </div>
        </div>
    </div>
</section><!-- /site-content -->


<?php get_footer();

?>
