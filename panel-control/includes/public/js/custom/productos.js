/**
 * Created by mario.cuevas on 7/6/2016.
 */

$(document).ready(function ()
{
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