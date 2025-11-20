@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Role</h4> 
        </div>
        <div class="card-body">
            <form action="{{ route('role.update',$row ->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="roleName" class="form-label">Role Name</label>
                    <input type="text" class="form-control" value="{{ $row->name ?? old('name') }}" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="roleDescription" class="form-label">Role Description</label>
                    <textarea class="form-control"  name="description" rows="3">{{ $row->description ??  old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Role</button>

            </form>
        </div>
    </div>
</div>
    
@endsection