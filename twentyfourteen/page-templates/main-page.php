<?php
/**
 * Template Name: Main Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?
$args = array(
	'numberposts'     => -1,
	'offset'          => 0,
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'include'         => '',
	'exclude'         => '',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_type'       => 'post',
	'post_mime_type'  => '',
	'post_status'     => '',
    'category_name'   => 'slider'
);
$slides = get_posts($args);
?>
        <div class="texture texture__red slider-wrapper">
			<div class="container slider-container">
				<div class="slider slider1">
					<div class="cycle-slideshow" 
						data-cycle-fx=scrollHorz
						data-cycle-timeout=2000
						data-cycle-pager=".slider1 .pager"
						data-cycle-pager-template="<a href='#' class='pager-icon'>{slideNum}}</a>"
						data-slides="> .slide"
					>
						<div class="pager_wrapper">
							<div class="pager"></div>
						</div>
                        <?
                        foreach($slides as $item){
                            $meta = get_attached_media( 'image', $item->ID);
                            $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'full');
                            foreach($meta as $element){
                                $img = $element->guid;
                            }
                            echo '
                                <div class="slide" data-image="'.$thumb_url[0].'">
        							<div class="slide-info">
        								<img class="slide-info__image" src="'.$img.'">
        								<div class="slide-info__text">
        									'.$item->post_content.'
        								</div>
        								<div class="slide-info__text">
        									'.$item->post_content.'
        								</div>
        							</div>
        						</div>
                            ';
                        }
                        ?>
                        <!--
						<div class="slide" data-image="<?=get_template_directory_uri();?>/images/slider.png">
							<div class="slide-info">
								<img class="slide-info__image" src="<?=get_template_directory_uri();?>/images/sariban.png">
								<div class="slide-info__text">
									Национальный трактир в грузинском стиле с отличной кухней
								</div>
								<div class="slide-info__text">
									Национальный трактир в грузинском стиле с отличной кухней
								</div>
							</div>
						</div>
						<div class="slide" data-image="<?=get_template_directory_uri();?>/images/slider.png">
							<div class="slide-info">
								<img class="slide-info__image" src="<?=get_template_directory_uri();?>/images/eva.png">
								<div class="slide-info__text">
									Национальный трактир в грузинском стиле с отличной кухней
								</div>
							</div>
						</div>
						<div class="slide" data-image="<?=get_template_directory_uri();?>/images/slider.png">
							<div class="slide-info">
								<img class="slide-info__image" src="<?=get_template_directory_uri();?>/images/sariban.png">
								<div class="slide-info__text">
									Национальный трактир в грузинском стиле с отличной кухней
								</div>
								<div class="slide-info__text">
									Национальный трактир в грузинском стиле с отличной кухней
								</div>
							</div>
						</div>
						<div class="slide" data-image="<?=get_template_directory_uri();?>/images/slider.png">
							<div class="slide-info">
								<img class="slide-info__image" src="<?=get_template_directory_uri();?>/images/eva.png">
								<div class="slide-info__text">
									Национальный трактир в грузинском стиле с отличной кухней
								</div>
							</div>
						</div>
						<div class="slide" data-image="<?=get_template_directory_uri();?>/images/slider.png">
						</div>
						<div class="slide" data-image="<?=get_template_directory_uri();?>/images/slider.png">
						</div>
                        -->
					</div>
				</div>

			</div>
			<div class="container menu-title_container">
				<h2 class="common-text menu-title">
					<em>Ваши любимые блюда:</em>
				</h2>
			</div>
		</div>
		<div class="texture texture__white content-wrapper">
			<div class="container">
				<div class="grid-inline menu">
                    <?
                    global $dishes_menu_items;
                    foreach($dishes_menu_items as $li){
                        echo '
                            <div class="column one-eighth">
        						<a class="menu-link" href="'.$li->url.'">
        							<div class="menu-link__image v-centered">
        								<i class="icon icon_main-sprite '.$li->classes[0].'_hover menu-link__icon-hover">
        									<i class="icon icon_main-sprite '.$li->classes[0].' menu-link__icon"></i>
        								</i>
        							</div>
        							<div class="menu-link__title">	
        								<span>
        									'.$li->title.'
        								</span>
        							</div>
        						</a>
        					</div>
                        ';
                    }
                    ?>
				</div>
				<div class="grid grid-inline three-steps">
					<div class="column one-third">
						<div class="text-arrow v-centered icon icon_main-sprite icon_flag">
							<div class="text-arrow__number">
								1
							</div>
							<div class="text-arrow__text">
								Удобный заказ
							</div>
						</div>
					</div>
					<div class="column one-third">
						<div class="text-arrow v-centered icon icon_main-sprite icon_flag">
							<div class="text-arrow__number">
								2
							</div>
							<div class="text-arrow__text">
								Быстрая доставка
							</div>
						</div>
					</div>
					<div class="column one-third">
						<div class="text-arrow v-centered icon icon_main-sprite icon_flag">
							<div class="text-arrow__number">
								3
							</div>
							<div class="text-arrow__text">
								Качественная еда
							</div>
						</div>
					</div>
				</div>
				<p class="common-text">
					<strong>Заказы Online (с сайта) принимаются с 10-00 до 22-00</strong>
				</p>
				<p class="common-text">
					Теперь Вы можете порадовать своих друзей, родных и близких вкусной едой из наших кафе:
украинская кухня, пицца, суши, десерты и многое другое. 
				</p>
				<p class="common-text">
					Мы предлагаем Вам доставку еды в офисы и на дом <strong>в Симферополе</strong>. Ждем Ваших заказов
				</p>
				<div class="grid-inline cards">
					<div class="column one-third">
						<div class="card card-sided">
							<div class="card-content" data-image="<?=get_template_directory_uri();?>/images/delivery-at-the-down.png" data-image-position="-91px 100%">
								<h3 class="card-title">
									Бесплатная доставка<br>
									по центру
								</h3>
								<p class="card-text">
									при заказе<br>
									от
									<span class="card-red">100 руб.</span>
								</p>
								<a class="card-link" href="#">
									смотреть карту
								</a>
							</div>
						</div>
					</div>
					<div class="column one-third">
						<div class="card card-sided">
							<div class="card-content" data-image="<?=get_template_directory_uri();?>/images/delivery-at-the-city.png" data-image-position="-5px -6px">
								<h3 class="card-title">
									Бесплатная доставка<br>
									по городу
								</h3>
								<p class="card-text">
									при заказе<br>
									от
									<span class="card-red">450 руб.</span>
								</p>
							</div>
						</div>
					</div>
					<div class="column one-third">
						<div class="card card-centered">
							<div class="card-content" data-image="<?=get_template_directory_uri();?>/images/gift-1.png" data-image-position="18px -21px">
								<h3 class="card-title">
									Подарки всем
								</h3>
								<p class="card-text">
									при заказе от
									<span class="card-red">1000 руб.</span>
								</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
<?
get_footer();
?>