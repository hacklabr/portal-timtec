/**
 *
 */
"use strict";

(function ($) {

	$( document ).ready(function() {
		$('.js-icon-rede-social').each(function() {
                        var $this = $(this);

                        $this.iconpicker({
                            title: 'Busque o icone',
                            container: $(' ~ .dropdown-menu:first', $this)
                        });
                    });
                    
	});
	

})(jQuery);