$('.username-check').on('click', function () {
    var target = $('.username-target');
    var feedback = $('.username-feedback');

    function changeFeedbackText(text) {
        feedback.text(text);
    }
    function couldNotCheck() {
        changeFeedbackText('Could not check at this time.');
    }
    $.ajax({
        url: './check/username.php',
        type: 'get',
        data: {
            username: target.val()
        },
        dataType: 'json',
        success: function (data) {
            if (data.available !== undefined) {
                if (data.available === true) {
                    changeFeedbackText('That username is available.');
                }
                else {
                    changeFeedbackText('That username is not available.');
                }

            }
            else {
                couldNotCheck();
            }
        },
        error: function () {
            couldNotCheck();
        }

    });
    console.log('test');
});