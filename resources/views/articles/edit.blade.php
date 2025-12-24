@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Edit Article</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="form-validation-2" class="form" method="POST" action="{{ route('articles.update',$row ->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="menu_id" class="form-label">Menus</label>
                            <select name="menu_id" id="menu_id" class="form-control" required>
                                <option value="" >Select Menu</option>
                                @foreach($menus as $key => $menu)
                                    <option value="{{ $key }}" {{ $key == $row->menu_id ? 'selected' : '' }}>{{ $menu }}</option>
                                @endforeach
                            </select>
                            @error('menu_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" type="text" name="title" value="{{ $row->title ?? old('title') }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="sub_title" class="form-label">Sub Title</label>
                            <input class="form-control" type="text" name="sub_title"  value="{{ $row->sub_title ?? old('sub_title') }}" required>
                            @error('sub_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        <div class="mb-2">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="" cols="30" rows="2">{{ $row->content ?? old('content') }}</textarea>
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
