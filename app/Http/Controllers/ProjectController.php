<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Config;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Projects dashboard
     *
     * @return View
     */
    function index()
    {
        $projects = Project::all();

        return view('projects/index', compact('projects'));
    }

    /**
     * Form to create new project
     *
     * @return View
     */
    function create()
    {
        $countries = Config::get('projects.countries');
        $currencies = Config::get('projects.currencies');
        $projectTypes = Config::get('projects.types');
        $project = null;

        return view('projects/form', compact([
            'countries',
            'currencies',
            'projectTypes',
            'project'
        ]));
    }

    /**
     * Form to edit existing project
     *
     * @return View
     */
    function edit($projectId)
    {
        $project = Project::find($projectId);
        $countries = Config::get('projects.countries');
        $currencies = Config::get('projects.currencies');
        $projectTypes = Config::get('projects.types');

        return view('projects/form', compact([
            'countries',
            'currencies',
            'projectTypes',
            'project'
        ]));
    }

    /**
     * Validate and save form data project
     *
     * @return View
     */
    function store(Request $request)
    {
        if (!$request->validate([
            'project_number' => 'required|regex:/\d{5}-\d{4}/',
            'name'           => 'required|string',
            'type'           => 'required',
            'start_date'     => 'date',
            'end_date'       => 'date',
            'liability_max'  => 'required_if:type,3',
            'liability_min'  => 'required_if:type,3',
            'currency'       => 'required_if:type,3',
            'countries'      => 'required',
        ])) {
            return redirect()->route('projects.create')
                ->withInput()
                ->withErrors();
        }

        $startDate = Carbon::parse($request['start_date'])->format('Y-m-d');
        $endDate = Carbon::parse($request['end_date'])->format('Y-m-d');

        Project::updateOrCreate([
            'id' => $request['project_id'],
        ],[
            'project_number' => $request['project_number'],
            'name'           => $request['name'],
            'type'           => $request['type'],
            'start_date'     => $startDate,
            'end_date'       => $endDate,
            'liability_max'  => $request['liability_max'],
            'liability_min'  => $request['liability_min'],
            'currency'       => $request['currency'],
            'countries'      => json_encode($request['countries']),
            'has_file'       => false,
        ])->save();

        return redirect('/');
    }
}
