@extends('layout.app')
@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-4 bg-secondary p-5 shadow-lg p-5" style="border-radius: 10px;">
                    @csrf
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input id="email" type="email" name="email" class="form-control" >
                    </div>
                    <button onclick="sendCode()" type="submit" class="btn btn-primary mt-4">Send Code</button>
            </div>
        </div>
    </div>

<script>

   async function sendCode() {
        let email = document.getElementById('email').value;
        if(email.length === 0){
            errorToast('Please enter your email address')
        }
        else {
            showLoader();
            let res = await axios.post('/sendOTP', {email: email});
            hideLoader();
            if (res.status===200 && res.data['status']==='Success'){
                successToast(res.data['message'])
                sessionStorage.setItem('email', email);
                setTimeout(function (){
                    window.location.href = '/verify-otp-page'
                }, 1000)
            }
            else {
                errorToast(res.data['message'])
            }
        }
    }
</script>

@endsection
