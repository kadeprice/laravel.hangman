<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hangman!</title>
        <!-- Latest compiled and minified CSS -->
        <!-- Optional theme -->
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/style.css'); }}
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/ui-darkness/jquery-ui.css" />
        
        {{ HTML::script('//code.jquery.com/jquery-2.1.1.min.js'); }}
        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js'); }}
        <!-- Latest compiled and minified JavaScript -->
        {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'); }}
        
        <style>
             .fade {
                opacity: 0;
                -webkit-transition: opacity 0.15s linear;
                -moz-transition: opacity 0.15s linear;
                -o-transition: opacity 0.15s linear;
                transition: opacity 0.15s linear;
            }
            .fade.in {
                opacity: 1;
            }
        </style>
        
        
</head>
<body>
    <!-- Header/Menu -->
    @include("navigation/menu")
    
    <!--Content Section-->
    <div id="wrapper" class="drop-shadow border-all">
        
    
        @yield('content') 
        <!--Flash message-->
        @if (Session::get('notification'))
        <script>
            window.setTimeout(function () {
                $("#myAlert").fadeOut(3000);
            }, 3000);
        </script>
            <div id='myAlert' class='alert alert-warning alert-dismissable fade in' data-alert='alert'>
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h3>{{ Session::get('notification') }}</h3>
            </div>
        @endif
    </div>
	
</body>
</html>
