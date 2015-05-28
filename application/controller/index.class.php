<?php
require_once _FILEPATH.'controller/startrun.class.php';
class index extends startrun{
	
	public function run(){
		try {
			$category = $this->m->get('Products.category',array('pid'=>0));
			$this->tpl->assign('category',$category['datalist']);
		} catch (Exception $e) {
			showerr($e->getMessage());
			die;
		}
		$this->tpl->display('index.tpl');
	}
	
// 	public function test(){
	    
// 	}
}
?>