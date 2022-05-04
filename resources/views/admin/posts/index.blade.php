@extends('layouts.app')

@section('content')

    <div class="container">
        <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Nuovo Post</a>
    </div>

    <div class="container">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Categoria</th>
                <th scope="col">Data Pubblicazione</th>
                <th scope="col">Data Creazione</th>
                <th>Modifica</th>
                <th>Elimina</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->category ? $post->category->name : '-' }}</td>
                        <td>{{ $post->published_at }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a class="btn btn-small btn-warning" href="{{ route('admin.posts.edit', $post) }}">Modifica</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>

    </div>

@endsection