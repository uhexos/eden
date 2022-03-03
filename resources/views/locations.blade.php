@extends('base')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Locations</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Countries</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Location List
            </div>
            <div class="card-body">
                <table id="locationsTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                        </tr>
                    </thead>                 
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extrajs')
    <script src="js/locations.js"></script>
    
@endsection
