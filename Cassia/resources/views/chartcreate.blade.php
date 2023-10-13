@extends('layouts.main')

@section('content')
<div class="container-fluid" style="max-width: 785px;">
    <div class="card">
            <div class="card-header">
                {{ __('Create') }}
            </div>
        <div class="card-body">
  
            <h2 class="text-center">Salary Chart Form</h2>
            
            <form action="{{ route('charts.store') }}" method="POST">
                @csrf
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="cadre_code" class="form-control" placeholder="Grade ID">
                    </div>
                    <div class="col">
                        <input type="text" name="basicpa" class="form-control" placeholder="Basic Per Annum">
                    </div>
                    <div class="col">
                        <input type="text" name="basicpm" class="form-control" placeholder="Basic Per Month">
                    </div>
                    <div class="col">
                        <input type="text" name="rent" class="form-control" placeholder="Housing">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="trans" class="form-control" placeholder="Trans. Allow">
                    </div>
                    <div class="col">
                        <input type="text" name="meal" class="form-control" placeholder="Meal Subsidy">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="util" class="form-control" placeholder="Utility">
                    </div>
                    <div class="col">
                        <input type="text" name="enter" class="form-control" placeholder="Entertainment">
                    </div>
                    <div class="col">
                        <input type="text" name="domestic" class="form-control" placeholder="DOM Staff">
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

