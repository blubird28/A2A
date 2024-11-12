<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
    use HasFactory;

    protected $fillable = ['movie_id', 'theater_id', 'sale_date', 'amount'];

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
