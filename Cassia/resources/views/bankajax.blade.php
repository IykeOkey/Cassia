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
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewBank"> Add New Bank Item</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bank Type</th>
                                <th>Bank Code</th>
                                <th>Sort Code</th>
                                <th>Bank Name</th>
                                <th>Bank Branch</th>
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
            <form id="bankForm" name="bankForm" class="form-horizontal">
                <input type="hidden" name="bank_id" id="bank_id">
                <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="bk_type" name="bk_type" class="form-control" placeholder="bk_type">
                </div>
                <div class="col">
                    <input type="text" id="bk_code" name="bk_code" class="form-control" placeholder="Bank Code">
                </div>
                <div class="col">
                    <input type="text" id="sort_code" name="sort_code" class="form-control" placeholder="Sort Code">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="bk_name" name="bk_name" class="form-control" placeholder="Bank Name">
                </div>
                <div class="col">
                    <input type="text" id="branch" name="branch" class="form-control" placeholder="Bank Branch">
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
            ajax: "{{ route('bankajax.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'bk_type', name: 'bk_type'},
                {data: 'bk_code', name: 'bk_code'},
                {data: 'sort_code', name: 'sort_code'},
                {data: 'bk_name', name: 'bk_name'},
                {data: 'branch', name: 'branch'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#createNewBank').click(function () {
            $('#saveBtn').val("create-bank");
            $('#bank_id').val('');
            $('#bankForm').trigger("reset");
            $('#modelHeading').html("Create New Bank");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '#editBank', function () {
            var bank_id = $(this).data('id');
            $.get("{{ route('bankajax.index') }}" +'/' + bank_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Bank");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#bank_id').val(data.id);
                $('#bk_type').val(data.bk_type);
                $('#bk_code').val(data.bk_code);
                $('#sort_code').val(data.sort_code);
                $('#bk_name').val(data.bk_name);
                $('#branch').val(data.branch);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#bankForm').serialize(),
                url: "{{ route('bankajax.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#bankForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteBank', function (){
            var bank_id = $(this).data("id");
            var result = confirm("Are You sure want to delete !");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('bankajax.store') }}"+'/'+bank_id,
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