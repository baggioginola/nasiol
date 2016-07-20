/**
 * Created by mario.cuevas on 7/14/2016.
 */
/* =================
global root variables
===================== */
$(document).ready(function ()
{
    url = BASE_ROOT + 'categorias/getAll';

    $.post(url, function (response, status) {
        if (status == 'success') {
            if(response.status == 200) {
                var subMenuContent = $('.sub-menu-content');
                var ul = $('<ul/>').appendTo(subMenuContent);

                $.each(response.data, function(key, value)
                {
                    var li = $('<li/>').appendTo(ul);
                    var a = $('<a/>').text(value.nombre).attr('href',BASE_ROOT + value.key_nombre).appendTo(li);
                });
            }
        }
    }, 'json');
});

function getImage(root_images, name, i)
{
    var url = root_images + name + '-' + i + '.jpg';
    var exists = $.ajax({
        url: url,
        type: "POST",
        cache: false,
        dataType: 'json',
        async: false
    });

    if(exists.status != 200) {
        return root_images + name + '-' + i + '.png';
    }
    return url;
}