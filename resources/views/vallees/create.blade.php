@extends('vallees.layout')

@section('vallees.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','vallees']) }}"> Vallees</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('vallees.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
        <label for="code_Vallees" class="form-label">Code Vallees:</label>
        <input type="number" name="code_Vallees" id="code_Vallees" class="form-control" value="{{@old('code_Vallees')}}" required/>
        @if($errors->has('code_Vallees'))
			<div class='error small text-danger'>{{$errors->first('code_Vallees')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="nom_Vallees" class="form-label">Nom Vallees:</label>
        <textarea name="nom_Vallees" id="nom_Vallees" class="form-control" >{{@old('nom_Vallees')}}</textarea>
        @if($errors->has('nom_Vallees'))
			<div class='error small text-danger'>{{$errors->first('nom_Vallees')}}</div>
		@endif
    </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('vallees.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Vallee')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection