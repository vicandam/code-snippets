<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Requests\TopicUpdateRequest;
use App\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request;

        $categoryId = $request['categoryId'];

        $topics = new Topic();

        if ($categoryId > 0) {
            $topics = $topics->where('category_id', $categoryId);
        }

        if (!empty($input['keyword'])) {
            $topics = $topics->searchFilter($input['keyword']);
        }

        $topics = $topics->with(['category', 'user']);

        $topics = $topics->orderBy('id', 'desc');

        $topics = $topics->paginate($input['paginate']);

        $categories = Category::all();

        $result = [
            'message' => 'Topics successfully retrieve',
            'data' => [
                'topics' => $topics,
                'topic_count' => $topics->count(),
                'categories' => $categories
            ]
        ];

        return response()->json( $result, 200, [], JSON_PRETTY_PRINT);
    }

    public function showUserPost(Request $request)
    {
        $input = $request;

        $categoryId = $request['categoryId'];

        $topics = new Topic();

        $topics = $topics->where('user_id', auth()->id());

        if ($categoryId > 0) {
            $topics = $topics->where('category_id', $categoryId);
        }

        if (!empty($input['keyword'])) {
            $topics = $topics->searchFilter($input['keyword']);
        }

        $topics = $topics->with(['category', 'user']);

        $topics = $topics->orderBy('id', 'desc');

        $topics = $topics->paginate($input['paginate']);

        $categories = Category::all();

        $result = [
            'message' => 'Topics successfully retrieve',
            'data' => [
                'topics' => $topics,
                'topic_count' => $topics->count(),
                'categories' => $categories
            ]
        ];

        return response()->json( $result, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(TopicUpdateRequest $request, Topic $topic)
    {
        $input = $request;

        $topic->category_id = $input['category_id'];
        $topic->title       = $input['title'];
        $topic->description = $input['description'];
        $topic->is_public   = $input['status'];

        $topic->save();

        $result = [
            'message' => 'Topic successfully added',
            'data'    => [
                'topic' => $topic
            ]
        ];

        return response()->json( $result, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
