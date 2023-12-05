<?php

namespace App\Models;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image'];
    public function resolveRouteBinding($value, $field = null) 
    {
      return static::findOrFail($value);
    }

    public function subcategories() {
        return $this->hasMany(Subcategory::class);
      }
}
