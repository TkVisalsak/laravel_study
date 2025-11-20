@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create New Role</h4> 
        </div>
        <div class="card-body">
            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="roleName" class="form-label">Role Name</label>
                    <input type="text" class="form-control" id="roleName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="roleDescription" class="form-label">Role Description</label>
                    <textarea class="form-control" id="roleDescription" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Role</button>

            </form>
        </div>
    </div>
</div>
    
@endsection