<!-- The Modal -->
<div class="modal fade" id="addGuest">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add guest to {{$event->title}} </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                @if(count($guestList) > 0)
                    <form action="{{route ('creator.guests.store')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Select Guest</label>
                            <select name="user_id" class="custom-select" required>
                                @foreach($guestList as $guest)
                                    <option value="{{$guest->id}}" title="{{$guest->name}}">{{$guest->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input name="event_id" type="hidden" value="{{$event->id}}">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add Guest</button>
                        </div>
                    </form>
                @else
                    <h1 class="h4 mb-0 font-weight-bold">No free guest left</h1>
                @endif
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
