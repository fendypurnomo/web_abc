<?php
	function minify($buffer)
	{
		$protected_parts = array('<pre>,</pre>','<,>');
		$extracted_values = array();
		$i = 0;

		foreach ($protected_parts as $part)
		{
			$finished = false;
			$search_offset = $first_offset = 0;
			$end_offset = 1;
			$startend = explode(',', $part);

			if (count($startend) === 1) $startend[1] = $startend[0];
			$len0 = strlen($startend[0]); $len1 = strlen($startend[1]);

			while ($finished === false)
			{
				$first_offset = strpos($buffer, $startend[0], $search_offset);

				if ($first_offset === false) $finished = true;
				else
				{
					$search_offset = strpos($buffer, $startend[1], $first_offset + $len0);
					$extracted_values[$i] = substr($buffer, $first_offset + $len0, $search_offset - $first_offset - $len0);
					$buffer = substr($buffer, 0, $first_offset + $len0).'$$#'.$i.'$$'.substr($buffer, $search_offset);
					$search_offset += $len1 + strlen((string)$i) + 5 - strlen($extracted_values[$i]);
					++$i;
				}
			}
		}

		$buffer = preg_replace("/s/", " ", $buffer);
		$buffer = preg_replace("/s{2,}/", " ", $buffer);
		$replace = array('> <'=>'><', ' >'=>'>','< '=>'<','</ '=>'</');
		$buffer = str_replace(array_keys($replace), array_values($replace), $buffer);

		for ($d = 0; $d < $i; ++$d)
			$buffer = str_replace('$$#'.$d.'$$', $extracted_values[$d], $buffer);
		return $buffer;
	}
?>

<?php ob_start("minify") ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Minified HTML Page</title>
	</head>
	<body>Content Web</body>
</html>
<?php ob_end_flush() ?>
