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
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewDeduction"> Add New Deduction Item</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Deduction Code</th>
                                <th>Deduction Name</th>
                                <th>Amount</th>
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
            <form id="deductionForm" name="deductionForm" class="form-horizontal">
                <input type="hidden" name="deduction_id" id="deduction_id">
                <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="ded_code" name="ded_code" class="form-control" placeholder="Deduction Code">
                </div>
                <div class="col">
                    <input type="text" id="ded_name" name="ded_name" class="form-control" placeholder="Deduction Name">
                </div>
                <div class="col">
                    <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount">
                </div>
            </div>
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                </div>
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
            ajax: "{{ route('deductionajax.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'ded_code', name: 'ded_code'},
                {data: 'ded_name', name: 'ded_name'},
                {data: 'amount', name: 'amount'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#createNewDeduction').click(function () {
            $('#saveBtn').val("create-deduction");
            $('#deduction_id').val('');
            $('#deductionForm').trigger("reset");
            $('#modelHeading').html("Create New Deduction");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '#editDeduction', function () {
            var bank_id = $(this).data('id');
            $.get("{{ route('deductionajax.index') }}" +'/' + deduction_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Deduction");
                $('#saveBtn').val("edit-deduction");
                $('#ajaxModel').modal('show');
                $('#deduction_id').val(data.id);
                $('#ded_code').val(data.ded_code);
                $('#ded_name').val(data.ded_name);
                $('#amount').val(data.amount);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#deductionForm').serialize(),
                url: "{{ route('deductionajax.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#deductionForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteDeduction', function (){
            var bank_id = $(this).data("id");
            var result = confirm("Are You sure want to delete !");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('deductionajax.store') }}"+'/'+deduction_id,
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