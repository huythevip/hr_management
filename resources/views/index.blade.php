@extends('base')


<!-- CSS -->
@section('custom_css')
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
            <a href="#" class="btn btn-primary" id="create">Create</a>
            <a href="#" class="btn btn-info hidden" id="save">Save</a>
            <a href="#" class="btn btn-warning" id="edit">Edit</a>
            <a href="#" class="btn btn-danger" id="delete">Delete</a>

        </div>

        <div class="row">
            <div class="department-staff">
                <table id="my_table" class="table table-striped">
                    <thead>
                    <tr id="staff_info" class="danger">
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
                        }); //Foreach
                    }, //End of success
                }); //End of ajax
            }) //end of function "change"

            $('#create').click(function() {
                    $('#staff_detail').html('');
                    $('#staff_detail').append('<td><input class="form-control" type="text" name="full_name"></td>');
                    $('#staff_detail').append('<td><input class="form-control" type="text" name="position"></td>');
                    $('#staff_detail').append('<td><input class="form-control" type="text" name="skill"></td>');
                    $('#staff_detail').append('<td><input class="form-control" type="text" name="exp"></td>');
                    $('#staff_detail').append('<td><input class="form-control" type="text" name="year_join"></td>');
                    $(this).addClass('hidden');
                    $('#save').removeClass('hidden');
            }); //end of function "click"

            $('#save').click(function() {
                full_name = $("input[name=full_name]").val();
                department = $('#selected_dept').val();
                position = $("input[name=position]").val();
                skill = $("input[name=skill]").val();
                exp = $("input[name=exp]").val();
                year_join = $("input[name=year_join]").val();
                $.ajax({
                    url: 'api/staff_add',
                    method: 'POST',
                    data: {full_name, position, skill, exp, year_join, department},
                    dataType: 'JSON',
                    success: function (du_lieu) {
                        alert(du_lieu.message);
                        $('#create').removeClass('hidden');
                        $('#save').addClass('hidden');
                    }, //end of success
                }); //end of ajax
            }); //end of clicking button Save
        });

    </script>

@endsection