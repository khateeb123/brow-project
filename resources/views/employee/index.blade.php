@extends('layout.master')

@section('asset')
<link rel="stylesheet" href="{{ asset('theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('theme/dist/css/adminlte.min.css') }}">

@endsection

@section('title')
<h1 class="m-0">
    {{ __('employee') }}
</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#"> {{ __('employee') }}</a></li>

@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">
            <a href="{{route('companies.employees.index',$company->id)}}" class="badge badge-dark text-center p-2"> company: {{ $company->name }}</a>

            <img src="{{ Storage::disk('company')->url($company->logo) }}" class="rounded-circle mr-2" alt="Company Image"  width="30" height="30">

                </h3>
                <a href="{{ route('companies.employees.create',$company->id)  }}" class="btn btn-dark float-right">Create New </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{$employee->first_name}}
                            </td>
                            <td>
                                {{$employee->last_name}}
                            </td>
                            <td>{{$company->email}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{ route('companies.employees.edit',[$company->id,$employee->id]) }}"class="btn btn-warning btn-sm px-2"   ><i class="nav-icon fas fa-pen"></i></a>
                             
                             <form action="{{ route('companies.employees.destroy',[$company->id,$employee->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                
                                <button type="submit" class="btn btn-danger btn-sm px-2"   ><i class="nav-icon fas fa-trash"></i></button>
                             </form>
                                </div>
                            </td>
                        </tr>
                        <!-- Display other company information -->
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>First name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

</div>



@endsection

@section('scripts')
<!-- Bootstrap 4 -->
<!-- DataTables  & Plugins -->

<script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('theme/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('theme/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('theme/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('theme/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('theme/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>
@endsection