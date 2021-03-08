@if ($team = $page->field('team'))

<div class="section-member bg-secondary border-triangle text-light">
  <div class="container">
    <div class="py-6 py-md-8">
      <h3 class="text-info mb-4">Our executive team</h3>
      <div class="group">
        @foreach ($team as $member)
          <div class="group-item">
            @include ('components.card-member', [
              'data' => (object)([
                'featured_image' => $member['photo'] ? $member['photo']['sizes']['medium'] : '',
                'name' => $member['name'],
                'position' => $member['title'],
                'content' => $member['bio'],
              ])
            ])
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endif