/**
 * Created by mario.cuevas on 7/14/2016.
 */
/* =================
global root variables
===================== */
var base_root = location.origin = location.protocol + "//" + location.host + '/';
var extra_root = 'vc/test/Github/nasiol/';

$(document).ready(function ()
{
    url = base_root + extra_root + 'categorias/getAll';

    $.post(url, function (response, status) {
        if (status == 'success') {
            if(response.status == 200) {
                var subMenuContent = $('.sub-menu-content');
                var ul = $('<ul/>').appendTo(subMenuContent);

                $.each(response.data, function(key, value)
                {
                    var li = $('<li/>').appendTo(ul);
                    var a = $('<a/>').text(value.nombre).attr('href',base_root + extra_root + value.key_nombre).appendTo(li);
                });
            }
        }
    }, 'json');
});