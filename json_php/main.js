$('#add').on('submit', function () {
    var form = $(this);
    var content = form.serialize();
    $.ajax({
        url: 'add.php',
        dataType: 'json',
        type: 'post',
        data: content,
        success: function (data) {
            if (data.success) {
                alert('The result is ' + data.result);
            }
            console.log(data);
        },
        error: function () {

        }
    });
    return false;
});

