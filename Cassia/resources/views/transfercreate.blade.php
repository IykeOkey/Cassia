@extends('layouts.main')
@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@section('content')
<div class="container-fluid" style="max-width: 785px;">
    <div class="card">
            <div class="card-header">
                {{ __('Create') }}
            </div>
        <div class="card-body">
  
            <h2 class="text-center">Staff Transfer Form</h2>
            
            <form action="{{ route('transfers.store') }}" method="POST">
                @csrf
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="div_id" class="form-control" placeholder="Judicial Division">
                    </div>
                    <div class="col">
                        <input type="text" name="ct_id" class="form-control" placeholder="Court">
                    </div>
                    <div class="col">
                        <input type="text" name="staff_id" class="form-control" placeholder="Staff Name">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1em;">
                    <div class="col">
                        <input type="text" name="trf_code" class="form-control" placeholder="Transfer Code">
                    </div>
                    <div class="col">
                        <input type="text" name="trf_name" class="form-control" placeholder="Transfer Name">
                    </div>
                    <div class="col">
                        <input type="date" name="wefdate" class="form-control" placeholder="Effective Date">
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
@push('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#date", { dateFormat: 'Y-m-d'});
 //   flatpickr('#yourSelector', { dateFormat: 'd-m-Y'});
</script>
@endpush
