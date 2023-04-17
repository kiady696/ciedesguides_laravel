@extends('vallees.abris.layout')

@section('abris.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('vallees.index', compact([])) }}"> Vallees</a></li>
						<li class="breadcrumb-item"><a href="{{ route('vallees.show', compact('vallee')) }}"> Vallees #{{ $vallee->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','vallees',$vallee?->id ?: 0,'abris']) }}"> Abris</a></li>
                    <li class="breadcrumb-item">@lang('Edit Abri') #{{$abri->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('vallees.abris.update', compact('vallee', 'abri')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
        <label for="code_Abris" class="form-label">Code Abris:</label>
        <input type="number" name="code_Abris" id="code_Abris" class="form-control" value="{{@old('code_Abris', $abri->code_Abris)}}" required/>
        @if($errors->has('code_Abris'))
			<div class='error small text-danger'>{{$errors->first('code_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="nom_Abris" class="form-label">Nom Abris:</label>
        <textarea name="nom_Abris" id="nom_Abris" class="form-control" >{{@old('nom_Abris', $abri->nom_Abris)}}</textarea>
        @if($errors->has('nom_Abris'))
			<div class='error small text-danger'>{{$errors->first('nom_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="type_Abris" class="form-label">Type Abris:</label>
        <textarea name="type_Abris" id="type_Abris" class="form-control" >{{@old('type_Abris', $abri->type_Abris)}}</textarea>
        @if($errors->has('type_Abris'))
			<div class='error small text-danger'>{{$errors->first('type_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="altitude_Abris" class="form-label">Altitude Abris:</label>
        <textarea name="altitude_Abris" id="altitude_Abris" class="form-control" >{{@old('altitude_Abris', $abri->altitude_Abris)}}</textarea>
        @if($errors->has('altitude_Abris'))
			<div class='error small text-danger'>{{$errors->first('altitude_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="places_Abris" class="form-label">Places Abris:</label>
        <textarea name="places_Abris" id="places_Abris" class="form-control" >{{@old('places_Abris', $abri->places_Abris)}}</textarea>
        @if($errors->has('places_Abris'))
			<div class='error small text-danger'>{{$errors->first('places_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="prixNuit_Abris" class="form-label">Prixnuit Abris:</label>
        <textarea name="prixNuit_Abris" id="prixNuit_Abris" class="form-control" >{{@old('prixNuit_Abris', $abri->prixNuit_Abris)}}</textarea>
        @if($errors->has('prixNuit_Abris'))
			<div class='error small text-danger'>{{$errors->first('prixNuit_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="prixRepas_Abris" class="form-label">Prixrepas Abris:</label>
        <textarea name="prixRepas_Abris" id="prixRepas_Abris" class="form-control" >{{@old('prixRepas_Abris', $abri->prixRepas_Abris)}}</textarea>
        @if($errors->has('prixRepas_Abris'))
			<div class='error small text-danger'>{{$errors->first('prixRepas_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="telGardien_Abris" class="form-label">Telgardien Abris:</label>
        <textarea name="telGardien_Abris" id="telGardien_Abris" class="form-control" >{{@old('telGardien_Abris', $abri->telGardien_Abris)}}</textarea>
        @if($errors->has('telGardien_Abris'))
			<div class='error small text-danger'>{{$errors->first('telGardien_Abris')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="code_Vallees" class="form-label">Code Vallees:</label>
        <input type="number" name="code_Vallees" id="code_Vallees" class="form-control" value="{{@old('code_Vallees', $abri->code_Vallees)}}" required/>
        @if($errors->has('code_Vallees'))
			<div class='error small text-danger'>{{$errors->first('code_Vallees')}}</div>
		@endif
    </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('vallees.abris.index', compact('vallee')) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Abri')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
