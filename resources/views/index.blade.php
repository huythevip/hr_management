@extends('base')


<!-- CSS -->
@section('custom_css')


@endsection

<!-- Content -->

@section('content')
    <div class="content_test">

    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function($) {
            $.ajax({
                url: "api/api_test",
                data: {
                    name: 'abc',
                    id: 1
                },
                success: function(result){
                    console.log(result);

                    data = JSON.parse(result);

                    error = data.error;

                    if(error == true) {
                        alert(data.message);
                    }else {
                        string = JSON.stringify(data.data);
                        $('.content_test').text(string);
                    }
                }});

            $.ajax({
                url: "api/departments",
                method: "POST",
                data: {
                    title: 'title1',
                    department_id: 5
                },
                success: function(result) {
                    console.log(result);
                }




            })

        })



    </script>
@endsection