<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sphinx extends Model
{
    use HasFactory;

    protected $connection = 'sphinx';

    protected $table = 'news';

    /**
     * Search for indexed data via Sphinx
     * @param string $word Keyword or part of a word
     * @return array
     */
    public function getSearchData(string $word): array
    {
        $data = DB::connection($this->connection)->select("SELECT id FROM news WHERE match('@title $word') LIMIT 30");
        $response = [];

        foreach ($data as $item) {
            $response[] = $item->id;
        }
        return $response;
    }
}
