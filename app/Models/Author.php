<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'publisher', 'address'
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
                'name' => 'required|max:255|min:8|unique:authors,name,' . $id,
                'publisher' => 'required|max:255|min:8',
                'address' => 'max:4096'
            ];
        }
        return [
            'name' => 'required|max:255|min:8|unique:authors',
            'publisher' => 'required|max:255|min:8',
            'address' => 'max:4096'
        ];
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    /**
     * The books that the author wrote.
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
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
