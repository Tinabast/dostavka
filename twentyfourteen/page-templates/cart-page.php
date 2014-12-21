<?php
/**
 * Template Name: Cart Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


while ( have_posts() ) : the_post();
    the_content();
endwhile;
?>