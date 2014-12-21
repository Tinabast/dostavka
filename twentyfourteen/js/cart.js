$(document).ready(function(){
    $('body').on('click', '.card-item__button', function(){
    	var button = $(this);
    	$.get($(button).data('href'))
    	.done(function() {
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
            error = $(resp).find('ul.error');
            error = error.prevObject[2].innerHTML;
            $.when(
                $.post('/wp-admin/admin-ajax.php', 'action=showsmallcart'), 
                $.post('/wp-admin/admin-ajax.php', 'action=showfullcart')).done(
                    function(resp1, resp2){
                        $('header .column_c').html(resp1[0]);
                        $('#current-order_popup').html(resp2[0]);
                        $('#current-order_popup .current-order_content').append(error);
                        $().mini_cart();
                    }
                );
        });
    });
});