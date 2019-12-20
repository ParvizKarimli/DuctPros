<?php

namespace App\Http\Controllers;

use App\Service;
use App\Project;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $services = Service::paginate(10);
        $projects = Project::paginate(10);

        return view('index', [
            'services' => $services,
            'projects' => $projects,
        ]);
    }

    public function contact_us(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'message' => 'required'
        ]);

        $to = 'devparviz@gmail.com';
        $subject = $request->input('subject');
        $message = "Phone: " . $request->input('phone') . "\n
Email: " . $request->input('email') . "\n
Message: " . $request->input('message') . "\n";
        $headers = "From:DuctPros<noreply@yourductpros.com>";

        echo $to . '<br>';
        echo $subject . '<br>';
        echo $message . '<br>';
        echo $headers . '<br>';

        //mail($to, $subject, $message, $headers);
    }
}
