<?php

    // these two constants are used to create root-relative web addresses
    // and absolute server paths throughout all the code

	define("BASE_URL","/");
	define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/");

	define("DB_HOST","localhost");
	define("DB_NAME","yugioh");
	define("DB_PORT","8889"); // default: 3306
	define("DB_USER","root");
	define("DB_PASS","root");