@extends('layout.app')
@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-4 ">

                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input id="email" type="email" name="email" class="form-control" >
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input id="password" type="password" name="password" class="form-control" >
                    </div>
                    <button onclick="submitLogin()" type="submit" class="btn btn-primary mt-4">login</button>

            </div>
        </div>
    </div>
    <script> async function submitLogin() {
            let email=document.getElementById('email').value;
            let password=document.getElementById('password').value;

            if (email.length===0){
                errorToast('Email is required');
            }
            else if(password.length===0){
                errorToast('Password ir required');
            } else {
                showLoader();
                let res=await axios.post("/user-login",{email:email, password:password});
                hideLoader();
                if (res.status===200 && res.data['status']==='success'){
                    window.location.href="/dashboard"
                } else {
                    errorToast(res.data['message']);
                }
            }
        }
    </script>
@endsection

