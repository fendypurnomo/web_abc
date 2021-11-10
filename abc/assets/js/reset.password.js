$(document).ready(function(){
	$('#reset-password').validate({
		rules: {
			sandi: "required",
			sandi_konfirmasi: {
				required: true,
				equalTo: "#sandi"
			}
		},

		messages: {
			sandi: "Masukkan kata sandi baru",
			sandi_konfirmasi: {
				required: "Masukkan konfirmasi kata sandi baru",
				equalTo: "Konfirmasi kata sandi baru tidak sama"
			}
		},

		highlight: function(element){
			$(element).closest('.form-control').addClass('is-invalid');
		},

		unhighlight: function(element){
			$(element).closest('.form-control').removeClass('is-invalid');
			$(element).closest('.form-control').addClass('is-valid');
		},

		errorElement: "span",
		errorPlacement: function (error, element){
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},

		submitHandler: function(){
			$.ajax({
				url: base_url + "reset_password/update_reset_password",
				type: "post",
				data: $("#reset-password").serialize(),
				dataType: "json",
				success: function(response){
					if(response.status == "berhasil"){
						Swal.fire({
							title: "Berhasil!",
							text: "Kata sandi Anda telah diperbaharui, silahkan masuk menggunakan kata sandi baru Anda.",
							type: "success",
							confirmButtonText: "Masuk",
							backdrop: false,
							allowOutsideClick: false,
							allowEscapeKey: false
						}).then(function(){
							window.location = base_url;
						});
					}
					else
					{
						alert('Sandi gagal diperbaharui');
					}
				}
			}); return false;
		}
	});
});
