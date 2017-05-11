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
<!--    <div class="badge-box">-->
<!--        <div class="badge">-->
<!--            <p>-->
<!--            --><?php
//            $date_post_day = get_the_date('d');
//            $date_post_month = get_the_date('M');
//            ?>
<!--            </p>-->
<!--            <time datetime="2013-01-01">--><?php //echo $date_post_day; ?><!--</time>-->
<!--            <p class="numb">--><?php //echo strtolower(strval($date_post_month)); ?><!--</p>-->
<!---->
<!--        </div>-->
<!--        <div class="extra-wrap">-->
<!---->
<!--            <a href="--><?php //echo get_post_permalink(); ?><!--"><h5>--><?php //the_title(); ?><!--</h5></a>-->
<!--            <div>-->
<!--                <a class="pull-right" href="--><?php //echo get_post_permalink(); ?><!--">-->
<!--                    --><?php //echo get_comments_number(); ?><!-- Comment(s)</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <a href="<?php echo get_post_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
    <?php the_content();?>


</li>

