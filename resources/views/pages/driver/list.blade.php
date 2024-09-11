@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Driver</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row m-b-30">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4 text-right">
                    <a href="/driver/create">
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
                                <th>Driver Name</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $driver)
                            <tr>
                                <td>{{ $driver->name }}</td>
                                <td>{{ $driver->phone }}</td>
                                <td>{{ $driver->status }}</td>
                                <td>
                                    <a href="/driver/edit/{{ $driver->id }}">
                                        <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                            <i class="anticon anticon-edit"></i>
                                        </button>
                                    </a>
                                    <a href="/driver/delete/{{ $driver->id }}">
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