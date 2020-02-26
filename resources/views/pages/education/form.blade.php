@extends('layouts.dashboard')
    
@section('title','Halaman Dashboard Education')
@section('active-education','active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Education</h1>
        </div>
        
        <div class="row">
            <div class="card-body">
                <form action="{{ isset($education) ? route('education.update',$education->id) : route('education.store')}}" method="post">
                    @if (isset($education))
                        @method('PUT')    
                    @endif
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ isset($education) ? $education->name : '' }}">
                    </div>                    
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection