<div class="p-3 min-h-content-page">
	<div class="row">
		<div class="col text-left">
			<h6>Tabel Parameter Rekening</h6>
			<nav class="mb-3" aria-label="breadcrumb">
				<?= $this->breadcrumbs->show(); ?>
			</nav>
		</div>

		<div class="col-2 text-right">
			<button type="button" class="btn btn-sm btn-outline-primary rounded-pill waves-effect waves-light" onclick="rekening_akun_tambah()">Tambah</button>
			<a class="btn btn-sm btn-outline-info rounded-pill waves-effect waves-light" href="<?= base_url() ?>parameter/rekening/rekening/cetak_rekening_akun" target="_blank">Cetak</a>
		</div>
	</div>

	<table class="table table-striped table-bordered table-borderless table-hover table-responsive-sm table-sm rounded table-border-td" id="rekening-akun" style="width:100%;">
		<thead>
			<tr>
				<th width="6%">No.</th>
				<th width="9%">Rekening 1</th>
				<th>Nama Rekening</th>
				<th width="9%">Aksi</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th class="border-top">No.</th>
				<th class="border-top">Rekening 1</th>
				<th class="border-top">Nama Rekening</th>
				<th class="border-top">Aksi</th>
			</tr>
		</tfoot>
	</table>
</div>

<div class="modal" id="modal-akun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="detail-akun-label"></h6>
			</div>
			<div class="modal-body">
				<form id="form-rekening-akun">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Rekening 1</label>
						<input type="text" class="form-control form-control-sm rounded-pill" name="rekening_1">
						<div class="text-danger message_validation"></div>
					</div>
					<div class="form-group">
						<label for="message-text" class="col-form-label">Nama Rekening 1</label>
						<textarea class="form-control form-control-sm" name="nama_rekening_1"></textarea>
						<div class="text-danger message_validation"></div>
					</div>
				</form>
				<div id="confirm_message"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-outline-danger rounded-pill waves-effect waves-light" id="btn-cancel-akun" data-dismiss="modal"></button>
				<button type="button" class="btn btn-sm btn-outline-primary rounded-pill waves-effect waves-light" id="btn-submit-akun"></button>
			</div>
		</div>
	</div>
</div>
