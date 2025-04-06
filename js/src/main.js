import { Modal } from 'bootstrap'
import {} from "./menu-init";
import { inicializarContadores } from "./contador";
import {} from "./validacion-formulario-init";
import {} from "./filtro-proyectos-init";
import {} from "./search-init";	

import {
	initHeroSwiper,
	initBlogSwiper,
	initClientesSwiper,
	initApoyamosSwiper,
	initGaleriaSwiper,
	initEquipoSwiper,
} from "./swiper-init";
import { initClickableCards } from "./card-click-init";


let Main = {
	init: async function () {
		document.addEventListener("DOMContentLoaded", () => {
			if (document.querySelector(".heroSwiper")) {
				initHeroSwiper();
			}
			if (document.querySelector(".blogSwiper")) {
				initBlogSwiper();
			}
			if (document.querySelector(".clientesSwiper")) {
				initClientesSwiper();
			}
			if (document.querySelector(".apoyamosSwiper")) {
				initApoyamosSwiper();
			}
			if (document.querySelector(".galeriaSwiper")) {
				initGaleriaSwiper();
			}
			if (document.querySelector(".equipoSwiper")) {
				initEquipoSwiper();
			}
			initClickableCards(".clickeable");
			inicializarContadores();
		});
	},
};
Main.init();
