/**
 * Created by mario on 16/07/2016.
 */
$(document).ready(function ()
{
    var url = (location.href).split('/');
    var name = url[url.length - 1];
    var type = 'categorias';

    var base_root = location.origin = location.protocol + "//" + location.host + '/';
    var extra_root = 'Github/nasiol/';

    var base_root_images = base_root + extra_root + 'panel-control/includes/public/img/' + type + '/';

    for(var i = 0; i < 4; i++) {
        var exists = checkImageExists(base_root_images, name, i);
        if(exists.status == '200') {
            $('#category-' + i).attr('src', base_root_images + name + '/' + name + '-' + i + '.jpg');
        }
        else {
            $('#category-' + i).attr('src', base_root_images + name + '/' + name + '-' + i + '.png');
        }
        $('#category-' + i).attr('alt', name);
    }

    var data = {key_nombre:name};
    url = 'categorias/getByName';
    $.post(url, data, function (response, status) {
        console.log(response);
        if (status == 'success') {
            if(response.status == 200) {
                $('#category-name').text(response.data.nombre).attr('href',response.data.key_nombre);
            }
        }
    }, 'json');
});

function checkImageExists(base_root_images, name, i)
{
    var exists = $.ajax({
        url: base_root_images + name + '/' + name + '-' + i + '.jpg',
        type: "POST",
        cache: false,
        dataType: 'json',
        async: false
    });
    return exists;
}