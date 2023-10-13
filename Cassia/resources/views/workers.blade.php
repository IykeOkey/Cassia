<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Workers Manager</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ url('/') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
  
  
<div class="container">
    <h2 class="text-center mt-5 mb-3">Laravel Workers Manager</h2>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-outline-primary" onclick="createWorkers()"> 
                Create New Staff
            </button>
        </div>
        <div class="card-body">
            <div id="alert-div">
              
            </div>
            <table class="table table-bordered" id="workers_table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Start Date</th>
                        <th>Salary</th>
                        <th width="240px">Action</th>
                        
                    </tr>
                </thead>
                <tbody id="projects-table-body">
                      
                </tbody>
                  
            </table>
        </div>
    </div>
</div>
  
<!-- project form modal -->
<div class="modal" tabindex="-1" role="dialog" id="form-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Workers Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="error-div"></div>
        <form>
            <input type="hidden" name="update_id" id="update_id">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" name="position">
            </div>
            <div class="form-group">
                <label for="office">Office</label>
                <input type="text" class="form-control" id="office" name="office">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="text" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <textarea class="form-control" id="salary" rows="3" name="salary"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary mt-3" id="save-project-btn">Save Workers</button>
        </form>
      </div>
    </div>
  </div>
</div>
  
<!-- view project modal -->
<div class="modal " tabindex="-1" role="dialog" id="view-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Workers Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <b>First Name</b>
        <p id="first_name-info"></p>
        <b>Last Name</b>
        <p id="last_name-info"></p>
        <b>Position</b>
        <p id="position-info"></p>
        <b>Office</b>
        <p id="office-info"></p>
        <b>Start Date</b>
        <p id="start_date-info"></p>
        <b>Salary</b>
        <p id="salary-info"></p>
      </div>
    </div>
  </div>
</div>
  
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  
    $(function() {
        var baseUrl = $('meta[name=app-url]').attr("content");
        let url = baseUrl + '/workers';
        // create a datatable
        $('#workers_table').DataTable({
            processing: true,
            ajax: url,
            "order": [[ 0, "desc" ]],
            columns: [
                {data: 'first_name', name:'first_name'},
                {data: 'last_name', name:'last_name'},
                {data: 'position', name:'position'},
                {data: 'office', name:'office'},
                {data: 'start_date', name:'start_date'},
                {data: 'salary', name:'salary'},
                { data: 'action'},
            ],
              
        });
      });
      
  
    function reloadTable()
    {
        /*
            reload the data on the datatable
        */
        $('#workers_table').DataTable().ajax.reload();
    }
  
    /*
        check if form submitted is for creating or updating
    */
    $("#save-project-btn").click(function(event ){
        event.preventDefault();
        if($("#update_id").val() == null || $("#update_id").val() == "")
        {
            storeWorkers();
        } else {
            updateWorkers();
        }
    })
  
    /*
        show modal for creating a record and 
        empty the values of form and remove existing alerts
    */
    function createWorkers()
    {
        $("#alert-div").html("");
        $("#error-div").html("");
        $("#update_id").val("");
        $("#first_name").val("");
        $("#last_name").val("");
        $("#position").val("");
        $("#office").val("");
        $("#start_date").val("");
        $("#salary").val("");
        $("#form-modal").modal('show'); 
    }
  
    /*
        submit the form and will be stored to the database
    */
    function storeWorkers()
    {   
        $("#save-project-btn").prop('disabled', true);
        let url = $('meta[name=app-url]').attr("content") + "/workers";
        let data = {
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            position: $("#position").val(),
            office: $("#office").val(),
            start_date: $("#start_date").val(),
            salary: $("#salary").val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "POST",
            data: data,
            success: function(response) {
                $("#save-project-btn").prop('disabled', false);
                let successHtml = '<div class="alert alert-success" role="alert"><b>Project Created Successfully</b></div>';
                $("#alert-div").html(successHtml);
                $("#first_name").val("");
                $("#last_name").val("");
                $("#position").val("");
                $("#office").val("");
                $("#start_date").val("");
                $("#salary").val("");
                reloadTable();
                $("#form-modal").modal('hide');
            },
            error: function(response) {
                $("#save-project-btn").prop('disabled', false);
                if (typeof response.responseJSON.errors !== 'undefined') 
                {
    let errors = response.responseJSON.errors;
    let descriptionValidation = "";
    if (typeof errors.description !== 'undefined') 
                    {
                        descriptionValidation = '<li>' + errors.description[0] + '</li>';
                    }
                    let nameValidation = "";
    if (typeof errors.name !== 'undefined') 
                    {
                        nameValidation = '<li>' + errors.name[0] + '</li>';
                    }
      
    let errorHtml = '<div class="alert alert-danger" role="alert">' +
        '<b>Validation Error!</b>' +
        '<ul>' + nameValidation + descriptionValidation + '</ul>' +
    '</div>';
    $("#error-div").html(errorHtml);            
}
            }
        });
    }
  
  
    /*
        edit record function
        it will get the existing value and show the project form
    */
    function editWorkers(id)
    {
        let url = $('meta[name=app-url]').attr("content") + "/workers/" + id;
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                let workers = response.workers;
                $("#alert-div").html("");
                $("#error-div").html("");
                $("#update_id").val(workers.id);
                $("#first_name").val(workers.first_name);
                $("#last_name").val(workers.last_name);
                $("#position").val(workers.position);
                $("#office").val(workers.office);
                $("#start_date").val(workers.start_date);
                $("#salary").val(workers.salary);
                $("#form-modal").modal('show');
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }
  
    /*
        sumbit the form and will update a record
    */
    function updateWorkers()
    {
        $("#save-project-btn").prop('disabled', true);
        let url = $('meta[name=app-url]').attr("content") + "/workers/" + $("#update_id").val();
        let data = {
            id: $("#update_id").val(),
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            position: $("#position").val(),
            office: $("#office").val(),
            start_date: $("#start_date").val(),
            salary: $("#salary").val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "PUT",
            data: data,
            success: function(response) {
                $("#save-project-btn").prop('disabled', false);
                let successHtml = '<div class="alert alert-success" role="alert"><b>Project Updated Successfully</b></div>';
                $("#alert-div").html(successHtml);
                $("#first_name").val("");
                $("#last_name").val("");
                $("#position").val("");
                $("#office").val("");
                $("#start_date").val("");
                $("#salary").val("");
                reloadTable();
                $("#form-modal").modal('hide');
            },
            error: function(response) {
                $("#save-project-btn").prop('disabled', false);
                if (typeof response.responseJSON.errors !== 'undefined') 
                {
    let errors = response.responseJSON.errors;
    let descriptionValidation = "";
    if (typeof errors.description !== 'undefined') 
                    {
                        descriptionValidation = '<li>' + errors.description[0] + '</li>';
                    }
                    let nameValidation = "";
    if (typeof errors.name !== 'undefined') 
                    {
                        nameValidation = '<li>' + errors.name[0] + '</li>';
                    }
      
    let errorHtml = '<div class="alert alert-danger" role="alert">' +
        '<b>Validation Error!</b>' +
        '<ul>' + nameValidation + descriptionValidation + '</ul>' +
    '</div>';
    $("#error-div").html(errorHtml);            
}
            }
        });
    }
  
    /*
        get and display the record info on modal
    */
    function showWorkers(id)
    {
        $("#first_name-info").html("");
        $("#last_name-info").html("");
        $("#position-info").html("");
        $("#office-info").html("");
        $("#start_date-info").html("");
        $("#salary-info").html("");
        let url = $('meta[name=app-url]').attr("content") + "/workers/" + id +"";
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                let workers = response.workers;
                $("#first_name-info").html(workers.first_name);
                $("#last_name-info").html(workers.last_name);
                $("#position-info").html(workers.position);
                $("#office-info").html(workers.office);
                $("#start_date-info").html(workers.start_date);
                $("#salary-info").html(workers.salary);
                $("#view-modal").modal('show'); 
  
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }
  
    /*
        delete record function
    */
    function destroyWorkers(id)
    {
        let url = $('meta[name=app-url]').attr("content") + "/workers/" + id;
        let data = {
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            position: $("#position").val(),
            office: $("#office").val(),
            start_date: $("#start_date").val(),
            salary: $("#salary").val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "DELETE",
            data: data,
            success: function(response) {
                let successHtml = '<div class="alert alert-success" role="alert"><b>Project Deleted Successfully</b></div>';
                $("#alert-div").html(successHtml);
                reloadTable();
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }
</script>
</body>
</html>