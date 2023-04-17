@extends('sommets.layout')

@section('sommets.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','sommets']) }}"> Sommets</a></li>
                    <li class="breadcrumb-item">@lang('Sommet') #{{$sommet->id}}</li>
                </ol>

                <a href="{{ route('sommets.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$sommet->id}}</td>
    </tr>
            <tr>
            <th scope="row">Code Sommets:</th>
            <td>{{ $sommet->code_Sommets ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Nom Sommets:</th>
            <td>{{ Str::limit($sommet->nom_Sommets, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Altitude Sommets:</th>
            <td>{{ $sommet->altitude_Sommets ?: "(blank)" }}</td>
        </tr>
            </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('sommets.edit', compact('sommet')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('sommets.destroy', compact('sommet')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
