<div class="requests">
    <div class="container">
        <div class="head-text">
            <h2>Donation requests</h2>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <form class="row filter">
                <div class="col-md-5 blood">
                    <div class="form-group">
                        <div class="inside-select">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option selected disabled>Choose blood type</option>
                                <option>A+</option>
                                <option>B+</option>
                                <option>AB+</option>
                                <option>O-</option>
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
                                <option>Mansoura</option>
                                <option>Cairo</option>
                                <option>Alexandria</option>
                                <option>Sohag</option>
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
                @foreach ($donationRequests as $request)
                    <div class="details">
                        <div class="blood-type">
                            <h2 dir="ltr">{{ $request->bloodType->name }}</h2>
                        </div>
                        <ul>
                            <li><span>Patient name:</span> {{ $request->patient_name }}</li>
                            <li><span>Hospital:</span> {{ $request->hospital_name }}</li>
                            <li><span>City:</span> {{ $request->city->name }}</li>
                        </ul>
                        <a href="inside-request-ltr.html">Details</a>
                    </div>
                @endforeach
            </div>
            <div class="more">
                <a href="donation-requests-ltr.html">More</a>
            </div>
        </div>
    </div>
</div>
