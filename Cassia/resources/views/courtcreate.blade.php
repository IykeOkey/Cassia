@extends('layouts.main')

@section('content')
<div class="container-fluid" style="max-width: 785px;">
    <div class="card">
            <div class="card-header">
                {{ __('Create') }}
            </div>
        <div class="card-body">
  
            <h2 class="text-center">Court Form</h2>
            
            <form action="{{ route('courts.store') }}" method="POST">
                @csrf
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="div_id" class="form-control" placeholder="Division ID">
                    </div>
                    <div class="col">
                        <input type="text" name="ct_code" class="form-control" placeholder="Court Code">
                    </div>
                    <div class="col">
                        <input type="text" name="ct_name" class="form-control" placeholder="Court Name">
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

