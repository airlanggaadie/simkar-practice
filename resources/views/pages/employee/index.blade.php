@extends('layouts.app')
    
@section('title','Halaman Dashboard Education')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employee</h1>
            <a href="" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50">Tambah Employee</i>
            </a>
        </div>
        
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-primary">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee</th>                               
                                <th colspan="2" class="text-center">Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employee as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>                                
                                <td class="text-center">
                                    <a href="" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>                        
                            </tr>                    
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection