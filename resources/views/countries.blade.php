@extends('base')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">countries</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Countries</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Countries List
            </div>
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" id="newLocationButton">New Country</button>
                </div>
                <table id="countriesTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>No. Customers</th>
                            <th>No Gardners</th>
                            <th>No. Locations</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Country</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCountryForm" >
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="countryName" class="form-label">Country</label>
                                <input type="text" class="form-control" name="countryName" id="countryName"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Create" id="saveNewCountryButton" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('extrajs')
    <script src="js/countries.js"></script>
@endsection
