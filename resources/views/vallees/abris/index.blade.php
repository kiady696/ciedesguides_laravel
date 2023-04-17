@extends('vallees.abris.layout')

@section('abris.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ route('vallees.index', compact([])) }}"> Vallees</a></li>
						<li class="breadcrumb-item"><a href="{{ route('vallees.show', compact('vallee')) }}"> Vallees #{{ $vallee->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','vallees',$vallee?->id ?: 0,'abris']) }}"> Abris</a></li>
                </ol>

                <form action="{{ route('vallees.abris.index', compact('vallee')) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search Abris..." value="{{ request()->search }}">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i> @lang('Go!')</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive table-hover">
    <thead role="rowgroup">
    <tr role="row">
                    <th role='columnheader'>Code Abris</th>
                    <th role='columnheader'>Nom Abris</th>
                    <th role='columnheader'>Type Abris</th>
                    <th role='columnheader'>Altitude Abris</th>
                    <th role='columnheader'>Places Abris</th>
                    <th role='columnheader'>Prixnuit Abris</th>
                    <th role='columnheader'>Prixrepas Abris</th>
                    <th role='columnheader'>Telgardien Abris</th>
                    <th role='columnheader'>Code Vallees</th>
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($abris as $abri)
        <tr>
                            <td data-label="Code Abris">{{ $abri->code_Abris ?: "(blank)" }}</td>
                            <td data-label="Nom Abris">{{ Str::limit($abri->nom_Abris, 50) ?: "(blank)"}}</td>
                            <td data-label="Type Abris">{{ Str::limit($abri->type_Abris, 50) ?: "(blank)"}}</td>
                            <td data-label="Altitude Abris">{{ Str::limit($abri->altitude_Abris, 50) ?: "(blank)"}}</td>
                            <td data-label="Places Abris">{{ Str::limit($abri->places_Abris, 50) ?: "(blank)"}}</td>
                            <td data-label="Prixnuit Abris">{{ Str::limit($abri->prixNuit_Abris, 50) ?: "(blank)"}}</td>
                            <td data-label="Prixrepas Abris">{{ Str::limit($abri->prixRepas_Abris, 50) ?: "(blank)"}}</td>
                            <td data-label="Telgardien Abris">{{ Str::limit($abri->telGardien_Abris, 50) ?: "(blank)"}}</td>
                            <td data-label="Code Vallees">{{ $abri->code_Vallees ?: "(blank)" }}</td>

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('vallees.abris.show', compact('vallee', 'abri'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('vallees.abris.edit', compact('vallee', 'abri'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('vallees.abris.destroy', compact('vallee', 'abri'))}}" method="POST" style="display: inline;" class="m-0 p-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">@lang('Delete')</button>
            </form>
        </li>
    </ul>
</div>

                            </td>
        </tr>
    @endforeach
    </tbody>
</table>

                {{ $abris->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('vallees.abris.create', compact('vallee')) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new Abri')</a>
            </div>
        </div>
    </div>
@endsection
