<x-layout>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-4 ">
            <form method="post" action="{{ route('form.Registration.Post') }}">
                @csrf
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" name="firstName" class="form-control">
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="text" name="lastName" class="form-control">
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" >
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Mobile</label>
                    <input type="tel" name="mobile" class="form-control" >
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary mt-4">Registration</button>
            </form>
        </div>
    </div>
</div>
</x-layout>
