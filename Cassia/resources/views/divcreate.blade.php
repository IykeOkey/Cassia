@extends('layouts.main')

@section('content')
<div class="container-fluid" style="max-width: 785px;">
    <div class="card">
            <div class="card-header">
                {{ __('Create') }}
            </div>
        <div class="card-body">
  
            <h2 class="text-center">Judicial Division Form</h2>
            
            <form action="{{ route('divisions.store') }}" method="POST">
                @csrf
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="st_id" class="form-control" placeholder="Station ID">
                    </div>
                    <div class="col">
                        <input type="text" name="div_code" class="form-control" placeholder="Division Code">
                    </div>
                    <div class="col">
                        <input type="text" name="div_name" class="form-control" placeholder="Division Name">
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
        </div>
    </div>
</div>
@endsection

