@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Vehicle</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row m-b-30">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4 text-right">
                    <a href="/vehicle/create">
                        <button class="btn btn-primary">
                            <i class="anticon anticon-plus m-r-5"></i>
                            <span>Add</span>
                        </button>
                    </a>
                </div>
            </div>

            <div class="m-t-30">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Fuel Consumption</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Last Maintenance</th>
                                <th>Next Maintenance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicle->name }}</td>
                                <td>{{ $vehicle->fuel_consumption }}</td>
                                <td>{{ $vehicle->status }}</td>
                                <td>{{ $vehicle->type }}</td>
                                <td>{{ $vehicle->last_service }}</td>
                                <td>{{ $vehicle->next_service }}</td>
                                <td>
                                    <a href="/vehicle/edit/{{ $vehicle->id }}">
                                        <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                            <i class="anticon anticon-edit"></i>
                                        </button>
                                    </a>
                                    <a href="/vehicle/delete/{{ $vehicle->id }}">
                                        <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                            <i class="anticon anticon-delete"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection