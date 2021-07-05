<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Hotel Center Lite child
 */

get_header(); 

include get_stylesheet_directory() . '/inc/lang/translate.php';

?>
<style>
<?php include get_stylesheet_directory() . '/assets/css/category.css';
?>
</style>
<?php 
$terms = wp_get_object_terms( get_the_ID(), 'category');
// var_dump($terms);exit;
$term_name = $terms[0]->name;
$term_des = $terms[0]->description;

$pageTitle = $term_name;

$pageSubTitle = $term_name;

$imageUrlBreadcrumb = get_stylesheet_directory_uri().'/assets/images/img-breacrumb/bc-image-about.png';
// Call function breadcrumb
breadcrumb_header($pageTitle, $pageSubTitle, $imageUrlBreadcrumb);
?>
<div id="single_area">
    <div class="container">
        <section class="single-content">
            <?php while ( have_posts() ) : the_post(); ?>

            <?php if($terms[0]->taxonomy == 'category') : ?>

            <?php require_once(get_stylesheet_directory() . '/template-parts/contents/content-single-cat.php' ); ?>

            <?php endif; ?>

            <?php endwhile; // end of the loop. ?>
        </section>

        <?php //get_sidebar();?>

        <div class="clear"></div>
    </div>
</div><!-- container -->
<?php get_footer(); ?>