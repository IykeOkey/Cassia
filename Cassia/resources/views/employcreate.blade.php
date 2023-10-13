@extends('layouts.main')

@section('content')
<div class="container">
    <div class="card overflow-auto">
            <div class="card-header">
                {{ __('Create') }}
            </div>
        <div class="card-body">
  
            <h2 class="text-center">Staff Info Form</h2>
            
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="emp_no" class="form-control" placeholder="Employee Number">
                    </div>
                    <div class="col">
                        <input type="text" name="file_no" class="form-control" placeholder="File Number">
                    </div>
                    <div class="col">
                        <input type="text" name="inc_mo" class="form-control" placeholder="Inc. Month">
                    </div>
                    <div class="col">
                        <input type="text" name="is_active" class="form-control" placeholder="Staff Status">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="col">
                        <input type="text" name="middle_name" class="form-control" placeholder="Middle Name">
                    </div>
                    <div class="col">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="date" name="fappo" class="form-control" placeholder="Date of Appointment">
                    </div>
                    <div class="col">
                        <input type="tel" name="phone" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="col">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="date"  name="birthdate" class="form-control" placeholder="Date of Birth">
                    </div>
                    <div class="col">
                        <input type="text" name="marital_status" class="form-control" placeholder="Marital Status">
                    </div>
                    <div class="col">
                        <input type="file" class="form-control" id="staffimage">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="col">
                        <input type="text" name="country" class="form-control" placeholder="Country">
                    </div>
                    <div class="col">
                        <input type="text" name="state" class="form-control" placeholder="State">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="lga" class="form-control" placeholder="LGA">
                    </div>
                    <div class="col">
                        <input type="text" name="town" class="form-control" placeholder="Town">
                    </div>
                    <div class="col">
                        <input type="text" name="gender" class="form-control" placeholder="Gender">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="rk_id" class="form-control" placeholder="Rank">
                    </div>
                    <div class="col">
                        <input type="text" name="cad_id" class="form-control" placeholder="Cadre">
                    </div>
                    <div class="col">
                        <input type="text" name="ct_id" class="form-control" placeholder="Court">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="acct_no" class="form-control" placeholder="Account No">
                    </div>
                    <div class="col">
                    <select name="bk_type">
                        <option value="Online">Select Bank Type</option>
                        <option value="Commercial">Commercial</option>
                        <option value="MicroFinance">MicroFinance</option>
                        <option value="Agriculture">Agriculture</option>
                        <option value="Mortgage">Mortgage</option>
                        <option value="Online">Online</option>
                    </select>
                    </div>
                    <div class="col">
                    <select name="bank_id">
                        <option value="Online">Select Bank...</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->bk_name }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="emp_status" class="form-control" placeholder="Employment Status">
                    </div>
                    <div class="col">
                        <input type="text" name="flag" class="form-control" placeholder="Flag">
                    </div>
                    <div class="col">
                        <input type="text" name="remark" class="form-control" placeholder="Remarks">
                    </div>
                </div>
                <div><hr/></div>
                                
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
