<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?
$curpageurl = get_permalink();
global $post_id, $post_parent;
$post_id = $wp_query->post->ID;
$post_parent = $wp_query->post->post_parent;

$menu = 6;
$args = array(
	'order'                  => 'ASC'
	,'orderby'                => 'menu_order'
	,'post_type'              => 'nav_menu_item'
	,'post_status'            => 'publish'
	,'output'                 => ARRAY_A
	,'output_key'             => 'menu_order'
	,'nopaging'               => true
	,'update_post_term_cache' => false 
);
global $top_menu_items;
$top_menu_items = wp_get_nav_menu_items( $menu, $args );
           
$menu = 7;
$args = array(
	'order'                  => 'ASC'
	,'orderby'                => 'menu_order'
	,'post_type'              => 'nav_menu_item'
	,'post_status'            => 'publish'
	,'output'                 => ARRAY_A
	,'output_key'             => 'menu_order'
	,'nopaging'               => true
	,'update_post_term_cache' => false 
);
global $dishes_menu_items;
$dishes_menu_items = wp_get_nav_menu_items( $menu, $args );
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri();?>/css/base.css">
		<meta charset="utf8">
	</head>
	<body>
		<div class="texture texture__white header-wrapper">
			<div class="container">
				<header class="grid-inline grid-inline_a">
					<div class="column column_a">
						<div class="logo-wrapper">
							<a href="/"><img class="logo" src="<?=get_template_directory_uri();?>/images/logo.png"></a>
						</div>
					</div>
					<div class="column column_b">
						<div class="grid-float clearfix">
							<div class="column left">
								<i class="icon icon_main-sprite icon_phone"></i>
								<span class="phone-number">
									+38 (099) <span class="phone-number_red">1</span>-923-923
								</span>							
							</div>
							<div class="column right">
								<i class="icon icon_main-sprite icon_mobile"></i>
								<span class="phone-number">
									+38 (099) <span class="gc-red">1</span>-923-923
								</span>	
							</div>
						</div>
						<div class="callback">
							<a href="#" class="callback_link" data-popup="call_popup">Перезвонить вам?</a>
						</div>
						<hr class="gray-divider">
						<div>
							<i class="icon icon_main-sprite icon_clock"></i>
							<span class="online-order-text">
								<strong>Онлайн заказы</strong>
								принимаются
								<strong class="gc-red">с 10:00 до 22:00</strong>
							</span>
						</div>
					</div>
					<div class="column column_c">
						<?php if (function_exists('getsmallcart')) echo getsmallcart(); ?>
					</div>
				</header>
                <div class="nav-wrapper texture texture__gray">
					<ul class="nav grid-justified">
                        <?
                        global $top_menu_items;
                        
                        foreach($top_menu_items as $li){
                            echo '
                                <li class="nav__item ';
                            if($curpageurl === $li->url || $li->object_id == $post_parent){
                                    echo 'active';
                                    global $parent_permalink;
                                    $parent_permalink = $li->url;
                            }
                            echo ' column">
                                    <a class="nav__link" href="'.$li->url.'">
        								<span class="nav__link-text">
        									'.$li->title.'
        								</span>
        							</a>
                                </li>
                            ';
                        }
                        ?>
                    </ul>
				</div>
			</div>
		</div>