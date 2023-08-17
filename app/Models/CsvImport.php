<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsvImport extends Model
{
    use HasFactory;

    const TABLE = 'csv_import';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = self::TABLE;

    protected $fillable = ['column1','column2','column3','column4','column5','column6','column7','column8'];
}
