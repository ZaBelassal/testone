@extends('layouts.app')
@section('title', 'Liste des posts')

@section('content')
    <div class="col-md-12 mt-5">
        <div class="d-flex justify-content-between">
            <h3>Liste des posts</h3>
            <a href="{{ route('post.create') }}" class="btn btn-primary">Ajouter un post</a>
        </div>

        <div class="card shadow mt-5">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom de la catégorie</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Nombre de vue</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">Date de modification</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $post)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>
                                    <img src="{{ asset($post->image) }}" alt="" width="30">
                                    {{ $post->title }}
                                </td>
                                {{-- <td>{{ $post->category_id }}</td> --}}
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->view }}</td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>{{ $post->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('post.edit', encrypt($post->id)) }}" class="btn btn-success btn-sm">Modifier</a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $post->id }}">Supprimer</button>

                                <div class="modal fade" id="delete{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                          <h5 class="modal-title text-white" id="exampleModalLabel">Confirmation de suppression</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Êtes-vous sûr de vouloir supprimer le post : {{ $post->title }}
                                        </div>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                              </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection