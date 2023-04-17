@extends('guides.layout')

@section('guides.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','guides']) }}"> Guides</a></li>
                    <li class="breadcrumb-item">@lang('Guide') #{{$guide->id}}</li>
                </ol>

                <a href="{{ route('guides.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$guide->id}}</td>
    </tr>
            <tr>
            <th scope="row">Code Guides:</th>
            <td>{{ $guide->code_Guides ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Nom Guides:</th>
            <td>{{ Str::limit($guide->nom_Guides, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Prenom Guides:</th>
            <td>{{ Str::limit($guide->prenom_Guides, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Email Guides:</th>
            <td>{{ Str::limit($guide->email_Guides, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Motdepasse Guides:</th>
            <td>{{ Str::limit($guide->motdepasse_Guides, 50) ?: "(blank)"}}</td>
        </tr>
            </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('guides.edit', compact('guide')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('guides.destroy', compact('guide')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
