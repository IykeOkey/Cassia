@extends('layouts.main')
 
@section('content')
    <div class="container">
        <div class="card overflow-auto">
            <div class="card-header">Run Salary Payroll</div>
            <div class="card-body">
                
            <button id="runControllerBtn" type="button" class="btn btn-success">Success</button>
            </div>
            <div  class="btn btn-success">
            <a href="{{ route('paysalarys') }}">Go to Payment</a>
            </div>
            
        </div>
    </div>
@endsection