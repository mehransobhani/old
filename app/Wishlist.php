<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
	public function productInfo()
	{
		return $this->hasOne(Product::class, 'id', 'product_id');
	}
}
