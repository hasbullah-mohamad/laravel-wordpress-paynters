class MapChange {
  constructor(selector) {
    this.selector = selector;
  }

  handleMapChange(event) {
    event.preventDefault();
    const $target = $(event.currentTarget);
    const data = $target.data();
    const $map = $(data.target);
    $map.attr('src', $target.attr('href'));
  }

  init() {
    this.$mapChange = $(this.selector);
    this.$mapChange.on('click', this.handleMapChange.bind(this));
  }
}

export default MapChange;