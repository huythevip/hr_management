@extends('base')


<!-- CSS -->
@section('custom_css')
    {{--.content_test {--}}
    {{--width: 1000px;--}}
    {{--height: 500px;--}}
    {{--margin: 0 auto;--}}
    {{--margin-top: 50px;--}}
    {{--}--}}

    {{--.information-panel {--}}
    {{--height: 50px;--}}
    {{--line-height: 50px;--}}
    {{--}--}}

    {{--.information-panel h1 {--}}
    {{--float: left;--}}
    {{--display: inline-block;--}}
    {{--margin-left: 50px;--}}
    {{--}--}}

    {{--.information-panel select {--}}
    {{--margin-left: 50px;--}}
    {{--height: 30px;--}}
    {{--}--}}

    {{--.department-staff {--}}
    {{--clear: left;--}}
    {{--width: 100%; --}}
    {{--height: 90%;--}}
    {{--}--}}
    .abc {
    margin-bottom: 20px;
    }
    #information-panel {
    margin-top: 20px;
    }
    #my_table {
    width: 100%;
    }
    .xuong_20_px {
        margin-bottom: 20px;
    }
@endsection

<!-- Content -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="abc">
                <form id="information-panel" class=" form-inline">
                    <label for="sel1">Department:</label>
                    <select class="form-control" id="selected_dept">
                        <option>Please select</option>
                        @foreach($departments as $department)
                            <option>{{$department->full_name}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>


        <div class="row xuong_20_px">
            <a href="#" class="btn btn-primary">Create</a>
        </div>

        <div class="row">
            <div class="department-staff">
                <table id="my_table" class="table">
                    <thead>
                    <tr id="staff_info" class="info">
                        <td width="20%">Full Name</td>
                        <td width="20%">Position</td>
                        <td width="40%">Skill</td>
                        <td width="10%">Experience</td>
                        <td width="10%">Year Joined</td>
                    </tr>
                    </thead>
                    <tbody id="staff_detail">


                    </tbody>
                </table>
            </div> <!-- Department-staff -->
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#selected_dept').change(function () {
                $('#staff_detail').html('');
                $.ajax({
                    url: 'api/staff_list',
                    method: 'GET',
                    data: {'department': $('#selected_dept').val()},
                    dataType: 'JSON',
                    success: function (staffs) {
                        staffs.forEach(function (staff) {
                            $('#staff_detail').append('<tr>\
                            <td>' + staff.full_name + '</td>\
                            <td>' + staff.position + '</td>\
                            <td>' + staff.skill + '</td>\
                            <td>' + staff.year_exp + '</td>\
                            <td>' + staff.year_join + '</td></tr>')
                        });
                    },
                });
            })
        });

    </script>

@endsection