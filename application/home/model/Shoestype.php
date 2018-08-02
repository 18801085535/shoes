<?php
namespace app\home\model;

use think\Model;

class Shoestype extends Model
{
	public function get_shoestypefield($map=array(),$field)
	{
		$rs = Shoestype::field($field)
					->whereIn('pid',$map['where'])
    				->order('location','asc')
    				->select()
    				->toArray();
    	return $rs;
	}

    
}