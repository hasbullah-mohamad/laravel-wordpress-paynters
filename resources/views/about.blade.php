@extends('layouts.app')
@section ('content')
  @include ('shared.about-us')
  @include ('shared.track-record')
  @include ('shared.our-team')
  @include ('shared.our-values')

  @if ($blocks = $page->field('blocks'))
    <div class="container mb-10">
      @foreach($blocks as $block)
        @include ('shared.about-others', [
          'data' => (object)([
            'featured_image' => $block['image'] ? $block['image']['sizes']['large'] : '',
            'title' => $block['title'],
            'content' => $block['content']
          ])
        ])
      @endforeach
    </div>
  @endif

  @include ('shared.awards')
  @include ('components.modal-member')
@endsection
