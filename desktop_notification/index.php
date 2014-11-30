<!doctype>
<html>
    <head>
        <title>Desktop notification</title>
    </head>
    <body>
        <a href="#" id="dnperm">Request permission</a>
        <a href="#" id="dntrigger">Trigger</a>

        <script>
            var dnperm = document.getElementById('dnperm');
            var dntrigger = document.getElementById('dntrigger');

            dnperm.addEventListener('click', function (e) {
                e.preventDefault();
                if (!window.Notification) {
                    alert('Sorry, notification are not supported.');
                }
                else {
                    Notification.requestPermission(function (p) {
                        console.log(p);
                        if (p === 'granted') {
                            console.log('You have granted notifications.');
                        }
                        if (p === 'denied') {
                            console.log('You have denied notifications.');
                        }
                    });
                }
            });

            dntrigger.addEventListener('click', function (e) {
                var notify;
                e.preventDefault();
                console.log(Notification.permission);
                if (Notification.permission === 'default') {
                    console.log('Please allow notifications');
                }
                else {
                    notify = new Notification('New message from Rataja', {
                        body: 'This is great tutorial, as always',
                        icon: 'logo.jpg'
                    });
                    notify.onclick = function () {
                        console.log(this);
                    }
                }
            });
        </script>
    </body>
</html>

