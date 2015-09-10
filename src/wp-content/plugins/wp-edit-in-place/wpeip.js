/**
 * 
 */
(function ($) {
    $(function () {
        $(document).data('ctrl', false);
        $(document).data('shift', false);

        $(this).keydown(function (e) {
            if (e.keyCode == 17) {
                $(document).data('ctrl', true);
                $(".wpeip_term").css('cursor', 'pointer');
            }

            if (e.keyCode == 16) {
                $(document).data('shift', true);
            }
            if ($(document).data('ctrl') && $(document).data('shift'))
                $(".wpeip_term").css({background: 'rgba(0,255,0,.2)'});
        });
        $(this).keyup(function (e) {
            if (e.keyCode == 17) {
                $(document).data('ctrl', false);
                $(".wpeip_term").css('cursor', 'auto');
            }

            if (e.keyCode == 16) {
                $(document).data('shift', false);
            }

            if (!$(document).data('ctrl') || !$(document).data('shift')) {
                $(".wpeip_term").css({background: ''});
            }
        });

        $(".wpeip_term").each(function () {
            var h = $(this).height();
            var w = $(this).height();

            var key = $(this).attr('id');
            var html = $(this).html();
            var lcode = $(this).attr('lcode');
            $(document.body).append('<div id="' + key + '-formdiv" class="wpeip_formdiv" style="display:none;"><form method="post"><input type="hidden" name="wpeip_action" value="update_terms"><input type="hidden" name="updated[]" value="' + key + '"/><textarea name="' + key + '[' + lcode + ']"></textarea><input type="reset" value="' + wpeip.cancel + '"/><input type="submit" value="' + wpeip.save + '"/></form></div>');

            $(this).attr('title', 'pressione a tecla Ctrl e clique para editar este texto');

            $(this).click(function (e) {

                if (e.ctrlKey) {
                    var div = $('#' + key + '-formdiv');
                    var _width = parseInt(div.css('width'));
                    var _height = parseInt(div.css('height'));

                    var _left = (parseInt($(window).width() / 2 - _width / 2)) + 'px';
                    var _top = (parseInt($(window).height() / 2 - _height / 2) + $(window).scrollTop()) + 'px';

                    div.find('input:reset').click(function () {
                        div.hide();
                    });
                    var val = $(this).html().replace(/<br>/gi, "");
                    div.find('textarea').val(val);
                    div.css({
                        position: 'absolute',
                        zIndex: '999',
                        left: _left,
                        top: _top,
                        display: 'block'
                    });
                    return false;
                }
            });
        });
    });
})(jQuery);



