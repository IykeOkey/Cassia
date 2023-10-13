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
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewCadre"> Add New Cadre Item</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cadre ID</th>
                                <th>Cadre Code</th>
                                <th>Cadre Name</th>
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
            <form id="cadreForm" name="cadreForm" class="form-horizontal">
                <input type="hidden" name="cadre_id" id="cadre_id">
                <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="glev_id" name="glev_id" class="form-control" placeholder="Grade Level ID">
                </div>
                <div class="col">
                    <input type="text" id="cdr_code" name="cdr_code" class="form-control" placeholder="Cadre Code">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="cdr_name" name="cdr_name" class="form-control" placeholder="Cadre Name">
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
            ajax: "{{ route('cadreajax.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'glev_id', name: 'glev_id'},
                {data: 'cdr_code', name: 'cdr_code'},
                {data: 'cdr_name', name: 'cdr_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#createNewCadre').click(function () {
            $('#saveBtn').val("create-cadre");
            $('#cadre_id').val('');
            $('#cadreForm').trigger("reset");
            $('#modelHeading').html("Create New Cadre");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '#editCadre', function () {
            var bank_id = $(this).data('id');
            $.get("{{ route('cadreajax.index') }}" +'/' + cadre_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Cadre");
                $('#saveBtn').val("edit-cadre");
                $('#ajaxModel').modal('show');
                $('#cadre_id').val(data.id);
                $('#glev_id').val(data.glev_id);
                $('#cdr_code').val(data.cdr_code);
                $('#cdr_name').val(data.cdr_name);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#cadreForm').serialize(),
                url: "{{ route('cadreajax.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#cadreForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteCadre', function (){
            var cadre_id = $(this).data("id");
            var result = confirm("Are You sure want to delete !");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('cadreajax.store') }}"+'/'+cadre_id,
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