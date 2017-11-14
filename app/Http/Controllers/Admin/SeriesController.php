<?php

namespace App\Http\Controllers\Admin;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Skill;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword') && trim($request->input('keyword')) != '') {
            $series = Series::MatchKeyword($request->input('keyword'))->paginate(15);
        }else{
            $series = Series::paginate(15);
        }
        
        return view('admin.series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::get();
        return view('admin.series.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:series|max:255',
            'skill' => 'required|array',
            'skill.*' => 'exists:skill,id',
            'price' => 'required|numeric|min:0',
            'is_public' => 'sometimes'
        ]);
        $series = new Series();
        $series->title = $validatedData['title'];
        $series->price = $validatedData['price'];
        if (isset($validatedData['is_public'])) $series->is_public = 1;
        $series->save();
        foreach ($validatedData['skill'] as $skill) {
            $series->skills()->attach($skill);
        }

        return redirect()->route('series.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
        return view('admin.series.details', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Series $series)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        //
    }
}
