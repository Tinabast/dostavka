$(document).ready(function(){
    $('body').on('click', '.card-item__button', function(){
    	var button = $(this);
    	$.get($(button).data('href'))
    	.done(function() {
			console.log("get is done!");
            $.when(
                $.post('/wp-admin/admin-ajax.php', 'action=showsmallcart'), 
                $.post('/wp-admin/admin-ajax.php', 'action=showfullcart')).done(function(resp1, resp2){
					console.log("post is done!");
                    $('header .column_c').html(resp1[0]);
                    $('#current-order_popup').html(resp2[0]);
                    $().mini_cart();
                }
            );
        });
    });
    $('body').on('click', '.delete', function(e){
        params = {mode: 'update'};
		params['update_'+$(e.currentTarget).data('id')] = 0;
        $.post('/корзина/', params, function(){            
            $.when(
                $.post('/wp-admin/admin-ajax.php', 'action=showsmallcart'), 
                $.post('/wp-admin/admin-ajax.php', 'action=showfullcart')).done(function(resp1, resp2){
                    $('header .column_c').html(resp1[0]);
                    $('#current-order_popup').html(resp2[0]);
                    $().mini_cart();
                }
            );
        });
    });
    $('body').on('change', '.current-order_table input', function(e){
        params = {mode: 'update'};
		params[e.currentTarget.name] = $(e.currentTarget).val();
        $.post('/корзина/', params, function(){
            $.when(
                $.post('/wp-admin/admin-ajax.php', 'action=showsmallcart'), 
                $.post('/wp-admin/admin-ajax.php', 'action=showfullcart')).done(
                    function(resp1, resp2){
                        $('header .column_c').html(resp1[0]);
                        $('#current-order_popup').html(resp2[0]);
                        $().mini_cart();
                    }
                );
        });
    });
    $('body').on('submit', '.orderForm', function(event){
        event.preventDefault();
        $.post('/корзина/', $(this).serialize(), function(resp){
            var error = $(resp).find('ul.error'),
				errorHTML;
            $.when(
                $.post('/wp-admin/admin-ajax.php', 'action=showsmallcart'), 
                $.post('/wp-admin/admin-ajax.php', 'action=showfullcart')).done(
                    function(resp1, resp2){
                        $('header .column_c').html(resp1[0]);
                        $('#current-order_popup').html(resp2[0]);
						if (resp.indexOf('class="error"') !== -1) {
							errorHTML = error.prevObject[2].innerHTML;
							$('#current-order_popup .current-order_content').append(errorHTML);
						} else {
							$('.popup-wrapper').addClass('hidden');
							$('#order-success_popup').removeClass('hidden');
						}
                        $().mini_cart();
                    }
                );
        });
    });
});