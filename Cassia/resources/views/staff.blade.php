@extends('layouts.app')
 
@section('content')
    <div class="container overflow-hidden">
        <div class="card overflow-hidden">
            <div class="card-header">Manage Users</div>
            <div class="card-body overflow-hidden">
                
<table class="table table-bordered table-dark" id="staff-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
            </div>
        </div>
    </div>
@endsection

<!-- Datatables CSS -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {

    var table = $('.staff-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('get_staff') }}",
        columns: [
            {data: 'checkbox', name:'checkbox'},
         {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
         {data: 'firstname', name:'firstname'},
         {data: 'lastname', name:'lastname'},
         {data: 'position', name:'position'},
         {data: 'office', name:'office'},
         {data: 'start_date', name:'start_date'},
         {data: 'salary', name:'salary'},
   //      {data: 'action', name: 'action',orderable: false,searchable: false},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

  });
</script>