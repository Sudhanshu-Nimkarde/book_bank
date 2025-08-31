<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
            //Defining a relation book which we are creating will belong to a specific center() & Category so we will use 'belongsTo' relation   
    

            // public function center() {
            //     return $this->belongsTo(Center::class);
            // } 
        
            // public function category() {
            //     return $this->belongsTo(Category::class);
            // }



            public function IssueBook()
            {
                return $this->belongsTo(IssueBook::class);
            }
            public function center()
            {
                return $this->belongsTo('App\Models\Center', 'center_id');
            }
        
            public function category()
            {
                return $this->belongsTo('App\Models\Category', 'category_id');
            }
}
