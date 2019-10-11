<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Topic extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->whereHas('category', function($category) use ($keyword) {
            $category->where('categories.name', 'like', '%' .$keyword. '%')
                ->orWhere('topics.title', 'like', '%' .$keyword. '%');
        });
    }

    public function validate($input)
    {
        $validator = Validator::make($input, [
            'category' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        return $validator->validate();
    }
}
