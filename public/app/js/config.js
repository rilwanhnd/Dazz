$(document).ready(function () {
    $(".configurationForm").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: "configuration",
            type: 'GET',
            dataType: 'json',
            data: formData,
            success: function (data) {
                toastr[data.results](data.response);
            }
        });

    });
});