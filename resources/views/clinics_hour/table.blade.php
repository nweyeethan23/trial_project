<tr id="Sunday">
    <td width="10%" class="text-center">日曜日</td>
    <td width="60%">
        @if($sunday)
        <div id="add-hour-item-old" class="add-hour-item @if(!empty($sunday[0]->is_holiday) == 1) hide @endif">
            @foreach($sunday as $key=>$item)
            <div class="d-flex mb-3 add-hour-old-{{$key}}">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="{{$item->id}}" @if($i== date("H", strtotime("$item->opening_hour"))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i== date("i", strtotime("$item->opening_hour")))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==date("H", strtotime("$item->closing_hour")))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==date("i", strtotime("$item->closing_hour"))))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                @if($key != 0)
                <a class="p-2 remove_hour_old" data-id="{{$key}}">
                    <i id="{{$item->id}}" class="fa fa-close text-dark" style="font-size:20px"></i>
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div id="1" class="add-hour-item">
            <div class="d-flex mb-3 default-hour">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="0" @if($i==10) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==19) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
            </div>
        </div>
        @endif
        <a class="btn regular-holiday @if(!empty($sunday[0]->is_holiday) == 0) hide @endif" id="regular-holiday">
            定休日
        </a>
    </td>
    <td>
        <a class="btn add_time edit @if(!empty($sunday[0]->is_holiday) == 1) hide @endif" id="1">
            時間を追加
        </a>
        <a data-id="1" class="btn delete set_holiday">
            定休日に設定
        </a>
    </td>
</tr>
<tr id="Monday">
    <td width="10%" class="text-center">月曜日</td>
    <td width="60%">
        @if($monday)
        <div id="add-hour-item-old" class="add-hour-item @if(!empty($monday[0]->is_holiday) == 1) hide @endif">
            @foreach($monday as $key=>$item)
            <div class="d-flex mb-3 add-hour-old-{{$key}}">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="{{$item->id}}" @if($i== date("H", strtotime("$item->opening_hour"))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i== date("i", strtotime("$item->opening_hour")))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==date("H", strtotime("$item->closing_hour")))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==date("i", strtotime("$item->closing_hour"))))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                @if($key != 0)
                <a class="p-2 remove_hour_old" data-id="{{$key}}">
                    <i id="{{$item->id}}" class="fa fa-close text-dark" style="font-size:20px"></i>
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div id="2" class="add-hour-item">
            <div class="d-flex mb-3 default-hour">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==10) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option id="0" @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==19) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
            </div>
        </div>
        @endif
        <a class="btn regular-holiday @if(!empty($monday[0]->is_holiday) == 0) hide @endif">
            定休日
        </a>
    </td>
    <td>
        <a href="" class="btn add_time edit @if(!empty($monday[0]->is_holiday) == 1) hide @endif" id="2">
            時間を追加
        </a>
        <a data-id="2" class="btn delete set_holiday">
            定休日に設定
        </a>
    </td>
</tr>
<tr id="Tuesday">
    <td width="10%" class="text-center">火曜日</td>
    <td width="60%">
        @if($tuesday)
        <div id="add-hour-item-old" class="add-hour-item @if(!empty($tuesday[0]->is_holiday) == 1) hide @endif">
            @foreach($tuesday as $key=>$item)
            <div class="d-flex mb-3 add-hour-old-{{$key}}">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="{{$item->id}}" @if($i== date("H", strtotime("$item->opening_hour"))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i== date("i", strtotime("$item->opening_hour")))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==date("H", strtotime("$item->closing_hour")))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==date("i", strtotime("$item->closing_hour"))))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                @if($key != 0)
                <a class="p-2 remove_hour_old" data-id="{{$key}}" >
                    <i id="{{$item->id}}" class="fa fa-close text-dark" style="font-size:20px"></i>
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div id="3" class="add-hour-item">
            <div class="d-flex mb-3 default-hour">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="0" @if($i==10) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==19) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
            </div>
        </div>
        @endif
        <a class="btn regular-holiday @if(!empty($tuesday[0]->is_holiday) == 0) hide @endif">
            定休日
        </a>
    </td>
    <td>
        <a href="" class="btn add_time edit @if(!empty($tuesday[0]->is_holiday) == 1) hide @endif" id="3">
            時間を追加
        </a>
        <a data-id="3" class="btn delete set_holiday">
            定休日に設定
        </a>
    </td>
</tr>
<tr id="Wednesday">
    <td width="10%" class="text-center">水曜日</td>
    <td width="60%">
        @if($wednesday)
        <div id="add-hour-item-old" class="add-hour-item @if(!empty($wednesday[0]->is_holiday) == 1) hide @endif">
            @foreach($wednesday as $key=>$item)
            <div class="d-flex mb-3 add-hour-old-{{$key}}">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="{{$item->id}}" @if($i== date("H", strtotime("$item->opening_hour"))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i== date("i", strtotime("$item->opening_hour")))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==date("H", strtotime("$item->closing_hour")))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==date("i", strtotime("$item->closing_hour"))))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                @if($key != 0)
                <a class="p-2 remove_hour_old" data-id="{{$key}}" >
                    <i id="{{$item->id}}" class="fa fa-close text-dark" style="font-size:20px"></i>
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div id="4" class="add-hour-item">
            <div class="d-flex mb-3 default-hour">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="0" @if($i==10) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==19) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
            </div>
        </div>
        @endif
        <a class="btn regular-holiday @if(!empty($wednesday[0]->is_holiday) == 0) hide @endif">
            定休日
        </a>
    </td>
    <td>
        <a href="" class="btn add_time edit @if(!empty($wednesday[0]->is_holiday) == 1) hide @endif" id="4">
            時間を追加
        </a>
        <a data-id="4" class="btn delete set_holiday">
            定休日に設定
        </a>
    </td>
</tr>
<tr id="Thursday">
    <td width="10%" class="text-center">木曜日</td>
    <td width="60%">
        @if($thursday)
        <div id="add-hour-item-old" class="add-hour-item @if(!empty($thursday[0]->is_holiday) == 1) hide @endif">
            @foreach($thursday as $key=>$item)
            <div class="d-flex mb-3 add-hour-old-{{$key}}">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="{{$item->id}}" @if($i== date("H", strtotime("$item->opening_hour"))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i== date("i", strtotime("$item->opening_hour")))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==date("H", strtotime("$item->closing_hour")))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==date("i", strtotime("$item->closing_hour"))))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                @if($key != 0)
                <a class="p-2 remove_hour_old" data-id="{{$key}}" >
                    <i id="{{$item->id}}" class="fa fa-close text-dark" style="font-size:20px"></i>
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div id="5" class="add-hour-item">
            <div class="d-flex mb-3 default-hour">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="0" @if($i==10) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==19) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
            </div>
        </div>
        @endif
        <a class="btn regular-holiday @if(!empty($thursday[0]->is_holiday) == 0) hide @endif">
            定休日
        </a>
    </td>
    <td>
        <a href="" class="btn add_time edit @if(!empty($thursday[0]->is_holiday) == 1) hide @endif" id="5">
            時間を追加
        </a>
        <a data-id="5" class="btn delete set_holiday">
            定休日に設定
        </a>
    </td>
</tr>
<tr id="Friday">
    <td width="10%" class="text-center">金曜日</td>
    <td width="60%">
        @if($friday)
        <div id="add-hour-item-old" class="add-hour-item @if(!empty($friday[0]->is_holiday) == 1) hide @endif">
            @foreach($friday as $key=>$item)
            <div class="d-flex mb-3 add-hour-old-{{$key}}">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="{{$item->id}}" @if($i== date("H", strtotime("$item->opening_hour"))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i== date("i", strtotime("$item->opening_hour")))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==date("H", strtotime("$item->closing_hour")))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==date("i", strtotime("$item->closing_hour"))))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                @if($key != 0)
                <a class="p-2 remove_hour_old" data-id="{{$key}}" >
                    <i id="{{$item->id}}" class="fa fa-close text-dark" style="font-size:20px"></i>
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div id="6" class="add-hour-item">
            <div class="d-flex mb-3 default-hour">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="0" @if($i==10) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==19) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
            </div>
        </div>
        @endif
        <a class="btn regular-holiday @if(!empty($friday[0]->is_holiday) == 0) hide @endif">
            定休日
        </a>
    </td>
    <td>
        <a href="" class="btn add_time edit @if(!empty($friday[0]->is_holiday) == 1) hide @endif" id="6">
            時間を追加
        </a>
        <a data-id="6" class="btn delete set_holiday">
            定休日に設定
        </a>
    </td>
</tr>
<tr id="Saturday">
    <td width="10%" class="text-center">土曜日</td>
    <td width="60%">
        @if($saturday)
        <div id="add-hour-item-old" class="add-hour-item @if(!empty($saturday[0]->is_holiday) == 1) hide @endif">
            @foreach($saturday as $key=>$item)
            <div class="d-flex mb-3 add-hour-old-{{$key}}">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="{{$item->id}}" @if($i== date("H", strtotime("$item->opening_hour"))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i== date("i", strtotime("$item->opening_hour")))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==date("H", strtotime("$item->closing_hour")))) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==date("i", strtotime("$item->closing_hour"))))) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                @if($key != 0)
                <a class="p-2 remove_hour_old" data-id="{{$key}}" >
                    <i id="{{$item->id}}" class="fa fa-close text-dark" style="font-size:20px"></i>
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div id="7" class="add-hour-item">
            <div class="d-flex mb-3 default-hour">
                <div class="input-group">
                    <select class="form-select" id="start_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option @if($i==10) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="start_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
                <span class="p-2"> ~ </span>
                <div class="input-group">
                    <select class="form-select" id="end_hour">
                        @for ($i = 1; $i <= 24; $i++): ?>
                            <option id="0" @if($i==19) selected @endif value="{{$i}}">{{date("H", strtotime("$i:00"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">時</span>
                    <select class="form-select" id="end_minute">
                        @for ($i = 0; $i <= 59; $i++): ?>
                            <option @if($i==00) selected @endif value='{{date("i", strtotime("1:$i"))}}'>
                                {{date("i", strtotime("1:$i"))}}</option>
                            @endfor
                    </select>
                    <span class="p-2">分</span>
                </div>
            </div>
        </div>
        @endif
        <a class="btn regular-holiday @if(!empty($saturday[0]->is_holiday) == 0) hide @endif">
            定休日
        </a>
    </td>
    <td>
        <a href="" class="btn add_time edit @if(!empty($saturday[0]->is_holiday) == 1) hide @endif" id="7">
            時間を追加
        </a>
        <a data-id="7" class="btn delete set_holiday">
            定休日に設定
        </a>
    </td>
</tr>