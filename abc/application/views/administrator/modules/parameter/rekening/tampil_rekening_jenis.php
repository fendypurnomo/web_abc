<div class="p-3 min-h-content-page">
	<div class="row">
		<div class="col text-left">
			<h6>Tabel Parameter Rekening</h6>
			<nav class="mb-3" aria-label="breadcrumb">
				<?= $this->breadcrumbs->show(); ?>
			</nav>
		</div>

		<div class="col-2 text-right">
			<button type="button" class="btn btn-sm btn-outline-primary rounded-pill waves-effect waves-light" onclick="rekening_jenis_tambah()">Tambah</button>
			<a class="btn btn-sm btn-outline-info rounded-pill waves-effect waves-light" href="<?= base_url() . "parameter/rekening/rekening/cetak_rekening_jenis/" . $this->uri->segment(4) ."/". $this->uri->segment(5) ?>" target="_blank">Cetak</a>
		</div>
	</div>

	<table class="table table-bordered table-borderless table-responsive-sm table-sm rounded table-border-td" style="width:100%;">
		<tbody>
			<tr>
				<td width="6%">Akun</td>
				<td width="9%">: <?= $this->uri->segment(4) ?></td>
				<td>: <?= $row->nama_rekening_1 ?></td>
			</tr>
			<tr>
				<td>Kelompok</td>
				<td>: <?= $this->uri->segment(4).'.'.$this->uri->segment(5) ?></td>
				<td>: <?= $row->nama_rekening_2 ?></td>
			</tr>
		</tbody>
	</table>

	<table class="table table-striped table-bordered table-borderless table-hover table-responsive-sm table-sm rounded table-border-td" id="rekening-jenis" style="width:100%;">
		<thead>
			<tr>
				<th width="6%">No.</th>
				<th width="9%">Rekening 1</th>
				<th width="9%">Rekening 2</th>
				<th width="9%">Rekening 3</th>
				<th>Nama Rekening</th>
				<th width="9%">Aksi</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th class="border-top">No.</th>
				<th class="border-top">Rekening 1</th>
				<th class="border-top">Rekening 2</th>
				<th class="border-top">Rekening 3</th>
				<th class="border-top">Nama Rekening</th>
				<th class="border-top">Aksi</th>
			</tr>
		</tfoot>
	</table>
</div>

<input type="hidden" id="akun" value="<?= $this->uri->segment(4) ?>"/>
<input type="hidden" id="kelompok" value="<?= $this->uri->segment(5) ?>"/>

<div class="modal" id="modal-jenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="detail-jenis-label"></h6>
			</div>
			<div class="modal-body">
				<form id="form-rekening-jenis" action="#">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Rekening 1</label>
						<input type="text" class="form-control form-control-sm rounded-pill" name="rekening_1">
						<div class="text-danger message_validation"></div>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Rekening 2</label>
						<input type="text" class="form-control form-control-sm rounded-pill" name="rekening_2">
						<div class="text-danger message_validation"></div>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Rekening 3</label>
						<input type="text" class="form-control form-control-sm rounded-pill" name="rekening_3">
						<div class="text-danger message_validation"></div>
					</div>
					<div class="form-group">
						<label for="message-text" class="col-form-label">Nama Rekening 3</label>
						<textarea class="form-control form-control-sm" name="nama_rekening_3"></textarea>
						<div class="text-danger message_validation"></div>
					</div>
				</form>
				<div id="confirm_message"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-outline-danger rounded-pill waves-effect waves-light" id="btn-cancel-jenis" data-dismiss="modal"></button>
				<button type="button" class="btn btn-sm btn-outline-primary rounded-pill waves-effect waves-light" id="btn-submit-jenis"></button>
			</div>
		</div>
	</div>
</div>
