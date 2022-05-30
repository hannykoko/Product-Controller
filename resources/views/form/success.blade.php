<!DOCTYPE html>
<html>
    <head>
        <title>Success</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
    <div class="upper">
                @if(session('message'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{session('message')}}</li>
                        </ul>
                    </div><br/>
                @endif
            </div>
    </body>
</html>