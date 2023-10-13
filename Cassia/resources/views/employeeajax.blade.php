@extends('layouts.ajaxheader')
    <!-- /.container-fluid -->

<!-- End of Main Content -->
@section('content')
</div>
<!-- End of Content Wrapper -->
<div class="container-overflow" style="margin-left: 50px; margin-right: 50px;">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-12 text-left mb-3">
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewEmployee"> Add New Employee</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Employee No</th>
                                <th>File No</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>First Name</th>
                                <th>Inc Month</th>
                                <th>First Appt Date</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Birth Date</th>
                                <th>Marital Status</th>
                                <th>Photo</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>LGA</th>
                                <th>Town</th>
                                <th>Gender</th>
                                <th>Rank</th>
                                <th>Cadre</th>
                                <th>Court</th>
                                <th>Status</th>
                                <th>Flag</th>
                                <th>Remarks</th>
                                <th>Is Active</th>
                                <th width="auto">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="modelHeading"></h4>
        </div>
        <div class="modal-body">
            <form id="employeeForm" name="employeeForm" class="form-horizontal">
                <input type="hidden" name="employee_id" id="employee_id">
                <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="emp_no" name="emp_no" class="form-control" placeholder="Employee Number">
                </div>
                <div class="col">
                    <input type="text" id="file_no" name="file_no" class="form-control" placeholder="File Number">
                </div>
                <div class="col">
                    <input type="text" id="inc_mo" name="inc_mo" class="form-control" placeholder="inc_mo">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="last_name">
                </div>
                <div class="col">
                    <input type="text" id="middle_name" name="middle_name" class="form-control" placeholder="middle_name">
                </div>
                <div class="col">
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="first_name">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="fappo" name="fappo" class="form-control" placeholder="fappo">
                </div>
                <div class="col">
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="phone">
                </div>
                <div class="col">
                    <input type="text" id="email" name="email" class="form-control" placeholder="email">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="birthdate" name="birthdate" class="form-control" placeholder="birthdate">
                </div>
                <div class="col">
                    <input type="text" id="marital_status" name="marital_status" class="form-control" placeholder="marital_status">
                </div>
                <div class="col">
                    <input type="text" id="media_id" name="media_id" class="form-control" placeholder="media_id">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="address" name="address" class="form-control" placeholder="address">
                </div>
                <div class="col">
                    <input type="text" id="country" name="country" class="form-control" placeholder="country">
                </div>
                <div class="col">
                    <input type="text" id="state" name="state" class="form-control" placeholder="state">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="lga" name="lga" class="form-control" placeholder="lga">
                </div>
                <div class="col">
                    <input type="text" id="town" name="town" class="form-control" placeholder="town">
                </div>
                <div class="col">
                    <input type="text" id="gender" name="gender" class="form-control" placeholder="gender">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="rk_id" name="rk_id" class="form-control" placeholder="rk_id">
                </div>
                <div class="col">
                    <input type="text" id="cad_id" name="cad_id" class="form-control" placeholder="cad_id">
                </div>
                <div class="col">
                    <input type="text" id="ct_id" name="ct_id" class="form-control" placeholder="ct_id">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="emp_status" name="emp_status" class="form-control" placeholder="emp_status">
                </div>
                <div class="col">
                    <input type="text" id="flag" name="flag" class="form-control" placeholder="flag">
                </div>
                <div class="col">
                    <input type="text" id="remark" name="remark" class="form-control" placeholder="remark">
                </div>
                <div class="col">
                    <input type="text" id="is_active" name="is_active" class="form-control" placeholder="is_active">
                </div>
            </div>
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                </div>
            
            </form>
        </div>
    </div>
</div>
</div>
<!--Edit Modal end -->
<div>
    <!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Cassia 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
</body>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script type="text/javascript">
    let clicked = false; //global variable

    function prevent_double_click() {
        clicked = true;
        setTimeout(function() {
            clicked = false;
        }, 1000);
    }
    $(function () {

        if (clicked) return;
        prevent_double_click();

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('employeeajax.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'employee_id', name: 'employee_id'},
                {data: 'emp_no', name: 'emp_no'},
                {data: 'file_no', name: 'file_no'},
                {data: 'last_name', name: 'last_name'},
                {data: 'middle_name', name: 'middle_name'},
                {data: 'first_name', name: 'first_name'},
                {data: 'inc_mo', name: 'inc_mo'},
                {data: 'fappo', name: 'fappo'},
                {data: 'phone', name: 'phone'},
                {data: 'email', name: 'email'},
                {data: 'birthdate', name: 'birthdate'},
                {data: 'marital_status', name: 'marital_status'},
                {data: 'media_id', name: 'media_id'},
                {data: 'address', name: 'address'},
                {data: 'country', name: 'country'},
                {data: 'state', name: 'state'},
                {data: 'lga', name: 'lga'},
                {data: 'town', name: 'town'},
                {data: 'gender', name: 'gender'},
                {data: 'rk_id', name: 'rk_id'},
                {data: 'cad_id', name: 'cad_id'},
                {data: 'ct_id', name: 'ct_id'},
                {data: 'emp_status', name: 'emp_status'},
                {data: 'flag', name: 'flag'},
                {data: 'remark', name: 'remark'},
                {data: 'is_active', name: 'is_active'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#createNewEmployee').click(function () {
            $('#saveBtn').val("create-employee");
            $('#employee_id').val('');
            $('#employeeForm').trigger("reset");
            $('#modelHeading').html("Create New Employee");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '#editEmployee', function () {
            var employee_id = $(this).data('id');
            $.get("{{ route('employeeajax.index') }}" +'/' + employee_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Employee");
                $('#saveBtn').val("edit-employee");
                $('#ajaxModel').modal('show');
                $('#employee_id').val(data.id);
                $('#emp_no').val(data.emp_no);
                $('#file_no').val(data.file_no);
                $('#last_name').val(data.last_name);
                $('#middle_name').val(data.middle_name);
                $('#first_name').val(data.first_name);
                $('#inc_mo').val(data.inc_mo);
                $('#fappo').val(data.fappo);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#birthdate').val(data.birthdate);
                $('#marital_status').val(data.marital_status);
                $('#media_id').val(data.media_id);
                $('#address').val(data.address);
                $('#country').val(data.country);
                $('#state').val(data.state);
                $('#lga').val(data.lga);
                $('#town').val(data.town);
                $('#gender').val(data.gender);
                $('#rk_id').val(data.rk_id);
                $('#cad_id').val(data.cad_id);
                $('#ct_id').val(data.ct_id);
                $('#emp_status').val(data.emp_status);
                $('#flag').val(data.flag);
                $('#remark').val(data.remark);
                $('#is_active').val(data.is_active);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#employeeForm').serialize(),
                url: "{{ route('employeeajax.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#employeeForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteEmployee', function (){
            var employee_id = $(this).data("id");
            var result = confirm("Are You sure want to delete !");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('employeeajax.store') }}"+'/'+employee_id,
                    success: function (data) {
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }else{
                return false;
            }
        });
    });
</script>
</html>
@endsection