import {LottieFX} from './library/lottiefx';
import ABOUT_ANIMATION from './blobs/about-animation.json';

class Animator {
    constructor(selector) {
        this.selector = selector;

        this.elementset = {
            'about-animation': {animation: ABOUT_ANIMATION},
        };
    }

    init() {
        this.elements = document.querySelectorAll(this.selector);

        for (let i = 0, len = this.elements.length; i < len; i++) {
            const animation = this.elements[i].dataset.animate;

            if (animation && this.elementset[animation] !== undefined) {
                new LottieFX(this.elements[i], 200, this.elementset[animation].animation, true);
            }
        }
    }
}

export default Animator;