 
<?php 
require"scripts/connection/connection_db.php";

if (isset($_GET['report'])) {
	if ($_GET['report']==1) {
require"scripts/home/printer_cuts/EReport.php";	
	}

	if ($_GET['report']==2) {
		if ($_GET['type']==1) {
			require"scripts/home/printer_cuts/SDReport.php";
		}
		if ($_GET['type']==2) {
			require"scripts/home/printer_cuts/SMReport.php";
		}

		
	}
	if ($_GET['report']==3) {
	require"scripts/home/printer_cuts/SReport.php";	
	}
}
?>