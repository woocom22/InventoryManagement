<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-4 shadow p-5 mb-5 bg-body rounded" style="border-radius: 10px;">
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input id="firstName" type="text" name="firstName" class="form-control">
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input id="lastName" type="text" name="lastName" class="form-control">
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input id="email" type="email" name="email" class="form-control" >
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Mobile</label>
                <input id="mobile" type="tel" name="mobile" class="form-control" >
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input id="password" type="password" name="password" class="form-control" >
            </div>
            <button onclick="onRegistration()" type="submit" class="btn btn-primary mt-4">Registration</button>
            {{--            </form>--}}
        </div>
    </div>
</div>
<script>async function onRegistration() {
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
