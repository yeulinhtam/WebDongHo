<?php 
namespace App;

class ProductFilters extends QueryFilter{
    
    public function key($key){
        return $this->builder->where('name','like','%'.$key.'%');
    }

    public function category($id){
    	return $this->builder->where('id_category', $id);
    }

    public function producer($id){
        return $this->builder->where('id_producer', $id);
    }

    public function price($order = "desc"){
    	return $this->builder->orderBy('price',$order);
    }

    public function p($query = null){

        $min = 0;
        $max = 10000000000;

    	switch ($query) {
            case 'duoi-1-trieu':
                $max = 1000000;
                break;
            case 'tu-1-3-trieu':
                $min = 1000001;
                $max = 3000000;
                break;
            case 'tu-3-7-trieu':
                $min = 3000001;
                $max = 7000000;
                break;
            case 'tren-7-trieu':
                $min = 7000001;
                break;
            default:
                break;
        }

        if($query){
            return $this->builder->where('price','>',$min)->where('price','<',$max); 
        }
    }

    public function hot($value = 0){
        return $this->builder->where('hot',$value);
    }

    public function new($value = 1){
        return $this->builder->where('new',$$value);
    }


    public function sort($order = "cao-den-thap"){
        switch ($order) {
            case 'cao-den-thap':
                return $this->builder->orderBy('price','desc');
                break;
            case 'thap-den-cao':
               return $this->builder->orderBy('price','asc');
               break;
            default:
                return;
                break;
        }
    }




}