<?php
include "header.php";
$page = isset ($_GET['page']) ? $_GET['page'] : false;
switch ($page) {
	case"":
			include "dashboard.php";
			break;
	// case"login":
	// 		include "login_1/loginsubmit.php";
	// 		break;
	// case"logout":
	// 		include "login_1/logout.php";
	// 		break;
	// case"get_password":
	// 		include "login_1/get_password.php";
	// 		break;
	case"home":
			include "dashboard.php";
			break;
	case"bp-1":
			include "bp1.php";
			break;	
	case"bp-2":
			include "bp2.php";
			break;	
	case"bp-4":
			include "bp4.php";
			break;
	case"bp-5":
			include "bp5.php";
			break;	
	case"bp-8":
			include "bp8.php";
			break;	
	case"bp-13":
			include "bp13.php";
			break;	
	case"bp-15":
			include "bp15.php";
			break;	
	case"bp-17":
			include "bp17.php";
			break;	
	case"bp-19":
			include "bp19.php";
			break;
	case"bendung-cakura":
			include "bp_cakura.php";
			break;	
	case"bendung-jenemarung":
			include "bp_jenemarung.php";
			break;	
	case"bendung-pamukkulu":
			include "bp_pamukkulu.php";
			break;	
	case"data-level":
				include "datalevel.php";
				break;	
	case"contact":
				include "contact.php";
				break;	
	case"lokasi":
				include "bp1.php";
				break;	
}

include "footer.php";
?>