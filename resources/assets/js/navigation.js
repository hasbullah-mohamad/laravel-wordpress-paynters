class Navigation {
  constructor() {
    
  }
  handleNavigationButtonClick(event) {
    this.body.classList.toggle('open-navigation');
  }

  handleWindowScroll(event) {
    if (window.scrollY > 79) {
      this.body.classList.add('scrolling');
    } else {
      this.body.classList.remove('scrolling');
    }
  }

  init() {
    this.navigation = document.querySelector('.site-navigation');
    if (this.navigation) {
      this.body = document.querySelector('body');
      this.navigationButton = this.navigation.querySelector('.navigation-button');
      this.navigationButton.addEventListener('click', this.handleNavigationButtonClick.bind(this));
      window.addEventListener('scroll', this.handleWindowScroll.bind(this));
    }
  }
};

export default Navigation;