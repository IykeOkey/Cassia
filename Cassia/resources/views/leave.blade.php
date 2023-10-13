@extends('layouts.main')
 
@section('content')
    <div class="container">
        <div class="card overflow-auto">
            <div class="card-header">Leave Types</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush