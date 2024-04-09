@extends('layouts.app')

@section('content')
<div class="container user-main">
    <h5 class="pb-4">アカウント情報t</h5>
    <div class="bg-white p-5">
        <div  class="p-5">
            <div class="row mb-3 text-center">
                <div class="text-danger fw-semibold" id="passwordMatchError"></div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">メールアドレス</label>
                <div class="col-md-6">
                    <h5 class="edit-mail">{{$user->email}}</h5>
                    <input id="id" type="hidden" value="{{$user->id}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">パスワード</label>
                <div class="col-md-6">
                    <input id="password" type="password" name="password" class="form-control email" required autofocus>
                    <div class="text-danger fw-semibold" id="passwordError"></div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">パスワード（確認）</label>
                <div class="col-md-6">
                    <input id="confirmPassword" type="password" name="confirm_password"  class="form-control" autofocus>
                    <div class="text-danger fw-semibold" id="confirmPasswordError"></div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-8 offset-md-4 add-user">
                    <button class="btn" onclick="updateUsers(event)">
                        アカウントを保存する
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    function updateUsers(ev) {
        ev.preventDefault
        var id = document.getElementById("id").value;
        var passValue = document.getElementById("password").value
        var confpassValue = document.getElementById("confirmPassword").value
        // check Passwords do not match.
        if (passValue == "") {
            document.getElementById("passwordError").innerHTML = "* Please Enter Passwords!";
            document.getElementById("confirmPasswordError").innerHTML = "";
        }
        else if (confpassValue == "") {
            document.getElementById("confirmPasswordError").innerHTML = "* Please Enter confirm password!";
            document.getElementById("passwordError").innerHTML = "";
        }
       else if(passValue !== confpassValue) {
            document.getElementById("passwordMatchError").innerHTML = "* Passwords and confirm password do not match!";
            document.getElementById("passwordError").innerHTML = "";
            document.getElementById("confirmPasswordError").innerHTML = "";
        }else{
            let data = {
                'id' : id,
                'password':passValue,
                'confirm_password' : confpassValue,
            };
            $.ajax({
                url: '{{ route("update") }}',
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
    }

</script>
@endsection