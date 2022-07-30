@extends('layouts.app')
@section('title', 'Ajouter une catégorie')

@section('content')
<div class="col-md-6 offset-md-3">
    <div class="card mt-5 shadow">
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name of category</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                    @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <button class="btn btn-primary w-100">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection