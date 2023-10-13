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
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewDue"> Add New Dues Item</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Employee Type ID</th>
                                <th>Rate Parameter</th>
                                <th>Rate</th>
                                <th>Dues Name</th>
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
            <form id="dueForm" name="dueForm" class="form-horizontal">
                <input type="hidden" name="due_id" id="due_id">
                <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="emptype_id" name="emptype_id" class="form-control" placeholder="Employee Type ID">
                </div>
                <div class="col">
                    <input type="text" id="rate_param" name="rate_param" class="form-control" placeholder="Rate Parameter">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="rate" name="rate" class="form-control" placeholder="Rate">
                </div>
                <div class="col">
                    <input type="text" id="due_name" name="due_name" class="form-control" placeholder="Dues Name">
                </div>
                <div class="col">
                    <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount">
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
            ajax: "{{ route('dueajax.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'emptype_id', name: 'emptype_id'},
                {data: 'rate_param', name: 'rate_param'},
                {data: 'rate', name: 'rate'},
                {data: 'due_name', name: 'due_name'},
                {data: 'amount', name: 'amount'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#createNewDue').click(function () {
            $('#saveBtn').val("create-due");
            $('#due_id').val('');
            $('#dueForm').trigger("reset");
            $('#modelHeading').html("Create New Due");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '#editDue', function () {
            var due_id = $(this).data('id');
            $.get("{{ route('dueajax.index') }}" +'/' + due_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Due");
                $('#saveBtn').val("edit-due");
                $('#ajaxModel').modal('show');
                $('#due_id').val(data.id);
                $('#emptype_id').val(data.emptype_id);
                $('#rate_param').val(data.rate_param);
                $('#rate').val(data.rate);
                $('#due_name').val(data.due_name);
                $('#amount').val(data.amount);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#dueForm').serialize(),
                url: "{{ route('dueajax.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#dueForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteDue', function (){
            var due_id = $(this).data("id");
            var result = confirm("Are You sure want to delete !");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dueajax.store') }}"+'/'+due_id,
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