@extends('abris.layout')

@section('abris.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','abris']) }}"> Abris</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('abris.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
        <label for="code_Abris" class="form-label">Code Abris:</label>
        <input type="number" name="code_Abris" id="code_Abris" class="form-control" value="{{@old('code_Abris')}}" required/>
        @if($errors->has('code_Abris'))
			<div class='error small text-danger'>{{$errors->first('code_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="nom_Abris" class="form-label">Nom Abris:</label>
        <textarea name="nom_Abris" id="nom_Abris" class="form-control" >{{@old('nom_Abris')}}</textarea>
        @if($errors->has('nom_Abris'))
			<div class='error small text-danger'>{{$errors->first('nom_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="type_Abris" class="form-label">Type Abris:</label>
        <textarea name="type_Abris" id="type_Abris" class="form-control" >{{@old('type_Abris')}}</textarea>
        @if($errors->has('type_Abris'))
			<div class='error small text-danger'>{{$errors->first('type_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="altitude_Abris" class="form-label">Altitude Abris:</label>
        <textarea name="altitude_Abris" id="altitude_Abris" class="form-control" >{{@old('altitude_Abris')}}</textarea>
        @if($errors->has('altitude_Abris'))
			<div class='error small text-danger'>{{$errors->first('altitude_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="places_Abris" class="form-label">Places Abris:</label>
        <textarea name="places_Abris" id="places_Abris" class="form-control" >{{@old('places_Abris')}}</textarea>
        @if($errors->has('places_Abris'))
			<div class='error small text-danger'>{{$errors->first('places_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="prixNuit_Abris" class="form-label">Prixnuit Abris:</label>
        <textarea name="prixNuit_Abris" id="prixNuit_Abris" class="form-control" >{{@old('prixNuit_Abris')}}</textarea>
        @if($errors->has('prixNuit_Abris'))
			<div class='error small text-danger'>{{$errors->first('prixNuit_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="prixRepas_Abris" class="form-label">Prixrepas Abris:</label>
        <textarea name="prixRepas_Abris" id="prixRepas_Abris" class="form-control" >{{@old('prixRepas_Abris')}}</textarea>
        @if($errors->has('prixRepas_Abris'))
			<div class='error small text-danger'>{{$errors->first('prixRepas_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="telGardien_Abris" class="form-label">Telgardien Abris:</label>
        <textarea name="telGardien_Abris" id="telGardien_Abris" class="form-control" >{{@old('telGardien_Abris')}}</textarea>
        @if($errors->has('telGardien_Abris'))
			<div class='error small text-danger'>{{$errors->first('telGardien_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="code_Vallees" class="form-label">Code Vallees:</label>
        <input type="number" name="code_Vallees" id="code_Vallees" class="form-control" value="{{@old('code_Vallees')}}" required/>
        @if($errors->has('code_Vallees'))
			<div class='error small text-danger'>{{$errors->first('code_Vallees')}}</div>
		@endif
    </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('abris.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Abri')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
