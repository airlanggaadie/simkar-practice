@extends('layouts.dashboard')
    
@section('title','Halaman Dashboard Position')
@section('active-position','active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Position</h1>
        </div>
        
        <div class="row">
            <div class="card-body">
                <form action="{{ isset($position) ? route('position.update',$position->id) : route('position.store')}}" method="post">
                    @if (isset($position))
                        @method('PUT')    
                    @endif
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ isset($position) ? $position->name : '' }}">
                    </div>                    
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection