<?php
namespace app\demo\controller;

use think\Controller;
use app\demo\model\Tie;
use app\demo\model\Ba;
use think\Request;
use think\Db;

class TieController extends Controller
{
    public function index($id)
    {
        $single = Tie::get($id);
        $data = Db::query('select * from tie where pid = '.$single->id.' or id = '.$single->id);
        // $data = Tie::all();
        $this->assign('result', $data);
        return $this->fetch();
    }
    public function addtie()
    {
        $data = Ba::all();
        $this->assign('result', $data);
        return $this->fetch();
    }
    public function addt(Request $request)
    {
        $tie = new Tie;
        $tie->title = $request->post('title');
        $tie->content = $request->post('content');
        $tie->postdate = date("Y-m-d H:i:s");
        $tie->ba_id = $request->post('ba_id');
        if ($tie->save()) {
        	return '帖子[ ' . $tie->title . ' ]发布成功';
        } else {
        	return $tie->getError();
        }
    }
    public function gentie($id)
    {
        $single = Tie::get($id);
        $this->assign('result', $single);
        return $this->fetch();
    }
    public function gent(Request $request)
    {
        $tie = new Tie;
        $tie->content = $request->post('content');
        $tie->postdate = date("Y-m-d H:i:s");
        $tie->pid = $request->post('pid');
        $tie->ba_id = $request->post('ba_id');
        if ($tie->save()) {
        	return '跟帖成功';
        } else {
        	return $tie->getError();
        }
    }
    public function huifutie($id)
    {
        $single = Tie::get($id);
        $this->assign('result', $single);
        return $this->fetch();
    }
    public function huifut(Request $request)
    {
        $tie = new Tie;
        $tie->content = $request->post('content');
        $tie->postdate = date("Y-m-d H:i:s");
        $tie->pid = $request->post('pid');
        $tie->qid = $request->post('qid');
        $tie->ba_id = $request->post('ba_id');
        if ($tie->save()) {
        	return '回复成功';
        } else {
        	return $tie->getError();
        }
    }
}
