<x-front.master bodyClass="donation-requests">
    <div class="all-requests">
        <div class="container">
            <x-breadcrumb :items="['Home', 'Donation requests']" :routes="['/', 'donation-request']" />

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>Donation requests</h2>
                </div>
                <div class="content">
                    <form class="row filter">
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>Choose blood type</option>
                                        @foreach ($bloodTypes as $bloodType)
                                            <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>Choose city</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="patients">
                        @foreach ($donationRequests as $donation)
                            <div class="details">
                                <div class="blood-type">
                                    <h2>{{ $donation->bloodType->name }}</h2>
                                </div>
                                <ul>
                                    <li><span>Patient name:</span> {{ $donation->patient_name }}</li>
                                    <li><span>Hospital:</span> {{ $donation->hospital_name }}</li>
                                    <li><span>City:</span> {{ $donation->city->name }}</li>
                                </ul>
                                <a href="{{ route('inside.request',$donation) }}">Details</a>
                            </div>
                        @endforeach
                    </div>
                    {{ $donationRequests->links() }}
                </div>
            </div>
        </div>
    </div>
</x-front.master>
