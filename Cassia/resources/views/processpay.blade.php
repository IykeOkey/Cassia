@extends('layouts.ajaxheader')
    <!-- /.container-fluid -->

<!-- End of Main Content -->
@section('content')

<div class="container-overflow" style="margin-left: 50px; margin-right: 50px;">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-12 text-left mb-3">
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewBank"> Add New Bank Item</a>
                </div>
                <div class="col-md-12">
                <a href="{{ route('processpay') }}">Payroll Salary</a>

                </div>
            </div>
        </div>
    </div>
</div>