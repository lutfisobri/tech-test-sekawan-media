@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Task Approval</h2>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row m-b-30">
                    <div class="col-lg-8">
                    </div>
                </div>

                <div class="m-t-30">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Vehicle Name</th>
                                    <th>Driver Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    @if (auth()->user()->role != 'admin')
                                        <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->items as $item)
                                    <tr>
                                        @if (auth()->user()->role == 'admin')
                                            <td>{{ $item->vehicle->name }}</td>
                                            <td>{{ $item->driver->name }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->end_date }}</td>
                                        @else
                                            <td>{{ $item->booking->vehicle->name }}</td>
                                            <td>{{ $item->booking->driver->name }}</td>
                                            <td>{{ $item->booking->start_date }}</td>
                                            <td>{{ $item->booking->end_date }}</td>
                                        @endif
                                        <td>
                                            @if ($item->status == 'approved')
                                                <span class="badge badge-success">Approved</span>
                                            @elseif ($item->status == 'rejected')
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                        @if (auth()->user()->role != 'admin')
                                            @if ($item->status == 'pending')
                                                <td>
                                                    <a href="/task/reject/{{ $item->id }}">
                                                        <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                            <i class="anticon anticon-close"></i>
                                                        </button>
                                                    </a>
                                                    <a href="/task/approve/{{ $item->id }}">
                                                        <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                            <i class="anticon anticon-check"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            @endif
                                        @endif
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
