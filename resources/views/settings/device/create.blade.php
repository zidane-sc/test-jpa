@extends('layouts.app')

@section('title', 'Add Data')

@section('page', 'Setting')

@section('content')
<div class="col-md-7">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Device</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('devices.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}"
                            placeholder="Code">
                        @error('code')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Name">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="status" id="aktif" value="1"
                                {{ old('status') == 1 ? 'checked':'' }}>
                            <label class="form-check-label" for="aktif">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="nonaktif" value="0"
                            {{ old('status') == 0 ? 'checked':'' }}>
                            <label class="form-check-label" for="nonaktif">Nonaktif</label>
                        </div>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('devices.index') }}" class="btn btn-default float-right">Back</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection