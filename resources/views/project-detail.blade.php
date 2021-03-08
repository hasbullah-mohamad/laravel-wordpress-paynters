@extends('layouts.app')

@section ('content')

    @if (Request::ajax())
        @if (Route::currentRouteName() === 'project.details')
          @include ('components.project-detail')
        @endif
    @else
        @include('components.modal-project-detail')
    @endif

@endsection
