<div class="bg-lattice-secondary py-10">
    <div class="container">
        <h3 class="text-info mb-5">Track record</h3>
        <div class="row">
            <div class="col-xl-7 col-lg-6 font-size-base letter-spacing-sm preformatted">
                {!! $page->content('track_record') !!}
            </div>
            @if($gallery = $page->field('track_record_gallery'))
                <div class="col-xl-5 col-lg-6">
                    <ul class="logo-list">
                        @foreach($gallery as $image)
                            <li>
                                <img style="height:125px" class="pr-5" src="{{ $image['sizes']['medium'] }}"/>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
