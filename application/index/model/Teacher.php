<?php
namespace app\index\model;
use think\Model;
class Teacher extends Model
{
	// public function classes()
	// {
	// 	return $this->hasMany('Classes');
	// }
	// public function course()
	// {
	// 	return $this->hasMany('Course');
	// }

	protected function getTtypeAttr($ttype)
	{
		if($ttype == 1)
		{
			return "辅导员";
		}else
		{
			return "讲师";
		}
	}
}