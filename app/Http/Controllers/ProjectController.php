<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Projects dashboard
     *
     * @return \Illuminate\View\View
     */
    function index()
    {
        $projects = Project::all();

        return view('projects/index', compact('projects'));
    }

    /**
     * Form to create new project
     *
     * @return \Illuminate\View\View
     */
    function create()
    {
        $countries = [
            "D" => "D",
            "AT" => "AT",
            "CH" => "CH",
            "LU" => "LU",
            "BE" => "BE",
            "NL" => "NL",
            "FR" => "FR",
            "IT" => "IT",
            "ES" => "ES",
            "GB" => "GB",
        ];

        $currencies = [
            "€",
            "£"
        ];

        $projectTypes = [
            "Prämienbestellung",
            "Gewinnspiel",
            "Verlosung",
            "GzA",
            "Prämie",
            "Verlosung",
            "Prämie",
            "Gewinnspiel",
        ];

        return view('projects/create', compact([
            'countries',
            'currencies',
            'projectTypes'
        ]));
    }

    /**
     * Validate and save form data project
     *
     * @return \Illuminate\View\View
     */
    function store(Request $request)
    {
        if (!$request->validate([
            'project_number' => 'required|unique:projects|regex:/\d{5}-\d{4}/',
            'name'           => 'required|string',
            'type'           => 'required',
            'start_date'     => 'date',
            'end_date'       => 'date',
            'liability_max'  => 'required|numeric',
            'liability_min'  => 'required|numeric',
            'currency'       => 'required',
            'countries'      => 'required',
        ])) {
            return redirect()->route('projects.create')
                ->withInput()
                ->withErrors();
        }

        $newProject = Project::create([
            'project_number' => $request['project_number'],
            'name'           => $request['name'],
            'type'           => $request['type'],
            'start_date'     => date('Y-m-d'),
            'end_date'       => date('Y-m-d'),
            'liability_max'  => $request['liability_max'],
            'liability_min'  => $request['liability_min'],
            'currency'       => $request['currency'],
            'countries'      => json_encode($request['countries']),
            'has_file'       => false,
        ]);

        return redirect('/');
    }
}
