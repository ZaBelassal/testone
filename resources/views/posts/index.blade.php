@extends('layouts.app')
@section('title','list des posts')
@section('content')

<div class="col-md-12 mt-5">
    <div class="d-flex justify-content-between">
        <h3>Liste des categories</h3>
        <a href="{{ route('post.create') }}" class="btn btn-primary">Ajouter un post</a>
    </div>
</div>
@endsection