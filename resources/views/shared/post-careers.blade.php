<div class="post post-single">
  <div class="pattern-lattice-secondary pattern-lattice-base">
    <div class="row pt-2">
      @foreach($page->field('blocks', []) as $block)
        <div class="col-lg-6 mb-4 mb-md-5">
          @if ($block['title'])
            <div class="mb-2">
              <h4 class="text-info">{{ $block['title'] }}</h4>
            </div>
          @endif
          @if ($block['image'])
            <img class="w-100 mb-3" src="{{ $block['image']['sizes']['large'] }}" />
          @endif
          {!! $block['content'] !!}
        </div>
      @endforeach
    </div>
  </div>
</div>
