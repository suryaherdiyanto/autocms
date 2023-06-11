<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PageResource;
use App\Models\Page;
use App\Http\Requests\{StorePageRequest, UpdatePageRequest};
use App\Services\PageService;
use App\DataTransferObjects\PageData;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = (new PageService)->index($request, new Page());

        return PageResource::collection($pages);
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
    public function store(StorePageRequest $request)
    {
        (new PageService)->createPage(PageData::fromRequest($request->validated()), new Page());

        return response()->json([
            'status' => 'success',
            'message' => 'Page successfully created!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {
        (new PageService)->updatePage(PageData::fromRequest($request->safe()->all()), $id);

        return response()->json(['status' => 'success', 'message' => 'Page successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new PageService)->deletePage($id);
        return response()->json(['status' => 'success', 'message' => 'Page successfully deleted!']);
    }
}
