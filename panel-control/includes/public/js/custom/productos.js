/**
 * Created by mario.cuevas on 7/6/2016.
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
            var info = {"type": "productos", "name" : $("#id_nombre").val(), "categoria" : $("#id_categoria option:selected").text()};
            return info;
        }
    }).on('filebatchuploadsuccess', function(event, data) {
        var out = '';
    });

    $.post('categorias/getAll', function (response) {
        $.each(response, function (key, val) {
            $("#id_categoria").append('<option value="'+val.id+'">'+val.nombre+'</option>');
        });
    }, 'json');

    $('#reset_button').click(function () {
        $('#form_global').trigger("reset");
        $('#submit_type').val('productos/add');
        $('#submit_id').val('');
        return false;
    });

    var url = 'productos/getAll';
    var columns = [{data: 'categoria_nombre'}, {data: 'nombre'}, {data: 'precio'}];

    var table = masterDatatable(url, columns);

    $('#datatable tbody').on('click', '#btn_edit', function ()
    {
        $("#form_alert").slideUp();
        var id = table.row($(this).parents('tr')).data().id;

        var data = {id: id};
        var url = 'productos/getById';

        $('#submit_type').val('productos/edit');

        $.post(url, data, function (response, status) {
            if (status == 'success') {
                $.each(response, function (key, val) {
                    $("textarea[name=" + key + "]").val(val);
                    $("input[name=" + key + "]").val(val);
                    $("select[name=" + key + "]").val(val);
                });
            }
            $('#submit_id').val(response.id);
        }, 'json');
        return false;
    });

    $('#datatable tbody').on('click', '#btn_delete', function ()
    {
        var id = table.row($(this).parents('tr')).data().id;
        bootbox.confirm("Eliminar elemento?", function (result) {
            if (result == true) {
                var data = {id: id, active: 0};
                var url = 'productos/delete';

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

        var url = 'productos/checkDuplicatedName';
        var data_name = {nombre:$('#id_nombre').val(), id_categoria:$('#id_categoria').val()}

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
            submit_response(form, checkDuplicated.responseJSON, 'productos/add');
            return false;
        }

        if ($('#id_imagen').fileinput('upload') == null) {
            return false;
        }

        var data = $(this).serialize();
        var type = $('#submit_type').val();
        if (type == 'productos/edit') {
            var id = $('#submit_id').val();
            data = data + '&' + $.param({'id': id});
        }
        $.ajax({
            url: type,
            type: "POST",
            cache: false,
            data: data,
            dataType: 'json',
            success: function (data) {
                table.ajax.reload();
                submit_response(form, data, 'productos/add');
            }
        });
        return false;
    });
});