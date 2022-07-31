@extends('layouts.app')
@section('title', 'Modifier une catégorie')
@section('content')
<div class="col-md-6 offset-md-3">
    <div class="card mt-5 shadow">
        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Nom de la catégorie</label>
                    <input type="text" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                    @error('name')
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