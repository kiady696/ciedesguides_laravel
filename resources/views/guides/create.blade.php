@extends('guides.layout')

@section('guides.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','guides']) }}"> Guides</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('guides.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
        <label for="code_Guides" class="form-label">Code Guides:</label>
        <input type="number" name="code_Guides" id="code_Guides" class="form-control" value="{{@old('code_Guides')}}" required/>
        @if($errors->has('code_Guides'))
			<div class='error small text-danger'>{{$errors->first('code_Guides')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="nom_Guides" class="form-label">Nom Guides:</label>
        <textarea name="nom_Guides" id="nom_Guides" class="form-control" >{{@old('nom_Guides')}}</textarea>
        @if($errors->has('nom_Guides'))
			<div class='error small text-danger'>{{$errors->first('nom_Guides')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="prenom_Guides" class="form-label">Prenom Guides:</label>
        <textarea name="prenom_Guides" id="prenom_Guides" class="form-control" >{{@old('prenom_Guides')}}</textarea>
        @if($errors->has('prenom_Guides'))
			<div class='error small text-danger'>{{$errors->first('prenom_Guides')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="email_Guides" class="form-label">Email Guides:</label>
        <textarea name="email_Guides" id="email_Guides" class="form-control" >{{@old('email_Guides')}}</textarea>
        @if($errors->has('email_Guides'))
			<div class='error small text-danger'>{{$errors->first('email_Guides')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="motdepasse_Guides" class="form-label">Motdepasse Guides:</label>
        <textarea name="motdepasse_Guides" id="motdepasse_Guides" class="form-control" >{{@old('motdepasse_Guides')}}</textarea>
        @if($errors->has('motdepasse_Guides'))
			<div class='error small text-danger'>{{$errors->first('motdepasse_Guides')}}</div>
		@endif
    </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('guides.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Guide')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
