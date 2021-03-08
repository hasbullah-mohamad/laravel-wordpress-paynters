class LoadMore {
  
  constructor(selector) {
    this.selector = selector;
  }

  onScroll() {
    if ($(window).height()*1.5 > this.$component[0].getBoundingClientRect().top) {
        $(window).off('scroll.load-more');
        this.load();
    }
  }

  load() {
    $.get(this.$component.attr('href'), res => {
        const match = /<!-- load-more-items-begin -->([\s\S]+)<!-- load-more-items-end -->/.exec(res);
        if (match[1]) {
            this.$container.html(this.$container.html() + match[1]);
        }
        if (/data-load-more-trigger/.test(res)) {
            this.$trigger.find('a').attr('href', (index, url) => 
                url.replace(/page=(\d+)/, (full, page) => 
                    'page='.concat(page*1+1)
                )
            );
            this.init();
        } else {
            this.$trigger.remove();
        }
    });
  }

  init() {
    this.$component = $(this.selector);
    this.$container = $('[data-load-more-container]');
    this.$trigger   = $('[data-load-more-trigger]');

    if (!this.$component.length) {
        return;
    }
    $(window).on('scroll.load-more', () => this.onScroll());
  }
}

export default LoadMore;
