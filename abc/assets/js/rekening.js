$(document).ready(function(){
	$('#rekening-akun').DataTable({
		processing: true,
		serverSide: true,
		lengthMenu: [[10,15,25,50,100],[10,15,25,50,100]],
		order: [1,'asc'],
		drawCallback: function(settings){
			$('[data-toggle="tooltip"]').tooltip();
			$('.dataTables_paginate>ul').addClass('pagination-sm');
		},
		ajax: {
			url: site_url + 'parameter/rekening/rekening/data_rekening_akun',
			type: "post"
		},
		columnDefs: [{
			targets: [0,3],
			orderable: false,
		}],
	});

	$('#rekening-kelompok').DataTable({
		processing: true,
		serverSide: true,
		lengthMenu: [[10,15,25,50,100],[10,15,25,50,100]],
		order: [1,'asc'],
		drawCallback: function(settings){
			$('[data-toggle="tooltip"]').tooltip();
			$('.dataTables_paginate>ul').addClass('pagination-sm');
		},
		ajax: {
			url: site_url + 'parameter/rekening/rekening/data_rekening_kelompok',
			type: "post",
			data: function(data){
				data.akun = $('#akun').val();
			}
		},
		columnDefs: [{
			targets: [0,4],
			orderable: false,
		}],
	});

	$('#rekening-jenis').DataTable({
		processing: true,
		serverSide: true,
		lengthMenu: [[10,15,25,50,100],[10,15,25,50,100]],
		order: [1,'asc'],
		drawCallback: function(settings){
			$('[data-toggle="tooltip"]').tooltip();
			$('.dataTables_paginate>ul').addClass('pagination-sm');
		},
		ajax: {
			url: site_url + 'parameter/rekening/rekening/data_rekening_jenis',
			type: "post",
			data: function(data){
				data.akun = $('#akun').val();
				data.kelompok = $('#kelompok').val();
			}
		},
		columnDefs: [{
			targets: [0,5],
			orderable: false,
		}],
	});

	$('#rekening-obyek').DataTable({
		processing: true,
		serverSide: true,
		lengthMenu: [[10,15,25,50,100],[10,15,25,50,100]],
		order: [1,'asc'],
		drawCallback: function(settings){
			$('[data-toggle="tooltip"]').tooltip();
			$('.dataTables_paginate>ul').addClass('pagination-sm');
		},
		ajax: {
			url: site_url + 'parameter/rekening/rekening/data_rekening_obyek',
			type: "post",
			data: function(data){
				data.akun = $('#akun').val();
				data.kelompok = $('#kelompok').val();
				data.jenis = $('#jenis').val();
			}
		},
		columnDefs: [{
			targets: [0,6],
			orderable: false,
		}],
	});

	$('#rekening-rincian').DataTable({
		processing: true,
		serverSide: true,
		lengthMenu: [[10,15,25,50,100],[10,15,25,50,100]],
		order: [1,'asc'],
		drawCallback: function(settings){
			$('[data-toggle="tooltip"]').tooltip();
			$('.dataTables_paginate>ul').addClass('pagination-sm');
		},
		ajax: {
			url: site_url + 'parameter/rekening/rekening/data_rekening_rincian',
			type: "post",
			data: function(data){
				data.akun = $('#akun').val();
				data.kelompok = $('#kelompok').val();
				data.jenis = $('#jenis').val();
				data.obyek = $('#obyek').val();
			}
		},
		columnDefs: [{
			targets: [0,7],
			orderable: false,
		}],
	});
});

var method;
function message_validation(){$('.message_validation').hide();}
function confirm_message(){$('#confirm_message').hide();}

function rekening_akun_detail(rekening_1){
	method = 'lihat';
	message_validation();
	confirm_message();
	$('.modal-title').text('Detail Rekening Akun');
	$('#form-rekening-akun')[0].reset();
	$('#form-rekening-akun').show();
	$('#btn-submit-akun').hide();
	$('#btn-cancel-akun').text('Tutup');
	$('[name="rekening_1"]').prop('readonly',true);
	$('[name="nama_rekening_1"]').prop('readonly',true);

	$.ajax({
		url: site_url + 'parameter/rekening/rekening/detail_akun/' + rekening_1,
		type: "get",
		dataType: "json",
		success: function(data){
			$('[name="rekening_1"]').val(data.rekening_1);
			$('[name="nama_rekening_1"]').val(data.nama_rekening_1);
			$('#modal-akun').modal('show');
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert('Error get data from ajax');
		}
	});
}

function rekening_kelompok_detail(rekening_1,rekening_2){
	method = 'lihat';
	message_validation();
	confirm_message();
	$('.modal-title').text('Detail Rekening Kelompok');
	$('#form-rekening-kelompok')[0].reset();
	$('#form-rekening-kelompok').show();
	$('#btn-submit-kelompok').hide();
	$('#btn-cancel-kelompok').text('Tutup');
	$('[name="rekening_1"]').prop('readonly',true);
	$('[name="rekening_2"]').prop('readonly',true);
	$('[name="nama_rekening_2"]').prop('readonly',true);

	$.ajax({
		url: site_url + 'parameter/rekening/rekening/detail_kelompok/' + rekening_1 + '/' + rekening_2,
		type: "get",
		dataType: "json",
		success: function(data){
			$('[name="rekening_1"]').val(data.rekening_1);
			$('[name="rekening_2"]').val(data.rekening_2);
			$('[name="nama_rekening_2"]').val(data.nama_rekening_2);
			$('#modal-kelompok').modal('show');
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert('Error get data from ajax');
		}
	});
}

function rekening_jenis_detail(rekening_1,rekening_2,rekening_3){
	method = 'lihat';
	message_validation();
	confirm_message();
	$('.modal-title').text('Detail Rekening Jenis');
	$('#form-rekening-jenis')[0].reset();
	$('#form-rekening-jenis').show();
	$('#btn-submit-jenis').hide();
	$('#btn-cancel-jenis').text('Tutup');
	$('[name="rekening_1"]').prop('readonly',true);
	$('[name="rekening_2"]').prop('readonly',true);
	$('[name="rekening_3"]').prop('readonly',true);
	$('[name="nama_rekening_3"]').prop('readonly',true);

	$.ajax({
		url: site_url + 'parameter/rekening/rekening/detail_jenis/' + rekening_1 + '/' + rekening_2 + '/' + rekening_3,
		type: "get",
		dataType: "json",
		success: function(data){
			$('[name="rekening_1"]').val(data.rekening_1);
			$('[name="rekening_2"]').val(data.rekening_2);
			$('[name="rekening_3"]').val(data.rekening_3);
			$('[name="nama_rekening_3"]').val(data.nama_rekening_3);
			$('#modal-jenis').modal('show');
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert('Error get data from ajax');
		}
	});
}

function rekening_obyek_detail(rekening_1,rekening_2,rekening_3,rekening_4){
	method = 'lihat';
	message_validation();
	confirm_message();
	$('.modal-title').text('Detail Rekening Obyek');
	$('#form-rekening-obyek')[0].reset();
	$('#form-rekening-obyek').show();
	$('#btn-submit-obyek').hide();
	$('#btn-cancel-obyek').text('Tutup');
	$('[name="rekening_1"]').prop('readonly',true);
	$('[name="rekening_2"]').prop('readonly',true);
	$('[name="rekening_3"]').prop('readonly',true);
	$('[name="rekening_4"]').prop('readonly',true);
	$('[name="nama_rekening_4"]').prop('readonly',true);

	$.ajax({
		url: site_url + 'parameter/rekening/rekening/detail_obyek/' + rekening_1 + '/' + rekening_2 + '/' + rekening_3 + '/' + rekening_4,
		type: "get",
		dataType: "json",
		success: function(data){
			$('[name="rekening_1"]').val(data.rekening_1);
			$('[name="rekening_2"]').val(data.rekening_2);
			$('[name="rekening_3"]').val(data.rekening_3);
			$('[name="rekening_4"]').val(data.rekening_4);
			$('[name="nama_rekening_4"]').val(data.nama_rekening_4);
			$('#modal-obyek').modal('show');
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert('Error get data from ajax');
		}
	});
}

function rekening_rincian_detail(rekening_1,rekening_2,rekening_3,rekening_4,rekening_5){
	method = 'lihat';
	message_validation();
	confirm_message();
	$('.modal-title').text('Detail Rekening Rincian');
	$('#form-rekening-rincian')[0].reset();
	$('#form-rekening-rincian').show();
	$('#btn-submit-rincian').hide();
	$('#btn-cancel-rincian').text('Tutup');
	$('[name="rekening_1"]').prop('readonly',true);
	$('[name="rekening_2"]').prop('readonly',true);
	$('[name="rekening_3"]').prop('readonly',true);
	$('[name="rekening_4"]').prop('readonly',true);
	$('[name="rekening_5"]').prop('readonly',true);
	$('[name="nama_rekening_5"]').prop('readonly',true);

	$.ajax({
		url: site_url + 'parameter/rekening/rekening/detail_rincian/' + rekening_1 + '/' + rekening_2 + '/' + rekening_3 + '/' + rekening_4 + '/' + rekening_5,
		type: "get",
		dataType: "json",
		success: function(data){
			$('[name="rekening_1"]').val(data.rekening_1);
			$('[name="rekening_2"]').val(data.rekening_2);
			$('[name="rekening_3"]').val(data.rekening_3);
			$('[name="rekening_4"]').val(data.rekening_4);
			$('[name="rekening_5"]').val(data.rekening_5);
			$('[name="nama_rekening_5"]').val(data.nama_rekening_5);
			$('#modal-rincian').modal('show');
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert('Error get data from ajax');
		}
	});
}

function rekening_akun_tambah(){
	method = 'tambah';
	message_validation();
	confirm_message();
	$('.modal-title').text('Tambah Rekening Akun');
	$('#form-rekening-akun')[0].reset();
	$('#form-rekening-akun').show();
	$('#btn-cancel-akun').text('Batal');
	$('#btn-submit-akun').text('Simpan').show();
	$('#modal-akun').modal('show');
	$('[name="rekening_1"]').prop('readonly', false);
	$('[name="nama_rekening_1"]').prop('readonly', false);
	$('[name="rekening_1"]').trigger('focus');

	$('#btn-submit-akun').on('click', function(){
		if (method === 'tambah'){
			$.ajax({
				url: site_url + "parameter/rekening/rekening/tambah_akun",
				type: "post",
				data: $('#form-rekening-akun').serialize(),
				dataType: "json",
				success: function(response){
					if (response.status == 'true'){
						$('#modal-akun').modal('hide');
						$('#rekening-akun').DataTable().ajax.reload();
					}
					else
					{
						for (var i = 0; i < response.error_field.length; i++)
						{
							$('[name="'+response.error_field[i]+'"]').next().html(response.error_messages[i]).show();
						}
					}
				}
			})
		}
	});
}

function rekening_kelompok_tambah(){
	method = 'tambah';
	akun = $('#akun').val();
	message_validation();
	confirm_message();
	$('.modal-title').text('Tambah Rekening Kelompok');
	$('#form-rekening-kelompok')[0].reset();
	$('#form-rekening-kelompok').show();
	$('#btn-cancel-kelompok').text('Batal');
	$('#btn-submit-kelompok').text('Simpan').show();
	$('#modal-kelompok').modal('show');
	$('[name="rekening_1"]').val(akun);
	$('[name="rekening_1"]').prop('readonly', true);
	$('[name="rekening_2"]').prop('readonly', false);
	$('[name="nama_rekening_2"]').prop('readonly', false);
	$('[name="rekening_2"]').trigger('focus');

	$('#btn-submit-kelompok').on('click', function(){
		if (method === 'tambah'){
			$.ajax({
				url: site_url + "parameter/rekening/rekening/tambah_kelompok",
				type: "post",
				data: $('#form-rekening-kelompok').serialize(),
				dataType: "json",
				success: function(response){
					if (response.status === 'true'){
						$('#modal-kelompok').modal('hide');
						$('#rekening-kelompok').DataTable().ajax.reload();
					}
					else
					{
						for (var i = 0; i < response.error_field.length; i++)
						{
							$('[name="'+response.error_field[i]+'"]').next().html(response.error_messages[i]).show();
						}
					}
				}
			})
		}
	});
}

function rekening_jenis_tambah(){
	method = 'tambah';
	akun = $('#akun').val();
	kelompok = $('#kelompok').val();
	message_validation();
	confirm_message();
	$('.modal-title').text('Tambah Rekening Jenis');
	$('#form-rekening-jenis')[0].reset();
	$('#form-rekening-jenis').show();
	$('#btn-cancel-jenis').text('Batal');
	$('#btn-submit-jenis').text('Simpan').show();
	$('#modal-jenis').modal('show');
	$('[name="rekening_1"]').val(akun);
	$('[name="rekening_2"]').val(kelompok);
	$('[name="rekening_1"]').prop('readonly', true);
	$('[name="rekening_2"]').prop('readonly', true);
	$('[name="rekening_3"]').prop('readonly', false);
	$('[name="nama_rekening_3"]').prop('readonly', false);
	$('[name="rekening_3"]').trigger('focus');

	$('#btn-submit-jenis').on('click', function(){
		if (method === 'tambah'){
			$.ajax({
				url: site_url + "parameter/rekening/rekening/tambah_jenis",
				type: "post",
				data: $('#form-rekening-jenis').serialize(),
				dataType: "json",
				success: function(response){
					if (response.status === 'true'){
						$('#modal-jenis').modal('hide');
						$('#rekening-jenis').DataTable().ajax.reload();
					}
					else
					{
						for (var i = 0; i < response.error_field.length; i++)
						{
							$('[name="'+response.error_field[i]+'"]').next().html(response.error_messages[i]).show();
						}
					}
				}
			})
		}
	});
}

function rekening_obyek_tambah(){
	method = 'tambah';
	akun = $('#akun').val();
	kelompok = $('#kelompok').val();
	jenis = $('#jenis').val();
	message_validation();
	confirm_message();
	$('.modal-title').text('Tambah Rekening Obyek');
	$('#form-rekening-obyek')[0].reset();
	$('#form-rekening-obyek').show();
	$('#btn-cancel-obyek').text('Batal');
	$('#btn-submit-obyek').text('Simpan').show();
	$('#modal-obyek').modal('show');
	$('[name="rekening_1"]').val(akun);
	$('[name="rekening_2"]').val(kelompok);
	$('[name="rekening_3"]').val(jenis);
	$('[name="rekening_1"]').prop('readonly', true);
	$('[name="rekening_2"]').prop('readonly', true);
	$('[name="rekening_3"]').prop('readonly', true);
	$('[name="rekening_4"]').prop('readonly', false);
	$('[name="nama_rekening_4"]').prop('readonly', false);
	$('[name="rekening_4"]').trigger('focus');

	$('#btn-submit-obyek').on('click', function(){
		if (method === 'tambah'){
			$.ajax({
				url: site_url + "parameter/rekening/rekening/tambah_obyek",
				type: "post",
				data: $('#form-rekening-obyek').serialize(),
				dataType: "json",
				success: function(response){
					if (response.status === 'true'){
						$('#modal-obyek').modal('hide');
						$('#rekening-obyek').DataTable().ajax.reload();
					}
					else
					{
						for (var i = 0; i < response.error_field.length; i++)
						{
							$('[name="'+response.error_field[i]+'"]').next().html(response.error_messages[i]).show();
						}
					}
				}
			})
		}
	});
}

function rekening_rincian_tambah(){
	method = 'tambah';
	akun = $('#akun').val();
	kelompok = $('#kelompok').val();
	jenis = $('#jenis').val();
	obyek = $('#obyek').val();
	message_validation();
	confirm_message();
	$('.modal-title').text('Tambah Rekening Rincian');
	$('#form-rekening-rincian')[0].reset();
	$('#form-rekening-rincian').show();
	$('#btn-cancel-rincian').text('Batal');
	$('#btn-submit-rincian').text('Simpan').show();
	$('#modal-rincian').modal('show');
	$('[name="rekening_1"]').val(akun);
	$('[name="rekening_2"]').val(kelompok);
	$('[name="rekening_3"]').val(jenis);
	$('[name="rekening_4"]').val(obyek);
	$('[name="rekening_1"]').prop('readonly', true);
	$('[name="rekening_2"]').prop('readonly', true);
	$('[name="rekening_3"]').prop('readonly', true);
	$('[name="rekening_4"]').prop('readonly', true);
	$('[name="rekening_5"]').prop('readonly', false);
	$('[name="nama_rekening_5"]').prop('readonly', false);
	$('[name="rekening_5"]').trigger('focus');

	$('#btn-submit-rincian').on('click', function(){
		if (method === 'tambah'){
			$.ajax({
				url: site_url + "parameter/rekening/rekening/tambah_rincian",
				type: "post",
				data: $('#form-rekening-rincian').serialize(),
				dataType: "json",
				success: function(response){
					if (response.status === 'true'){
						$('#modal-rincian').modal('hide');
						$('#rekening-rincian').DataTable().ajax.reload();
					}
					else
					{
						for (var i = 0; i < response.error_field.length; i++)
						{
							$('[name="'+response.error_field[i]+'"]').next().html(response.error_messages[i]).show();
						}
					}
				}
			})
		}
	});
}

function rekening_akun_ubah(rekening_1){
	method = 'ubah';
	message_validation();
	confirm_message();
	$('#form-rekening-akun')[0].reset();
	$('#form-rekening-akun').show();
	$('#btn-submit-akun').text('Perbaharui').show();
	$('#btn-cancel-akun').text('Batal');
	$('.modal-title').text('Ubah Rekening Akun');
	$('[name="rekening_1"]').prop('readonly', true);
	$('[name="nama_rekening_1"]').prop('readonly', false);

	$.ajax({
		url: site_url + 'parameter/rekening/rekening/detail_akun/' + rekening_1,
		type: "get",
		dataType: "json",
		success: function(data){
			$('[name="rekening_1"]').val(data.rekening_1);
			$('[name="nama_rekening_1"]').val(data.nama_rekening_1);
			$('#modal-akun').modal('show');
			$('[name="nama_rekening_1"]').trigger('focus');
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert('Error get data from ajax');
		}
	});
}

$('#btn-submit-akun').on('click', function(){
	if (method === 'ubah'){
		$.ajax({
			url: site_url + "parameter/rekening/rekening/perbaharui_akun",
			type: "post",
			data: $('#form-rekening-akun').serialize(),
			dataType: "json",
			success: function(response){
				if (response.status === 'true'){
					$('#modal-akun').modal('hide');
					$('#rekening-akun').DataTable().ajax.reload();
				}
				else
				{
					for (var i = 0; i < response.error_field.length; i++)
					{
						$('[name="'+response.error_field[i]+'"]').next().html(response.error_messages[i]).show();
					}
				}
			}
		})
	}
});

function rekening_kelompok_ubah(rekening_1,rekening_2){
	method = 'ubah';
	message_validation();
	confirm_message();
	$('#form-rekening-kelompok')[0].reset();
	$('#form-rekening-kelompok').show();
	$('#btn-submit-kelompok').text('Perbaharui').show();
	$('#btn-cancel-kelompok').text('Batal');
	$('.modal-title').text('Ubah Rekening Kelompok');
	$('[name="rekening_1"]').prop('readonly', true);
	$('[name="rekening_2"]').prop('readonly', true);
	$('[name="nama_rekening_2"]').prop('readonly', false);

	$.ajax({
		url: site_url + 'parameter/rekening/rekening/detail_kelompok/' + rekening_1 + '/' + rekening_2,
		type: "get",
		dataType: "json",
		success: function(data){
			$('[name="rekening_1"]').val(data.rekening_1);
			$('[name="rekening_2"]').val(data.rekening_2);
			$('[name="nama_rekening_2"]').val(data.nama_rekening_2);
			$('#modal-kelompok').modal('show');
			$('[name="nama_rekening_2"]').trigger('focus');
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert('Error get data from ajax');
		}
	});
}

$('#btn-submit-kelompok').on('click', function(){
	if (method === 'ubah'){
		$.ajax({
			url: site_url + "parameter/rekening/rekening/perbaharui_kelompok",
			type: "post",
			data: $('#form-rekening-kelompok').serialize(),
			dataType: "json",
			success: function(response){
				if (response.status === 'true'){
					$('#modal-kelompok').modal('hide');
					$('#rekening-kelompok').DataTable().ajax.reload();
				}
				else
				{
					for (var i = 0; i < response.error_field.length; i++)
					{
						$('[name="'+response.error_field[i]+'"]').next().html(response.error_messages[i]).show();
					}
				}
			}
		})
	}
});

function rekening_jenis_ubah(rekening_1,rekening_2,rekening_3){
	method = 'ubah';
	message_validation();
	confirm_message();
	$('#form-rekening-jenis')[0].reset();
	$('#form-rekening-jenis').show();
	$('#btn-submit-jenis').text('Perbaharui').show();
	$('#btn-cancel-jenis').text('Batal');
	$('.modal-title').text('Ubah Rekening Jenis');
	$('[name="rekening_1"]').prop('readonly', true);
	$('[name="rekening_2"]').prop('readonly', true);
	$('[name="rekening_3"]').prop('readonly', true);
	$('[name="nama_rekening_3"]').prop('readonly', false);

	$.ajax({
		url: site_url + 'parameter/rekening/rekening/detail_jenis/' + rekening_1 + '/' + rekening_2 + '/' + rekening_3,
		type: "get",
		dataType: "json",
		success: function(data){
			$('[name="rekening_1"]').val(data.rekening_1);
			$('[name="rekening_2"]').val(data.rekening_2);
			$('[name="rekening_3"]').val(data.rekening_3);
			$('[name="nama_rekening_3"]').val(data.nama_rekening_3);
			$('#modal-jenis').modal('show');
			$('[name="nama_rekening_3"]').trigger('focus');
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert('Error get data from ajax');
		}
	});
}

$('#btn-submit-jenis').on('click', function(){
	if (method === 'ubah'){
		$.ajax({
			url: site_url + "parameter/rekening/rekening/perbaharui_jenis",
			type: "post",
			data: $('#form-rekening-jenis').serialize(),
			dataType: "json",
			success: function(response){
				if (response.status === 'true'){
					$('#modal-jenis').modal('hide');
					$('#rekening-jenis').DataTable().ajax.reload();
				}
				else
				{
					for (var i = 0; i < response.error_field.length; i++)
					{
						$('[name="'+response.error_field[i]+'"]').next().html(response.error_messages[i]).show();
					}
				}
			}
		})
	}
});

function rekening_obyek_ubah(rekening_1,rekening_2,rekening_3,rekening_4){
	method = 'ubah';
	message_validation();
	confirm_message();
	$('#form-rekening-obyek')[0].reset();
	$('#form-rekening-obyek').show();
	$('#btn-submit-obyek').text('Perbaharui').show();
	$('#btn-cancel-obyek').text('Batal');
	$('.modal-title').text('Ubah Rekening Obyek');
	$('[name="rekening_1"]').prop('readonly', true);
	$('[name="rekening_2"]').prop('readonly', true);
	$('[name="rekening_3"]').prop('readonly', true);
	$('[name="rekening_4"]').prop('readonly', true);
	$('[name="nama_rekening_4"]').prop('readonly', false);

	$.ajax({
		url: site_url + 'parameter/rekening/rekening/detail_obyek/' + rekening_1 + '/' + rekening_2 + '/' + rekening_3 + '/' + rekening_4,
		type: "get",
		dataType: "json",
		success: function(data){
			$('[name="rekening_1"]').val(data.rekening_1);
			$('[name="rekening_2"]').val(data.rekening_2);
			$('[name="rekening_3"]').val(data.rekening_3);
			$('[name="rekening_4"]').val(data.rekening_4);
			$('[name="nama_rekening_4"]').val(data.nama_rekening_4);
			$('#modal-obyek').modal('show');
			$('[name="nama_rekening_4"]').trigger('focus');
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert('Error get data from ajax');
		}
	});
}

$('#btn-submit-obyek').on('click', function(){
	if (method === 'ubah'){
		$.ajax({
			url: site_url + "parameter/rekening/rekening/perbaharui_obyek",
			type: "post",
			data: $('#form-rekening-obyek').serialize(),
			dataType: "json",
			success: function(response){
				if (response.status === 'true'){
					$('#modal-obyek').modal('hide');
					$('#rekening-obyek').DataTable().ajax.reload();
				}
				else
				{
					for (var i = 0; i < response.error_field.length; i++)
					{
						$('[name="'+response.error_field[i]+'"]').next().html(response.error_messages[i]).show();
					}
				}
			}
		})
	}
});

function rekening_rincian_ubah(rekening_1,rekening_2,rekening_3,rekening_4,rekening_5){
	method = 'ubah';
	message_validation();
	confirm_message();
	$('#form-rekening-rincian')[0].reset();
	$('#form-rekening-rincian').show();
	$('#btn-submit-rincian').text('Perbaharui').show();
	$('#btn-cancel-rincian').text('Batal');
	$('.modal-title').text('Ubah Rekening Rincian');
	$('[name="rekening_1"]').prop('readonly', true);
	$('[name="rekening_2"]').prop('readonly', true);
	$('[name="rekening_3"]').prop('readonly', true);
	$('[name="rekening_4"]').prop('readonly', true);
	$('[name="rekening_5"]').prop('readonly', true);
	$('[name="nama_rekening_5"]').prop('readonly', false);

	$.ajax({
		url: site_url + 'parameter/rekening/rekening/detail_rincian/' + rekening_1 + '/' + rekening_2 + '/' + rekening_3 + '/' + rekening_4 + '/' + rekening_5,
		type: "get",
		dataType: "json",
		success: function(data){
			$('[name="rekening_1"]').val(data.rekening_1);
			$('[name="rekening_2"]').val(data.rekening_2);
			$('[name="rekening_3"]').val(data.rekening_3);
			$('[name="rekening_4"]').val(data.rekening_4);
			$('[name="rekening_5"]').val(data.rekening_5);
			$('[name="nama_rekening_5"]').val(data.nama_rekening_5);
			$('#modal-rincian').modal('show');
			$('[name="nama_rekening_5"]').trigger('focus');
		},
		error: function(jqXHR,textStatus,errorThrown){
			alert('Error get data from ajax');
		}
	});
}

$('#btn-submit-rincian').on('click', function(){
	if (method === 'ubah'){
		$.ajax({
			url: site_url + "parameter/rekening/rekening/perbaharui_rincian",
			type: "post",
			data: $('#form-rekening-rincian').serialize(),
			dataType: "json",
			success: function(response){
				if (response.status === 'true'){
					$('#modal-rincian').modal('hide');
					$('#rekening-rincian').DataTable().ajax.reload();
				}
				else
				{
					for (var i = 0; i < response.error_field.length; i++)
					{
						$('[name="'+response.error_field[i]+'"]').next().html(response.error_messages[i]).show();
					}
				}
			}
		})
	}
});

$('#rekening-akun').on('click', '.btn-delete-akun', function(){
	method = 'hapus';
	var rekening_1 = $(this).attr('rekening_1');
	$('.modal-title').text('Konfirmasi Hapus Rekening Akun');
	$('#confirm_message').html('<p>Anda yakin akan menghapus data rekening akun "' + rekening_1 + '" ini?</p><input type="hidden" id="rekening_1" name="rekening_1" value="' + rekening_1 + '">').show();
	$('#form-rekening-akun').hide();
	$('#btn-submit-akun').text('Ya, hapus').show();
	$('#btn-cancel-akun').text('Tidak').show();
	$('#modal-akun').modal('show');
});

$('#btn-submit-akun').on('click', function(){
	var rekening_1 = $('#rekening_1').val();
	if (method === 'hapus'){
		$.ajax({
			url: site_url + "parameter/rekening/rekening/hapus_akun/" + rekening_1,
			type: "post",
			dataType: "json",
			success: function(){
				$('#modal-akun').modal('hide');
				$('#rekening-akun').DataTable().ajax.reload();
			}
		})
	}
})

$('#rekening-kelompok').on('click', '.btn-delete-kelompok', function(){
	method = 'hapus';
	var rekening_1 = $(this).attr('rekening_1');
	var rekening_2 = $(this).attr('rekening_2');
	$('.modal-title').text('Konfirmasi Hapus Rekening Kelompok');
	$('#confirm_message').html('<p>Anda yakin akan menghapus data rekening kelompok "' + rekening_1 + '.' + rekening_2 + '" ini?</p><input type="hidden" id="rekening_1" name="rekening_1" value="' + rekening_1 + '"><input type="hidden" id="rekening_2" name="rekening_2" value="' + rekening_2 + '">').show();
	$('#form-rekening-kelompok').hide();
	$('#btn-submit-kelompok').text('Ya, hapus').show();
	$('#btn-cancel-kelompok').text('Tidak').show();
	$('#modal-kelompok').modal('show');
});

$('#btn-submit-kelompok').on('click', function(){
	var rekening_1 = $('#rekening_1').val();
	var rekening_2 = $('#rekening_2').val();
	if (method === 'hapus'){
		$.ajax({
			url: site_url + "parameter/rekening/rekening/hapus_kelompok/" + rekening_1 + "/" + rekening_2,
			type: "post",
			dataType: "json",
			success: function(){
				$('#modal-kelompok').modal('hide');
				$('#rekening-kelompok').DataTable().ajax.reload();
			}
		})
	}
})

$('#rekening-jenis').on('click', '.btn-delete-jenis', function(){
	method = 'hapus';
	var rekening_1 = $(this).attr('rekening_1');
	var rekening_2 = $(this).attr('rekening_2');
	var rekening_3 = $(this).attr('rekening_3');
	$('.modal-title').text('Konfirmasi Hapus Rekening Jenis');
	$('#confirm_message').html('<p>Anda yakin akan menghapus data rekening jenis "' + rekening_1 + '.' + rekening_2 + '.' + rekening_3 + '" ini?</p><input type="hidden" id="rekening_1" name="rekening_1" value="' + rekening_1 + '"><input type="hidden" id="rekening_2" name="rekening_2" value="' + rekening_2 + '"><input type="hidden" id="rekening_3" name="rekening_3" value="' + rekening_3 + '">').show();
	$('#form-rekening-jenis').hide();
	$('#btn-submit-jenis').text('Ya, hapus').show();
	$('#btn-cancel-jenis').text('Tidak').show();
	$('#modal-jenis').modal('show');
});

$('#btn-submit-jenis').on('click', function(){
	var rekening_1 = $('#rekening_1').val();
	var rekening_2 = $('#rekening_2').val();
	var rekening_3 = $('#rekening_3').val();
	if (method === 'hapus'){
		$.ajax({
			url: site_url + "parameter/rekening/rekening/hapus_jenis/" + rekening_1 + "/" + rekening_2 + "/" + rekening_3,
			type: "post",
			dataType: "json",
			success: function(){
				$('#modal-jenis').modal('hide');
				$('#rekening-jenis').DataTable().ajax.reload();
			}
		})
	}
})

$('#rekening-obyek').on('click', '.btn-delete-obyek', function(){
	method = 'hapus';
	var rekening_1 = $(this).attr('rekening_1');
	var rekening_2 = $(this).attr('rekening_2');
	var rekening_3 = $(this).attr('rekening_3');
	var rekening_4 = $(this).attr('rekening_4');
	$('.modal-title').text('Konfirmasi Hapus Rekening Obyek');
	$('#confirm_message').html('<p>Anda yakin akan menghapus data rekening obyek "' + rekening_1 + '.' + rekening_2 + '.' + rekening_3 + '.' + rekening_4 + '" ini?</p><input type="hidden" id="rekening_1" name="rekening_1" value="' + rekening_1 + '"><input type="hidden" id="rekening_2" name="rekening_2" value="' + rekening_2 + '"><input type="hidden" id="rekening_3" name="rekening_3" value="' + rekening_3 + '"><input type="hidden" id="rekening_4" name="rekening_4" value="' + rekening_4 + '">').show();
	$('#form-rekening-obyek').hide();
	$('#btn-submit-obyek').text('Ya, hapus').show();
	$('#btn-cancel-obyek').text('Tidak').show();
	$('#modal-obyek').modal('show');
});

$('#btn-submit-obyek').on('click', function(){
	var rekening_1 = $('#rekening_1').val();
	var rekening_2 = $('#rekening_2').val();
	var rekening_3 = $('#rekening_3').val();
	var rekening_4 = $('#rekening_4').val();
	if (method === 'hapus'){
		$.ajax({
			url: site_url + "parameter/rekening/rekening/hapus_obyek/" + rekening_1 + "/" + rekening_2 + "/" + rekening_3 + "/" + rekening_4,
			type: "post",
			dataType: "json",
			success: function(){
				$('#modal-obyek').modal('hide');
				$('#rekening-obyek').DataTable().ajax.reload();
			}
		})
	}
})

$('#rekening-rincian').on('click', '.btn-delete-rincian', function(){
	method = 'hapus';
	var rekening_1 = $(this).attr('rekening_1');
	var rekening_2 = $(this).attr('rekening_2');
	var rekening_3 = $(this).attr('rekening_3');
	var rekening_4 = $(this).attr('rekening_4');
	var rekening_5 = $(this).attr('rekening_5');
	$('.modal-title').text('Konfirmasi Hapus Rekening Rincian');
	$('#confirm_message').html('<p>Anda yakin akan menghapus data rekening rincian "' + rekening_1 + '.' + rekening_2 + '.' + rekening_3 + '.' + rekening_4 + '.' + rekening_5 + '" ini?</p><input type="hidden" id="rekening_1" name="rekening_1" value="' + rekening_1 + '"><input type="hidden" id="rekening_2" name="rekening_2" value="' + rekening_2 + '"><input type="hidden" id="rekening_3" name="rekening_3" value="' + rekening_3 + '"><input type="hidden" id="rekening_4" name="rekening_4" value="' + rekening_4 + '"><input type="hidden" id="rekening_5" name="rekening_5" value="' + rekening_5 + '">').show();
	$('#form-rekening-rincian').hide();
	$('#btn-submit-rincian').text('Ya, hapus').show();
	$('#btn-cancel-rincian').text('Tidak').show();
	$('#modal-rincian').modal('show');
});

$('#btn-submit-rincian').on('click', function(){
	var rekening_1 = $('#rekening_1').val();
	var rekening_2 = $('#rekening_2').val();
	var rekening_3 = $('#rekening_3').val();
	var rekening_4 = $('#rekening_4').val();
	var rekening_5 = $('#rekening_5').val();
	if (method === 'hapus'){
		$.ajax({
			url: site_url + "parameter/rekening/rekening/hapus_rincian/" + rekening_1 + "/" + rekening_2 + "/" + rekening_3 + "/" + rekening_4 + "/" + rekening_5,
			type: "post",
			dataType: "json",
			success: function(){
				$('#modal-rincian').modal('hide');
				$('#rekening-rincian').DataTable().ajax.reload();
			}
		})
	}
})
