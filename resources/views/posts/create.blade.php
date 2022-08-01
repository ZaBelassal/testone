@extends('layouts.app')
@section('title', 'Ajouter un post')

@section('content')
<div class="col-md-6 offset-md-3">
    <div class="card mt-5 shadow">
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Titre du post</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                    @error('title')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image du post</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="image">Catégorie du post</label>
                    <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="content">Contenu du post</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5"></textarea>
                    @error('image')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <button class="btn btn-primary w-100">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection