<?php
namespace app\index\model;
use think\Model;
class Classes extends Model
{
	// public function student()
	// {
	// 	return $this->hasMany('Student');
	// }
	public function teacher()
	{
		return $this->belongsTo('teacher');
	}
}