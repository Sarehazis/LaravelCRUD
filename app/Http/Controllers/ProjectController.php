<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
       $projects = Project::with('project_types')->get();
    //    dd ($projects -> toArray());
       return view('admin.project.index', ['projects' => $projects]); 
    }

    public function create()
    {
        $projectTypes = ProjectType::all();
        return view('admin.project.create', compact('projectTypes'));
    }

    public function store(Request $request)
    {
        // Validate 
        $request->validate([
            'tittle' => 'required'
        ]);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $path = $file->storeAs('project-images', $file->hashName(), 'public');
        }
        // Insert to database

        $project = new Project();
        $project->tittle = $request->tittle;
        $project->description = $request->description;
        $project->image = $path ?? null;
        $project->save();
        $project->project_types()->sync($request->project_type);

        return redirect()->route('admin.projects.index')->with('success', 'Project successfully created');
    }

    public function edit($id)
    {
        $project = Project::find($id);

        if(empty($project))
        {
            // abort(404);
            return redirect()->route('admin.projects.index')->with('error','Project not found');
        }

        $projectTypes = ProjectType::all();
        // $project_types = $project->project_types->pluck('id')->toArray();

        foreach($project->project_types as $pt)
        {
            $project_types_selected[] = $pt->id;
        }
        return view('admin.project.edit', compact('project', 'projectTypes', 'project_types_selected'));
    }

    public function update($id, Request $request)
    {
        $project = Project::find($id);
        
        if(empty($project))
        {
            // abort(404);
            return redirect()->route('admin.projects.index')->with('error','Project not found');
        }

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $path = $file->storeAs('project-images', $file->hashName(), 'public');
            $project->image = $path;
        }

        $project->tittle = $request->tittle;
        $project->description = $request->description;
        $project->save();
        $project->project_types()->sync($request->project_type);
        return redirect()->route('admin.projects.index')->with('success', 'Project successfully updated');
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        if(empty($project))
        {
            return redirect()->route('admin.projects.index')->with('error','Project not found');
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project successfully deleted');
    }
}
