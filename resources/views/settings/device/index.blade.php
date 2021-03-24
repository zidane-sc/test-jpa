@extends('layouts.app')

@section('title', 'setting')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('page-title', ' Device')

@section('page', 'Setting')

@section('content')
<div class="col-7">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Setting Device</h3>
            <a href="{{ route('devices.create') }}">
                <button class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle mr-1"></i>Add
                    Data</button>
            </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('components.flash-message')
            <table id="example1" class="table table-wrapper  table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($devices as $device)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $device->code }}</td>
                        <td>{{ $device->name }}</td>
                        <td>{{ $device->status == 1 ? 'Aktif' : 'nonaktif' }}</td>
                        <td class="d-flex justify-space-between">
                            <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-info btn-sm">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('devices.destroy', $device->id) }}" method="POST">
                                @method('delete')
                                @csrf


                                <button type="submit" class="btn btn-danger btn-sm ml-3"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus {{ $device->name }} ?')">
                                    <i class="far fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty($devices)
                    <td class="text-center" colspan="5">No data available</td>
                    @endempty
                    @endforeach
                    </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection

@section('script')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src=" {{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src=" {{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src=" {{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endsection