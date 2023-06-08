<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; //remenber to add!
use App\Http\Requests\StoreProjectRequest; //remenber to add!
use App\Http\Requests\UpdateProjectRequest; //remenber to add!
use App\Models\Project;
use App\Models\Skill;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // remenber to add!

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('skills', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreProjectRequest $request)
    {
        $validated_data = $request->validated();
        $validated_data['slug'] = Str::slug($request->input('title'), '-');

        $newProject = Project::create($validated_data);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('upload');
            $newProject->image = $path;
            $newProject->save();
        }

        // Assuming $request->input('technologies') is an array of technology IDs
        if (is_array($request->input('technologies'))) {
            $newProject->technologies()->attach($request->input('technologies'));
        }

        return redirect()->route('admin.projects.show', ['project' => $newProject->slug]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $skills = Skill::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'skills', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated_data = $request->validated();
        $validated_data['slug'] = Str::slug($validated_data['title'], '-');
        $project->technologies()->sync($request->input('technologies'));

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }

            $path = $request->file('image')->store('upload');
            $validated_data['image'] = $path;
        }

        $project->update($validated_data);
        $project = $project->fresh();

        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
