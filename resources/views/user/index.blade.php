@extends('layouts.app')

@section('content')
<div class="container user-main">
    <h5 class="pb-4">アカウント情報t</h5>
    <div class="bg-white">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">メールアドレス</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td width="70%" scope="row">{{$user->email}}</td>
                    <td>
                        <a href="{{ route('edit',$user->id) }}" class="btn edit">
                            パスワード変更
                        </a>
                        <a data-id="{{$user->id}}" class="btn delete" id="{{$user->email}}">
                            削除
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center add-user p-5">
            <a href="{{ route('create') }}" class="btn text-center">
                アカウントを追加する
            </a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let mail = e.target.id;
            let text = 'メールアドレス 「'+mail+'」のアカウントを削除します。よろしいですか？';

            swal({
                title: "test.jp の内容",
                text: text,
                background: '#292A2D',
                showCancelButton: true,
                confirmButtonColor: "#92B4F2",
                cancelButtonText: "キャンセル",
                confirmButtonText: "OK",
                closeOnConfirm: false
            },
            function(isConfirm) {
                if(isConfirm){
                    let data = {
                        'id' : id,
                    };
                    $.ajax({
                        url: '{{ route("delete") }}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        data: data,
                        dataType: "JSON",

                        success: function (data) {
                            //console.log(data);
                            if(data.data == 'success'){
                                let page = '{{ route("user") }}';
                                location.replace(page);
                            }

                        }
                    });
                }
            });
        });

    });


</script>
@endsection
