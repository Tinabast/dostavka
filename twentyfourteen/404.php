<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


	<!--<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'twentyfourteen' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>

				<?php get_search_form(); ?>
			</div>

		</div>
	</div>-->
	
	
		<div class="texture texture__white header-wrapper">
			<div class="container">
				<div class="grid-inline grid-inline_b">
					<div class="column column_b">
						<header class="header grid-inline grid-inline_b">
							<div class="column column_a">
								<!--<div class="logo-wrapper">
									<img class="logo" src="images/logo.png">
								</div>-->
							</div>
							<div class="column column_b">
								<h1 class="page-title v-centered"><span>Страница</span> <span class="page-title_xl">404</span></h1>
							</div>
						</header>
						<div class="column_b_container">
							<div class="alert-text">
								<i class="icon icon_main-sprite icon_smile"></i>
								<span>Извините, но у нас такой страницы нет</span>
							</div>
							<div class="common-text common-text_m">
								<p>
									Возможно, запрашиваемая Вами страница была перенесена или удалена. 
									Также возможно, Вы допустили небольшую опечатку при вводе адреса.
									Такое случается даже с нами, поэтому еще раз внимательно проверьте.
								</p>
								<p>
									Предлагаем воспользоваться поиском по сайту или выбрать интересующие Вас блюда.
								</p>
								<p>
									С уважением, ваша "Доставка №1"
								</p>
							</div>
							<form method="get" class="search-form" id="search-form" action="/поиск/">
								<fieldset class="search-group">
									<input type="text" id="search-field" name="search" class="search-field input_gray" placeholder="Поиск по сайту">
									<button type="submit" id="search-submit" class="btn btn_icon search-submit">
										<i class="icon icon_main-sprite icon_magn-glass"></i>
									</button>
								</fieldset>
							</form>
						</div>
					</div>
					<div class="column column_a">
					
						<ul class="sidebar-nav">
							<li class="sidebar-nav__item">
								<a class="sidebar-nav__link" href="#">
									<i class="icon icon_main-sprite icon_sushi_small"></i>
									<span  class="sidebar-nav__text">
										Суши и роллы
									</span>
								</a>
							</li>
							<li class="sidebar-nav__item">
								<a class="sidebar-nav__link" href="#">
									<i class="icon icon_main-sprite icon_pizza_small"></i>
									<span  class="sidebar-nav__text">
										Пицца
									</span>
								</a>
							</li>
							<li class="sidebar-nav__item">
								<a class="sidebar-nav__link" href="#">
									<i class="icon icon_main-sprite icon_kebab_small"></i>
									<span  class="sidebar-nav__text">
										Шашлык
									</span>
								</a>
							</li>
							<li class="sidebar-nav__item">
								<a class="sidebar-nav__link" href="#">
									<i class="icon icon_main-sprite icon_salad_small"></i>
									<span  class="sidebar-nav__text">
										Салаты
									</span>
								</a>
							</li>
							<li class="sidebar-nav__item">
								<a class="sidebar-nav__link" href="#">
									<i class="icon icon_main-sprite icon_steak_small"></i>
									<span  class="sidebar-nav__text">
										Стейки и рыба
									</span>
								</a>
							</li>
							<li class="sidebar-nav__item">
								<a class="sidebar-nav__link" href="#">
									<i class="icon icon_main-sprite icon_georgia_small"></i>
									<span  class="sidebar-nav__text">
										Грузинская кухня
									</span>
								</a>
							</li>
							<li class="sidebar-nav__item">
								<a class="sidebar-nav__link" href="#">
									<i class="icon icon_main-sprite icon_drinks_small"></i>
									<span  class="sidebar-nav__text">
										Напитки
									</span>
								</a>
							</li>
							<li class="sidebar-nav__item">
								<a class="sidebar-nav__link" href="#">
									<i class="icon icon_main-sprite icon_sweets_small"></i>
									<span  class="sidebar-nav__text">
										Десерты
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>


<?php
/*get_sidebar( 'content' );
get_sidebar();*/
get_footer();
