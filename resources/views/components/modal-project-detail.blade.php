<!-- Modal -->
<div class="modal-project-detail modal fade" id="modal-project-detail" data-route="{{Route::currentRouteName()}}" tabindex="-1" role="dialog" aria-labelledby="Member" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="icon-close"></i></span>
        </button>
      </div>
      <div class="modal-body">
        @if (Route::currentRouteName() === 'project.details')
          @include ('components.project-detail')
        @endif
      </div>
      <div class="modal-loading">
        @include ('shared.svgs.loading')
      </div>
    </div>
  </div>
</div>