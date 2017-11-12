<?php
namespace app\demo\controller;

use think\Controller;
use app\demo\model\Ba;
use think\Request;
use think\Db;

class BaController extends Controller
{
    public function index($id)
    {
        $single = Ba::get($id);
        $data = Db::query('select * from tie where pid = 0 and ba_id = '.$single->id.' order by id desc');
        // $data = Tie::all();
        $this->assign('result', $data);
        return $this->fetch();
    }
}
