<div class="d-flex mb-3 add-hour-{{$child_count}}">
    <div class="input-group">
        <select class="form-select" id="start_hour">
        @for ($i = 1; $i <= 24; $i++): ?>
            <option id="0" @if($i == 10) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
        @endfor
        </select>
        <span class="p-2">時</span>
        <select class="form-select" id="start_minute">
        @for ($i = 0; $i <= 59; $i++): ?>
            <option @if($i == 00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>{{date("i", strtotime("1:$i"))}}</option>
        @endfor
        </select>
        <span class="p-2">分</span>
    </div>
    <span class="p-2"> ~ </span>
    <div class="input-group">
        <select class="form-select" id="end_hour">
        @for ($i = 1; $i <= 24; $i++): ?>
            <option @if($i == 19) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
        @endfor
        </select>
        <span class="p-2">時</span>
        <select class="form-select" id="end_minute">
        @for ($i = 0; $i <= 59; $i++): ?>
            <option @if($i == 00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>{{date("i", strtotime("1:$i"))}}</option>
        @endfor
        </select>
        <span class="p-2">分</span>
    </div>
    <a class="p-2 remove_hour" data-id="{{$child_count}}">
        <i class="fa fa-close text-dark" style="font-size:20px"></i>
    </a>
</div>