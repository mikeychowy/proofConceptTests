<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'genre', 'price'
    ];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        if ($update) {
            return [
                'name' => 'required|max:255|min:8|unique:books,name,' . $id,
                'genre' => 'required|in:Fantasy,Action,Historical,Misc',
                'price' => 'nullable|numeric'
            ];
        }
        return [
            'name' => 'required|max:255|min:8|unique:books',
            'genre' => 'required|in:Fantasy,Action,Historical,Misc',
            'price' => 'nullable|numeric'
        ];
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    /**
     * The authors that wrote the book.
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    /*
    |------------------------------------------------------------------------------------
    | Scopes
    |------------------------------------------------------------------------------------
    */

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
}
