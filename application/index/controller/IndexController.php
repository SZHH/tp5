<?php
namespace app\index\controller;

use think\Controller;

class IndexController extends Controller
{
	public function index()
	{
		$data = "";
		$this->assign('result', $data);
		return $this->fetch();
	}
	
}
