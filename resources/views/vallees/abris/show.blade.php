@extends('vallees.abris.layout')

@section('abris.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('vallees.index', compact([])) }}"> Vallees</a></li>
						<li class="breadcrumb-item"><a href="{{ route('vallees.show', compact('vallee')) }}"> Vallees #{{ $vallee->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','vallees',$vallee?->id ?: 0,'abris']) }}"> Abris</a></li>
                    <li class="breadcrumb-item">@lang('Abri') #{{$abri->id}}</li>
                </ol>

                <a href="{{ route('vallees.abris.index', compact('vallee')) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$abri->id}}</td>
    </tr>
            <tr>
            <th scope="row">Code Abris:</th>
            <td>{{ $abri->code_Abris ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Nom Abris:</th>
            <td>{{ Str::limit($abri->nom_Abris, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Type Abris:</th>
            <td>{{ Str::limit($abri->type_Abris, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Altitude Abris:</th>
            <td>{{ Str::limit($abri->altitude_Abris, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Places Abris:</th>
            <td>{{ Str::limit($abri->places_Abris, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Prixnuit Abris:</th>
            <td>{{ Str::limit($abri->prixNuit_Abris, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Prixrepas Abris:</th>
            <td>{{ Str::limit($abri->prixRepas_Abris, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Telgardien Abris:</th>
            <td>{{ Str::limit($abri->telGardien_Abris, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Code Vallees:</th>
            <td>{{ $abri->code_Vallees ?: "(blank)" }}</td>
        </tr>
            </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('vallees.abris.edit', compact('vallee', 'abri')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('vallees.abris.destroy', compact('vallee', 'abri')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
