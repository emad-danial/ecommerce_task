function ajaxRequest(path, formData, callback = null, type = 'POST') {

    formData.append('_token', $('input[name=_token]').val());

    $.ajax({
        url: path,
        type: type,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            loading();
        },
        success: function (response) {
            loading();

            if (response.status == 410) {
                swal("!warning", response.message, "warning");
                return;
            }

            if (response.code == 400) {
                response.Errors.forEach(function (error) {
                    $(`#${error.field}_input`).text(error.errorMsg);
                });
                return;
            }


            if (callback != null) callback(response);
        },
        error: function (response) {
            console.log(response)
            loading();
            alert('error');

        }
    });
}

function resetFormToDefault() {
    $('.input_warning').text('');
    $(".form :input").val("");
    $(".form :checkbox").prop("checked", false);
}

function loading() {
    $(".loading-container").toggleClass("d-none d-flix");
}
