<?php
	$icon = $this->db->query("SELECT pengaturan_icon FROM tabel_pengaturan LIMIT 1")->row_array();
	echo "$icon[pengaturan_icon]";
?>
