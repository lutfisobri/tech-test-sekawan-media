@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Dashboard</h2>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <i class="anticon anticon-user"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <h2 class="m-b-0">{{ $data->driver->total }}</h2>
                                        <p class="m-b-0 text-muted">Driver</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                        <i class="anticon anticon-car"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <h2 class="m-b-0">{{ $data->vehicle->total }}</h2>
                                        <p class="m-b-0 text-muted">Vehicle</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-gold">
                                        <i class="anticon anticon-profile"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <h2 class="m-b-0">{{ $data->booking->total }}</h2>
                                        <p class="m-b-0 text-muted">Booking</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="m-b-0">Driver</h5>
                                <div class="m-v-60 text-center" style="height: 200px">
                                    <canvas class="chart" id="driver-chart"></canvas>
                                </div>
                                <div class="row border-top p-t-25">
                                    <div class="col-6">
                                        <div class="d-flex justify-content-center">
                                            <div class="media align-items-center">
                                                <span class="badge badge-dot m-r-10 bg-success"></span>
                                                <div class="m-l-5">
                                                    <h4 class="m-b-0">{{ $data->driver->available }}</h4>
                                                    <p class="m-b-0 muted">Available</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-center">
                                            <div class="media align-items-center">
                                                <span class="badge badge-dot m-r-10 bg-secondary"></span>
                                                <div class="m-l-5">
                                                    <h4 class="m-b-0">{{ $data->driver->unavailable }}</h4>
                                                    <p class="m-b-0 muted">Unavailable</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="m-b-0">Vehicle</h5>
                                <div class="m-v-60 text-center" style="height: 200px">
                                    <canvas class="chart" id="vehicle-chart"></canvas>
                                </div>
                                <div class="row border-top p-t-25">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            <div class="media align-items-center">
                                                <span class="badge badge-dot m-r-10 bg-success"></span>
                                                <div class="m-l-5">
                                                    <h4 class="m-b-0">{{ $data->vehicle->available }}</h4>
                                                    <p class="m-b-0 muted">Available</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            <div class="media align-items-center">
                                                <span class="badge badge-dot m-r-10 bg-secondary"></span>
                                                <div class="m-l-5">
                                                    <h4 class="m-b-0">{{ $data->vehicle->in_use }}</h4>
                                                    <p class="m-b-0 muted">In Use</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            <div class="media align-items-center">
                                                <span class="badge badge-dot m-r-10 bg-warning"></span>
                                                <div class="m-l-5">
                                                    <h4 class="m-b-0">{{ $data->vehicle->maintenance }}</h4>
                                                    <p class="m-b-0 muted">Maintenance</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="m-b-0">Booking</h5>
                                <div class="m-v-60 text-center" style="height: 200px">
                                    <canvas class="chart" id="booking-chart"></canvas>
                                </div>
                                <div class="row border-top p-t-25">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            <div class="media align-items-center">
                                                <span class="badge badge-dot m-r-10 bg-success"></span>
                                                <div class="m-l-5">
                                                    <h4 class="m-b-0">{{ $data->booking->approved }}</h4>
                                                    <p class="m-b-0 muted">Approved</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            <div class="media align-items-center">
                                                <span class="badge badge-dot m-r-10 bg-danger"></span>
                                                <div class="m-l-5">
                                                    <h4 class="m-b-0">{{ $data->booking->rejected }}</h4>
                                                    <p class="m-b-0 muted">Rejected</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            <div class="media align-items-center">
                                                <span class="badge badge-dot m-r-10 bg-warning"></span>
                                                <div class="m-l-5">
                                                    <h4 class="m-b-0">{{ $data->booking->pending }}</h4>
                                                    <p class="m-b-0 muted">Pending</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-10"></div>
                    <div class="col-md-12 col-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="/booking/export" class="btn btn-primary btn-block">Export</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Booking Per Month</h5>
                                </div>
                                <div class="m-t-50" style="height: 330px">
                                    <canvas class="chart" id="vehicle-month-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Top Vehicle</h5>
                                </div>
                                <div class="m-t-30">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Vehicle</th>
                                                    <th>Month</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->top_vehicle as $item)
                                                    <tr>
                                                        <td>{{ $item->vehicle->name }}</td>
                                                        <td>{{ $item->month }}</td>
                                                        <td>{{ $item->total }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>

    <script>
        new Chart(document.getElementById("driver-chart").getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Unavailable', 'Available'],
                datasets: [{
                    backgroundColor: ['#886cff', '#00c9a7'],
                    pointBackgroundColor: ['#886cff', '#00c9a7'],
                    data: [{{ $data->driver->unavailable }}, {{ $data->driver->available }}]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                cutoutPercentage: 75,
                maintainAspectRatio: false
            }
        });

        new Chart(document.getElementById("vehicle-chart").getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Maintenance', 'In Use', 'Available'],
                datasets: [{
                    backgroundColor: ['#ffc107', '#886cff', '#00c9a7'],
                    pointBackgroundColor: ['#ffc107', '#886cff', '#00c9a7'],
                    data: [{{ $data->vehicle->maintenance }}, {{ $data->vehicle->in_use }},
                        {{ $data->vehicle->available }}
                    ]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                cutoutPercentage: 75,
                maintainAspectRatio: false
            }
        });

        new Chart(document.getElementById("booking-chart").getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Rejected', 'Approved'],
                datasets: [{
                    backgroundColor: ['#ffc107', '#de4436', '#00c9a7'],
                    pointBackgroundColor: ['#ffc107', '#de4436', '#00c9a7'],
                    data: [{{ $data->booking->pending }}, {{ $data->booking->rejected }},
                        {{ $data->booking->approved }}
                    ]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                cutoutPercentage: 75,
                maintainAspectRatio: false
            }
        });

        new Chart(document.getElementById("vehicle-month-chart").getContext('2d'), {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: 'Total',
                    backgroundColor: '#886cff',
                    data: @json($data->vehicle_per_month)
                }]
            },
            options: {
                legend: {
                    display: false
                },
                maintainAspectRatio: false
            }
        });
    </script>
@endsection
