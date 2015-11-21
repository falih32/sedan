<?php
require "classConversi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<SCRIPT LANGUAGE="JavaScript">
function setFocus() {
		document.form1.data.select();
		document.form1.data.focus();
	}
</script>
<title>Angka</title>
</head>
<body onload="javascript:setFocus()">
<form id="form1" name="form1" method="post" action="">
  <input type="text" name="data" />
  <input type="submit" name="Submit" value="Convert" />
</form>
</body>
</html>
<br><br>
<?php
//membuat objek
$oConver = new classConversi();

$data = $_POST['data'];
//memberikan titik angka
$titik = number_format($data, 0, '','.');
$cAngka = $oConver->conversiAngka($data);
$b = ucfirst(strtolower($cAngka));
echo "<br>$data";
echo "<br>$titik";
echo "<br>Terbilang :<b> $b</b><br>";
?>