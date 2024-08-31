@extends('layout.app')
@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-4 p-5 shadow-lg p-5" style="border-radius: 10px;">
{{--                    <div class="mb-1">--}}
{{--                        <label for="exampleInputEmail1" class="form-label">Email address</label>--}}
{{--                        <input id="email" type="email" name="email" class="form-control" >--}}
{{--                    </div>--}}
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">OTP Code</label>
                        <input id="otp" type="number" name="otp" class="form-control" >
                    </div>
                    <button onclick="OtpCodeSubmit()" type="submit" class="btn btn-primary mt-4">Submit Code</button>
            </div>
        </div>
    </div>

<script>
    async function OtpCodeSubmit() {
        // let email = document.getElementById('email').value;
        let otp = document.getElementById('otp').value;
     if(otp.length !==4){
            errorToast('Invalid OTP')
        } else {
            showLoader();
            let res = await axios.post('/verify-otp', {
                otp: otp,
                email:sessionStorage.getItem('email')
            })
            hideLoader();
            if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message'])
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href = '/reset-page'
                }, 1000);
            }
            else {
                errorToast(res.data['message'])
            }
        }
    }
</script>
@endsection

