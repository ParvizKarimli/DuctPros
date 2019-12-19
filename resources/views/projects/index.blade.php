@extends('layouts.dashboard.app')

@section('content')
<div class="container">
    <table class="table table-responsive table-striped">
        <caption>
            <h1>
                Projects <a href="projects/create" class="btn btn-default">Create</a>
            </h1>
        </caption>
        <thead>
        <tr>
            <th>Description</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{ $project->description }}</td>
                <td>
                    <img src="/storage/images/projects/{{ $project->image }}" width="320" height="240">
                </td>
                <td>
                    <a class="btn btn-warning" href="/dashboard/projects/{{ $project->id }}/edit">
                        Edit
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger" href="#" onclick="
                            event.preventDefault();
                            if(confirm('Are you sure you want to delete this project?')) {
                                document.getElementById('project-delete-form-{{ $project->id }}').submit();
                            }
                    ">
                        Delete
                    </a>

                    <form action="projects/{{ $project->id }}" method="POST" id="project-delete-form-{{ $project->id }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $projects->links() }}
</div>
@endsection
