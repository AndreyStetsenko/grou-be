<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    public function index()
    {
        $tags = Tags::orderBy('id', 'asc')->get();
        return view('admin.settings.index', [
            'tags'  => $tags
        ]);
    }

    /**
     * Tags
     */

    public function viewTags()
    {

    }

    public function createTags(Request $request)
    {

        $tag = Tags::create([
            'tag' => $request->tag,
            'tag_color' => $request->tag_color
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'Тег создан',
            'responseTask' => [
                'id'       => $tag->id,
                'tag'       => $tag->tag,
                'tag_color' => $tag->tag_color
            ]
        ], 200);
    }

    public function destroyTags(Request $request)
    {
        $tag = $request->id;

        Tags::find($tag)->delete();
    }
}
