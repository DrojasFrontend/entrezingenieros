document.addEventListener("DOMContentLoaded", function () {
	// Validación para nombre y apellidos (solo letras)
	const camposLetras = document.querySelectorAll(
		'input[name="nombre"], input[name="apellidos"]'
	);
	camposLetras.forEach(function (campo) {
		campo.addEventListener("input", function () {
			this.value = this.value.replace(/[^a-záéíóúñüA-ZÁÉÍÓÚÑÜ\s]/g, "");
		});
	});

	// Validación para número de documento (solo números)
	const numeroDocumento = document.querySelector(
		'input[name="numero_documento"]'
	);
	if (numeroDocumento) {
		numeroDocumento.addEventListener("input", function () {
			this.value = this.value.replace(/[^0-9]/g, "");
			if (this.value.length > 12) {
				this.value = this.value.slice(0, 12);
			}
		});
	}

	// Validación para números de contacto
	const telefonos = document.querySelectorAll(
		'input[name="numero-contacto"], input[name="numero-contacto-sec"]'
	);
	telefonos.forEach(function (telefono) {
		telefono.addEventListener("input", function () {
			this.value = this.value.replace(/[^0-9]/g, "");
			if (this.value.length > 10) {
				this.value = this.value.slice(0, 10);
			}
		});
	});

	// Validación de fecha de expedición
	const fechaExpedicion = document.querySelector(
		'input[name="fecha_expedicion"]'
	);
	if (fechaExpedicion) {
		fechaExpedicion.max = new Date().toISOString().split("T")[0];
		fechaExpedicion.addEventListener("change", function () {
			const fechaSeleccionada = new Date(this.value);
			const hoy = new Date();

			if (fechaSeleccionada > hoy) {
				alert("La fecha de expedición no puede ser futura");
				this.value = "";
			}
		});
	}

	// Validación de fecha de atención
	const fechaAtencion = document.querySelector('input[name="fecha_atencion"]');
	if (fechaAtencion) {
		fechaAtencion.max = new Date().toISOString().split("T")[0];
		fechaAtencion.addEventListener("change", function () {
			const fechaSeleccionada = new Date(this.value);
			const hoy = new Date();
			const unAnioAtras = new Date();
			unAnioAtras.setFullYear(hoy.getFullYear() - 1);

			if (fechaSeleccionada > hoy) {
				alert("La fecha de atención no puede ser futura");
				this.value = "";
			} else if (fechaSeleccionada < unAnioAtras) {
				alert("La fecha de atención no puede ser mayor a un año");
				this.value = "";
			}
		});
	}

	// Habilitar/deshabilitar botón de envío según términos
	const termsCheckbox = document.querySelector('input[name="terms"]');
	const submitButton = document.querySelector('button[type="submit"]');

	if (termsCheckbox && submitButton) {
		termsCheckbox.addEventListener("change", function () {
			submitButton.disabled = !this.checked;
		});
	}

	// Detectar clase sent y redireccionar
	// const form = document.querySelector(".wpcf7-form");
	// if (form) {
	// 	const observer = new MutationObserver(function (mutations) {
	// 		mutations.forEach(function (mutation) {
	// 			if (mutation.target.classList.contains("sent")) {
	// 				setTimeout(() => {
	// 					window.location.href = "/gracias-por-su-solicitud/";
	// 				}, 2000);
	// 			}
	// 		});
	// 	});

	// 	observer.observe(form, {
	// 		attributes: true,
	// 		attributeFilter: ["class"],
	// 	});
	// }
});
