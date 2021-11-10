<?php
	$profil = $this->model_administrator->profil_data();
	$new_message = $this->model_administrator->new_message(10);
?>

<!doctype html>
<html lang="en">
	<?php
		include "header.php";
		include "navbar.php";
		include "content.php";
		include "footer.php";
	?>
</html>
