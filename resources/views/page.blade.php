@extends('layouts.app')
@section ('content')
    <div class="py-6">
      <div class="container">
        <h1>{{ $page->title }}</h1>
        {!! $page->content() !!}
      </div>
    </div>
@endsection