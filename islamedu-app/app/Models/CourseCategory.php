<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class CourseCategory extends Model
{
    use HasFactory;
    use CrudTrait;
    public $identifiableAttribute = 'title';
    protected $fillable = [
        'title',
        'icon',
    ];
    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            \Storage::disk('public')->delete($obj->icon);
        });
    }

    public function setIconAttribute($value)
    {
        $attribute_name = "icon";
        $disk = "public";
        $destination_path = "course-category";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = null);
    }

    public function items() {
        return $this->hasMany(CourseItem::class, 'course_category_id', 'id');
    }
}
