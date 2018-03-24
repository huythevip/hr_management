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
        </div>

        <div class="row">
            <div class="department-staff">
                <table id="my_table" class="table table-striped">
                    <thead>
                    <tr id="staff_info" class="danger">
                        <td width="15%">Full Name</td>
                        <td width="20%">Position</td>
                        <td width="30%">Skill</td>
                        <td width="10%">Experience</td>
                        <td width="10%">Year Joined</td>
                        <td width="15%">Actions</td>
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
                            <td class="full_name">' + staff.full_name + '</td>\
                            <td class="position">' + staff.position + '</td>\
                            <td class="skill">' + staff.skill + '</td>\
                            <td class="exp">' + staff.year_exp + '</td>\
                            <td class="year_join">' + staff.year_join + '</td>\
                            <td class="staff_id hidden">' + staff.id + '</td>\
                            <td><a href="#" class="btn btn-warning btn_edt">Edit</a>\
                            <a href="#" class="btn btn-info btn_save hidden">Save</a>\
                            <a href="#" class="btn btn-danger btn_del">Delete</a>\
                            <a href="#" class="btn btn-danger btn_delcon hidden">Confirm</a></td></tr>')
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
                        $('#').removeClass('hidden');
                        $('#save').addClass('hidden');
                    }, //end of success
                }); //end of ajax
            }); //end of clicking button Save

            $(document).on('click', '.btn_edt', function(){
                $(this).addClass('hidden');
                $(this).siblings('.btn_save').removeClass('hidden');
                full_name = $(this).parent().parent().children('.full_name').text();
                position = $(this).parent().parent().children('.position').text();
                skill = $(this).parent().parent().children('.skill').text();
                exp = $(this).parent().parent().children('.exp').text();
                year_join = $(this).parent().parent().children('.year_join').text();
                $(this).parent().parent().children('.full_name').replaceWith('<td class="full_name"><input type="text" class="form-control" value="'+full_name+'" name="full_name"></td>');
                $(this).parent().parent().children('.position').replaceWith('<td class="position"><input type="text" class="form-control" value="'+position+'" name="position"></td>');
                $(this).parent().parent().children('.skill').replaceWith('<td class="skill"><input type="text" class="form-control" value="'+skill+'" name="skill"></td>');
                $(this).parent().parent().children('.exp').replaceWith('<td class="exp"><input type="text" class="form-control" value="'+exp+'" name="exp"></td>');
                $(this).parent().parent().children('.year_join').replaceWith('<td class="year_join"><input type="text" class="form-control" value="'+year_join+'" name="year_join"></td>');
            });

            $(document).on('click', '.btn_save', function(){
                staff_id = $(this).parent().parent().children('.staff_id').text();
                full_name = $('input[name=full_name]').val();
                department = $('#selected_dept').val();
                position = $('input[name=position]').val();
                skill = $('input[name=skill]').val();
                exp = $('input[name=exp]').val();
                year_join = $('input[name=year_join]').val();

                $.ajax({
                    url: 'api/staff_edit',
                    method: 'POST',
                    data: {full_name, position, skill, exp, year_join, department, staff_id},
                    dataType: 'JSON',
                    success: function (du_lieu) {
                        alert(du_lieu.message);
                        $('input[name=full_name]').replaceWith(full_name);
                        $('input[name=position]').replaceWith(position);
                        $('input[name=skill]').replaceWith(skill);
                        $('input[name=exp]').replaceWith(exp);
                        $('input[name=year_join]').replaceWith(year_join);

                }
                }); //End of ajax
                        $(this).addClass('hidden');
                        $(this).siblings('.btn_edt').removeClass('hidden');
            }); //end of clicking btn-save


        }); //End of document ready

    </script>

@endsection