class Member {
  constructor(selector) {
    this.selector = selector;
  }

  handleClick(event) {
    const $target = $(event.currentTarget);
    const html = $target.find('script').html();
    const data =$target.data();
    $(data.target).find('.modal-body').html(html);
  }

  init() {
    $(this.selector).on('click', this.handleClick.bind(this))
  }
};

export default Member;
