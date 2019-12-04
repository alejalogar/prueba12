/**
 * Formularios condicionales
 */
jQuery(document).ready(function () {


	/**
	 * Funcionalidad para los botones de ficheros
	 */

	// Javascript para que funcione el botón de subir los curriculum
	jQuery('#curriculum_btn').click(function () {
		jQuery('input[name="curriculum"]').trigger('click');
	})

	jQuery('input[name="curriculum"]').change(function () {
		jQuery('#curriculum_btn h5').text(this.value.replace(/C:\\fakepath\\/i, ''))
	})

	// Javascript para que funcione el botón de subir las fotos.
	jQuery('#foto_btn').click(function () {
		jQuery('input[name="foto"]').trigger('click');
	})

	jQuery('input[name="foto"]').change(function () {
		jQuery('#foto_btn h5').text(this.value.replace(/C:\\fakepath\\/i, ''))
	})


	/**
	 * FORMULARRIO BUSCO TRABAJADORES
	 */

	/*
	 * Cuando se seleccione la opción "Encargado"
	 */
	jQuery('select[name=cultivo]').change(function () {
		if (jQuery(this).val() === 'Otro') {
			// Muestro el input de "Otro cultivo"
			jQuery('div.cultivo_libre').slideDown(300);
		} else {
			// Oculto el input de "Otro cultivo"
			jQuery('div.cultivo_libre').slideUp(300);
		}
	});

	/**
	 * FORMULARRIO BUSCO TRABAJO
	 */

	// Deshabilitamos el input de número de trabajadores
	jQuery('input[name=trabajadorescuadrilla]').attr('disabled', 'disabled');

	/*
	 * Cuando se marque la opción de trabajar en la oficina
	 */
	jQuery('input[name=trabajar]').change(function () {
		if (jQuery(this).is(":checked")) {
			if (jQuery(this).val() === jQuery('input[name=trabajar]').first().val()) {
				// Ocultar la opcion "Peon agricola" en el select "Puesto"
				jQuery('select[name=puesto]').children('option').eq(2).hide();

				// Oculto los inputs de agrarios en "Donde quieres trabjar"
				jQuery('#inputs-agrarios').slideUp(300, function () {
				// Muestro los inputs de oficina en "Donde quieres trabjar"
					jQuery('#inputs-oficina').slideDown(300);
				});
			} else {
				// Oculto los inputs de oficina en "Donde quieres trabjar"
				jQuery('#inputs-oficina').slideUp(300, function () {
					// Muestro los inputs de agrarios en "Donde quieres trabjar"
					jQuery('#inputs-agrarios').slideDown(300);
				});

				// Mostrar la opcion "Peon agricola" en el select "Puesto"
				jQuery('select[name=puesto]').children('option').eq(2).show();
			}
		}
	});

	/*
	 * Cuando se seleccione la opción "Encargado"
	 */
	jQuery('select[name=puesto]').change(function () {
		if (jQuery(this).val() == jQuery(this).children('option').last().val()) {
			// Mostrar los inputs de cuadrilla
			jQuery('div.cuadrilla').slideDown(300);
			jQuery('div.trabajadorescuadrilla').slideDown(300);
		} else {
			// Ocultar los inputs de cuadrilla
			jQuery('div.cuadrilla').slideUp(300);
			jQuery('div.trabajadorescuadrilla').slideUp(300);
		}
	});

	/*
	 * Cuando se marque la casilla de "Dispongo de cuadrilla"
	 */
	jQuery('div.cuadrilla input').change(function () {
		if (jQuery(this).is(":checked")) {
			jQuery('input[name=trabajadorescuadrilla]').removeAttr('disabled');
		}

		if (jQuery(this).is(':not(:checked)')) {
			jQuery('input[name=trabajadorescuadrilla]').attr('disabled', 'disabled');
		}
	});
});
