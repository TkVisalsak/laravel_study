@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Edit User</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="form-validation-2" class="form" method="POST" action="{{ route('users.update',$row ->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="role_id" class="form-label">Role</label>
                            <select name="role_id" id="role_id" class="form-control" required>
                                <option value="">Select Role</option>
                                @foreach($roles as $key => $role)
                                    <option value="{{ $key }}" {{ $key == $row->id ? 'selected' : " " }} >{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" value="{{ $row->email ?? old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="phone_number" class="form-label">Phone number</label>
                            <input id="phone_number" name="phone_number" type="number" class="form-control" value="{{ $row->phone_number ?? old('phone_number') }}" pattern="^(?:\+?855|0)[0-9\-\s()]{7,15}$" title="Enter Phone number. Example: +85512345678, 012345678, 012-345-678" required>
                        </div>
                        <div class="mb-2">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="" cols="30" rows="2">{{ $row->address ?? old('address') }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="profile" class="form-label">Profile</label>
                            <input type="file" name="profile" class="form-control" onchange="loadFile(event)">
                            <img id="output" class="mt-2" width="100" src="{{ asset($row->profile) }}"/>
                            @error('profile')
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
