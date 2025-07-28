/**
 * Modern Content Slider Handler
 * Replaces jQuery/Owl Carousel with vanilla JavaScript
 */
class ContentSlider {
	constructor(element) {
		this.element = element;
		this.container = element.querySelector('.content-slider-container');
		this.slides = this.container ? Array.from(this.container.children) : [];
		this.currentSlide = 0;
		this.autoplaySpeed = parseInt(element.dataset.autoplaySpeed) || 0;
		this.showNavigation = element.dataset.showNavigation !== 'false';
		this.showDots = element.dataset.showDots !== 'false';
		this.loop = element.dataset.loop !== 'false';
		this.autoplayInterval = null;
		
		this.init();
	}
	
	init() {
		if (this.slides.length <= 1) return;
		
		this.createNavigation();
		this.createDots();
		this.updateSlide();
		this.startAutoplay();
		this.bindEvents();
	}
	
	createNavigation() {
		if (!this.showNavigation) return;
		
		const prevButton = document.createElement('button');
		const nextButton = document.createElement('button');
		
		prevButton.className = 'slider-nav prev';
		nextButton.className = 'slider-nav next';
		prevButton.setAttribute('aria-label', 'Previous slide');
		nextButton.setAttribute('aria-label', 'Next slide');
		
		prevButton.addEventListener('click', () => this.prevSlide());
		nextButton.addEventListener('click', () => this.nextSlide());
		
		this.element.appendChild(prevButton);
		this.element.appendChild(nextButton);
	}
	
	createDots() {
		if (!this.showDots || this.slides.length <= 1) return;
		
		const dotsContainer = document.createElement('div');
		dotsContainer.className = 'slider-dots';
		dotsContainer.setAttribute('role', 'tablist');
		dotsContainer.setAttribute('aria-label', 'Slide navigation');
		
		this.slides.forEach((_, index) => {
			const dot = document.createElement('button');
			dot.className = 'dot';
			dot.setAttribute('role', 'tab');
			dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
			dot.setAttribute('aria-selected', index === 0 ? 'true' : 'false');
			
			dot.addEventListener('click', () => this.goToSlide(index));
			dotsContainer.appendChild(dot);
		});
		
		this.element.appendChild(dotsContainer);
		this.dots = Array.from(dotsContainer.children);
	}
	
	updateSlide() {
		if (this.slides.length === 0) return;
		
		const translateX = -this.currentSlide * 100;
		this.container.style.transform = `translateX(${translateX}%)`;
		
		// Update dots
		if (this.dots) {
			this.dots.forEach((dot, index) => {
				dot.classList.toggle('active', index === this.currentSlide);
				dot.setAttribute('aria-selected', index === this.currentSlide ? 'true' : 'false');
			});
		}
		
		// Update navigation buttons
		const prevButton = this.element.querySelector('.slider-nav.prev');
		const nextButton = this.element.querySelector('.slider-nav.next');
		
		if (prevButton) {
			prevButton.disabled = !this.loop && this.currentSlide === 0;
			prevButton.setAttribute('aria-hidden', (!this.loop && this.currentSlide === 0).toString());
		}
		
		if (nextButton) {
			nextButton.disabled = !this.loop && this.currentSlide === this.slides.length - 1;
			nextButton.setAttribute('aria-hidden', (!this.loop && this.currentSlide === this.slides.length - 1).toString());
		}
	}
	
	nextSlide() {
		if (this.currentSlide < this.slides.length - 1) {
			this.currentSlide++;
		} else if (this.loop) {
			this.currentSlide = 0;
		}
		this.updateSlide();
		this.resetAutoplay();
	}
	
	prevSlide() {
		if (this.currentSlide > 0) {
			this.currentSlide--;
		} else if (this.loop) {
			this.currentSlide = this.slides.length - 1;
		}
		this.updateSlide();
		this.resetAutoplay();
	}
	
	goToSlide(index) {
		if (index >= 0 && index < this.slides.length) {
			this.currentSlide = index;
			this.updateSlide();
			this.resetAutoplay();
		}
	}
	
	startAutoplay() {
		if (this.autoplaySpeed <= 0) return;
		
		this.autoplayInterval = setInterval(() => {
			this.nextSlide();
		}, this.autoplaySpeed * 1000);
	}
	
	resetAutoplay() {
		if (this.autoplayInterval) {
			clearInterval(this.autoplayInterval);
			this.startAutoplay();
		}
	}
	
	bindEvents() {
		// Pause autoplay on hover
		if (this.autoplaySpeed > 0) {
			this.element.addEventListener('mouseenter', () => {
				if (this.autoplayInterval) {
					clearInterval(this.autoplayInterval);
				}
			});
			
			this.element.addEventListener('mouseleave', () => {
				this.startAutoplay();
			});
		}
		
		// Keyboard navigation
		this.element.addEventListener('keydown', (e) => {
			switch (e.key) {
				case 'ArrowLeft':
					e.preventDefault();
					this.prevSlide();
					break;
				case 'ArrowRight':
					e.preventDefault();
					this.nextSlide();
					break;
				case 'Home':
					e.preventDefault();
					this.goToSlide(0);
					break;
				case 'End':
					e.preventDefault();
					this.goToSlide(this.slides.length - 1);
					break;
			}
		});
		
		// Touch/swipe support
		let startX = 0;
		let endX = 0;
		
		this.element.addEventListener('touchstart', (e) => {
			startX = e.touches[0].clientX;
		}, { passive: true });
		
		this.element.addEventListener('touchend', (e) => {
			endX = e.changedTouches[0].clientX;
			const diff = startX - endX;
			
			if (Math.abs(diff) > 50) { // Minimum swipe distance
				if (diff > 0) {
					this.nextSlide();
				} else {
					this.prevSlide();
				}
			}
		}, { passive: true });
	}
}

// Initialize sliders when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
	const sliders = document.querySelectorAll('.wp-block-mxsfwn-content-slider');
	sliders.forEach(slider => new ContentSlider(slider));
});

// Support for dynamically added content
if (typeof MutationObserver !== 'undefined') {
	const observer = new MutationObserver((mutations) => {
		mutations.forEach((mutation) => {
			mutation.addedNodes.forEach((node) => {
				if (node.nodeType === Node.ELEMENT_NODE) {
					const sliders = node.querySelectorAll ? node.querySelectorAll('.wp-block-mxsfwn-content-slider') : [];
					sliders.forEach(slider => new ContentSlider(slider));
				}
			});
		});
	});
	
	observer.observe(document.body, {
		childList: true,
		subtree: true
	});
}