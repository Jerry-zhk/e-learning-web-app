<?php

namespace App\Http\Controllers\Admin;

use App\Models\Series;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorialController extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->middleware('permission:series&tutorial-delete', ['only' => ['destroy']]);
        $this->middleware('permission:deletion-restore', ['only' => ['restore']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function index(Series $series)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function create(Series $series)
    {
        return view('admin.tutorial.create', compact('series'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Series $series)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:tutorial,slug',
            'body' => 'required|max:65536'
        ]);
        $tutorial = new Tutorial();
        $tutorial->title = $validatedData['title'];
        $tutorial->slug = $validatedData['slug'];
        $tutorial->body = $validatedData['body'];
        $tutorial->series_id = $series->id;
        $tutorial->save();

        return redirect()->route('series.show', ['series' => $series->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series, Tutorial $tutorial)
    {
        return view('admin.tutorial.details', compact(['series', 'tutorial']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series, Tutorial $tutorial)
    {
        return view('admin.tutorial.edit', compact(['series', 'tutorial']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Series  $series
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Series $series, Tutorial $tutorial)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required|max:65536'
        ]);
        $tutorial->title = $validatedData['title'];
        $tutorial->body = $validatedData['body'];
        $tutorial->save();

        return redirect()->route('series.tutorial.show', ['series' => $series->id, 'tutorial' => $tutorial->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Series  $series
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series, Tutorial $tutorial)
    {
        if($tutorial->deleted_at == null)
            $tutorial->delete();
        
        return redirect()->route('series.show', ['series' => $series->id]);
    }

    /**
     * Reverse the specified resource's deletion.
     *
     * @param  \App\Models\Series  $series
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function restore(Series $series, Tutorial $tutorial)
    {
        if ($tutorial->deleted_at != null) 
            $tutorial->restore();
        
        return redirect()->route('series.tutorial.show', ['series' => $series->id, 'tutorial' => $tutorial->id]);
    }
}
