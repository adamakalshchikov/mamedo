<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'date' => 'required|date|date_format:Y-m-d',
            'exercises' => 'required|array|min:1',
            'exercises.*' => 'required|exists:exercises,id',
            'exerciseComments' => 'required|array|size:' . count($request->input('exercises')),
            'exerciseComments.*' => 'required|string|max:255'
        ]);

        $workout = Workout::create()
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
