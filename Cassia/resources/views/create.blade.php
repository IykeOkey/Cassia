@extends('layouts.main')

@section('content')
<div class="container-fluid" style="max-width: 785px;">
    <div class="card">
            <div class="card-header">
                {{ __('Create') }}
            </div>
        <div class="card-body">
  
            <h2 class="text-center">Academic Info Form</h2>
            
            <form action="{{ route('academics.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="staff_id" class="form-control" placeholder="Staff ID">
                    </div>
                    <div class="col">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="col">
                        <input type="text" name="edu_code" class="form-control" placeholder="Cert Code">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="text" name="edu_name" class="form-control" placeholder="Cert Name">
                    </div>
                    <div class="col">
                        <input type="text" name="edu_grade" class="form-control" placeholder="Cert Grade">
                    </div>
                    <div class="col">
                        <input id="edudate" class="form-control" type="text" name="edu_date" placeholder="Cert Date">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            <div class="row mb-3">
                <div class="col-3">
                    <button type="cancel" class="btn btn-danger btn-block text-white">Cancel</button>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success btn-block text-white">Create</button>
                </div>
            </div>
            </form>
        <!--    <div class="row">
                <div>
                <span style="margin-bottom: 1em;">
                <a href="#" class="btn btn-danger">Cancel</a>
                </span>
                <span class="col-2" style="margin-bottom: 1em;">
                <a href="#" class="btn btn-primary">Create</a>
                </span>
                </div>
            </div> -->
        </div>
    
    
     </div>
</div>
@endsection

