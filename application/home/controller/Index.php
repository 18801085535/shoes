<?php
namespace app\home\controller;

use think\Controller;
use app\home\model\Toplist;
use app\home\model\Brand;
use app\home\model\Shoestype;

class Index extends Controller
{
    public function index()
    {
    	//top列表
    	$toplist = new Toplist();
        $get_toplist = $toplist->get_toplist();
        //dump($get_toplist);
        foreach ($get_toplist as $k =>$j) 
        {
            $get_brandfield = new Brand();
            $map['where'] = array($j['id']);
            $get_brandfield = $get_brandfield->get_brandfield($map,'id,name');
            $get_toplist[$k]["brand"] = $get_brandfield;

            foreach ($get_toplist[$k]["brand"] as $l => $z) {
                $get_shoestype = new Shoestype();
                $map['where'] = array($z['id']);
                $get_shoestypefield = $get_shoestype->get_shoestypefield($map,'id,name');

                $get_toplist[$k]["brand"][$l]["shoestype"] = $get_shoestypefield;
                
            }
        }
    	

        $this->assign('rs',$get_toplist);
        return $this->fetch();
    }
}
