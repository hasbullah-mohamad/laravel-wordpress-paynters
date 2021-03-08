class HomeProjectCardCarousel {
  
  constructor(selector) {
    this.selector = selector;
    this.next = this.current = 0;
  }

  set(next) {
    if (this.next == next) {
      return;
    }
    this.next = next;
    this.$items.eq(this.current).addClass('leaving');
    this.$items.eq(next).addClass('active');

    setTimeout(() => {
      this.$items.eq(this.current).removeClass('active').removeClass('leaving');
      this.current = next;
    }, 700);
  }

  enter() {
    this.entered = true;
    this.$items.eq(0).addClass('active').addClass('entering');
    requestAnimationFrame(() => setTimeout(() => {
      this.$items.eq(0).addClass('active').addClass('entered');
    }, 0));
    setTimeout(() => {
      this.$items.eq(0).removeClass('entering').removeClass('entered');
    }, 700);
  }

  onTimeUpdate() {
    let index = this.timemarks.length - 1;
    do {
      if (this.video.currentTime > this.timemarks[index]) {
        if (this.entered) {
          this.set(index);
        } else {
          this.enter();
        }
        return;
      }
    } while(index--);
  }

  init() {
    this.$component = $(this.selector);
    this.$items = this.$component.children();
    this.video = window.document.getElementById('hero-video');
    this.timemarks = this.$items.map((index, item) => parseInt(item.getAttribute('data-timemark'))).get();

    if (this.video && this.$component.length) {
      this.video.addEventListener('timeupdate', () => this.onTimeUpdate());
    }
  }
}

export default HomeProjectCardCarousel;
