@extends('layouts.dashboard')
    
@section('title','Halaman Dashboard Status')
@section('active-status','active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Status</h1>
            <a href="{{ route('status.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50">Tambah Status</i>
            </a>
        </div>
        
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-primary" id="data">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Status</th>                               
                                <th>Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($status as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>                                
                                <td class="text-center">
                                    <a href="{{ route('status.edit',$item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('status.destroy',$item->id) }}" method="post" style="display:inline-block">
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

@prepend('css-datatable')
    <link rel="stylesheet" href="{{ asset('DataTables\datatables.css') }}">
    <style>
        td.details-control {
            background: url(" {{ asset('assets/details_open.png') }} ") no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url(" {{ asset('assets/details_close.png') }}") no-repeat center center;
        }    
        .capital {
            text-transform: capitalize;
        }
    </style>
@endprepend

@prepend('js-datatable')
    <script src="{{ asset('DataTables/dataTables.min.js') }}"></script>    
@endprepend


@push('js-datatable')
    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        })
    </script>
@endpush