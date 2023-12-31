@extends("layouts.front_master")


@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="card card-style text-center">
                <h1 class="card-header py-4">
                    <i class="ion-ios-book "></i>
                </h1>
                <div class="card-body">
                    <h5 class="card-title">Medical Records</h5>
                    <p class="card-text">View your medical history including records, prescriptions, and tests results.</p>

                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route("patient.view.medical_profile") }}" class="btn btn-primary" style="background-color:#00b4ff;
                    border-color: #00b4ff;">Open</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="card card-style text-center">
                <h1 class="card-header py-4">
                    <i class="ion-ios-calendar "></i>
                </h1>
                <div class="card-body">
                    <h5 class="card-title">Appointments</h5>
                    <p class="card-text">Make an appointment with any available doctor during work hours.</p>

                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route("patient.view.appointment") }}" class="btn btn-primary" style="background-color:#00b4ff;
                    border-color: #00b4ff;">Open</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="card card-style text-center">
                <h1 class="card-header py-4">
                    <i class="ion-ios-chatbubbles "></i>
                </h1>
                <div class="card-body">
                    <h5 class="card-title">Chat</h5>
                    <p class="card-text">Chat with your doctors about any inquireis you have.</p>

                </div>
                <div class="card-footer text-muted">
                    <a href="{{url('chat')}}" class="btn btn-primary" style="background-color:#00b4ff;
                    border-color: #00b4ff;">Open</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
