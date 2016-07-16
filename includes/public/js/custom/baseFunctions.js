/**
 * Created by mario.cuevas on 7/14/2016.
 */
$(document).ready(function ()
{
    url = 'categorias/getAll';

    $.post(url, function (response, status) {
        if (status == 'success') {
            if(response.status == 200) {
                var subMenuContent = $('.sub-menu-content');
                var ul = $('<ul/>').appendTo(subMenuContent);

                $.each(response.data, function(key, value)
                {
                    var li = $('<li/>').appendTo(ul);
                    var a = $('<a/>').text(value.nombre).attr('href',value.key_nombre).appendTo(li);
                });
            }
        }
    }, 'json');
});