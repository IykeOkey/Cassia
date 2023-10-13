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
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewStaffer"> Add New staffer Item</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>min_name</th>
                                <th>Staff ID</th>
                                <th>File No</th>
                                <th>HQ SNO Name</th>
                                <th>Emp. No</th>
                                <th>Inc. Month</th>
                                <th>Dept. Code</th>
                                <th>Section Code</th>
                                <th>Title</th>
                                <th>Surname</th>
                                <th>First Name</th>
                                <th>Other Name</th>
                                <th>Gender</th>
                                <th>Birth Date</th>
                                <th>First Appt Date</th>
                                <th>Rank</th>
                                <th>Sal. Desc</th>
                                <th>Sal. GL</th>
                                <th>Sal. Step</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>LGA</th>
                                <th>Town</th>
                                <th>nok_id</th>
                                <th>agree_type</th>
                                <th>duty_disp</th>
                                <th>bank_code</th>
                                <th>acct_no</th>
                                <th>bank_id</th>
                                <th>bverify</th>
                                <th>rtd_date</th>
                                <th>Flag</th>
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
            <form id="stafferForm" name="stafferForm" class="form-horizontal">
                <input type="hidden" name="staffer_id" id="staffer_id">
                <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="min_name" name="min_name" class="form-control" placeholder="MDA Name">
                </div>
                <div class="col">
                    <input type="text" id="staff_id" name="staff_id" class="form-control" placeholder="Staff ID">
                </div>
                <div class="col">
                    <input type="text" id="file_no" name="file_no" class="form-control" placeholder="File Number">
                </div>
                <div class="col">
                    <input type="text" id="inc_mo" name="inc_mo" class="form-control" placeholder="inc. Month">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="dept_code" name="dept_code" class="form-control" placeholder="Dept Code">
                </div>
                <div class="col">
                    <input type="text" id="div_code" name="div_code" class="form-control" placeholder="Div Code">
                </div>
                <div class="col">
                    <input type="text" id="sec_code" name="sec_code" class="form-control" placeholder="Sec Code">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="hq_sno" name="hq_sno" class="form-control" placeholder="Dept Code">
                </div>
                <div class="col">
                    <input type="text" id="emp_no" name="emp_no" class="form-control" placeholder="Div Code">
                </div>
                <div class="col">
                    <input type="text" id="agree_type" name="agree_type" class="form-control" placeholder="Employment Type">
                </div>
                <div class="col">
                    <input type="text" id="duty_disp" name="duty_disp" class="form-control" placeholder="Duty Disp">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="col">
                    <input type="text" id="emp_sur" name="emp_sur" class="form-control" placeholder="Surname">
                </div>
                <div class="col">
                    <input type="text" id="emp_fir" name="emp_fir" class="form-control" placeholder="First Name">
                </div>
                <div class="col">
                    <input type="text" id="emp_init" name="emp_init" class="form-control" placeholder="Other Names">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="gender" name="gender" class="form-control" placeholder="Gender">
                </div>
                <div class="col">
                    <input type="text" id="bir_date" name="bir_date" class="form-control" placeholder="Birth Date">
                </div>
                <div class="col">
                    <input type="text" id="nok_id" name="nok_id" class="form-control" placeholder="Next of Kin">
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
                    <input type="text" id="fappo" name="fappo" class="form-control" placeholder="First Appoint Date">
                </div>
                <div class="col">
                    <input type="text" id="rank" name="rank" class="form-control" placeholder="Rank">
                </div>
                <div class="col">
                    <input type="text" id="rtd_date" name="rtd_date" class="form-control" placeholder="Retirement Date">
                </div>
                <div class="col">
                    <input type="text" id="flag" name="flag" class="form-control" placeholder="Flag">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="bank_code" name="bank_code" class="form-control" placeholder="Bank Code">
                </div>
                <div class="col">
                    <input type="text" id="acct_no" name="acct_no" class="form-control" placeholder="Account No">
                </div>
                <div class="col">
                    <input type="text" id="bank_id" name="bank_id" class="form-control" placeholder="Bank ID">
                </div>
                <div class="col">
                    <input type="text" id="bverify" name="bverify" class="form-control" placeholder="Bank Verify No">
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
            ajax: "{{ route('stafferedit.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'staffer_id', name: 'staffer_id'},
                {data: 'min_name', name: 'min_name'},
                {data: 'staff_id', name: 'staff_id'},
                {data: 'file_no', name: 'file_no'},
                {data: 'hq_sno', name: 'hq_sno'},
                {data: 'emp_no', name: 'emp_no'},
                {data: 'inc_mo', name: 'inc_mo'},
                {data: 'dept_code', name: 'dept_code'},
                {data: 'div_code', name: 'div_code'},
                {data: 'sec_code', name: 'sec_code'},
                {data: 'title', name: 'title'},
                {data: 'emp_sur', name: 'emp_sur'},
                {data: 'emp_fir', name: 'emp_fir'},
                {data: 'emp_init', name: 'emp_init'},
                {data: 'gender', name: 'gender'},
                {data: 'bir_date', name: 'bir_date'},
                {data: 'fappo', name: 'fappo'},
                {data: 'rank', name: 'rank'},
                {data: 'sal_desc', name: 'sal_desc'},
                {data: 'sal_glev', name: 'sal_glev'},
                {data: 'sal_step', name: 'sal_step'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'emp_status', name: 'emp_status'},
                {data: 'lga', name: 'lga'},
                {data: 'town', name: 'town'},
                {data: 'nok_id', name: 'nok_id'},
                {data: 'agree_type', name: 'agree_type'},
                {data: 'duty_disp', name: 'duty_disp'},
                {data: 'bank_code', name: 'bank_code'},
                {data: 'acct_no', name: 'acct_no'},
                {data: 'bank_id', name: 'bank_id'},
                {data: 'bverify', name: 'bverify'},
                {data: 'rtd_date', name: 'rtd_date'},
                {data: 'flag', name: 'flag'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#createNewStaffer').click(function () {
            $('#saveBtn').val("create-staffer");
            $('#staffer_id').val('');
            $('#stafferForm').trigger("reset");
            $('#modelHeading').html("Create New staffer");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '#editstaffer', function () {
            var bank_id = $(this).data('id');
            $.get("{{ route('stafferedit.index') }}" +'/' + staffer_id +'/edit', function (data) {
                $('#modelHeading').html("Edit staffer");
                $('#saveBtn').val("edit-staffer");
                $('#ajaxModel').modal('show');
                $('#staffer_id').val(data.id);
                $('#min_name').val(data.min_name);
                $('#staff_id').val(data.staff_id);
                $('#file_no').val(data.file_no);
                $('#hq_sno').val(data.hq_sno);
                $('#emp_no').val(data.emp_no);
                $('#inc_mo').val(data.inc_mo);
                $('#dept_code').val(data.dept_code);
                $('#div_code').val(data.div_code);
                $('#title').val(data.title);
                $('#emp_sur').val(data.emp_sur);
                $('#emp_fir').val(data.emp_fir);
                $('#emp_init').val(data.emp_init);
                $('#gender').val(data.gender);
                $('#bir_date').val(data.bir_date);
                $('#fappo').val(data.fappo);
                $('#rank').val(data.rank);
                $('#sal_desc').val(data.sal_desc);
                $('#sal_glev').val(data.sal_glev);
                $('#sal_step').val(data.sal_step);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#lga').val(data.lga);
                $('#town').val(data.town);
                $('#nok_id').val(data.nok_id);
                $('#agree_type').val(data.agree_type);
                $('#duty_disp').val(data.duty_disp);
                $('#bank_code').val(data.bank_code);
                $('#acct_no').val(data.acct_no);
                $('#bank_id').val(data.bank_id);
                $('#cad_id').val(data.cad_id);
                $('#bverify').val(data.bverify);
                $('#emp_status').val(data.emp_status);
                $('#rtd_date').val(data.rtd_date);
                $('#flag').val(data.flag);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#stafferForm').serialize(),
                url: "{{ route('stafferedit.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#stafferForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteStaffer', function (){
            var staffer_id = $(this).data("id");
            var result = confirm("Are You sure want to delete !");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('stafferedit.store') }}"+'/'+staffer_id,
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