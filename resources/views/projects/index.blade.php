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
                                <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d.m.Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($project->end_date)->format('d.m.Y') }}</td>
                                <td>
                                    <a href="{{ route('projects.edit', $project->id) }}">Bearbeiten</a>
                                    <a href="">Archivieren</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section

@endsection