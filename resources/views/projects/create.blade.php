@extends('layouts.main')

@section('content')

    <h1>CTT-Projekt anlegen / bearbeiten</h1>

    <section>
        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div>
            {!! Form::open(['route' => 'projects.store', 'class' => 'create-project-form']) !!}
                {!! Form::hidden('project_id', !empty($project) ? $project->id : '') !!}

                {!! Form::label('project_number', 'Projektnummer') !!}
                {!! Form::text('project_number', !empty($project) ? $project->project_number : '', ['required']) !!}

                {!! Form::label('name', 'Projektname') !!}
                {!! Form::text('name', !empty($project) ? $project->name : '', ['required']) !!}

                {!! Form::label('type', 'Art der Aktion') !!}
                {!! Form::select('type', $projectTypes, !empty($project) ? $project->type : '', ['class' => 'select-project-type']) !!}

                {!! Form::label('start_date', 'Aktionszeitraum von') !!}
                {!! Form::text('start_date', !empty($project) ? $project->start_date : '', ['required', 'class' => 'start-date']) !!}

                {!! Form::label('end_date', 'Aktionszeitraum bis') !!}
                {!! Form::text('end_date', !empty($project) ? $project->end_date : '', ['required']) !!}

                {!! Form::label('liability_max', 'Maximalbetrag Verbindlichkeit', ['class' => 'toggled-liability-field']) !!}
                {!! Form::text('liability_max', !empty($project) ? $project->liability_max : '', ['class' => 'toggled-liability-field']) !!}

                {!! Form::label('liability_min', 'Minimalbetrag Verbindlichkeit', ['class' => 'toggled-liability-field']) !!}
                {!! Form::text('liability_min', !empty($project) ? $project->liability_min : '', ['class' => 'toggled-liability-field']) !!}

                {!! Form::label('currency', 'Währung', ['class' => 'toggled-liability-field']) !!}
                {!! Form::select('currency', $currencies, !empty($project) ? $project->currency : '', ['class' => 'toggled-liability-field']) !!}

                {!! Form::label('countries', 'Teilnehmende Länder') !!}
                {!! Form::select('countries', $countries, !empty($project) ? $project->countries : '', ['multiple', 'required']) !!}

                {!! Form::submit('Speichern') !!}
            {!! Form::close() !!}
        </div>
    </section

@endsection