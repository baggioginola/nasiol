/**
 * Created by mario on 16/07/2016.
 */
$(document).ready(function ()
{
    url = BASE_ROOT + 'categorias/getAll';

    $.post(url, function (response, status) {
        if (status == 'success') {
            if(response.status == 200) {
                var box_category = $('.box-category .subnew');

                $.each(response.data, function(key, value)
                {
                    var li = $('<li/>').appendTo(box_category);
                    var a = $('<a/>').text(value.nombre).attr('href',BASE_ROOT + value.key_nombre).appendTo(li);
                });
            }
        }
    }, 'json');
});