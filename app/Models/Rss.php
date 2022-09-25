<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed $creator
 * @property mixed $rssLink
 */
class Rss extends Model
{
    use HasFactory;

    //TODO setHidden скрыть поля таблицы
    public $timestamps = false;

    /**
     * Name table DB
     *
     * @var string
     */
    public $table = 'rss';

    /**
     * Parses Rss news
     *
     * @return void
     */
    public function parseRssNews(): void
    {
        foreach (self::all(['id', 'rssLink'])->toArray() as $item) {
            $xml = file_get_contents($item['rssLink']);
            $rssString = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);

            $data = json_decode(json_encode($rssString), true);

            foreach ($data['channel']['item'] as $datum) {
                DB::table('news')->insertOrIgnore(
                    [
                        'creatorId' => $item['id'],
                        'title' => $datum['title'],
                        'link' => $datum['link'],
                        'desc' => $datum['description'],
                        'category' => $datum['category'],
                        'pubDate' => date('Y-m-d', strtotime($datum['pubDate']))
                    ]
                );
            }
        }
    }
}
