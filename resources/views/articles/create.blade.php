@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Create New Article</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="form-validation-2" class="form" method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="menu_id" class="form-label">Menus</label>
                            <select name="menu_id" id="menu_id" class="form-control" required>
                                <option value="" >Select Menu</option>
                                @foreach($menus as $key => $menu)
                                    <option value="{{ $key }}">{{ $menu }}</option>
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
                            <input class="form-control" type="text" name="title" placeholder="Enter Title" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="sub_title" class="form-label">Sub Title</label>
                            <input class="form-control" type="text" name="sub_title" placeholder="Enter Sub Title" value="{{ old('sub_title') }}" required>
                            @error('sub_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        <div class="mb-2">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="" cols="30" rows="2"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="2"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" onchange="loadFile(event)">
                            <img id="output" class="mt-2" width="100"/>
                            @error('image')
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
