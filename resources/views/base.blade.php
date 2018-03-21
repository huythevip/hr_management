<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            * {
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
            }


            #logo {
                text-decoration: none;
                color: white;
                font-size: 25px;
                margin-left: 150px;
            }

            #search-bar {
                float: right;
                margin-right: 30px;
            }

            #search-bar input {
                height: 40px;
            }

            #search-bar button {
                height: 40px;
            }

            }

            input {
                width: 200px;
                height: 40px;
                padding: 10px 20px;
            }

            @yield('custom_css')

        </style>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    </head>
    <body>
        <div class="container-fluid" style="background-color: #9542f4; height: 50px; line-height: 50px;">
            <a href="$" id="logo">Hr Management</a>
                <form  id="search-bar" action="#" method="POST">
                <input type="text" placeholder="Search">
                <button type="submit">Search</button>
                </form>
        </div> <!-- Header Container -->

        @yield('content')

    </body>

</html>