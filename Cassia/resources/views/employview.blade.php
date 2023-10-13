@extends('layouts.main')

@section('content')
<div class="container">
    <div class="card overflow-auto">
            <div class="card-header">
                {{ __('Create') }}
            </div>

        <table class="table table-bordered table-dark" id="users-table">
            <thead>
              <tr>
                <th></th>
                <th>ID</th>
                <th>Emp_No</th>
                <th>File_No</th>
                <th>Last_Name</th>
                <th>Middle_Name</th>
                <th>First_Name</th>
                <th>Inc_Mo</th>
                <th>Fappo</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Birth_Date</th>
                <th>Marital_Status</th>
                <th>Media_Id</th>
                <th>Address</th>
                <th>Country</th>
                <th>State</th>
                <th>LGA</th>
                <th>Town</th>
                <th>Gender</th>
                <th>Rank_Id</th>
                <th>Cadre_Id</th>
                <th>Ct_Id</th>
                <th>Emp_Status</th>
                <th>Flag</th>
                <th>Remark</th>
                <th>Created_at</th>
                <th>Updated_at</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection
        <script>
            const ajaxUrl = "{{ (route('get-users')) }}";
            const cat = 'employees';
            const dataType = json;
            const token = "{{ csrf_token() }}";
        </script>

            <script type="text/javascript">
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var table = $('#users-table');
                var title = "List of system users in the system";
                var columns = [0, 1, 2, 3];
                var dataColumns = [
                    {data: 'checkbox', name:'checkbox'},
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
                    {data: 'emp_no', name: 'emp_no'},
                    {data: 'file_no', name:'file_no'},
                    {data: 'last_name', name:'last_name'},
                    {data: 'middle_name', name:'middle_name'},
                    {data: 'first_name', name:'first_name'},
                    {data: 'inc_mo', name:'inc_mo'},
                    {data: 'fappo', name:'fappo'},
                    {data: 'phone', name:'phone'},
                    {data: 'email', name:'email'},
                    {data: 'birthdate', name:'birthdate'},
                    {data: 'marital_status', name:'marital_status'},
                    {data: 'media_id', name:'media_id'},
                    {data: 'address', name:'address'},
                    {data: 'country', name:'country'},
                    {data: 'state', name:'state'},
                    {data: 'lga', name:'lga'},
                    {data: 'town', name:'town'},
                    {data: 'gender', name:'gender'},
                    {data: 'rk_id', name:'rk_id'},
                    {data: 'cad_id', name:'cad_id'},
                    {data: 'ct_id', name:'ct_id'},
                    {data: 'emp_status', name:'emp_status'},
                    {data: 'flag', name:'flag'},
                    {data: 'remark', name:'remark'},
                    {data: 'is_active', name:'is_active'},
                    {data: 'action', name: 'action',orderable: false,searchable: false},
                ];
                makeDataTable(table, title, columns, dataColumns);
            });


            function makeDataTable(table, title, columnArray, dataColumns) {

                $(table).dataTable({
                    dom:
                        "<'row'<'col-sm-1'l><'col-sm-8 pb-3 text-center'B><'col-sm-3'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    processing: true,
                    stateSave: true,
                    pageLength:15,
                    "lengthMenu": [ [10, 15, 25, 50, -1], [10, 15, 25, 50, "All"] ],
                    buttons: [
                        {
                            text: "<i></i> Select all",
                            className: "btn btn-primary btn-sm btn-select-all",
                            action: function(e, dt, node, config) {
                                selectAllCheckBoxes();
                            }
                        },

                        {
                            text: "<i></i> Deselect all",
                            className: "btn btn-info btn-sm",
                            action: function(e, dt, node, config) {
                                deselectAllCheckBoxes();
                            }
                        },

                        $.extend(
                            true,
                            {},
                            {
                                extend: "excelHtml5",
                                text: '<i class="fa fa-download "></i> Excel',
                                className: "btn btn-default btn-sm",
                                title: title,
                                exportOptions: {
                                    columns: columnArray
                                }
                            }
                        ),

                        $.extend(
                            true,
                            {},
                            {
                                extend: "pdfHtml5",
                                text: '<i class="fa fa-download"></i> Pdf',
                                className: "btn btn-default btn-sm",
                                title: title,
                                exportOptions: {
                                    columns: columnArray
                                }
                            }
                        ),

                        $.extend(
                            true,
                            {},
                            {
                                extend: "print",
                                exportOptions: {
                                    columns: columnArray,
                                    modifier: {
                                        selected: null
                                    }
                                },
                                text: '<i class="fa fa-save"></i> Print',
                                className: "btn btn-default btn-sm",
                                title: title
                            }
                        ),

                        {
                            text: "<i></i> Delete selected",
                            className: "btn btn-danger btn-sm btn-deselect-all",
                            action: function(e, dt, node, config) {
                                deleteSelectedRows(table);
                            }
                        }
                    ],
                    ajax: ajaxUrl,
                    columns: dataColumns,
                    order: [[0, "asc"]]
                });

                }

            });

            </script>