@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Edit Banners</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="form-validation-2" class="form" method="POST" action="{{ route('banners.update',$row ->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ $row->name ?? old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="2">{{ $row->description ?? old('description') }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" onchange="loadFile(event)">
                            <img id="output" class="mt-2" width="100" src="{{ asset($row->image) }}"/>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
