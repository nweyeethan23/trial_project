@extends('layouts.app')

@section('content')
<div class="container user-main">
    <div class="row">
        <div class="col-md-10"><h5 class="pb-4">長期休業設定</h5></div>
        <div class="col-md-2">
        <select class="form-select" id="clinics_id">
            @foreach($clinics as $clinic)
                <option selected value="{{$clinic->id}}">{{$clinic->name}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <form id="save_vocation" action="#">
    <div class="row bg-white p-4">
        <div class="col-1 col-sm-1 col-md-1">期間</div>
        <div class="col-9 col-sm-9 col-md-9">
            <div class="d-flex mb-3" name="event_date_time_list">
                <div class="input-group">
                    <input id="startDate" type="text" class="form-control" name="start_date" placeholder="年/月/日" autocomplete="off" required>
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <span class="m-1"> ~ </span>
                <div class="input-group me-2">
                    <input id="endDate" type="text"  class="form-control" name="end_date" placeholder="年/月/日" autocomplete="off" required>
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input id="reason" type="text" class="form-control" placeholder="理由を入力" required>
            </div>
        </div>
        <div class="col-2 col-sm-2 col-md-2 add-user text-center">
            <button class="btn" id="save_vocation">
                保存する
            </button>
        </div>
    </div>
    </form>
    <div class="row mt-5">
        <table class="table">
            <tbody id="data_table" class="p-5">
                
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
  
    $(function () {
        $('#endDate').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
        })
        $('#startDate').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
        })
        //show long holiday
        getVocation();
        function getVocation(){

            var selectElement = document.querySelector('#clinics_id');
            var id = selectElement.options[selectElement.selectedIndex].value;
            let data = {
                'id' : id,
            };
            $.ajax({
                url: '{{ route("long_vocation") }}',
                type: 'GET',
                data: data,
                dataType: "JSON",

                success: function (data) {
                    console.log(data);
                    $('#data_table').html(data.table);

                }
            });
        }
        //select clinics
        $('#clinics_id').change(function() {
            getVocation();
        });
        //add long vocation
        $('#save_vocation').submit(function(e) {
            e.preventDefault
            var startDate = document.getElementById("startDate").value;
            var endDate = document.getElementById("endDate").value;
            var reason = document.getElementById("reason").value;
            var selectElement = document.querySelector('#clinics_id');
            var id = selectElement.options[selectElement.selectedIndex].value;

            // check Passwords do not match.
            let data = {
                'startDate' : startDate,
                'endDate':endDate,
                'reason' : reason,
                'id' : id,
            };
            $.ajax({
                url: '{{ route("add_vocation") }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                dataType: "JSON",

                success: function (data) {
                    if(data.data == 'success'){
                        document.getElementById("startDate").value = '';
                        document.getElementById("endDate").value = '';
                        document.getElementById("reason").value = '';
                        getVocation();
                    }
                }
            });
            return false; 
        })
        // delete long vocation
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            let start_date = $(this).data('id');
            let id = e.target.id;
            let text = '「'+start_date+'　お盆休みのため」を削除します。よろしいですか？';

            swal({
                title: "test.jp の内容",
                text: text,
                background: '#292A2D',
                showCancelButton: true,
                confirmButtonColor: "#92B4F2",
                cancelButtonText: "キャンセル",
                confirmButtonText: "OK",
                closeOnConfirm: true
            },
            function(isConfirm) {
                if(isConfirm){
                    let data = {
                        'id' : id,
                    };
                    $.ajax({
                        url: '{{ route("vocation_delete") }}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        data: data,
                        dataType: "JSON",

                        success: function (data) {
                            //console.log(data);
                            if(data.data == 'success'){
                                getVocation();
                            }

                        }
                    });
                }
            });
        });

    });


</script>
@endsection
