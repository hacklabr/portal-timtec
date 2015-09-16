/**
 * 
 */
(function ($) {
    $(function () {
        var ctrl = false;
        var shift = false;

        $(document).keydown(function (e) {
            if (e.keyCode === 17){
                console.log('entrou');
                $(".js-wpeip-term").addClass('wpeip-hightlight');
            }
        });
        
        $(document).keyup(function (e) {
            if (e.keyCode === 17) {
                console.log('saiu');
                $(".js-wpeip-term").removeClass('wpeip-hightlight');
            }
        });
        
        $(".js-wpeip-term").each(function () {
            var $el = $(this);
            var key = $el.attr('id');
            var timeout;
            var $spinner = $('#' + key + '-spinner');
            var lastText = $el.html();

            $el.attr('title', 'pressione a tecla Ctrl e clique para editar este texto');

            $el.click(function (e) {
                if (e.ctrlKey) {
                    $el.attr('contenteditable',true);
                    $el.addClass('wpeip-contenteditable');
                    $el.focus();
                }
            });
            
            $el.keyup(function(){
                if(lastText == $el.html()){
                    return;
                }
                
                if(timeout){
                    clearTimeout(timeout);
                }
                timeout = setTimeout(function(){
                    $spinner.addClass('active');
                    lastText = $el.html();
                    $.post(
                        wpeip.ajaxurl,
                        {
                            action: 'wpeip_save',
                            key: $el.attr('id'),
                            lcode: $el.data('lcode'),
                            text: $el.html()
                        },
                        function(response){
                            $spinner.removeClass('active');
                        }
                    );
                },500); 
            });
            
            $el.blur(function(){
                $el.removeClass('wpeip-contenteditable');
                $el.attr('contenteditable',null);
            });
        });
    });
})(jQuery);



