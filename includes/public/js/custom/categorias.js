/**
 * Created by mario on 16/07/2016.
 */
$(document).ready(function ()
{
    var url = (location.href).split('/');
    var name = url[url.length - 1];
    var type = 'categorias';

    var IMAGES_CATEGORY = IMAGES + type + '/' + name + '/';

    for(var i = 0; i < 4; i++) {
        var src = getImage(IMAGES_CATEGORY, name, i);
        $('#category-' + i).attr('src', src);
        $('#category-' + i).attr('alt', name);
    }

    var data = {key_nombre:name};
    url = BASE_ROOT + 'categorias/getByName';
    $.post(url, data, function (response, status) {
        if (status == 'success') {
            if(response.status == 200) {
                $('#category-name').text(response.data.nombre).attr('href',response.data.key_nombre);
                var url_getProducts = BASE_ROOT + 'productos/getByCategory';
                var dataProducts = {id_categoria:response.data.id};
                $.ajax({
                    url: url_getProducts,
                    type: "POST",
                    cache: false,
                    data: dataProducts,
                    dataType: 'json',
                    async: false,
                    success: function (response) {
                        var productForm = [];
                        var box_product = $('.box-product');
                        $.each(response.data, function (key,value) {
                            var IMAGES_PRODUCTS = IMAGES_CATEGORY + 'productos/' + value.key_nombre + '/';
                            var src = getImage(IMAGES_PRODUCTS, value.key_nombre, 0);
                            productForm = [
                                '<div>',
                                '<div class="boxgrid">',
                                '<div class="image">',
                                '<a href="',value.categoria,'/',value.key_nombre,'">',
                                '<img src="',src,'" alt="',value.nombre,'"/>',
                                '</a>',
                                '</div>',
                                '<div class="box-product-info">',
                                '<div class="thumbnail-buttons">',
                                '<div class="more">',
                                '<a href="',value.categoria,'/',value.key_nombre,'" title="Ver mas"></a>',
                                '</div>',
                                '</div>',
                                '</div>',
                                '</div>',
                                '<div class="boxgrid-bottom">',
                                '<div class="arrow-box"></div>',
                                '<div class="name">',
                                '<a href="',value.categoria,'/',value.key_nombre,'">',value.nombre,'</a>',
                                '</div>',
                                '<div class="price"></div>',
                                '</div>',
                                '</div>'];
                            box_product.append(productForm.join(''));
                        });
                    }
                });

                $(".box-product .boxgrid").hover(function () {
                        $(".box-product-info", this).stop().animate({
                            opacity: 1
                        }, "medium");
                    },
                    function () {
                        $(".box-product-info", this).stop().animate({
                            opacity: 0
                        }, "medium");
                    });
            }
        }
    }, 'json');
});