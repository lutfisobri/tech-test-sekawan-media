@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Vehicle</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ url($data->action) }}" method="POST">
                @csrf
                @if(isset($data->vehicle))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $data->vehicle->name ?? old('name') }}" required>

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <br>
                    
                    <label for="fuel_consumption">Fuel Consumption</label>
                    <input type="text" name="fuel_consumption" id="fuel_consumption" class="form-control" value="{{ $data->vehicle->fuel_consumption ?? old('fuel_consumption') }}" required>

                    @error('fuel_consumption')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <br>

                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="person" {{ isset($data->vehicle) && $data->vehicle->type == 'person' ? 'selected' : '' }}>Person</option>
                        <option value="item" {{ isset($data->vehicle) && $data->vehicle->type == 'item' ? 'selected' : '' }}>Item</option>
                    </select>

                    <br>

                    <label for="last_service">Last Maintenance</label>
                    <input type="date" name="last_service" id="last_service" class="form-control" value="{{ $data->vehicle->last_service ?? old('last_service') }}" required>

                    @error('last_service')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <br>

                    <label for="next_service">Next Maintenance</label>
                    <input type="date" name="next_service" id="next_service" class="form-control" value="{{ $data->vehicle->next_service ?? old('next_service') }}" required>

                    @error('next_service')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <br>

                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="available" {{ isset($data->vehicle) && $data->vehicle->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="in_use" {{ isset($data->vehicle) && $data->vehicle->status == 'in_use' ? 'selected' : '' }}>In Use</option>
                        <option value="maintenance" {{ isset($data->vehicle) && $data->vehicle->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection