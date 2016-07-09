/**
 * Created by mario.cuevas on 5/12/2016.
 */
$(document).ready(function ()
{
    $("#id_imagen").fileinput({
        uploadUrl: "imagenes/add",
        allowedFileExtensions: ["jpg", "png", "gif"],
        maxFileCount: 3,
        minFileCount : 3,
        uploadAsync: false,
        language: "es",
        showUpload: false,
        fileActionSettings : {showUpload: false}
    });

    $('#reset_button').click(function () {
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
                $.each(response, function (key, val) {
                    $("input[name=" + key + "]").val(val);
                    $("select[name=" + key + "]").val(val);
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
        if ($('#id_imagen').fileinput('upload') == null || $('#id_submit').hasClass('disabled')) {
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
            success: function (data) {
                table.ajax.reload();
                submit_response(form, data, 'categorias/add');
            }
        });
        return false;
    });
});