<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Http\Validator;

class ProjectTypeController extends Controller
{
    public function index()
    {
        $project_types = ProjectType::all();
        return view('admin.project-type.index', compact('project_types'));
    }
    public function create()
    {
        return view('admin.project-type.create');
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'type' => 'string|max:255|required',
                'description' => 'nullable'
            ]);
                // iNsert to database
                // ProjectType::create($request->validate());
                $project_type = new ProjectType();
                $project_type->type = $request->type;
                $project_type->description = $request->description;
                $project_type->save();

                return redirect()->route('admin.project-types.index');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function destroy($id)
    {
        // dd($id);
        // Logika GET data
        // SELECT * FROM project_types WHERE id = $id
        $project_type = ProjectType::find($id);

        // Cek project type jika ada atau tidak, jika tidak ada di redirect ke halaman index
        if(empty($project_type))
        {
            return redirect()->route('admin.project-types.index')->with('error','Project Type not found');
        }
        // Logika DELETE data
        // DELETE FROM project_types WHERE id = $id
        $project_type->delete();

        return redirect()->route('admin.project-types.index')->with('success', 'Project Type'. $id . 'succesfully');
    }

    public function edit($id)
    {
        // dd($id);
        // Logika GET data
       $pt = ProjectType::find($id);

       if(empty($pt))
       {
           // abort(404);
           return redirect()->route('admin.project-types.index')->with('error','Project Type not found');
       }
       // Tampilkan data kirim ke view
       return view('admin.project-type.edit', compact('pt'));
    }

    public function update($id, Request $request)
    {
        // dd($id);
        $pt = ProjectType::find($id);

        if(empty($pt))
        {
            // abort(404);
            return redirect()->route('admin.project-types.index')->with('error','Project Type not found');
        }

        $pt->type = $request->type;
        $pt->description = $request->description;
        $pt->save();

        return redirect()->route('admin.project-types.index')->with('success', 'Project Type successfully updated');
        

    }
    
}
