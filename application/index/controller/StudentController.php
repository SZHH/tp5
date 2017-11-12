<?php
namespace app\index\controller;

// class Index
// {
//     public function index()
//     {
//         return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
//     }
// }

// class HelloWorld
// {
// 	public function index($name = 'World')
// 	{
// 		return 'Hello,' . $name . '！';
// 	}
// }

// use think\Controller;
// class Index extends Controller
// {
// 	public function hello($name = 'thinkphp')
// 	{
// 		$this->assign('name', $name);
// 		return $this->fetch();
// 	}
// }

use think\Controller;
use think\Request;
use app\index\model\Student;
use app\index\model\Classes;
use think\Db;

class StudentController extends Controller
{
	public function index()
	{
		// $data = Db::query('select * from student');
		// $data = Db::view('student','id,name,age,sex')
		// ->view('classes',['year,major,subclass'],'classes.cid=student.cid')
		// ->select();
		// $data = Student::all();
		$data = Student::paginate(3);
		$this->assign('result', $data);
		return $this->fetch();
	}
	public function addstudent()
	{
		$all = Classes::all();
		$this->assign('all',$all);
		return $this->fetch();
	}
	public function adds(Request $request)
	{
		$student = new Student;
		$student->name = $request->post('name');
		$student->age = $request->post('age');
		$student->sex = $request->post('sex');
		$student->classes_id = $request->post('classes_id');
		if ($student->save()) {
			return '学生[ ' . $student->name . ':' . $student->id . ' ]新增成功';
		} else {
			return $student->getError();
		}
	}
	public function deletes($id)
	{
		$student = Student::get($id);
		if ($student) {
			$student->delete();
			return '删除学生成功';
		} else {
			return '删除的学生不存在';
		}
	}
	public function editstudent($id)
	{
		$single = Student::get($id);
		// $this->assign('id', $single->id);
		// $this->assign('name', $single->name);
		// $this->assign('age', $single->age);
		// $this->assign('sex', $single->sex);
		$all = Classes::all();
		$this->assign('single', $single);
		$this->assign('all',$all);
		return $this->fetch();
		// $single = Db::view('student','id,name,age,sex')
		// ->view('classes',['cid,year,major,subclass'],'classes.cid=student.cid')
		// ->where('student.id',$id)
		// ->find();
		// $all = Db::name('classes')
		// ->select();
		// $this->assign('single',$single);
		// $this->assign('all',$all);
		// return $this->fetch();
	}
	public function edits(Request $request,$id)
	{
		$student = Student::get($id);
		if(	$student->name == $request->post('name')&&
			$student->age == $request->post('age')&&
			$student->sex == $request->post('sex')&&
			$student->classes_id == $request->post('classes_id'))
		{
			return '未修改任何值！';
		}
		else
		{
			$student->name =$request->post('name');
			$student->age =$request->post('age');
			$student->sex =$request->post('sex');
			$student->classes_id =$request->post('classes_id');
			$student->save();
			return '修改学生成功';
		}
	}
}

// class Index
// {
// 	public function index()
// 	{
// 		return 'index';
// 	}
// 	public function hello($name = 'World', $city = '')
// 	{
// 		return 'Hello,' . $name . '! You come from ' . $city . '.';
// 	}
// }

// use think\Request;
// class Index
// {
// 	public function hello(Request $request, $name = 'World')
// 	{
// 		// 获取当前 URL 地址 不含域名
// 		echo 'url: ' . $request->url() . '<br/>';
// 		return 'Hello,' . $name . '！';
// 	}
// }

// use think\Controller;
// class Index extends Controller
// {
// 	public function hello($name = 'World')
// 	{
// 		// 获取当前 URL 地址 不含域名
// 		echo 'url: ' . $this->request->url() . '<br/>';
// 		return 'Hello,' . $name . '！';
// 	}
// }

// use think\Request;
// class Index
// {
// 	public function hello(Request $request)
// 	{
// 		echo '请求参数：';
// 		dump($request->param());
// 		echo 'name:'.$request->param('name');
// 	}
// }

// class Index
// {
// 	public function hello()
// 	{
// 		echo '请求参数：';
// 		dump(input());
// 		echo 'name:'.input('name');
// 	}
// }

// use think\Request;
// class Index
// {
// 	public function hello(Request $request)
// 	{
// 		echo '请求方法：' . $request->method() . '<br/>';
// 		echo '资源类型：' . $request->type() . '<br/>';
// 		echo '访问 IP：' . $request->ip() . '<br/>';
// 		echo '是否 AJax 请求：' . var_export($request->isAjax(), true) . '<br/>';
// 		echo '请求参数：';
// 		dump($request->param());
// 		echo '请求参数：仅包含 name';
// 		dump($request->only(['name']));
// 		echo '请求参数：排除 name';
// 		dump($request->except(['name']));
// 	}
// }

// use think\Request;
// class Index
// {
// 	public function hello(Request $request, $name = 'World')
// 	{
// 		echo '模块：'.$request->module();
// 		echo '<br/>控制器：'.$request->controller();
// 		echo '<br/>操作：'.$request->action();
// 	}

// 	// public function hello(Request $request,$name = 'World')
// 	// {
// 	// 	// 获取当前域名
// 	// 	echo 'domain: ' . $request->domain() . '<br/>';
// 	// 	// 获取当前入口文件
// 	// 	echo 'file: ' . $request->baseFile() . '<br/>';
// 	// 	// 获取当前 URL 地址 不含域名
// 	// 	echo 'url: ' . $request->url() . '<br/>';
// 	// 	// 获取包含域名的完整 URL 地址
// 	// 	echo 'url with domain: ' . $request->url(true) . '<br/>';
// 	// 	// 获取当前 URL 地址 不含 QUERY_STRING
// 	// 	echo 'url without query: ' . $request->baseUrl() . '<br/>';
// 	// 	// 获取 URL 访问的 ROOT 地址
// 	// 	echo 'root:' . $request->root() . '<br/>';
// 	// 	// 获取 URL 访问的 ROOT 地址
// 	// 	echo 'root with domain: ' . $request->root(true) . '<br/>';
// 	// 	// 获取 URL 地址中的 PATH_INFO 信息
// 	// 	echo 'pathinfo: ' . $request->pathinfo() . '<br/>';
// 	// 	// 获取 URL 地址中的 PATH_INFO 信息 不含后缀
// 	// 	echo 'pathinfo: ' . $request->path() . '<br/>';
// 	// 	// 获取 URL 地址中的后缀信息
// 	// 	echo 'ext: ' . $request->ext() . '<br/>';
// 	// 	return 'Hello,' . $name . '！';
// 	// }
// }

// class Index
// {
// 	use \traits\controller\Jump;
// 	public function index($name='')
// 	{
// 		if ('thinkphp' == $name) {
// 			$this->success('欢迎使用 ThinkPHP5.0','hello');
// 		} else {
// 			$this->error('错误的 name','guest');
// 		}
// 	}
// 	public function hello()
// 	{
// 		return 'Hello,ThinkPHP!';
// 	}
// 	public function guest()
// 	{
// 		return 'Hello,Guest!';
// 	}
// }

// class Index
// {
// 	use \traits\controller\Jump;
// 	public function index($name='')
// 	{
// 		if ('thinkphp' == $name) {
// 			$this->redirect('http://thinkphp.cn');
// 		} else {
// 			$this->success('欢迎使用 ThinkPHP','hello');
// 		}
// 	}
// 	public function hello()
// 	{
// 		return 'Hello,ThinkPHP!';
// 	}
// }