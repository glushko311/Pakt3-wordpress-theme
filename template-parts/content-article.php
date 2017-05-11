<?php
/**
 * Template part for displaying page content in blog
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pakt3
 */

?>
<article class="span3 box4">
    <div class="thumb-pad4">
        <div class="thumbnail caption article_thumbnail">
            <a href="<?php the_permalink();?>">
                <h5><?php echo get_the_title(); ?></h5>
                    <?php echo get_the_post_thumbnail( null ); ?>

                    <div class="caption"><?php the_truncated_post( 120 ); ?></div>

<!--                --><?php //the_content('');?>
            </a>
        </div>
    </div>
</article>

