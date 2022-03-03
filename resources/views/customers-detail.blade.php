@extends('base')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Customers</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Customer Detail
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Gardener</label>
                    <input type="text" class="form-control" id="gardener">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country">
                </div>
                 
            </div>
        </div>
    </div>
@endsection
@section('extrajs')
    <script src="/js/customers.js"></script>
@endsection
