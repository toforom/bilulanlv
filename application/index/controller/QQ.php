<?php
namespace app\index\controller;
use extend\QQ\PHPMailer;

class QQ
{
    public function index()
    {
    	$qc = new QC();
		$qc->qq_login();
		echo '11';
    }
}
