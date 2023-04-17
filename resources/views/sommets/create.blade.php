@extends('sommets.layout')

@section('sommets.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','sommets']) }}"> Sommets</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('sommets.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
        <label for="code_Sommets" class="form-label">Code Sommets:</label>
        <input type="number" name="code_Sommets" id="code_Sommets" class="form-control" value="{{@old('code_Sommets')}}" required/>
        @if($errors->has('code_Sommets'))
			<div class='error small text-danger'>{{$errors->first('code_Sommets')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="nom_Sommets" class="form-label">Nom Sommets:</label>
        <textarea name="nom_Sommets" id="nom_Sommets" class="form-control" >{{@old('nom_Sommets')}}</textarea>
        @if($errors->has('nom_Sommets'))
			<div class='error small text-danger'>{{$errors->first('nom_Sommets')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="altitude_Sommets" class="form-label">Altitude Sommets:</label>
        <input type="number" name="altitude_Sommets" id="altitude_Sommets" class="form-control" value="{{@old('altitude_Sommets')}}" />
        @if($errors->has('altitude_Sommets'))
			<div class='error small text-danger'>{{$errors->first('altitude_Sommets')}}</div>
		@endif
    </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('sommets.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Sommet')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
