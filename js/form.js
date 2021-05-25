$('#formRegister').submit(function(e){
	var loading = document.querySelector('#formRegister .card-loading');
	loading.style.display = "block";
	e.preventDefault();
	$.ajax({
		url: 'http://api.amedicalcdr.com/api/contacts/create',
		type: 'post',
		dataType: 'json',
		data: $(this).serialize(),
		success: function(resp){
			if(resp.id){
				Swal.fire({
					type: 'success',
					title: 'Catálogo Enviado',
					html: '<p>Hemos enviado nuestro Cátalogo a su correo</p>'
				});
				loading.style.display = "none";
			}
		}
	}).fail(function(resp){
		Swal.fire({
			type: 'error',
			title:'Teléfono o Correo Registrados',
			html: '<p>Sus datos ya se encuentran registrados</p>'
		});
		loading.style.display = "none";
	})
})

