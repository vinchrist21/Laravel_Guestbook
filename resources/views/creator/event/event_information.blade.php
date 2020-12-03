<div class="row">
    <div class="col-md-3">
        <h6>Title</h6>
    </div>
    <div class="col-md-9">
        : {{$event->title}}
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <h6>Description</h6>
    </div>
    <div class="col-md-9">
        : {{$event->description}}
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <h6>Created By</h6>
    </div>
    <div class="col-md-9">
        : {{$event->creator->name}}
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <h6>Total Attendee</h6>
    </div>
    <div class="col-md-9">
        : {{$event->noa}}
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <h6>Event Date</h6>
    </div>
    <div class="col-md-9">
        : {{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <h6>Event Status</h6>
    </div>
    <div class="col-md-9">
        : @switch($event->status)
            @case('0')
            <span class="text-danger">Closed</span>
            @break
            @case('1')
            <span class="text-success">Open for applicant</span>
            @break
        @endswitch
    </div>
</div>
