<?php
/**
 * Template part for displaying page content in blog
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pakt3
 */

?>
<li class="clearfix">
    <a href="<?php the_permalink();?>">
        <div class="badge-box">
            <div class="span2">

                <h5><?php echo get_the_date('d-m-Y'); ?></h5>
            </div>
            <div class="extra-wrap">
                <h5><?php echo get_the_title(); ?></h5>
            </div>
        </div>





        <div class="thumb-pad5">
            <div class="thumbnail">
                <?php echo get_the_post_thumbnail(null, "thumbnail" , array('class' => 'alignleft', 'style' => "margin-right:10px") ); ?>
<!--                --><?php //echo get_the_post_thumbnail( null ); ?>
                <div  class="caption"><?php the_truncated_post( 720 ); ?></div>

            </div>
        </div>


    </a>
</li>

