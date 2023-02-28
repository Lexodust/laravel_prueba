@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subir archivos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('archivos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="archivos">{{ __('Archivos') }}</label>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="archivos" name="archivos[]" multiple>
                                <label class="custom-file-label" for="archivos">{{ __('Seleccionar archivos') }}</label>
                            </div>

                            @error('archivos.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Subir archivos') }}</button>
                        </div>
                    </form>

                    @if (session('mensaje'))
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
