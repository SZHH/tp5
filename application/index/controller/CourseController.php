<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Course;
use app\index\model\Teacher;

class CourseController extends Controller
{
	public function index()
	{
		// $data = Course::all();
		$data = Course::paginate(3);
		$this->assign('result', $data);
		return $this->fetch();
	}
	public function addcourse()
	{
		$all = Teacher::all(['ttype'=>2]);
		$this->assign('all',$all);
		return $this->fetch();
	}
	public function addco(Request $request)
	{
		$course = new Course;
		$course->coname = $request->post('coname');
		$course->teacher_id = $request->post('teacher_id');
		if ($course->save()) {
			return '课程[ ' . $course->coname. ':' . $course->id . ' ]新增成功';
		} else {
			return $course->getError();
		}
	}
	public function deleteco($id)
	{
		$course = Course::get($id);
		if ($course) {
			$course->delete();
			return '删除课程成功';
		} else {
			return '删除的课程不存在';
		}
	}
	public function editcourse($id)
	{
		$single = Course::get($id);
		$all = Teacher::all(['ttype'=>2]);
		$this->assign('single', $single);
		$this->assign('all',$all);
		return $this->fetch();
	}
	public function editco(Request $request,$id)
	{
		$course = Course::get($id);
		if(	$course->coname == $request->post('coname')&&
			$course->teacher_id == $request->post('teacher_id'))
		{
			return '未修改任何值！';
		}
		else
		{
			$course->coname =$request->post('coname');
			$course->teacher_id =$request->post('teacher_id');
			$course->save();
			return '修改课程成功';
		}
	}
}