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
        <a href="{{ route('inside.request', $donation) }}">Details</a>
    </div>
@endforeach
