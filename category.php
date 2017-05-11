<?php
/**
 * Created by PhpStorm.
 * User: Шалена Жирафа
 * Date: 01.05.2017
 * Time: 21:20
 */



get_header(); ?>
 <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
<!--            <h1>--><?php //echo getCurrentCatID(); ?><!-- </h1>-->
<!--            <h1>--><?php //echo get_marker_of_page(); ?><!-- </h1>-->

            <?php
            //Новости
            if(getCurrentCatID()=='15' || getCurrentCatID()=='16' || getCurrentCatID()=='23'){
                //getCurrentCatID() описана в function.php ?>
            <div class="entry-content">
                <div class="container padBot">
                    <div class="row">
                        <article class="span12">
                            <h3 class="margTop1"><?php single_cat_title();?></h3>
                            <ul class="list3 blog-box">

                                <?php
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/content', 'news' );
//
                                endwhile; // End of the loop.
            ?>
                            </ul>
                        </article>
                        </div>
                    </div>
                </div>
            <?php
                //Статьи
            }elseif(getCurrentCatID()=='17' || getCurrentCatID()=='18' || getCurrentCatID()=='22'){
                //getCurrentCatID() описана в function.php ?>

                <div class="entry-content">
                    <div class="container padBot">
                        <div class="row">
                        <section class="span12">
                            <h3 class="margTop1"><?php single_cat_title();?></h3>
                            <div class="row">
                <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'article' );
//
                endwhile; // End of the loop.?>
                            </div>
                        </section>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php

//get_sidebar();
get_footer();