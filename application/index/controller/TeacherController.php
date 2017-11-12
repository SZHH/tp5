<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Teacher;

class TeacherController extends Controller
{
	public function index()
	{
		// $data = Teacher::all();
		$data = Teacher::paginate(3);
		$this->assign('result', $data);
		return $this->fetch();
	}
	public function addteacher()
	{
		$all = "";
		$this->assign('all',$all);
		return $this->fetch();
	}
	public function addt(Request $request)
	{
		$teacher = new Teacher;
		$teacher->tname = $request->post('tname');
		$teacher->ttype = $request->post('ttype');
		if ($teacher->save()) {
			return '教师[ ' . $teacher->tname. ':' . $teacher->id . ' ]新增成功';
		} else {
			return $teacher->getError();
		}
	}
	public function deletet($id)
	{
		$teacher = Teacher::get($id);
		if ($teacher) {
			$teacher->delete();
			return '删除教师成功';
		} else {
			return '删除的教师不存在';
		}
	}
	public function editteacher($id)
	{
		$single = Teacher::get($id);
		$this->assign('single', $single);
		return $this->fetch();
	}
	public function editt(Request $request,$id)
	{
		$teacher = Teacher::get($id);
		if(	$teacher->tname == $request->post('tname')&&
			$teacher->ttype == $request->post('ttype'))
		{
			return '未修改任何值！';
		}
		else
		{
			$teacher->tname =$request->post('tname');
			$teacher->ttype =$request->post('ttype');
			$teacher->save();
			return '修改教师成功';
		}
	}
}