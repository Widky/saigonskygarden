<?php 
$queried_object = get_queried_object();
$term_tax = $queried_object->taxonomy;
// var_dump($queried_object);
if($term_tax) :
    require_once( get_stylesheet_directory() . '/template-parts/taxonomy-templates/tax-'.$term_tax.'.php');
else:
    require_once( get_stylesheet_directory() . '/template-parts/taxonomy-templates/tax-none.php');
endif;