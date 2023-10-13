@extends('layouts.app')

@section('content')
<div class="container-fluid" style="max-width: 785px;">
    <div class="card">
            <div class="card-header">
                {{ __('Create') }}
            </div>
        <div class="card-body">
  
            <h2 class="text-center">Bank Info Form</h2>
            
            <form action="{{ route('banks.store') }}" method="POST">
                @csrf
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <select class="form-select form-select-sm form-control"  name="bk_type" aria-label=".form-select-sm example">
                            <option selected>Bank Type</option>
                            <option value="Commercial">Commercial Bank</option>
                            <option value="MicroFinance">MicroFinance Bank</option>
                            <option value="Mortgage">Mortgage Bank</option>
                            <option value="Online">Online Banking</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" name="bk_code" class="form-control" placeholder="Bank Code">
                    </div>
                    <div class="col">
                        <input type="text" name="sort_code" class="form-control" placeholder="sort Code">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="text" name="bk_name" class="form-control" placeholder="Bank Name">
                    </div>
                    <div class="col">
                        <input type="text" name="branch" class="form-control" placeholder="Bank Branch">
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

