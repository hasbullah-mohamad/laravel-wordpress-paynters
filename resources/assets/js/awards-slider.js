class AwardsSlider {
  constructor(selector) {
    this.selector = selector;
    
  }

  handleChange(event, slick, currentSlide) {
    this.updateActiveContent(slick, currentSlide);
  }

  updateActiveContent(slick, currentSlide) {
    const $slide = $(slick.$slides[currentSlide]);
    const $script = $slide.find('script');
    const data = $script.data();
    const content = $script.html();
    this.$component.find('.awards-content').html(content).hide().fadeIn(200);
  }

  init() {
    this.$component = $(this.selector);
    if (!this.$component.length) {
      return;
    }
    this.$slider = this.$component.find('.awards-slider');
    this.$slider.slick({
      appendDots: '.awards-control',
      arrows: false,
      autoplay: true,
      autoplaySpeed: 5000,
      dots: true,
    });
    this.$slider.on('afterChange', this.handleChange.bind(this));
    this.updateActiveContent(this.$slider.slick('getSlick'), 0);
  }
}

export default AwardsSlider;
