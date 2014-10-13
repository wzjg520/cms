<?php
/*
* CMS VERSION 1.0
* ----------------------------------------
* COPY	2012-1013
* WEB :HTTP://jiajun.com
* =======================
* AUTHOR:WANG
* DATE:2014.3.11
* */
require dirname(__dir__).'/init.inc.php';
isset($_SESSION['admin'])?Tool::alertLocation(null, 'admin.php'):Tool::alertLocation(null, 'admin_login.php');




?>