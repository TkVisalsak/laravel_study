@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Edit Setting</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="form-validation-2" class="form" method="POST" action="{{ route('settings.update',$row ->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" type="text" name="title" placeholder="Enter Title" value="{{ $row->title ?? old('title') }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter Email" value="{{ $row->email ??old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="phone" class="form-label">Phone</label>
                            <input class="form-control" type="text" name="phone" placeholder="Enter Phone Number" value="{{ $row->phone ?? old('phone') }}" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input class="form-control" type="text" name="facebook" placeholder="Enter facebook" value="{{ $row->facebook ?? old('facebook') }}" required>
                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="telegram" class="form-label">Telegram</label>
                            <input class="form-control" type="text" name="telegram" placeholder="Enter telegram" value="{{ $row->telegram ?? old('telegram') }}" required>
                            @error('telegram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input class="form-control" type="text" name="instagram" placeholder="Enter instagram" value="{{ $row->instagram ?? old('instagram') }}" required>
                            @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="youtube" class="form-label">Youtube</label>
                            <input class="form-control" type="text" name="youtube" placeholder="Enter youtube" value="{{ $row->youtube ?? old('youtube') }}" required>
                            @error('youtube')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input class="form-control" type="text" name="instagram" placeholder="Enter instagram" value="{{ $row->instagram ?? old('instagram') }}" required>
                            @error('instagram')
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
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control" onchange="loadFile(event)">
                            <img id="output" class="mt-2" width="100" src="{{ asset($row->logo) }}"/>
                            @error('logo')
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
