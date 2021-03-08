<div class="pt-10 pb-4">
    <div class="container">
        <h3 class="text-info mb-4">Our values</h3>
        <div class="row">
            <div class="col-lg-7 col-md-8 col-sm-8 mb-4 font-size-base preformatted">
                {!! $page->field('values') !!}
            </div>
            @if($items = $page->field('accordion'))
                <div class="col-lg-8 col-md-6">
                    <div id="our-values" class="accordian">

                        @foreach($items as $index => $item)
                            <div class="card">
                                <div class="card-header px-lg-5" id="our-values-heading-{{ $index }}" data-toggle="collapse"
                                     data-target="#our-values-collapse-{{ $index }}" 
                                     aria-controls="our-values-collapse-{{ $index }}">
                                    <span>{{ $item['title'] }}</span>
                                </div>
                                <div id="our-values-collapse-{{ $index }}" class="collapse {{ $index ? '' : 'show' }}" aria-labelledby="our-values-heading-{{ $index }}"
                                     data-parent="#our-values">
                                    <div class="card-body px-lg-5">{{ $item['description'] }}</div>
                                </div>
                            </div>
                        @endforeach
                        

                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
