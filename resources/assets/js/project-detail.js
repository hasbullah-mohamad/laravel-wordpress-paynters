import IScroll from 'iscroll';

class ProjectDetail {
  constructor(selector) {
    this.selector = selector;
  }

  handleProjectDetail(event) {
    const $target = $(event.currentTarget);
    const $modalLoading = this.$modal.find('.modal-loading');
    this.$modalLoading = $modalLoading;
    const url = $target.attr('href');
    this.loadProjectDetail(url);
  }

  handleProjectNavigation(event) {
    event.preventDefault();
    const $target = $(event.currentTarget);
    const url = $target.attr('href');
    this.loadProjectDetail(url);
  }

  checkImagesCompleted(images) {
    for(let i=0, ni=images.length; i<ni; i++) {
      const image = images[i];
      if (image.complete === false) {
        return false;
      }
    }
    return true;
  }

  applyIScroll() {
    if (this.applied) {
      return;
    }
    this.applied = true;
    let width = 0;
    const $scrollContainer = this.$modal.find('.project-detail .project-detail-scroll');
    $scrollContainer.find('> *').each((index, element) => {
      width += $(element).outerWidth();
    });
    
    $scrollContainer.width(width);
    new IScroll('.project-detail', {
      scrollX: true,
      scrollY: false,
      mouseWheel: true,
    });

    this.$modal.find('.project-detail .project-text').on('mousewheel touchstart', e => {
      e.stopPropagation();
    });

    setTimeout(() => {
      this.$modalLoading.fadeOut(1000);
    }, 200);
  }

  applyProjectDetail() {
    this.applied = false;
    const _self = this;
    _self.$modalBody.find('.project-navigation > a').on('click', _self.handleProjectNavigation.bind(_self));
    const $scrollContainer = _self.$modal.find('.project-detail .project-detail-scroll');
    const $images = $scrollContainer.find('.project-image');
    if ($images.length > 0) {
      $images.each((index, element) => {
        element.onload = function() { // trigger if the image was loaded
          if (_self.checkImagesCompleted($images)) {
            _self.applyIScroll();
          }
        }
        element.onerror = function() { // trigger if the image was loaded
          if (_self.checkImagesCompleted($images)) {
            _self.applyIScroll();
          }
        }
      });

      if(_self.checkImagesCompleted($images)) {
        _self.applyIScroll();
      }
    } else {
      _self.applyIScroll();
    }
  }

  loadProjectDetail(url) {
    history.replaceState(null, null, url);
    this.$modalLoading.show();

    $.ajax({
      url,
      success: (data) => {
        this.$modalBody.html(data);
        setTimeout(() => {
          this.applyProjectDetail();
        }, 100);
      }
    });
  }

  init() {
    const $target = $(this.selector);
    this.$target = $target;
    if ($target.length === 0) return;

    const data = $target.data();
    
    const $modal = $(data.target);
    this.$modal = $modal;

    const $modalBody = $modal.find('.modal-body');
    this.$modalBody = $modalBody;

    this.$modal.on('hidden.bs.modal', () => {
      history.replaceState(null, null, this.backUrl);
    });

    this.backUrl = window.location.href;
    $(document).on('click', this.selector, this.handleProjectDetail.bind(this));
  }
}

export default ProjectDetail;