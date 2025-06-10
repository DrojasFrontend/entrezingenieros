import $ from "jquery";
import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import "swiper/css/effect-fade";

export const initHeroSwiper = () => {
	const swiper = new Swiper(".heroSwiper", {
		modules: [Pagination, Navigation, Autoplay],
		slidesPerView: 1,
		spaceBetween: 24,
		centeredSlides: false,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		loop: true,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
			clickable: true,
			disabledClass: "swiper-nav-disabled",
		},
		pagination: {
			el: ".swiper-pagination",
			type: "bullets",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
				spaceBetween: 10,
			},
		},
	});
};

export const initBlogSwiper = () => {
	const swiper = new Swiper(".blogSwiper", {
		modules: [Pagination, Navigation],
		slidesPerView: 1.1,
		spaceBetween: 24,
		centeredSlides: false,
		loop: true,
		navigation: {
			nextEl: ".swiper-button-next-blog",
			prevEl: ".swiper-button-prev-blog",
			clickable: true,
		},
		pagination: {
			el: ".swiper-pagination-blog",
			type: "bullets",
			clickable: true,
		},
		breakpoints: {
			768: {
				slidesPerView: 2.1,
				spaceBetween: 24,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 36,
			},
		},
	});
};

export const initClientesSwiper = () => {
	const swiper = new Swiper(".clientesSwiper", {
		modules: [Pagination, Navigation, Autoplay],
		freeMode: true,
		grabCursor: true,
		slidesPerView: 1.3,
		spaceBetween: 24,
		centeredSlides: true,
		autoplay: {
			delay: 0,
			disableOnInteraction: true,
		},
		speed: 5000,
		loop: true,
		freeModeMomentum: false,
		navigation: {
			nextEl: ".swiper-button-next-clientes",
			prevEl: ".swiper-button-prev-clientes",
			clickable: true,
		},
		pagination: {
			el: ".swiper-pagination-clientes",
			type: "bullets",
			clickable: true,
		},
		breakpoints: {
			480: {
				slidesPerView: 3,
				spaceBetween: 10,
				centeredSlides: false,
			},
			768: {
				slidesPerView: 4,
				spaceBetween: 24,
			},
			1200: {
				slidesPerView: 5,
				spaceBetween: 36,
			},
		},
	});
};

export const initApoyamosSwiper = () => {
	const swiper = new Swiper(".apoyamosSwiper", {
		modules: [Pagination, Navigation],
		slidesPerView: 1,
		spaceBetween: 36,
		centeredSlides: false,
		loop: true,
		navigation: {
			nextEl: ".swiper-button-next-apoyamos",
			prevEl: ".swiper-button-prev-apoyamos",
			clickable: true,
		},
		pagination: {
			el: ".swiper-pagination-apoyamos",
			type: "bullets",
			clickable: true,
		},
	});
};

export const initGaleriaSwipers = () => {
	const modals = document.querySelectorAll('.modal');

	modals.forEach(modal => {
		const modalId = modal.getAttribute('id');
		const postId = modalId.replace('modalProyecto-', '');

		const galeriaSwiperEl = modal.querySelector('.galeriaSwiper');
		if (!galeriaSwiperEl) return;

		// Destruir Swiper anterior si existe
		if (galeriaSwiperEl.swiper) {
			galeriaSwiperEl.swiper.destroy(true, true);
		}

		const slidesCount = galeriaSwiperEl.querySelectorAll('.swiper-slide').length;
		const useLoop = slidesCount > 1;

		const swiper = new Swiper(galeriaSwiperEl, {
			modules: [Pagination, Navigation, Autoplay],
			slidesPerView: 1,
			spaceBetween: 24,
			centeredSlides: false,
			autoplay: {
				delay: 3000,
				disableOnInteraction: false,
			},
			speed: 500,
			loop: useLoop,
			navigation: {
				nextEl: `.swiper-button-next-galeria-${postId}`,
				prevEl: `.swiper-button-prev-galeria-${postId}`,
				clickable: true,
			},
			pagination: {
				el: `.swiper-pagination-galeria-${postId}`,
				type: "bullets",
				clickable: true,
			}
		});
	});
};

document.addEventListener('DOMContentLoaded', function () {
	initGaleriaSwipers();

	document.querySelectorAll('.modal').forEach(modal => {
		modal.addEventListener('shown.bs.modal', function () {
			initGaleriaSwipers();
		});
	});
});

export const initEquipoSwiper = () => {
	const swiper = new Swiper(".equipoSwiper", {
		modules: [Pagination, Navigation],
		slidesPerView: 1.3,
		spaceBetween: 24,
		centeredSlides: false,
		autoplay: {
			delay: 3000,
			disableOnInteraction: false,
		},
		speed: 2000,
		loop: true,
		navigation: {
			nextEl: ".swiper-button-next-equipo",
			prevEl: ".swiper-button-prev-equipo",
			clickable: true,
		},
		pagination: {
			el: ".swiper-pagination-equipo",
			type: "bullets",
			clickable: true,
		},
		breakpoints: {
			576: {
				slidesPerView: 2,
				spaceBetween: 10,
				centeredSlides: false,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 10,
			},
			1280: {
				slidesPerView: 4,
				spaceBetween: 36,
			},
		},
	});
};
