@extends('layouts.app')

@section('content')
<div class="container user-main">
    <div class="row">
        <div class="col-md-10"><h5 class="pb-4">診察時間編集</h5></div>
        <div class="col-md-2">
        <select class="form-select" id="clinics_id">
            @foreach($clinics as $clinic)
                <option selected value="{{$clinic->id}}">{{$clinic->name}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="row mt-5">
        <table class="table">
            <tbody id="data_table" class="p-5">
               
            </tbody>
        </table>
        <div class="text-end add-user">
            <a class="btn text-center save_clinic">
                変更を保存する
            </a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
  
    $(function () {
        //add time and hour
        let idItem = [];
        $(document).on('click', '.add_time', function (e) {
            e.preventDefault();
            let id =  e.target.id;
            let selector = '#data_table > tr:nth-child('+id+') .add-hour-item'
            let childCount = $('.add-hour-item').children().length;
            let data = {
                childCount,
            };

            $.ajax({
                url: "{{ route('add_hour') }}",
                type: 'GET',
                dataType: 'HTML',
                data, 

                success: function (data) {
                    //$('#add-hour-item').append(data);
                    $(selector).append(data);
                   
                }
            });
        });

        //remove hour
        $(document).on('click', '.remove_hour', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            $(this).closest('.add-hour-item').find(`.add-hour-${id}`).remove();
            $(this).closest('.add-hour-item').find(`.add-hour-old-${id}`).remove();
        });
        //remove hour
        $(document).on('click', '.remove_hour_old', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let hour_id =  e.target.id;
            idItem.push(hour_id);
            $(this).closest('.add-hour-item').find(`.add-hour-old-${id}`).remove();
        });

        //add regular holiday
        $(document).on('click', '.set_holiday', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            
            let selector = '#data_table > tr:nth-child('+id+') .default-hour';
            let selector1 = '#data_table > tr:nth-child('+id+') .add-hour-item';
            let holiday = $('#data_table > tr:nth-child('+id+')').find(`.hide`).length;
            console.log($('#data_table > tr:nth-child('+id+')'));
            if(holiday == 1){
                $('#data_table > tr:nth-child('+id+') .regular-holiday').removeClass('hide');
                $('#data_table > tr:nth-child('+id+') .add_time').addClass('hide');
                $(selector).removeClass('d-flex');
                $(selector).addClass('hide');
                $(selector1).addClass('hide');
            }else{
                $('#data_table > tr:nth-child('+id+') .regular-holiday').addClass('hide');
                $('#data_table > tr:nth-child('+id+') .add_time').removeClass('hide');
                $(selector).addClass('d-flex');
                $(selector).removeClass('hide');
                $(selector1).removeClass('hide');
            }
            
        });

        //show clinics time
        getClinicTime();
        function getClinicTime(){

            var selectElement = document.querySelector('#clinics_id');
            var id = selectElement.options[selectElement.selectedIndex].value;
            let data = {
                'id' : id,
            };
            $.ajax({
                url: '{{ route("clinics") }}',
                type: 'GET',
                data: data,
                dataType: "JSON",

                success: function (data) {
                    //console.log(data);
                    $('#data_table').html(data.table);

                }
            });
        }
        //get add hour
        function getAddHour(tableRows){

            var clinicElement = document.querySelector('#clinics_id');
            var clinic_id = clinicElement.options[clinicElement.selectedIndex].value;
            var checkedIndexes = [];
            for (var i = 0; i < tableRows.length; i++) {
                
                var startHourElement = tableRows[i].children[0].children[0];
                var start_hour = startHourElement.options[startHourElement.selectedIndex].value;
                var startMinElement = tableRows[i].children[0].children[2];
                var start_min = startMinElement.options[startMinElement.selectedIndex].value;

                var endHourElement = tableRows[i].children[2].children[0];
                var end_hour = endHourElement.options[endHourElement.selectedIndex].value;
                var endMinElement = tableRows[i].children[2].children[2];
                var end_min = endMinElement.options[endMinElement.selectedIndex].value;
                var id = startHourElement.options[startHourElement.selectedIndex].id
                checkedIndexes.push({
                    id: id,
                    clinic_id: clinic_id,
                    start_time: start_hour+':'+start_min+':00',
                    end_time: end_hour+':'+end_min+':00',
                })


            }

                return checkedIndexes;
        }

        //get add hour data list
        function getAllHour() {
            
            //let tableRows = $('#data_table .add-hour-item').children();
            var clinicElement = document.querySelector('#clinics_id');
            var clinic_id = clinicElement.options[clinicElement.selectedIndex].value;
            var checkedIndexes = [];
            let tableRows = $('#data_table').children();
            
            for (var i = 0; i < tableRows.length; i++) {
                let row = i+1;
                let holiday = $('#data_table > tr:nth-child('+row+')').find(`.hide`).length;
                let day_of_week = $('#data_table > tr:nth-child('+row+')').attr('id');

                if(holiday == 1){

                    checkedIndexes.push({
                        clinic_id: clinic_id,
                        day_of_week: day_of_week,
                        add_hour : getAddHour($('#data_table tr:nth-child('+row+') .add-hour-item').children()),
                        holiday: 0,
                    })
                    
                }else{  
                    checkedIndexes.push({
                        clinic_id: clinic_id,
                        day_of_week: day_of_week,
                        add_hour : getAddHour($('#data_table tr:nth-child('+row+') .add-hour-item').children()),
                        holiday: 1,

                    })

                }
            }
            return checkedIndexes;
            
        };
        //save clinics hour
        $(document).on('click', '.save_clinic', function (e) {
            e.preventDefault();
            let list = JSON.stringify(getAllHour());
            var idDeleteItem = JSON.stringify(idItem);
            console.log(getAllHour());
            let data = {
                'data':list,
                'delete_item':idDeleteItem
            };
            $.ajax({
                url: '{{ route("insert_hour") }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data: data,
                dataType: "JSON",

                success: function (data) {
                    console.log(data);
                    if(data.data == 'success'){
                        getClinicTime(); 
                        swal({
                            title: "Successful!",
                            icon: "success",
                            type: "success",
                            buttons: 'OK',
                        });
                    }
                   
                }
            });

        });

        //select clinics
        $('#clinics_id').change(function() {
            getClinicTime();
        });

    });


</script>
@endsection
