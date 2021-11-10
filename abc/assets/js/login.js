$(document).ready(function(){
	$('#login').validate({
		rules: {
			nama: "required",
			sandi: "required"
		},

		messages: {
			nama: "Masukkan nama pengguna atau email Anda",
			sandi: "Masukkan kata sandi Anda"
		},

		highlight: function(element){
			$(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
		},

		unhighlight: function(element){
			$(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
		},

		errorPlacement: function(error,element){
			error.addClass('invalid-feedback');
			error.insertAfter(element.parent('div'));
		},

		submitHandler: function(form){
			$.ajax({
				url: base_url + "login/authentication",
				data: $('#login').serialize(),
				type: "post",
				dataType: "html",
				cache: false,
				success: function(message){
					if(message == 'berhasil'){
						$('#masuk').html('<span class="spinner-border spinner-border-sm"></span> Sedang diproses..');
						window.location.href = '';
					} else if (message == 'sandi_salah'){
						$('#sandi').addClass('is-invalid').focus();
						$('#error_password').html('<small class="form-text text-danger" style="margin-top:-15px;">Kata sandi salah. Coba lagi atau klik Lupa kata sandi untuk menyetel ulang.</div>').show();
					} else if (message == 'diblokir'){
						$('#nama').focus();
						$('.form-control').addClass('is-invalid');
						$.toast({
							title: 'Kesalahan',
							content: 'Akun Anda telah diblokir, silahkan hubungi Administrator!',
							type: 'error',
							delay: 5000
						});
					} else if (message == 'belum_aktivasi'){
						$('#nama').focus();
						$('.form-control').addClass('is-invalid');
						$.toast({
							title: 'Peringatan',
							content: 'Anda belum melakukan proses aktivasi, silahkan aktivasi akun Anda!',
							type: 'warning',
							delay: 5000
						});
					} else {
						$('#nama').focus();
						$('.form-control').addClass('is-invalid');
						$('#error_username').html('<small class="form-text text-danger" style="margin-top:-15px;">Tidak dapat menemukan akun Anda!</div>').show();
					}
				}
			}); return false;
		}
	});

	$('#nama').on('keyup',function(){
		var nama = document.getElementById('nama').value;
		if(nama.length < 1){
			$('#error_username').hide()
		}
	});

	$('#sandi').on('keyup',function(){
		var sandi = document.getElementById('sandi').value;
		if(sandi.length < 1){
			$('#error_password').hide()
		}
	});
});

var mode;

function register(){
	mode = 'register';
	$('#form')[0].reset();
	$('#modal_dialog').addClass('modal-lg');
	$('.modal-title').text('Daftar Akun');
	$('.btn-submit').text('Daftar');
	$('.form-control').removeClass('is-invalid').removeClass('is-valid').show();
	$('[name="daftar_jenis_kelamin"]').removeClass('is-invalid').removeClass('is-valid');
	$('.custom-radio').show();
	$('.invalid-feedback').hide();
	$('.modal').modal('show');
	$('[name="daftar_nama_depan"]').trigger('focus');
}

function forgot_password(){
	mode = 'forgot_password';
	$('#form')[0].reset();
	$('#reg-mb-n4').addClass('mb-n4');
	$('#modal_dialog').removeClass('modal-lg');
	$('.invalid-feedback').hide();
	$('.modal-title').text('Kirim Email Pemulihan');
	$('.btn-submit').text('Kirim');
	$('[name="daftar_nama_depan"]').hide();
	$('[name="daftar_nama_belakang"]').hide();
	$('[name="daftar_sandi"]').hide();
	$('[name="daftar_email"]').removeClass('is-invalid').removeClass('is-valid');
	$('.custom-radio').hide();
	$('.modal').modal('show');
	$('[name="daftar_email"]').trigger('focus');
}

function modal_close(){
	$('#reg-mb-n4').removeClass('mb-n4');
	$('.invalid-feedback').hide();
	$('.modal').modal('hide');
}

$(document).ready(function(){
	$('#form').validate({
		rules: {
			daftar_nama_depan: "required",
			daftar_nama_belakang: "required",
			daftar_email: {
				required: true,
				email: true
			},
			daftar_sandi: {
				required: true,
				minlength: 8
			},
			daftar_jenis_kelamin: "required"
		},

		messages: {
			daftar_nama_depan: "Masukkan nama depan Anda",
			daftar_nama_belakang: "Masukkan nama belakang Anda",
			daftar_email: "Masukkan alamat email Anda yang valid",
			daftar_sandi: {
				required: "Masukkan kata sandi Anda",
				minlength: "Kata sandi minimal harus 8 karakter"
			},
			daftar_jenis_kelamin: "Pilih jenis kelamin Anda"
		},

		highlight: function(element){
			if($(element).attr('type') == 'radio'){
				$(element.form).find('input[type=radio]').each(function(which){
					$(element.form).find('label[for=" + this.id + "]').removeClass('is-valid').addClass('is-invalid');
					$(this).addClass('is-invalid');
				});
			} else {
				$(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
			}
		},

		unhighlight: function(element){
			if($(element).attr('type') == 'radio'){
				$(element.form).find('input[type=radio]').each(function(which){
					$(element.form).find('label[for=" + this.id + "]').removeClass('is-invalid').addClass('is-valid');
					$(this).removeClass('is-invalid').addClass('is-valid');
				});
			} else {
				$(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
			}
		},

		errorElement: 'div',
		errorPlacement: function (error,element){
			error.addClass('invalid-feedback mb-2');
			if(element.prop('type') === "radio"){
				error.addClass('mt-1 mb-n1');
				error.insertAfter('.error-label');
			} else {
				error.insertAfter(element.parent('div'));
			}
		},

		submitHandler: function(form){
			var email = $('[name="daftar_email"]').val();
			if(mode == "register"){
				$.ajax({
					url: base_url + "login/register",
					type: "post",
					data: $("#form").serialize(),
					dataType: "json",
					success: function(response){
						if(response.status == 'success'){
							$.ajax({
								url: base_url + "login/register_send_email",
								type: "post",
								data: "email=" + email,
								dataType: "json"
							});
							$('#modal').modal('hide');
							$.toast({
								title: 'Info',
								content: 'Pendaftaran akun berhasil, silahkan aktivasi dari tautan yang dikirim ke email Anda',
								type: 'info',
								delay: 7500
							});
						} else {
							$('#error_email').html(response.error_email).show() && $('[name="daftar_email"]').addClass('is-invalid').focus();
						}
					},
					error: function(xhr,ajaxOptions,thrownError){
						alert(xhr.responseText)
					}
				}); return false;
			}

			else if(mode == "forgot_password"){
				$.ajax({
					url: base_url + "login/forgot_password",
					type: "post",
					data: "email=" + email,
					dataType: "json",
					success: function(response){
						if(response.status == 'success'){
							$.ajax({
								url: base_url + "login/forgot_password_send_email",
								type: "post",
								data: "email=" + email,
								dataType: "json"
							});
							$('#modal').modal("hide");
							$.toast({
								title: 'Info',
								content: 'Email pemulihan kata sandi telah dikirim, periksa email Anda.',
								type: 'info',
								delay: 7500
							});
						} else {
							$('#error_email').html(response.error_email).show() && $('[name="daftar_email"]').addClass('is-invalid').focus();
						}
					},
					error: function (xhr,ajaxOptions,thrownError){
						alert(xhr.responseText)
					}
				}); return false;
			}
		}
	});

	$('[name="daftar_email"]').on('input',function(){$('#error_email').hide()});
});
