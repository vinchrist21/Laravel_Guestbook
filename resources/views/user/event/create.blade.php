<!-- The Modal -->
<div class="modal fade" id="addmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Request to Join Event</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                @if(count($events) > 0)
                    <form action="{{route ('user.events.store')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Choose Event</label>
                            <select name="event_id" class="custom-select" required>
                                @foreach($events as $event)
                                    <option value="{{$event->id}}">{{$event->title . " (" . \Carbon\Carbon::parse($event->event_date)->format('d F Y') . ")"}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Send request</button>
                        </div>
                    </form>
                @else
                    <h1 class="h4 mb-0 font-weight-bold">No Ongoing Event</h1>
                @endif
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
