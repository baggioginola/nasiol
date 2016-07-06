/**
 * Created by mario.cuevas on 5/12/2016.
 */
$(document).ready(function () {
    var url = 'categorias/getAll';
    var columns = [{data: 'nombre'}];

    var table = masterDatatable(url, columns);

    $('#datatable tbody').on('click', '#btn_edit', function () {

        $("#form_alert").slideUp();
        var id = table.row($(this).parents('tr')).data().id_categoria;

        var data = {id_categoria: id};
        var url = 'categorias/getById';

        $('#submit_type').val('categorias/edit');

        $.post(url, data, function (response, status) {
            if (status == 'success') {
                $.each(response, function (key, val) {
                    $("input[name=" + key + "]").val(val);
                    $("select[name=" + key + "]").val(val);
                });
            }
            $('#submit_id').val(response.id_categoria);
        }, 'json');
        return false;
    });

    $('#datatable tbody').on('click', '#btn_delete', function () {
        var id = table.row($(this).parents('tr')).data().id_categoria;
        bootbox.confirm("Eliminar elemento?", function (result) {
            if (result == true) {
                var data = {id_categoria: id, active: 0};
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

    var form = $('#form_global').submit(function () {
        if ($('#id_submit').hasClass('disabled')) {
            return false;
        }
        var data = $(this).serialize();
        var type = $('#submit_type').val();
        if (type == 'categorias/edit') {
            var id_categoria = $('#submit_id').val();
            data = data + '&' + $.param({'id_categoria': id_categoria});
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