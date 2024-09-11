@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Booking</h2>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Booking Form</h4>
                <p class="card-description">Please fill in the form below.</p>
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <div class="form-group">

                            <div class="row gx-2 gy-4">
                                <div class="col-12 col-sm-6 col-md-4 mt-2">
                                    <label for="vehicle_id">Vehicle</label>
                                    <select name="vehicle_id" id="vehicle_id" class="form-control">
                                        @foreach ($data->vehicles as $vehicle)
                                            <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('vehicle_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
    
                                <div class="col-12 col-sm-6 col-md-4 mt-2">
                                    <label for="driver_id">Driver</label>
                                    <select name="driver_id" id="driver_id" class="form-control">
                                        @foreach ($data->drivers as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('driver_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
    
                                <div class="col-12 col-sm-6 col-md-4 mt-2">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control"
                                        value="{{ old('start_date') }}" required>
        
                                    @error('start_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
    
                                <div class="col-12 col-sm-6 col-md-4 mt-2">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control"
                                        value="{{ old('end_date') }}" required>
        
                                    @error('end_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 col-sm-6 col-md-4 mt-2">
                                    <label for="approval_user_1">Approval User 1</label>
                                    <select name="approval_user_1" id="approval_user_1" class="form-control">
                                        @foreach ($data->users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('approval_user_1')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
    
                                <div class="col-12 col-sm-6 col-md-4 mt-2">
                                    <label for="approval_user_2">Approval User 2</label>
                                    <select name="approval_user_2" id="approval_user_2" class="form-control">
                                        @foreach ($data->users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('approval_user_2')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>

                        <br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
