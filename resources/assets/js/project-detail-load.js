import IScroll from 'iscroll';
import ProjectDetail from './project-detail';

class ProjectDetailLoad extends ProjectDetail {
  constructor(selector) {
    super(selector);
  }

  init() {
    const $modal = $(this.selector);
    if( $modal.length === 0) return;

    $modal.modal('show');
    this.$modal = $modal;

    const $modalBody = $modal.find('.modal-body');
    this.$modalBody = $modalBody;
    
    const $modalLoading = $modal.find('.modal-loading');
    this.$modalLoading = $modalLoading;
    
    setTimeout(() => {
      this.applyProjectDetail();
    }, 200);
    this.$modal.on("hidden.bs.modal", () => {
      window.open(window.previousURL, '_self');
    });
  }
}

export default ProjectDetailLoad;