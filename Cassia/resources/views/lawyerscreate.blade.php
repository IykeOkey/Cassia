@extends('layouts.main')

@section('content')
<div class="container-fluid" style="max-width: 785px;">
    <div class="card">
            <div class="card-header">
                {{ __('Create') }}
            </div>
        <div class="card-body">
  
            <h2 class="text-center">Lawyers Allowances Form</h2>
            
            <form action="{{ route('lawyers.store') }}" method="POST">
                @csrf
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="duty_disp" class="form-control" placeholder="Duty Dispensation">
                    </div>
                    <div class="col">
                        <input type="text" name="dom" class="form-control" placeholder="Domestic">
                    </div>
                </div>
                <div class="row form-group"  style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="ca" class="form-control" placeholder="Consol'd Allow">
                    </div>
                    <div class="col">
                        <input type="text" name="harz" class="form-control" placeholder="Hazard Allow">
                    </div>
                    <div class="col">
                        <input type="text" name="rob_allow" class="form-control" placeholder="Rob Allowance">
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

