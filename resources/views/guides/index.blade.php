@extends('guides.layout')

@section('guides.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','guides']) }}"> Guides</a></li>
                </ol>

                <form action="{{ route('guides.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search Guides..." value="{{ request()->search }}">
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
                    <th role='columnheader'>Code Guides</th>
                    <th role='columnheader'>Nom Guides</th>
                    <th role='columnheader'>Prenom Guides</th>
                    <th role='columnheader'>Email Guides</th>
                    <th role='columnheader'>Motdepasse Guides</th>
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($guides as $guide)
        <tr>
                            <td data-label="Code Guides">{{ $guide->code_Guides ?: "(blank)" }}</td>
                            <td data-label="Nom Guides">{{ Str::limit($guide->nom_Guides, 50) ?: "(blank)"}}</td>
                            <td data-label="Prenom Guides">{{ Str::limit($guide->prenom_Guides, 50) ?: "(blank)"}}</td>
                            <td data-label="Email Guides">{{ Str::limit($guide->email_Guides, 50) ?: "(blank)"}}</td>
                            <td data-label="Motdepasse Guides">{{ Str::limit($guide->motdepasse_Guides, 50) ?: "(blank)"}}</td>

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('guides.show', compact('guide'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('guides.edit', compact('guide'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('guides.destroy', compact('guide'))}}" method="POST" style="display: inline;" class="m-0 p-0">
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

                {{ $guides->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('guides.create', []) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new Guide')</a>
            </div>
        </div>
    </div>
@endsection
