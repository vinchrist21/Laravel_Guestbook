<!-- The Modal -->
<div class="modal fade" id="editEvent-{{$event->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Event <b>{{$event->title}}</b> Detail's</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route ('creator.event.update', $event->id)}}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{$event->title}}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control">{{$event->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Event Date</label>
                        <input type="date" name="event_date" class="form-control" value="{{$event->event_date}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update Event</button>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
