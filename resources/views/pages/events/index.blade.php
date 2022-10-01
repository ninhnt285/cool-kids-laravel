@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="pull-left">
              <h4 class="card-title">All Events</h4>
              <p class="card-category"></p>
            </div>
            @can('edit-events')
              <a href="{{ route('events.create') }}" class="btn btn-round btn-fill btn-success pull-right">Add</a>
            @endcan
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                <tr>
                  <th class="text-center"></th>
                  <th style="min-width: 150px;">Name</th>
                  <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($events as $event)
                  <tr>
                    <td><div class="image-container">@if($event->image_path)<img class="image-thumb rounded" style="width:75px; height: 75px;" src="{{asset('storage/' . $event->image_path) }}"/>@endif</div></td>
                    <td><a href="{{ route('events.show', ['event' => $event]) }}">{{ $event->name }}</a></td>
                    <td>{{ $event->short_description }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="card-footer">
            {{ $events->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
