/**
 * Created by mario.cuevas on 5/12/2016.
 */
$(document).ready(function ()
{
    $("#id_imagen").fileinput({
        uploadUrl: "imagenes/add",
        allowedFileExtensions: ["jpg", "png"],
        maxFileCount: 4,
        minFileCount : 4,
        uploadAsync: false,
        language: "es",
        showUpload: false,
        fileActionSettings : {showUpload: false},
        overwriteInitial: false,
        purifyHtml: true,
        uploadExtraData: function (previewId, index) {
            var info = {"type": "categorias", "name" : $("#id_nombre").val()};
            return info;
        }
    }).on('filebatchuploadsuccess', function(event, data) {
        var out = '';
    });

    $('#reset_button').click(function () {
        $("#id_imagen").fileinput("refresh");
        $('#form_global').trigger("reset");
        $('#submit_type').val('categorias/add');
        $('#submit_id').val('');

        return false;
    });

    var url = 'categorias/getAll';
    var columns = [{data: 'nombre'}];

    var table = masterDatatable(url, columns);

    $('#datatable tbody').on('click', '#btn_edit', function () {

        $("#form_alert").slideUp();
        var id = table.row($(this).parents('tr')).data().id;

        var data = {id: id};
        var url = 'categorias/getById';

        $('#submit_type').val('categorias/edit');

        $.post(url, data, function (response, status) {
            if (status == 'success') {

                var images = [];

                var IMAGES_CATEGORY = IMAGES + 'categorias' + '/' + response.key_nombre + '/';
                for(var i = 0; i < 4; i++) {
                    var src = getImage(IMAGES_CATEGORY, response.key_nombre, i);
                    images[i] = '<img src="'+src+'" class="file-preview-image" alt="Desert" title="Desert" style="width:auto; height:160px;">';
                }

                $('#id_imagen').fileinput('refresh', {
                    initialPreview: images,
                    initialPreviewFileType: 'image',
                    fileActionSettings : {showDrag: false},
                    initialPreviewShowDelete: true,
                    initialPreviewConfig: [
                        {caption: "Nature-1.jpg", size: 847000, key: 11},
                        {caption: "Nature-2.jpg", size: 817000, key: 12},
                        {caption: "Nature-1.jpg", size: 847000, key: 11},
                        {caption: "Nature-1.jpg", size: 847000, key: 11}
                    ]

                });

                $.each(response, function (key, val) {

                    $("input[name=" + key + "]").val(val);
                    $("textarea[name=" + key + "]").val(val);
                });
            }
            $('#submit_id').val(response.id);
        }, 'json');
        return false;
    });

    $('#datatable tbody').on('click', '#btn_delete', function () {
        var id = table.row($(this).parents('tr')).data().id;
        bootbox.confirm("Eliminar elemento?", function (result) {
            if (result == true) {
                var data = {id: id, active: 0};
                var url = 'categorias/delete';
                $.post(url, data, function (response, status) {
                    if (status == 'success') {
                        bootbox.alert(response.message);
                        table.ajax.reload();
                    }
                }, 'json');
            }
        });
        return false;
    });

    var form = $('#form_global').submit(function ()
    {
        if ($('#id_submit').hasClass('disabled')) {
            return false;
        }

        var url = 'categorias/checkDuplicatedName';
        var data_name = {nombre:$('#id_nombre').val()}

        var checkDuplicated = $.ajax({
            url: url,
            type: "POST",
            cache: false,
            data: data_name,
            dataType: 'json',
            async: false,
            success: function (data) {
                return data;
            }
        });

        if(checkDuplicated.responseJSON.status == 200) {
            submit_response(form, checkDuplicated.responseJSON, 'categorias/add');
            return false;
        }

        if ($('#id_imagen').fileinput('upload') == null) {
            return false;
        }

        var data = $(this).serialize();
        var type = $('#submit_type').val();
        if (type == 'categorias/edit') {
            var id = $('#submit_id').val();
            data = data + '&' + $.param({'id': id});
        }
        $.ajax({
            url: type,
            type: "POST",
            cache: false,
            data: data,
            dataType: 'json',
            async: false,
            success: function (data) {
                table.ajax.reload();
                submit_response(form, data, 'categorias/add');
            }
        });
        return false;
    });
});