<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
		<title>Cetak Rekening Kelompok</title>
	</head>

	<body>

		<table cellspacing="0" style="width:100%; border-collapse:collapse;">
			<thead>
				<tr>
					<th style="border:1px solid #000; padding:5px;">No.</th>
					<th style="border:1px solid #000; padding:5px;">Rekening 1</th>
					<th style="border:1px solid #000; padding:5px;">Rekening 2</th>
					<th style="border:1px solid #000; padding:5px;">Nama Rekening</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($kelompok as $data){
						echo "<tr>";
						echo "<td style='width:7%; border:1px solid #000; padding:5px;'>" . $no . "</td>";
						echo "<td style='width:10%; border:1px solid #000; padding:5px;'>" . $data->rekening_1 . "</td>";
						echo "<td style='width:10%; border:1px solid #000; padding:5px;'>" . $data->rekening_2 . "</td>";
						echo "<td style='width:70%; border:1px solid #000; padding:5px;'>" . $data->nama_rekening_2 . "</td>";
						echo "</tr>";
						$no++;
					}
				?>
			</tbody>
		</table>

	</body>
</html>
