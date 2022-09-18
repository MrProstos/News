<?php

namespace App\Http\Controllers;

use App\Http\Requests\RssPostRequest;
use App\Models\Rss;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Src extends Controller
{
    /**
     * Show sources
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $news = new \App\Models\News();
        return view('src', [
            'rss' => $news->getCreatorInfo()->paginate(10),
            'page' => 'Источники'
        ]);
    }

    /**
     * @param RssPostRequest $request
     * @return JsonResponse
     */
    public function add(RssPostRequest $request): JsonResponse
    {
        $URL = $request->get('URL');
        $creator = preg_replace('/https:\/\/\w+\.(\w+)\.\w+\/[A-z.\/]+/', '$1', $URL);

        $rssTable = new Rss();
        $rssTable->creator = $creator;
        $rssTable->rssLink = $URL;
        $rssTable->save();

        return response()->json(['creator' => $creator]);
    }

    public function scrList(): array
    {
        return Rss::all(['creator'])->toArray();
    }
}
