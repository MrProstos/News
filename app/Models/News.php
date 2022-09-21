<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    private const ALL_CREATOR = '%';
    private const START_DATE = '2000-01-01';
    private const END_DATE = '2100-01-01';

    /**
     * Indicates that the model IDs are autoincrement.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Get 20 records
     *
     * @return array
     */
    public function getData(): array
    {
        return self::query()
            ->select(['title', 'link', 'desc', 'category', 'pubDate'])
            ->orderBy('pubDate', 'desc')
            ->take(20)
            ->get()
            ->toArray();
    }


    /**
     * Get information about the sources of RSS descendants
     * @return Builder
     */
    public function getCreatorInfo(): Builder
    {
        return self::query()
            ->select(
                'rss.creator',
                'rss.rssLink',
                DB::raw("COUNT(creatorId) as cnt"),
                DB::raw("MAX(pubDate) as lastPubDate")
            )
            ->join('rss', 'news.creatorId', '=', 'rss.id')
            ->groupBy('rss.creator');
    }

    /**
     * Get data for a specific creator
     *
     * @param string|null $creator name of the creator
     * @param string|null $startData filter for the beginning of publications
     * @param string|null $endData filter the end of publications
     * @param string|null $sphinxWord
     *
     * @return Builder
     */
    public function getFilterData(
        string $creator = null,
        string $startData = null,
        string $endData = null,
        string $sphinxWord = null
    ): builder {
        $creator = $creator === null ? self::ALL_CREATOR : $creator;
        $startData = $startData === null ? self::START_DATE : $startData;
        $endData = $endData === null ? self::END_DATE : $endData;

        if ($sphinxWord !== null) {
            $sphinx = new Sphinx();
            $sphinx->getSearchData($sphinxWord);

            return self::query()
                ->select('*')
                ->join('rss', 'news.creatorId', '=', 'rss.id')
                ->where('rss.creator', 'like', $creator)
                ->whereIn('news.id', $sphinx->getSearchData($sphinxWord))
                ->whereBetween('news.pubDate', [$startData, $endData])->orderBy('news.pubDate');
        }

        return self::query()
            ->select('*')
            ->join('rss', 'news.creatorId', '=', 'rss.id')
            ->where('rss.creator', 'like', $creator)
            ->whereBetween('news.pubDate', [$startData, $endData])->orderByDesc('pubDate');
    }
}
