<?php
namespace app\index\model;
use think\Model;
class Student extends Model
{
	public function classes()
	{
		return $this->belongsTo('classes');
	}
}