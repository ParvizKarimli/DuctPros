@extends('layouts.dashboard.app')

@section('content')
<div class="container">
    <table class="table table-responsive table-striped">
        <caption><h1>Services</h1></caption>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td>{{ $service->title }}</td>
                <td>{{ $service->description }}</td>
                <td>
                    <img src="/assets/images/services/{{ $service->image }}" width="320" height="240">
                </td>
                <td>
                    <a class="btn btn-warning" href="/dashboard/services/{{ $service->id }}/edit">
                        Edit
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger" href="#" onclick="
                        event.preventDefault();
                        if(confirm('Are you sure you want to delete this service?')) {
                            document.getElementById('service-delete-form-{{ $service->id }}').submit();
                        }
                    ">
                        Delete
                    </a>

                    <form action="services/destroy/{{ $service->id }}" method="POST" id="service-delete-form-{{ $service->id }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $services->links() }}
</div>
@endsection
