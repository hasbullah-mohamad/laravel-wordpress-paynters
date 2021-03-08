@extends('layouts.app')
@section ('content')
  @include ('shared.hero', [
    'data' => (object)([
      'featured_image' => get_field('hero_image') ? get_field('hero_image')['url'] : '',
    ])
  ])
  @include ('shared.contact')
@endsection