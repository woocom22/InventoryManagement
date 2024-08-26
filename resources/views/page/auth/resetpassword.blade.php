@extends('layout.app')
@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-4 bg-secondary p-5 shadow-lg p-5" style="border-radius: 10px;">
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">New Password</label>
                        <input id="password" type="password" name="password" class="form-control" >
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Conform Password</label>
                        <input id="conformPassword" type="password" name="conformPassword" class="form-control" >
                    </div>
                    <button onclick="RestPassword()" type="submit" class="btn btn-primary mt-4">Reset Password</button>
            </div>
        </div>
    </div>

<script>
    async function RestPassword() {
        let password = document.getElementById('password').value;
        let conformPassword = document.getElementById('conformPassword').value;

        if (password.length===0){
            errorToast('Enter your new password')
        } else if(conformPassword.length===0){
            errorToast('Enter your conform password')
        } else if(password!==conformPassword){
            errorToast('New password and Conform password must be same')
        }
        else {
            showLoader();
            let res = await axios.post("/reset-password",{password:password});
            hideLoader();
            if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message']);
                setTimeout(function () {
                    window.location.href="/user-login";
                },1000);
            }
            else {
                errorToast(res.data['message'])
            }
        }
    }
</script>
@endsection
