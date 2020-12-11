@extends('welcome')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-12 text-center">
                <h1>Form</h1>
            </div>
            <div class="col-6 offset-md-3">
                <form id="ajaxform" class="row g-3">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="First name" id="firstName" name="firstName" required>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Last name" id="lastName" name="lastName" required>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" name="address" id="address" placeholder="Address" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Mobile" id="phone" name="phone" minlength="10" maxlength="10" size="10" required>
                    </div>
                    <input type="hidden" name="formId" id="formId" value="">
                    <div class="col-12 d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Submit">&nbsp;
                        <input type="reset" class="btn btn-primary" value="Reset">
                    </div>
                </form>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-12 text-center">
                <h1>Form Data</h1>
            </div>
            <div class="col-12">
                <table id="formTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Sr.No</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($formData->count())
                        @foreach($formData as $key => $data)
                        <tr onclick="update('{{ $data->id }}')" id="{{ $key+1 }}">
                            <td>{{ $key+1 }}</td>
                            <td id="firstName">{{ $data->firstName }}</td>
                            <td id="lastName">{{ $data->lastName }}</td>
                            <td id="address">{{ $data->address }}</td>
                            <td id="email">{{ $data->email }}</td>
                            <td id="phone">{{ $data->phone }}</td>
                        </tr>
                        @endforeach
                        <input type="hidden" id="lastKey" name="lastKey" value="{{ $key+2 }}">
                        @else
                        <tr id="defaultData">
                            <td class="text-center text-danger" colspan="6">No Record Found</td>
                            <input type="hidden" id="lastKey" name="lastKey" value="1">
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection