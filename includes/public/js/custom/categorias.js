/**
 * Created by mario on 16/07/2016.
 */
$(document).ready(function ()
{
    var url = (location.href).split('/');
    var name = url[url.length - 1];
    var type = 'categorias';

    var base_root = location.origin = location.protocol + "//" + location.host + '/';
    var extra_root = 'vc/test/Github/nasiol/';

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
        if (status == 'success') {
            if(response.status == 200) {
                $('#category-name').text(response.data.nombre).attr('href',response.data.key_nombre);
                var url_getProducts = 'productos/getByCategory';
                var dataProducts = {id_categoria:response.data.id};
                $.post(url_getProducts, dataProducts, function (response, status) {

                    if (status == "success") {
                        console.log(response);

                        var productForm = [];
                        var box_product = $('.box-product');
                        $.each(response, function (key, val) {

                            productForm = [
                            '<div>',
                            '<div class="boxgrid">',
                            '<div class="image">',
                            '<a href="#">',
                            '<img src="" alt="CAR DETAILING KIT"/>',
                            '</a>',
                            '</div>',
                            '<div class="box-product-info">',
                            '<div class="thumbnail-buttons">',
                            '<div class="more">',
                            '<a href="" title="View More"></a>',
                            '</div>',
                            '</div>',
                            '</div>',
                            '</div>',
                            '<div class="boxgrid-bottom">',
                            '<div class="arrow-box"></div>',
                            '<div class="name">',
                            '<a href="">CARDETAILING KIT EXTERIOR AND INTERIOR FULL CAR CARE</a>',
                            '</div>',
                            '<div class="price"></div>',
                            '</div>',
                            '</div>'];

                            /*
                            '<div>' +
                                '<img src="assets/imagenes/avatar.png" width="23" height="23" />',
                                '<span class="name">',params.name,
                                '</span><a href="?c=chat&m=logout" class="logoutButton rounded">Salir</a></span>'];
                            */
                            alert(productForm.join(''));
                            box_product.html(productForm.join(''));
                        });
                    }
                });
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