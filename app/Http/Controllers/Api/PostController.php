<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{

    public function index()
    {
        // get all project
        $projects = Project::latest()->with('project_type')->paginate(5);

        // return collection of posts as a resource
        return new PostResource(true, 'List Data Projects', $projects);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tittle' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_type_id' => 'required'
        ]);

        if( $validator->fails() ) {
            return response()->json($validator->errors(), 422);
        }

        $file = $request->file('image');
        $path = $file->storeAs('project-images', $file->hashName(), 'public');


        $post = Project::create([
            'tittle' => $request->tittle,
            'description' => $request->description,
            'image' => $path,
            'project_type_id' => $request->project_type_id      
        ]);

        return new PostResource(true, 'Data Project Berhasil Ditambahkan!', $post);
    }
}
