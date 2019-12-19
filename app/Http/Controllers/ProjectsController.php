<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'ASC')
            ->paginate(10);
        return view
        (
            'projects.index',
            [
                'projects' => $projects,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request input data
        $this->validate($request, [
            'description' => 'required',
            'image' => 'required|image',
        ]);

        // Upload image
        if($request->hasFile('image'))
        {
            // File extension
            $file_extension = $request->file('image')->getClientOriginalExtension();

            // File name salt
            $filename_salt = mt_rand() . '_' . time();

            // File name to store in DB
            $filename_to_store = $filename_salt . '.' . $file_extension;

            // Upload image to storage
            $request->file('image')->storeAs('public/images/projects', $filename_to_store);
        }

        // Write to DB
        $project = new Project;
        $project->description = $request->input('description');
        $project->image = $filename_to_store;
        $project->save();

        // Redirect to projects/index
        return redirect('dashboard/projects')->with('success', 'Project created successfully.');
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
        // Get the project
        $project = Project::find($id);

        // Check if project is unavailable
        if(empty($project))
        {
            return redirect('/dashboard/projects')->with('error', 'Project not found.');
        }

        return view('projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get the project
        $project = Project::find($id);

        // Check if project is unavailable
        if(empty($project))
        {
            return redirect('/dashboard/projects')->with('error', 'Project not found.');
        }

        // Validate request input data
        $this->validate($request, [
            'description' => 'required',
            'image' => 'image'
        ]);

        // Upload image
        if($request->hasFile('image'))
        {
            // Delete old image
            unlink('storage/images/projects/' . $project->image);

            // File extension
            $file_extension = $request->file('image')->getClientOriginalExtension();

            // File name salt
            $filename_salt = mt_rand() . '_' . time();

            // File name to store in DB
            $filename_to_store = $filename_salt . '.' . $file_extension;

            // Upload new image to storage
            $request->file('image')->storeAs('public/images/projects', $filename_to_store);
        }

        // Write to DB
        $project->description = $request->input('description');
        if($request->hasFile('image'))
        {
            $project->image = $filename_to_store;
        }
        $project->save();

        // Redirect to projects/index
        return redirect('dashboard/projects')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the project
        $project = Project::find($id);

        // Check if project is unavailable
        if(empty($project))
        {
            return redirect('/dashboard/projects')->with('error', 'Project not found.');
        }

        // Delete project image
        unlink('storage/images/projects/' . $project->image);

        // Delete project from DB
        $project->delete();

        // Redirect to projects/index
        return redirect('dashboard/projects')->with('success', 'Project removed successfully.');
    }
}
