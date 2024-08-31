@extends('layout.app')
@section('content')
    <div class="container col-8 mt-5">
        <h3 class="py-3">User Profile</h3>
        <div class=" row shadow p-3 mb-5 bg-body rounded g-3 mt-5">
            <div class="col-md-4">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input id="email" type="email" name="email" class="form-control">
            </div>
            <div class="col-4">
                <label for="exampleInputFirstName" class="form-label">First Name</label>
                <input id="firstName" type="text" name="firstName" class="form-control">
            </div>
            <div class="col-4">
                <label for="exampleInputLastName" class="form-label">Last Name</label>
                <input id="lastName" type="text" name="lastName" class="form-control">
            </div>
            <div class="col-ms-4 col-4">
                <label for="exampleInputMobile" class="form-label">Mobile</label>
                <input id="mobile" type="tel" name="mobile" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input id="password" type="password" name="password" class="form-control">
            </div>
            <div class="col-8 my-2 pb-3">
                <button onclick="onUpdate()" type="submit" class="btn btn-primary mt-4">Update Profile</button>
            </div>
        </div>
    </div>
    <script>
        getProfile();
        async function getProfile(){
            showLoader();
            let res=await axios.get("/user-profile")
            hideLoader();
            if(res.status===200 && res.data['status']==='success'){
                let data=res.data['data'];
                document.getElementById('email').value=data['email'];
                document.getElementById('firstName').value=data['firstName'];
                document.getElementById('lastName').value=data['lastName'];
                document.getElementById('mobile').value=data['mobile'];
                document.getElementById('password').value=data['password'];
            }
            else {
                errorToast(res.data['message'])
            }
        }
        async function onUpdate() {
            let firstName=document.getElementById('firstName').value;
            let lastName=document.getElementById('lastName').value;
            let email=document.getElementById('email').value;
            let mobile=document.getElementById('mobile').value;
            let password=document.getElementById('password').value;

            if (firstName.length===0){
                errorToast('First Name is Required')
            } else if (lastName.length===0){
                errorToast('Last Name is Required')
            } else if (email.length===0){
                errorToast('Email is Required')
            } else if (mobile.length===0){
                errorToast('Mobile is Required')
            } else if (password.length===0){
                errorToast('Password is Required')
            } else {
                showLoader();
                let res=await axios.post('/user-registration-form', {
                    firstName:firstName,
                    lastName:lastName,
                    email:email,
                    mobile:mobile,
                    password:password
                })
                hideLoader();
                if (res.status===200 && res.data['status']==='success'){
                    successToast('Registration Success')
                    setTimeout(function (){
                        window.location.href='/user-login'
                    },2000)
                } else {
                    errorToast('Registration Failed')
                }
            }
        }
    </script>
@endsection

