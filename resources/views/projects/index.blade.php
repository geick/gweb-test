@extends('layouts.main')

@section('content')

    <h1>CTT-Projekte</h1>

    <section>
        <div>
            <a href="{{ route('projects.create') }}">
                Neues Projekt anlegen
            </a>
        </div>
    </section>

    <section>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Nr.</th>
                        <th>Name</th>
                        <th>von</th>
                        <th>bis</th>
                        <th>Aktionen</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($projects))
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->project_number }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
                                <td>Edit Archive</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section

@endsection