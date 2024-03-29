<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
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
        $services = Service::orderBy('id', 'ASC')
            ->paginate(10);
        return view
        (
            'services.index',
            [
                'services' => $services,
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
        return view('services.create');
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
            'title' => 'required',
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
            $request->file('image')->storeAs('public/images/services', $filename_to_store);
        }

        // Write to DB
        $service = new Service;
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->image = $filename_to_store;
        $service->save();

        // Redirect to services/index
        return redirect('dashboard/services')->with('success', 'Service created successfully.');
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
        // Get the service
        $service = Service::find($id);

        // Check if service is unavailable
        if(empty($service))
        {
           return redirect('/dashboard/services')->with('error', 'Service not found.');
        }

        return view('services.edit', [
            'service' => $service
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
        // Get the service
        $service = Service::find($id);

        // Check if service is unavailable
        if(empty($service))
        {
            return redirect('/dashboard/services')->with('error', 'Service not found.');
        }

        // Validate request input data
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image'
        ]);

        // Upload image
        if($request->hasFile('image'))
        {
            // Delete old image
            unlink('storage/images/services/' . $service->image);

            // File extension
            $file_extension = $request->file('image')->getClientOriginalExtension();

            // File name salt
            $filename_salt = mt_rand() . '_' . time();

            // File name to store in DB
            $filename_to_store = $filename_salt . '.' . $file_extension;

            // Upload new image to storage
            $request->file('image')->storeAs('public/images/services', $filename_to_store);
        }

        // Write to DB
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        if($request->hasFile('image'))
        {
            $service->image = $filename_to_store;
        }
        $service->save();

        // Redirect to services/index
        return redirect('dashboard/services')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the service
        $service = Service::find($id);

        // Check if service is unavailable
        if(empty($service))
        {
            return redirect('/dashboard/services')->with('error', 'Service not found.');
        }

        // Delete service image
        unlink('storage/images/services/' . $service->image);

        // Delete service from DB
        $service->delete();

        // Redirect to services/index
        return redirect('dashboard/services')->with('success', 'Service removed successfully.');
    }
}
