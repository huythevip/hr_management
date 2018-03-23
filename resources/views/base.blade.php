<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        /** {*/
        /*margin: 0px;*/
        /*padding: 0px;*/
        /*box-sizing: border-box;*/
        /*-moz-box-sizing: border-box;*/
        /*-webkit-box-sizing: border-box;*/
        /*}*/

        /*#logo {*/
        /*text-decoration: none;*/
        /*color: white;*/
        /*font-size: 25px;*/
        /*margin-left: 150px;*/
        /*}*/

        /*#search-bar {*/
        /*float: right;*/
        /*margin-right: 30px;*/
        /*}*/

        /*#search-bar input {*/
        /*height: 40px;*/
        /*}*/

        /*#search-bar button {*/
        /*height: 40px;*/
        /*}*/

        /*}*/

        /*input {*/
        /*width: 200px;*/
        /*height: 40px;*/
        /*padding: 10px 20px;*/
        /*}*/

        @yield('custom_css')

    </style>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>
<body>
<div class="container-fluid" style="background-color: #9542f4; ">
    <div class="row">
        <form class="" role="search" id="search-bar" action="#" method="POST">
            <div class="col-xs-6">
                <h1 href="$" id="logo">Hr Management</h1>
            </div>
            <div class="col-xs-6 pull-right">
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <div class="form-group" style="margin-top: 25px;">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-default" style="margin-top: 25px;">Search</button>
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