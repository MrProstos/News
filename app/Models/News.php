<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * Indicates that the model IDs are autoincrement.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Get 20 records sorted by date
     * @return array
     */
    public function getSortData(): array
    {
        return News::query()->select(['title', 'link', 'desc', 'category', 'pubDate'])->
        orderBy('pubDate', 'desc')->take(20)->get()->toArray();
    }
}
