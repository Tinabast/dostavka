<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
		<div class="texture texture__gray footer-wrapper">
			<footer class="container footer-container">
                <div class="grid-inline grid-inline_footer">
				    <div class="column column_a">
						<h3 class="title_footer">Рестораны</h3>
    					<ul class="footer-nav">
                            <?
                            global $top_menu_items;
                            foreach($top_menu_items as $li){
                                echo '
                                    <li class="footer-nav__item">
                                        <a class="footer-nav__link" href="'.$li->url.'">
            								'.$li->title.'
            							</a>
                                    </li>
                                ';
                            }
                            ?>
                        </ul>
    				</div>
					<div class="column column_b">
						<h3 class="title_footer">Блюда</h3>
						<ul class="footer-nav">
                            <?
                            global $dishes_menu_items;
                            foreach($dishes_menu_items as $li){
                                echo '
                                    <li class="footer-nav__item list-inline">
        								<a class="footer-nav__link" href="'.$li->url.'">
        									'.$li->title.'
        								</a>
        							</li>
                                ';
                            }
                            ?>
						</ul>

					</div>
					<div class="column column_c">
						<h3 class="title_footer">Контакты</h3>
						<p class="common-text">
							+38 (099) 1-923-923
						</p>
						<p class="common-text">
							+7 (978) 780-923-1
						</p>
						<p class="common-text">
							Заказы Online (с сайта) принимаются с 10-00 до 22-00
						</p>
					</div>
				</div>
				<p class="copyright">
					Copyright &copy; 2014. Доставка №1 - все права защищены.
				</p>
			</footer>
		</div>
		<button class="button-to-top btn_disabled"><i class="icon icon_main-sprite icon_top-arrow"></i>Наверх</button>
        <div class="popup-wrapper hidden" id="current-order_popup">
            <?php if (function_exists('getsmallcart')) echo getfullcart(); ?>
        </div>
		<div class="popup-wrapper hidden" id="call_popup">
			<div class="container popup-container">
				<form method="get" action="callback">
					<div class="current-order_content">
						<h3 class="popup-title">
							Перезвонить вам:
						</h3>
						<div class="form-row">
							<label class="lbl" for="phone">Телефон</label>
							<input type="text" id="call_phone" name="phone" class="input input_gray">
						</div>
						<div class="form-row">
							<label class="lbl" for="name">Имя</label>
							<input type="text" id="call_name" name="name" class="input input_gray">
						</div>
					</div>
					<hr class="comb-divider">
					<div class="current-order_btn-container">
						<button class="btn btn_red order-submit">Отправить
						</button>
					</div>
				</form>
			</div>
		</div>
		<div class="popup-wrapper hidden" id="order-success_popup">
			<div class="container popup-container">
					<div class="current-order_content">
						<div class="grid-inline grid-inline_popup v-centered">
							<div class="column column_a">
								<i class="icon icon_main-sprite icon_tick"></i>
							</div>
							<div class="column column_b popup-text">
								<p>
									Ваша завка отправлена успешно.
								</p>
								<p>
									Мы перезвоним Вам в течение 5 минут!
								</p>
							</div>
						</div>
					</div>
					<hr class="comb-divider">
					<div class="current-order_btn-container">
						<button class="btn btn_red order-submit" data-popup="order-success_popup">Спасибо!
						</button>
					</div>
			</div>
		</div>




		<script type="text/javascript" src="<?=get_template_directory_uri();?>/vendor/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="<?=get_template_directory_uri();?>/vendor/js/jquery.cycle2.min.js"></script>
		<script type="text/javascript" src="<?=get_template_directory_uri();?>/vendor/js/jquery.maskedinput.min.js"></script>
		<script type="text/javascript" src="<?=get_template_directory_uri();?>/js/base.js"></script>
        <script type="text/javascript" src="<?=get_template_directory_uri();?>/js/cart.js"></script>
	</body>
</html>