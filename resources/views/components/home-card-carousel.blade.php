<div class="section-top font-size-lg">
  <div class="container">
      <div class="home-tile-wrap">

        @include('shared.project-tile-card', [
          'title' => 'The Residences Brookfield Green',
          'url' => '/projects/the-residences-brookfield-green/',
          'categories' => 'Aged care & retirement living',
          'location' => 'South East Queensland',
          'timemark' => 2
        ])

        @include('shared.project-tile-card', [
          'title' => 'Mackay Aquatic & Recreation Centre',
          'categories' => 'Government',
          'construction' => true,
          'location' => 'North Queensland',
          'timemark' => 11
        ])

        @include('shared.project-tile-card', [
          'title' => 'Redcliffe Dolphins Stadium',
          'url' => '/projects/redcliffe-dolphins-stadium/',
          'categories' => 'Hospitality, Entertainment & Leisure',
          'location' => 'South East Queensland',
          'timemark' => 20
        ])

        @include('shared.project-tile-card', [
          'title' => 'Redlands RSL Carpark',
          'url' => '/projects/redlands-rsl-carpark/?q=redlands',
          'categories' => 'Hospitality, Entertainment & Leisure',
          'location' => 'South East Queensland',
          'timemark' => 32
        ])

        @include('shared.project-tile-card', [
            'title' => 'Calliope State High School',
            'construction' => true,
            'categories' => 'Government',
            'location' => 'Central QLD',
            'timemark' => 40
        ])

        @include('shared.project-tile-card', [
            'title' => 'Murroona Gardens Internals',
            'url' => ' /projects/murroona-gardens/?q=murroona',
            'categories' => 'Aged care & retirement living',
            'location' => 'North Queensland',
            'timemark' => 45
        ])
        
      </div>
  </div>
</div>
