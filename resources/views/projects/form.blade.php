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
                {!! Form::hidden('project_id', !is_null($project) ? $project->id : '') !!}

                {!! Form::label('project_number', 'Projektnummer') !!}
                {!! Form::text('project_number', !is_null($project) ? $project->project_number : '', ['required']) !!}

                {!! Form::label('name', 'Projektname') !!}
                {!! Form::text('name', !is_null($project) ? $project->name : '', ['required']) !!}

                {!! Form::label('type', 'Art der Aktion') !!}
                {!! Form::select('type', $projectTypes, !is_null($project) ? $project->type : '', ['class' => 'select-project-type']) !!}

                {!! Form::label('start_date', 'Aktionszeitraum von') !!}
                {!! Form::text('start_date', !is_null($project) ? $project->start_date : '', ['required', 'class' => 'start-date']) !!}

                {!! Form::label('end_date', 'Aktionszeitraum bis') !!}
                {!! Form::text('end_date', !is_null($project) ? $project->end_date : '', ['required']) !!}

                {!! Form::label('liability_max', 'Maximalbetrag Verbindlichkeit', ['class' => 'toggled-liability-field']) !!}
                {!! Form::text('liability_max', !is_null($project) ? $project->liability_max : '', ['class' => 'toggled-liability-field']) !!}

                {!! Form::label('liability_min', 'Minimalbetrag Verbindlichkeit', ['class' => 'toggled-liability-field']) !!}
                {!! Form::text('liability_min', !is_null($project) ? $project->liability_min : '', ['class' => 'toggled-liability-field']) !!}

                {!! Form::label('currency', 'Währung', ['class' => 'toggled-liability-field']) !!}
                {!! Form::select('currency', $currencies, !is_null($project) ? $project->currency : '', ['class' => 'toggled-liability-field']) !!}

                {!! Form::label('countries[]', 'Teilnehmende Länder') !!}
                {!! Form::select('countries[]', $countries, !is_null($project) ? $project->countries : '', ['multiple', 'required']) !!}

                {!! Form::submit('Speichern') !!}
            {!! Form::close() !!}
        </div>
    </section

@endsection