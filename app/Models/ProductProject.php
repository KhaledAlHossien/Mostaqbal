<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProject extends Model
{
    use HasFactory;
    protected $guarded = [ ];
    public function product()
    {
        return $this->belongsTo(Product::class,'productId');
    }

    public function project()
    {
        return $this->belongsTo(Project::class,'projectId');
    }
}
