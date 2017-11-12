<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Teacher;
use app\index\model\Classes;

class ClassesController extends Controller
{
	public function index()
	{
		// $data = Classes::all();
		$data = Classes::paginate(3);
		$this->assign('result', $data);
		return $this->fetch();
	}
	public function addclasses()
	{
		// $all = Db::name('classes')
		// ->select();
		$all = Teacher::all(['ttype'=>1]);
		$this->assign('all',$all);
		return $this->fetch();
	}
	public function addc(Request $request)
	{
		$classes = new Classes;
		$classes->year = $request->post('year');
		$classes->major = $request->post('major');
		$classes->subclass = $request->post('subclass');
		$classes->teacher_id = $request->post('teacher_id');
		if ($classes->save()) {
			return '班级[ ' . $classes->year. $classes->major.$classes->subclass. ':' . $classes->id . ' ]新增成功';
		} else {
			return $classes->getError();
		}
	}
	public function deletec($id)
	{
		$classes = Classes::get($id);
		if ($classes) {
			$classes->delete();
			return '删除班级成功';
		} else {
			return '删除的班级不存在';
		}
	}
	public function editclasses($id)
	{
		$single = Classes::get($id);
		$all = Teacher::all(['ttype'=>1]);
		$this->assign('single', $single);
		$this->assign('all',$all);
		return $this->fetch();
	}
	public function editc(Request $request,$id)
	{
		$classes = Classes::get($id);
		if(	$classes->year == $request->post('year')&&
			$classes->major == $request->post('major')&&
			$classes->subclass == $request->post('subclass')&&
			$classes->teacher_id == $request->post('teacher_id'))
		{
			return '未修改任何值！';
		}
		else
		{
			$classes->year =$request->post('year');
			$classes->major =$request->post('major');
			$classes->subclass =$request->post('subclass');
			$classes->teacher_id =$request->post('teacher_id');
			$classes->save();
			return '修改班级成功！';
		}
	}
}