<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <table class="table" id="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Bankc Type</th>
            <th class="text-center">Bank Code</th>
            <th class="text-center">Sort Code</th>
            <th class="text-center">Bank Name</th>
            <th class="text-center">Branch</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr class="item{{$item->id}}">
            <td>{{$item->id}}</td>
            <td>{{$item->bk_type}}</td>
            <td>{{$item->bk_code}}</td>
            <td>{{$item->sort_code}}</td>
            <td>{{$item->bk_name}}</td>
            <td>{{$item->branch}}</td>
            <td><button class="edit-modal btn btn-info"
                    data-info="{{$item->id}},{{$item->bk_type}},{{$item->bk_code}},{{$item->sort_code}},{{$item->bk_name}},{{$item->branch}}">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </button>
                <button class="delete-modal btn btn-danger"
                    data-info="{{$item->id}},{{$item->bk_type}},{{$item->bk_code}},{{$item->sort_code}},{{$item->bk_name}},{{$item->branch}},{{$item->salary}}">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button></td>
                
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    
</body>
</html>