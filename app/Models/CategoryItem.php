<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MasterItem;

class CategoryItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'kode'];

    public function masterItems()
    {
        return $this->hasMany(MasterItem::class, 'category_items_id');
    }
}
