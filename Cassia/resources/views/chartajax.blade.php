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
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewChart"> Add New Chart Item</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Salary Code</th>
                                <th>Annual Basic</th>
                                <th>Monthly Basic</th>
                                <th>Rent</th>
                                <th>Transort</th>
                                <th>Meal</th>
                                <th>Utility</th>
                                <th>Entertain</th>
                                <th>Domestic</th>
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
            <form id="chartForm" name="chartForm" class="form-horizontal">
                <input type="hidden" name="chart_id" id="chart_id">
                <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="sal_id" name="sal_id" class="form-control" placeholder="Grade ID">
                </div>
                <div class="col">
                    <input type="text" id="basicpa" name="basicpa" class="form-control" placeholder="Basic Per Annum">
                </div>
                <div class="col">
                    <input type="text" id="basicpm" name="basicpm" class="form-control" placeholder="Basic Per Month">
                </div>
                <div class="col">
                    <input type="text" id="rent" name="rent" class="form-control" placeholder="Housing">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="trans" name="trans" class="form-control" placeholder="Trans. Allow">
                </div>
                <div class="col">
                    <input type="text" id="enter" name="enter" class="form-control" placeholder="Entertainment">
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em;">
                <div class="col">
                    <input type="text" id="util" name="util" class="form-control" placeholder="Utility">
                </div>
                <div class="col">
                    <input type="text" id="meal" name="meal" class="form-control" placeholder="Meal Subsidy">
                </div>
                <div class="col">
                    <input type="text" id="domestic" name="domestic" class="form-control" placeholder="DOM Staff">
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
            ajax: "{{ route('chartajax.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'sal_id', name: 'sal_id'},
                {data: 'basicpa', name: 'basicpa'},
                {data: 'basicpm', name: 'basicpm'},
                {data: 'rent', name: 'rent'},
                {data: 'trans', name: 'trans'},
                {data: 'meal', name: 'meal'},
                {data: 'util', name: 'util'},
                {data: 'enter', name: 'enter'},
                {data: 'domestic', name: 'domestic'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#createNewChart').click(function () {
            $('#saveBtn').val("create-chart");
            $('#chart_id').val('');
            $('#chartForm').trigger("reset");
            $('#modelHeading').html("Create New Chart");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '#editChart', function () {
            var chart_id = $(this).data('id');
            $.get("{{ route('chartajax.index') }}" +'/' + chart_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Chart");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#chart_id').val(data.id);
                $('#sal_id').val(data.cadre_code);
                $('#basicpa').val(data.basicpa);
                $('#basicpm').val(data.basicpm);
                $('#rent').val(data.rent);
                $('#trans').val(data.trans);
                $('#meal').val(data.meal);
                $('#util').val(data.util);
                $('#enter').val(data.enter);
                $('#domestic').val(data.domestic);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#chartForm').serialize(),
                url: "{{ route('chartajax.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#chartForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteChart', function (){
            var chart_id = $(this).data("id");
            var result = confirm("Are You sure want to delete !");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('chartajax.store') }}"+'/'+chart_id,
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