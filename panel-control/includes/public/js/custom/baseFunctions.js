/**
 * Created by mario.cuevas on 6/16/2016.
 */
/**
 *
 * @param form
 * @param data
 */
function submit_response(form, data, url) {
    $('#id_submit').addClass('disabled');
    $('#submit_pw').val('');
    $('#submit_type').val(url);
    $('#submit_id').val('');

    form.trigger("reset");
    bootbox.alert(data.message);

    $("#id_imagen").fileinput("enable").fileinput("refresh");
}

/**
 *
 * @param url
 * @param columns
 * @returns {*|jQuery}
 */
function masterDatatable(url, columns) {
    var defaultContentEdit = "<button class='btn btn-primary btn-xs' id='btn_edit'><span class='glyphicon glyphicon-pencil'></span></button>";
    var defaultContentDelete = "<button class='btn btn-danger btn-xs' id='btn_delete' ><span class='glyphicon glyphicon-trash'></span></button>"

    var columnsDefault = [{"orderable": false, "data": null, "defaultContent": defaultContentEdit},
        {
            "orderable": false, "data": null, "defaultContent": defaultContentDelete
        }];

    columns = columns.concat(columnsDefault);

    var dataTable = $('#datatable').DataTable({
        ajax: {
            type: 'POST',
            url: url,
            dataSrc: ''
        },
        columns: columns,
        /*select: {
         style: 'os'
         },
         */
        language: {
            "lengthMenu": "Mostrando _MENU_ elementos por pagina",
            "zeroRecords": "No se ha encontrado",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    });
    return (dataTable);
}

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