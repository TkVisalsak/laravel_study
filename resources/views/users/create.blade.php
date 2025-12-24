@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Create New User</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="form-validation-2" class="form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="role_id" class="form-label">Role</label>
                            <select name="role_id" id="role_id" class="form-control" required>
                                <option value="">Select Role</option>
                                @foreach($roles as $key => $role)
                                    <option value="{{ $key }}">{{ $role }}</option>
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
                            <input class="form-control" type="text" name="name" placeholder="Enter Name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Enter Password" value="{{ old('password') }}" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="phone_number" class="form-label">Phone number</label>
                            <input id="phone_number" name="phone_number" type="number" class="form-control" value="{{ old('phone_number') }}" pattern="^(?:\+?855|0)[0-9\-\s()]{7,15}$" title="Enter Phone number. Example: +85512345678, 012345678, 012-345-678" required>
                        </div>
                        <div class="mb-2">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="" cols="30" rows="2"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="profile" class="form-label">Profile</label>
                            <input type="file" name="profile" class="form-control" onchange="loadFile(event)">
                            <img id="output" class="mt-2" width="100"/>
                            @error('profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    var loadFile = function(event){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function(){
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
