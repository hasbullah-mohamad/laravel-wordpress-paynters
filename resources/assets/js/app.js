import 'popper.js';
import 'bootstrap/js/dist/util';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/dropdown';
import 'bootstrap/js/dist/modal';
import 'slick-carousel';
import './mobile-check';

import Navigation from './navigation';
import Member from './member';
import ProjectDetail from './project-detail';
import ProjectDetailLoad from './project-detail-load';
import MapChange from './map-change';
import AwardsSlider from './awards-slider';
import LoadMore from './load-more';
import HomeProjectCardCarousel from './home-project-card-carousel';
import Animator from './animator';

const navigation = new Navigation();
navigation.init();

const member = new Member('.card-member');
member.init();

const projectDetail = new ProjectDetail('[data-target="#modal-project-detail"]');
projectDetail.init();

const projectDetailLoad = new ProjectDetailLoad('#modal-project-detail[data-route="project.details"]');
projectDetailLoad.init();

const mapChange = new MapChange('[data-toggle="map-change"]');
mapChange.init();

const awardsSlider = new AwardsSlider('.awards');
awardsSlider.init();

const loadMore = new LoadMore('[data-load-more]');
loadMore.init();

const homeProjectCardCarousel = new HomeProjectCardCarousel('.home-tile-wrap');
homeProjectCardCarousel.init();

const animator = new Animator('[data-animate]');
animator.init();