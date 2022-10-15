@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="pull-left">
                            <h4 class="card-title">{{ $event->name }}</h4>
                            <div class="card-category"></div>
                        </div>
                        @can('edit-events')<a href="{{ route('events.edit', $event) }}" class="btn btn-round btn-fill btn-success pull-right">Edit</a>@endcan
                        @auth()
                            @if($event->attending)
                                <a id="unattend-event" href="#" class="mr-3 btn btn-round btn-fill btn-success pull-right">Un-Attend</a>
                            @else
                                <a id="attend-event" href="#" class="mr-3 btn btn-round btn-fill btn-success pull-right">Attend</a>
                            @endif
                        @endauth
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="image-container">@if($event->image_path)<img class="event-image rounded" style="width:250px; height: 250px;" src="{{asset('storage/' . $event->image_path) }}"/>@endif</div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-8">
                                <div class="col-xs-12">
                                    <p>{{ $event->short_description }}</p>
                                </div>
                                {{-- Time --}}
                                <div class="col-xs-12">
                                    <h6>Start Time: {{ $event->start_time }}</h6>
                                </div>
                                <div class="col-xs-12">
                                    <h6>End Time: {{ $event->end_time }}</h6>
                                </div>
                                <div class="col-xs-12">
                                    <h6>@if($event->attending) Attending @else Not Attending @endif</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Desc --}}
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Description</h4>
                    </div>
                    <div class="card-body">
                        {!! $event->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-embed')
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Attend an event
            $('#attend-event').click(function(e) {
                $('#attend-event').addClass("disabled");
                e.preventDefault();
                $.ajax({
                    url: "{{ url('attend-event/' . $event->id) }}",
                    type: "POST",
                    complete: function (data) {
                        location.reload();
                    }
                });
                return false;
            });

            // Un-attend an event
            $('#unattend-event').click(function(e) {
                $('#unattend-event').addClass("disabled");
                e.preventDefault();

                $.ajax({
                    url: "{{ url('unattend-event/' . $event->id) }}",
                    type: "POST",
                    complete: function (data) {
                        location.reload();
                    }
                });
                return false;
            });
        });
    </script>
@endsection
