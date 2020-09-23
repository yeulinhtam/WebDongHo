<?php 
namespace App;

class BillFilters extends QueryFilter{

	public function key($key = ""){
		if($key != ""){
			return $this->builder->where(function ($q) use ($key) {
				return $q->where('id','like',$key)->orWhere('phone','like',$key)->orWhere('email', 'like',$key);
			});
		}
	}


	public function status($value = -1){

		if($value != -1){
			return $this->builder->where("status",$value);
		}
	}


}



?>