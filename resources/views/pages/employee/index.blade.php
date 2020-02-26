@extends('layouts.dashboard')
    
@section('title','Halaman Dashboard Employee')
@section('active-employee','active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employee</h1>
            <a href="{{ route('employee.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50">Tambah Employee</i>
            </a>
        </div>
        
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    {{-- <table id="data" class="display hover cell-border compact">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee</th>                               
                                <th>Action</th>
                                <th>del</th>
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
                    </table> --}}
                    <table id="data" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phonenumber</th>
                                <th>Birthday</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
        function format ( d ) {
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                    '<td>Position:</td>'+
                    '<td>'+d.position.name+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Joined at:</td>'+
                    '<td>'+d.joined_at+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Status:</td>'+
                    '<td>'+d.status.name+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Education:</td>'+
                    '<td>'+d.education.name+'</td>'+
                '</tr>'+                
                '<tr>'+
                    '<td>Action:</td>'+
                    '<td>'+
                        '<a href="http://127.0.0.1:8000/dashboard/employee/'+d.id+'/edit" class="btn btn-primary mr-2">Edit</a>'+
                        `<form action="http://127.0.0.1:8000/dashboard/employee/`+d.id+`" method="post" style="display:inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>`+                        
                    '</td>'+
                '</tr>'+
            '</table>';            
        }
        
        $(document).ready(function() {
            var table = $('#data').DataTable( {
                // "ajax": '../objects.txt',
                "data":@json($employee, JSON_PRETTY_PRINT),
                "columns": [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "age" },
                    { "data": "gender",
                    "className": 'capital' },
                    { "data": "address" },
                    { "data": "email" },
                    { "data": "phonenumber" },
                    { "data": "bornday" }
                ],
                "order": [[1, 'asc']]
            } );
            
            // Add event listener for opening and closing details
            $('#data tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
        
                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );
        } );       
    </script>
@endpush

{{-- @push('js-datatable')
    <script>
        function format(value) {
            return '<div>' + value + '</div>';
        }
        var table = $('#servicetable').DataTable(
        // {
        //     language: {
        //         url: '//cdn.datatables.net/plug-ins/725b2a2115b/i18n/Norwegian.json',
        //         // searchPlaceholder: "Søk i service..."
        //     },
        //     stateSave: true,
        //     pageLength: 10,
        //     aoColumnDefs: [{
        //         'bSortable': false,
        //         'aTargets': [4, 5,6]
        //     }]
        // }
        );
        // $('.dataTables_filter input').attr("placeholder", "skriv inn søketekst...");
        // Add event listener for opening and closing details
        $('#servicetable tbody').on('click', 'i.vis_info', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
    </script>
@endpush --}}
