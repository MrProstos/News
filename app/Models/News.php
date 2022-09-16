<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        return self::query()->select(['title', 'link', 'desc', 'category', 'pubDate'])->
        orderBy('pubDate', 'desc')->take(20)->get()->toArray();
    }


    /**
     * Get information about the sources of RSS descendants
     * @return Builder
     */
    public function getCreatorInfo(): Builder
    {
        return self::query()
            ->select('rss.creator', 'rss.rssLink', DB::raw("COUNT(creatorId) as cnt"), DB::raw("MAX(pubDate) as lastPubDate"))
            ->join('rss', 'news.creatorId', '=', 'rss.id')
            ->groupBy('rss.creator');
    }
}
