@foreach($LongHolidays as $longHoliday)
    <tr>
        <td width="30%" scope="row"  class="text-center">
            {{ date('Y', strtotime($longHoliday->start_date)) }}年
            {{ date('m', strtotime($longHoliday->start_date)) }}月
            {{ date('d', strtotime($longHoliday->start_date)) }}日
            ~ 
            {{ date('Y', strtotime($longHoliday->end_date)) }}年
            {{ date('m', strtotime($longHoliday->end_date)) }}月
            {{ date('d', strtotime($longHoliday->end_date)) }}日
        </td>
        <td width="50%" scope="row">{{$longHoliday->reason}}</td>
        <td> 
            <a 
                data-id="{{ date('Y', strtotime($longHoliday->start_date)) }}年{{ date('m', strtotime($longHoliday->start_date)) }}月{{ date('d', strtotime($longHoliday->start_date)) }}日~{{ date('Y', strtotime($longHoliday->end_date)) }}年{{ date('m', strtotime($longHoliday->end_date)) }}月{{ date('d', strtotime($longHoliday->end_date)) }}日" 
                id="{{$longHoliday->id}}" 
                value="{{$longHoliday->end_date}}" 
                class="btn btn-primary delete" >
                 削除
            </a>
        </td>
    </tr>
@endforeach