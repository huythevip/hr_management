<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        @yield('custom_css')

    </style>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>
<body>
<div class="container-fluid" style="background-color: #9542f4; ">
    <div class="row">
        <form class="" role="search" id="search-bar" action="#" method="GET">
            <div class="col-xs-6">
                <h1 href="$" id="logo">Hr Management</h1>
            </div>
            <div class="col-xs-6 pull-right">
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <div class="form-group" style="margin-top: 25px;">
                            <input type="text" class="form-control" placeholder="Search" id="search_content">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-default" style="margin-top: 25px;" id="search_button">Search</button>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div> <!-- Header Container -->

@yield('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@yield('scripts')
</body>

</html>