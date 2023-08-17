<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsvError extends Model
{
    use HasFactory;

    const TABLE = 'csv_error';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = self::TABLE;

    protected $fillable = ['line_details'];
}
