<x-layout>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-4 ">
                <form method="post" action="{{ route('otp.verify') }}">
                    @csrf
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" >
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">OTP Code</label>
                        <input type="number" name="otp" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit Code</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
