@extends('layouts.main')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
    
@endif
    <div class="container">
        <div class="card overflow-auto">
            <div class="card-header">Manage Staff</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush