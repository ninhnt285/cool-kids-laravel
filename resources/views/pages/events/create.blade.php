@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">@if(isset($event))Edit Event: "{{ $event->name }}" @else Add New Event @endif</h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data"  action="@if(isset($event)) {{ route('events.update', ['event' => $event]) }} @else {{ route('events.store') }} @endif" method="POST">
                            @csrf
                            @isset($event)@method('PUT')@endisset
                            {{-- Name & Image --}}
                            <div class="row pb-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="name">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control" @isset($event)value="{{ $event->name }}"@endisset>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="slug">Slug:</label>
                                        <input type="text" name="slug" id="slug" class="form-control" @isset($event)value="{{ $event->slug }}"@endisset>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-2">
                                <div class="col-md-4">
                                    <div class="form-group form-file-upload form-file-multiple">
                                        <input type="file" multiple="" name="image" class="inputFileHidden">
                                        <div class="input-group">
                                            <input type="text" class="form-control inputFileVisible" placeholder="Event Image">
                                            <span class="input-group-btn">
                                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                                <i class="material-icons">attach_file</i>
                                            </button>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="start_time">Start Time:</label>
                                        <input type="text" name="start_time" class="form-control datetimepicker" value="{{$start_time}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="start_time">End Time:</label>
                                        <input type="text" name="end_time" class="form-control datetimepicker" value="{{$end_time}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="position: relative;" for="short_description">Short Description</label>
                                <textarea class="form-control" id="short_description" style="box-shadow: 1px -1px 5px #DDDDDD; padding: 5px;" name="short_description" rows="4">@isset($event){{$event->short_description}}@endisset</textarea>
                            </div>

                            <div class="form-group">
                                <label style="position: relative;" for="description">Full Description</label>
                                <textarea class="form-control" id="description" name="description" rows="10">@isset($event){{$event->description}}@endisset</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-embed')
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/material/plugins/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/material/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            mode: "exact",
            elements : "description",
            plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        });

        $(document).ready(function() {
            // initialise Datetimepicker and Sliders
            md.initFormExtendedDatetimepickers();
        });
    </script>
@endsection
