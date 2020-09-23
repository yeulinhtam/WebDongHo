<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){

		if($item->promotion > 0) {

          $giohang = ['qty'=>0, 'price' => $item->price *(100 - $item->promotion)/100, 'item' => $item];
		}
		else {
          
           $giohang = ['qty'=>0, 'price' => $item->price, 'item' => $item];
		}

		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty']++;
		$giohang['price'] = $giohang['price'];
		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $giohang['price'];
	}
 

	public function addProducts($item,$id,$qty)
	{
      
        $giohang = ['qty'=>0, 'price' =>0, 'item' => $item];

		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		if($item->promotion > 0) {

          $giohang['qty']+= $qty;
		  $giohang['price'] += round(($item->price *(100 - $item->promotion)/100),-3) * $qty;
		  $this->items[$id] = $giohang;
		  $this->totalQty+= $qty;
		  $this->totalPrice += round(($item->price *(100 - $item->promotion)/100),-3) * $qty;    
		}
		else {
          
          $giohang['qty']+= $qty;
		  $giohang['price'] +=  round(($item->price),-3) * $qty;
		  $this->items[$id] = $giohang;
		  $this->totalQty+= $qty;
		  $this->totalPrice +=  round(($item->price),-3) * $qty;
		}
		
 
	}


public function updateCart($item,$id,$qty){
	
	if($item->promotion > 0){
       	$price = round(($item->price *(100 - $item->promotion)/100),-3);
    }else{
        $price =  round(($item->price),-3);
    }

	if($qty > 0){
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}

		$giohang['qty']++;
		$giohang['price'] += $price;

		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $price;	
	}else{

		if($this->items[$id]['qty'] == 1){
			return;
		}
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $price;

		$this->totalQty--;
		$this->totalPrice -= $price;
		
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
}


	public function updateN($item,$id,$qty)
	{
         
         if($qty > 0) {

         $gioHangCu = $this->items[$id];
         if($item->promotion > 0)
         {
         	 $giohang = ['qty'=>$qty, 'price' => round(($item->price *(100 - $item->promotion)/100),-3) * $qty, 'item' => $item];
         }
         else
         {
           $giohang = ['qty'=>$qty, 'price' => round(($item->price),-3) * $qty, 'item' => $item];
         }
         
         
         $this->items[$id] = $giohang;
         $this->totalQty+= $giohang['qty'] - $gioHangCu['qty'];
		 $this->totalPrice +=  $giohang['price'] - $gioHangCu['price'];
         }else
         {
         	$this->totalQty -= $this->items[$id]['qty'];
		    $this->totalPrice -= $this->items[$id]['price'];
         	unset($this->items[$id]);
         }


	}


	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);

	}

}

