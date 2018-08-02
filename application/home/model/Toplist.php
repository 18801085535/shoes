<?php
namespace app\home\model;

use think\Model;

class Toplist extends Model
{
	public function get_toplist()
	{
		$rs = Toplist::where('display',1)
    				->order('location','asc')
    				->select()
    				->toArray();
    	return $rs;
	}

    
}