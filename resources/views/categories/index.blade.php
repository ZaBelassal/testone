@extends('layouts.app')


@section('content')
    <div class="col-md-12 mt-5">
        <div class="d-flex justify-content-between">
            <h3>Liste des categories</h3>
            <a href="{{ route('category.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
        </div>
        <div class="card shadow mt-5">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom de la catégorie</th>
                        <th scope="col">Date de création</th>
                        <th scope="col">Date de modification</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ $key +1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('category.edit', encrypt($category->id)) }}" class="btn btn-success btn-sm">Modifier</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $category->id }}">Supprimer</button>

                                <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                          <h5 class="modal-title text-white" id="exampleModalLabel">Confirmation de suppression</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Êtes-vous sûr de vouloir supprimer la catégorie : {{ $category->name }}
                                        </div>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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