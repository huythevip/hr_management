@extends('base')


<!-- CSS -->
@section('custom_css')
.content_test {
    width: 1000px;
    height: 500px;
    margin: 0 auto;
    margin-top: 50px;
}

.information-panel {
    height: 50px;
    line-height: 50px;
}

.information-panel h1 {
    float: left;
    display: inline-block;
    margin-left: 50px;
}

.information-panel select {
    margin-left: 50px;
    height: 30px;
}

.department-staff {
    clear: left;
    width: 100%; 
    height: 90%;
}

@endsection

<!-- Content -->

@section('content')
    <div class="content_test">
        <div class="information-panel">
        <h1>Department:</h1>
        <select id="selected_dept">
            <option>Select</option>
            @foreach($departments as $department)
                <option>{{$department->full_name}}</option>
            @endforeach
        </select>
        </div> <!-- Information Panel -->
        <div class="department-staff">
        <table>
            <thead>
                <tr id="staff_info">
                    
                </tr>
            </thead>
            <tbody id="staff_detail">
                
                    
                
            </tbody>
        </table>
        </div> <!-- Department-staff -->
        
    </div> <!-- Content_test -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $.ajax({
                url:'api/department_column',
                data: {},
                success: function (dept_col) {
                    data = JSON.parse(dept_col);
                    cols = data.columns;
                    html = '';
                    cols.forEach(function(col) {
                        html += '<td>'+col+'</td>';
                });
                    $('#staff_info').html(html);
                },
            });
            });
        $('#selected_dept').change(function() {
            $('#staff_detail').html('');
            $.ajax({
                url:'api/staff_list',
                method: 'GET',
                data: {'department': $('#selected_dept').val()},
                dataType: 'JSON',
                success: function(staffs) {
                    staffs.forEach(function(staff) {
                        $('#staff_detail').append('<tr>\
                            <td>'+staff.full_name+'</td>\
                            <td>'+staff.position+'</td>\
                            <td>'+staff.skill+'</td>\
                            <td>'+staff.year_exp+'</td>\
                            <td>'+staff.year_join+'</td></tr>')
                    });
                },
            });
        })
    </script>

@endsection