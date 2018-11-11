$('[data-toggle="modal"]').click(function () {
    $.get($(this).attr('href'), function (response) {
        $('#app').append(response);
        $('.modal_multiple_select').select2({
            containerCssClass: 'form-control bootstrap-select'
        });
        $('#modal').modal('toggle').on('hidden.bs.modal', function (e) {
            $(this).remove()
        })
    });
});

$('[data-toggle="delete"]').click(function (e) {
    e.preventDefault();
    if (confirm('Are you sure you want to delete this user')) {
        $.ajax({
            url: $(this).attr('href'),
            method: 'delete',
            data: {
                _token: $(this).attr('data-token'),
            }
        }).done(function (response) {
            console.log(response);
            notification(response.status, response.message)
        });
    }
});

function notification(color, message) {
    $.notify({
        icon: "now-ui-icons ui-1_bell-53",
        message: message
    }, {
        type: color,
        timer: 8000,
    });
}