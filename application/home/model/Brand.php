<?php
namespace app\home\model;

use think\Model;

class Brand extends Model
{
	public function get_brandlist($map=array())
	{
		$rs = Brand::whereIn('pid',$map['where'])
    				->order('location','asc')
    				->select()
    				->toArray();
    	return $rs;
	}

	public function get_brandfield($map=array(),$field)
	{
		$rs = Brand::field($field)
					->whereIn('pid',$map['where'])
    				->order('location','asc')
    				->select()
    				->toArray();
    	return $rs;
	}
}