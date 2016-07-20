/**
 * Created by mario.cuevas on 7/19/2016.
 */
$(document).ready(function ()
{
    var url = (location.href).split('/');
    var name = url[url.length - 1];
    var category = url[url.length - 2];
    var type = 'productos';

    var data = {key_nombre:category};
    url = BASE_ROOT + 'categorias/getByName';

    $.ajax({
        url: url,
        type: "POST",
        cache: false,
        data: data,
        dataType: 'json',
        async: false,
        success: function (response) {
            $('#category-name').text(response.data.nombre).attr('href',BASE_ROOT + response.data.key_nombre);
            var data_products = {key_nombre: name, id_categoria: response.data.id};
            var url_products = BASE_ROOT + 'productos/getByName';

            $.ajax({
                url: url_products,
                type: "POST",
                cache: false,
                data: data_products,
                dataType: 'json',
                async:false,
                success: function(response_products) {
                    var productImages = [];
                    var container = $('.container');
                    var IMAGES_CATEGORY = IMAGES + 'categorias' + '/' + category + '/';
                    var IMAGES_PRODUCTS = IMAGES_CATEGORY + 'productos/' + name + '/';
                    var display_option = 'display: inline-block;';
                    $('#product-name').text(response_products.data.nombre).attr('href',BASE_ROOT + category + '/' + response_products.data.key_nombre);
                    $('.heading-prod').text(response_products.data.nombre);
                    $('#descripcion').text(response_products.data.descripcion);
                    $('#especificaciones').text(response_products.data.especificaciones);
                    for(var i = 0; i < response_products.data.imagenes; i++) {
                        if(i > 0) {
                            display_option = '';
                        }
                        var src = getImage(IMAGES_PRODUCTS, name, i);

                        productImages = [
                        '<div style="',display_option,'">',
                        '<a href="" class="group1" >',
                        '<img src="',src,'" class="example-image" />',
                        '</a>',
                        '</div>'];
                        container.append(productImages.join(''));
                    }
                }
            })
        }
    });


    var currentIndex = 0,
        items = $('.container div'),
        itemAmt = items.length;

    function cycleItems() {
        var item = $('.container div').eq(currentIndex);
        items.hide();
        item.css('display','inline-block');
    }

    var autoSlide = setInterval(function() {
        currentIndex += 1;
        if (currentIndex > itemAmt - 1) {
            currentIndex = 0;
        }
        cycleItems();
    }, 5000);


    $('.next').click(function() {
        clearInterval(autoSlide);
        currentIndex += 1;
        if (currentIndex > itemAmt - 1) {
            currentIndex = 0;
        }
        cycleItems();
    });

    $('.prev').click(function() {
        clearInterval(autoSlide);
        currentIndex -= 1;
        if (currentIndex < 0) {
            currentIndex = itemAmt - 1;
        }
        cycleItems();
    });
});