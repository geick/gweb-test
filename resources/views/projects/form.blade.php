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
            {!! Form::open(['route' => 'projects.store', 'class' => 'project-form', 'files' => true]) !!}
                {!! Form::hidden('project_id', !is_null($project) ? $project->id : '') !!}

                {!! Form::label('project_number', 'Projektnummer *') !!}
                {!! Form::text('project_number', !is_null($project) ? $project->project_number : '', ['required']) !!}

                {!! Form::label('name', 'Projektname *') !!}
                {!! Form::text('name', !is_null($project) ? $project->name : '', ['required']) !!}

                {!! Form::label('type', 'Art der Aktion *') !!}
                {!! Form::select('type', $projectTypes, !is_null($project) ? $project->type : '', ['class' => 'select-project-type']) !!}

                @php
                    $startDate = !is_null($project) ? \Carbon\Carbon::parse($project->start_date)->format('d.m.Y') : '';
                    $endDate = !is_null($project) ? \Carbon\Carbon::parse($project->end_date)->format('d.m.Y') : '';
                @endphp
                {!! Form::label('start_date', 'Aktionszeitraum von *') !!}
                {!! Form::text('start_date', $startDate, ['required', 'class' => 'start-date']) !!}

                {!! Form::label('end_date', 'Aktionszeitraum bis *') !!}
                {!! Form::text('end_date', $endDate, ['required', 'class' => 'end-date']) !!}

                {!! Form::label('liability_max', 'Maximalbetrag Verbindlichkeit *', ['class' => 'toggled-liability-field']) !!}
                {!! Form::text('liability_max', !is_null($project) ? $project->liability_max : '', ['class' => 'toggled-liability-field']) !!}

                {!! Form::label('liability_min', 'Minimalbetrag Verbindlichkeit *', ['class' => 'toggled-liability-field']) !!}
                {!! Form::text('liability_min', !is_null($project) ? $project->liability_min : '', ['class' => 'toggled-liability-field']) !!}

                {!! Form::label('currency', 'Währung *', ['class' => 'toggled-liability-field']) !!}
                {!! Form::select('currency', $currencies, !is_null($project) ? $project->currency : '', ['class' => 'toggled-liability-field']) !!}

                {!! Form::label('countries[]', 'Teilnehmende Länder *') !!}
                {!! Form::select('countries[]', $countries, !is_null($project) ? json_decode($project->countries) : '', ['multiple', 'required', 'class' => 'multiselect']) !!}

                {!! Form::label('market_list', 'Upload Marktliste') !!}
                {!! Form::file('market_list') !!}

                {!! Form::hidden('optional_fields', !is_null($project) ? $project->optional_fields : '', ['class' => 'optional-fields']) !!}

                @php
                    $optionalFields = json_decode($project->optional_fields);
                @endphp

                @if ($optionalFields)
                    @foreach($optionalFields as $field)
                        <div class="optional-field">
                            <h4>Optionales Feld <span class="optional-field-index">1</span></h4>

                            <div class="optional-field-wrapper">
                                <div>
                                    {!! Form::label('field-name', 'Feldname') !!}
                                    {!! Form::text('field-name', $field[0]) !!}
                                </div>
                                <div>
                                    {!! Form::label('field-values', 'erlaubte Feldwerte') !!}
                                    {!! Form::textarea('field-values', $field[1], ['rows' => 4]) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <a href="" class="add-optional-field">Optionales Feld hinzufügen</a>

                {!! Form::submit('Speichern') !!}
            {!! Form::close() !!}

            @include('projects.templates.optional-field')
        </div>
    </section>

    <section>
        <a href="{{ route('projects.index') }}">Zurück</a>
    </section>

@endsection