<?php
namespace app\demo\controller;

use think\Controller;
use app\demo\model\Ba;
use think\Request;
use think\Db;

class IndexController extends Controller
{
    public function index()
    {
        // $data = Db::query('select * from ba');
        $data = Ba::all();
        $this->assign('result', $data);
        return $this->fetch();
    }
}
