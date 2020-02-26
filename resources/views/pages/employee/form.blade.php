@extends('layouts.dashboard')
    
@section('title','Halaman Dashboard Employee')
@section('active-employee','active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Employee</h1>
        </div>
        
        <div class="row">
            <div class="card-body">
                <form action="{{ isset($employee) ? route('employee.update',$employee->id) : route('employee.store')}}" method="post">
                    @if (isset($employee))
                        @method('PUT')    
                    @endif
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ isset($employee) ? $employee->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ isset($employee) ? $employee->address : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" name="age" class="form-control" value="{{ isset($employee) ? $employee->age : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Choose</option>
                            <option value="pria" {{ isset($employee) && $employee->gender == 'pria' ? 'selected' : '' }}>Pria</option>
                            <option value="wanita" {{ isset($employee) && $employee->gender == 'wanita' ? 'selected' : '' }}>Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ isset($employee) ? $employee->email : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Phonenumber</label>
                        <input type="text" name="phonenumber" class="form-control" value="{{ isset($employee) ? $employee->phonenumber : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="bornday">Birthday</label>
                        <input type="date" name="bornday" class="form-control" value="{{ isset($employee) ? $employee->bornday : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="positions_id">Position</label>
                        <select name="positions_id" class="form-control">
                            <option value="">Choose..</option>
                            @foreach ($position as $item)
                            <option value="{{ $item->id }}" {{ isset($employee) && $employee->positions_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="educations_id">Education</label>
                        <select name="educations_id" class="form-control">
                            <option value="">Choose..</option>
                            @foreach ($education as $item)
                            <option value="{{ $item->id }}" {{ isset($employee) && $employee->educations_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_id">Status</label>
                        <select name="status_id" class="form-control">
                            <option value="">Choose..</option>
                            @foreach ($status as $item)
                            <option value="{{ $item->id }}" {{ isset($employee) && $employee->status_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="joined_at">Joined at</label>
                        <input type="date" name="joined_at" class="form-control" value="{{ isset($employee) ? $employee->joined_at : '' }}">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection