<?php
/**
 * Template Name: Shop Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?
global $post_id, $post_parent, $paged, $posts_per_page, $parent_permalink;
$args = array(
	'numberposts'     => -1,
	'offset'          => 0,
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'include'         => '',
	'exclude'         => '',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_type'       => 'page',
	'post_mime_type'  => '',
	'post_status'     => ''
);
if($post_parent){
    $args['post_parent'] = $post_id;
    $args['post_status'] = 'draft';
    $items = get_posts($args);
    $args['post_parent'] = $post_parent;
    $args['post_status'] = '';
    $sub_menu_items = get_posts($args);
    $sub_menu = get_sub_menu($sub_menu_items);
}else{
    $args['post_parent'] = $post_id;
    $args['post_status'] = 'public';
    $cats = get_posts($args);
    $sub_menu = get_sub_menu($cats);
    $items = array();
    $args['post_status'] = 'draft';
    foreach($cats as $cat){
        $args['post_parent'] = $cat->ID;
        $resp = get_posts($args);
        $items = array_merge($items, $resp);
    }
    $total = ceil(count($items) / $posts_per_page);
    $items = show_items($items, $paged, $posts_per_page);
}
?>
<div class="texture texture__white content-wrapper">
	<div class="container">
		<div class="grid-inline grid-inline_b v-centered">
			<div class="column column_a">
				<a href="<?=$parent_permalink?>">
					<?
                        if(!$post_parent){
                            echo get_the_post_thumbnail($post_id, "medium");
                        }else{
                            echo get_the_post_thumbnail($post_parent, "medium");
                        }
                    ?>
				</a>
			</div>
			<div class="column column_b">
				<ul class="menu-list">
                    <?=$sub_menu?>
				</ul>
			</div>
		</div>
		<h2 class="page-subtitle">
			<?if($post_parent){the_title();}?>
		</h2>
		<div class="grid-inline grid-inline_b">
			<div class="column column_b">
				<div class="grid-inline">
                    <?
                        foreach($items as $item){
                            $meta = get_post_meta($item->ID);
                            echo '
                                <div class="column one-third card-item">
            						<div class="card-item__image-wrapper v-centered">
            							'.get_the_post_thumbnail($item->ID, "thumbnail", array("class"	=> "card-item__image")).'
            						</div>
            						<div class="card-item__title-wrapper">
            							<h3 class="card-item__title">
            								'.$item->post_title.'
            							</h3>
            						</div>
            						<div class="card-item__datails">
            							'.$item->post_content.'
            						</div>
            						<div class="card-item__output">
            							Выход: '.$meta['Выход'][0].'
            						</div>
            						<div class="card-item__bottom clearfix">
            							<div class="card-item__price">
            								'.$meta['Цена'][0].' <span class="icon icon_ruble"></span>
            							</div>
            							<button class="btn btn_red card-item__button" data-href="http://'.$_SERVER["SERVER_NAME"].'/корзина/?add='.$item->ID.'">
            								Хочу
            							</button>
            						</div>
            					</div>
                            ';
                        }
                    ?>
				</div>
                <?php
                    $big = 999999999;
                    $args = array(
                    	 'base'         => str_replace( $big, '%#%', get_pagenum_link( $big ) )
                    	,'format'       => ''
                    	,'total'        => $total
                    	,'current'      => max( 1, $paged )
                    	,'show_all'     => False
                    	,'end_size'     => 1
                    	,'mid_size'     => 2
                    	,'prev_next'    => True
                    	,'prev_text'    => __('« Previous')
                    	,'next_text'    => __('Next »')
                    	,'type'         => 'plain'
                    	,'add_args'     => False
                    	,'add_fragment' => ''
                    ); 
                    $pagination = paginate_links( $args );
                    $pagination = str_replace( '/page/1/', '/', $pagination );
                ?>
                <div class="pagination">
                    <?=$pagination?>
                </div>
			</div>
			<aside class="column column_a sidebar">
				<form method="get" class="search-form" id="search-form" action="/поиск/">
					<fieldset class="search-group">
						<input type="search" id="search-field" name="search" class="search-field input_gray" placeholder="Поиск по сайту">
						<button type="submit" id="search-submit" class="btn btn_icon search-submit">
							<i class="icon icon_main-sprite icon_magn-glass"></i>
						</button>
					</fieldset>
				</form>
				<ul class="sidebar-nav">
                    <?
                    global $dishes_menu_items;
                    foreach($dishes_menu_items as $li){
                        echo '
                            <li class="sidebar-nav__item">
        						<a class="sidebar-nav__link" href="'.$li->url.'">
    								<i class="icon icon_main-sprite '.$li->classes[0].'_small"></i>
									<span  class="sidebar-nav__text">
                                        '.$li->title.'
                                    </span>
                                </a>
                            </li>
                        ';
                    }
                    ?>
				</ul>
			</aside>
			
		</div>
	</div>
</div>
<?
get_footer();
?>