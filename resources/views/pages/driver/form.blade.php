@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Driver</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ url($data->action) }}" method="POST">
                @csrf
                @if(isset($data->driver))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $data->driver->name ?? old('name') }}" required>

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <br>
                    
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $data->driver->phone ?? old('phone') }}" required>

                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <br>

                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="available" {{ isset($data->driver) && $data->driver->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ isset($data->driver) && $data->driver->status == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection