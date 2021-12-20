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
                {!! Form::label('project_number', 'Projektnummer') !!}
                {!! Form::text('project_number', '', ['required']) !!}
                <br />

                {!! Form::label('name', 'Projektname') !!}
                {!! Form::text('name', '', ['required']) !!}
                <br />

                {!! Form::label('type', 'Art der Aktion') !!}
                {!! Form::select('type', $projectTypes, '', ['class' => 'select-project-type']) !!}
                <br />

                {!! Form::label('start_date', 'Aktionszeitraum von') !!}
                {!! Form::text('start_date', '', ['required']) !!}
                <br />

                {!! Form::label('end_date', 'Aktionszeitraum bis') !!}
                {!! Form::text('end_date', '', ['required']) !!}
                <br />

                {!! Form::label('liability_max', 'Maximalbetrag Verbindlichkeit', ['class' => 'toggled-liability']) !!}
                {!! Form::text('liability_max', '', ['required', 'class' => 'toggled-liability']) !!}
                <br />

                {!! Form::label('liability_min', 'Minimalbetrag Verbindlichkeit', ['class' => 'toggled-liability']) !!}
                {!! Form::text('liability_min', '', ['required', 'class' => 'toggled-liability']) !!}
                <br />

                {!! Form::label('currency', 'Währung', ['class' => 'toggled-liability']) !!}
                {!! Form::select('currency', $currencies, '', ['required', 'class' => 'toggled-liability']) !!}
                <br />

                {!! Form::label('countries', 'Teilnehmende Länder') !!}
                {!! Form::select('countries', $countries, '', ['multiple', 'required']) !!}
                <br />

                {!! Form::submit('Speichern') !!}
            {!! Form::close() !!}
        </div>
    </section

@endsection