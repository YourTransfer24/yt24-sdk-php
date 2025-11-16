<h1>yt24-sdk-php</h1>

<p>
Official PHP SDK for the YourTransfer24 REST JSON API Platform.
Provides clean access to authentication, profile data, bookings, booking confirmation, booking status,
availability checks, quotes, vehicles, companies, coverage, and logs.
Fully aligned with the official YourTransfer24 API documentation.
</p>

<hr>

<h2>Installation</h2>

<pre><code>composer require yourtransfer24/yt24-sdk-php
</code></pre>

<hr>

<h2>Initialization</h2>

<pre><code>
use YT24SDK\YT24Client;
use YT24SDK\ProfileAPI;
use YT24SDK\BookingsAPI;
use YT24SDK\AvailabilityAPI;
use YT24SDK\QuoteAPI;
use YT24SDK\VehiclesAPI;
use YT24SDK\CompaniesAPI;
use YT24SDK\CoverageAPI;
use YT24SDK\LogsAPI;

$client = new YT24Client("YOUR_API_KEY", "sandbox");

// Instantiate endpoints
$profile = new ProfileAPI($client);
$bookings = new BookingsAPI($client);
$availability = new AvailabilityAPI($client);
$quote = new QuoteAPI($client);
$vehicles = new VehiclesAPI($client);
$companies = new CompaniesAPI($client);
$coverage = new CoverageAPI($client);
$logs = new LogsAPI($client);
</code></pre>

<hr>

<h2>API Usage</h2>

<h3>1. Profile</h3>

<pre><code>
// Get profile
$data = $profile->getProfile();

// Update profile
$profile->updateProfile([
    "first_name" => "John",
    "last_name" => "Doe"
]);
</code></pre>

<h3>2. Bookings</h3>

<h4>Create, Retrieve, List, Confirm, Update Status</h4>

<pre><code>
// List bookings
$bookings->list();

// With filters
$bookings->list(["limit" => 20, "page" => 2]);

// Retrieve a booking
$bookings->get(123);

// Create booking (Full Real Payload Example)
$bookings->create([
    "pickup_location" => "Airport",
    "dropoff_location" => "Hotel",
    "date" => "2025-01-20",
    "passengers" => 3,
    "luggage" => 2,
    "vehicle_type" => "Sedan",
    "flight_number" => "AA123",
    "arrival_time" => "14:30",
    "child_seats" => 1,
    "notes" => "Customer prefers front seat",
    "customer" => [
        "first_name" => "John",
        "last_name" => "Doe",
        "email" => "john@example.com",
        "phone" => "+18095551234"
    ]
]);

// Confirm a booking
$bookings->confirm(123);

// Update booking status
$bookings->updateStatus(123, ["status" => "confirmed"]);
</code></pre>

<h3>3. Availability</h3>

<pre><code>
$availability->check([
    "pickup_location" => "Airport",
    "dropoff_location" => "Hotel",
    "date" => "2025-01-20"
]);
</code></pre>

<h3>4. Quote</h3>

<pre><code>
$quote->getQuote([
    "pickup_location" => "Airport",
    "dropoff_location" => "Hotel",
    "passengers" => 2
]);
</code></pre>

<h3>5. Vehicles</h3>

<pre><code>
// List vehicles
$vehicles->list();

// Vehicle details
$vehicles->get(5);
</code></pre>

<h3>6. Companies</h3>

<pre><code>
// Company list
$companies->list();

// Company details
$companies->get(12);
</code></pre>

<h3>7. Coverage</h3>

<pre><code>
// Get operating zones and coverage areas
$coverage->list();
</code></pre>

<h3>8. Logs</h3>

<pre><code>
// Logs filtering example
$logs->list(["booking_id" => 123]);
</code></pre>

<hr>

<h2>Error Handling</h2>

<p>YourTransfer24 API returns strict structured JSON errors:</p>

<pre><code>{
  "error": true,
  "type": "validation_error",
  "message": "Pickup location is required",
  "err_key": "YT24_400_01"
}
</code></pre>

<h3>Capturing Errors</h3>

<pre><code>
try {
    $bookings->create([]);
} catch (Exception $err) {
    echo $err->status;   // HTTP status code
    echo $err->err_key;  // API error code
    echo $err->getMessage(); // Error message
}
</code></pre>

<p>
The SDK does not modify, alter, wrap, or transform errors — they are returned exactly as provided by the YourTransfer24 API.
</p>

<hr>

<h2>Project Structure</h2>

<pre><code>
yt24-sdk-php/
│── README.md
│── LICENSE
│── composer.json
└── src/
    ├── YT24Client.php
    ├── ProfileAPI.php
    ├── BookingsAPI.php
    ├── AvailabilityAPI.php
    ├── QuoteAPI.php
    ├── VehiclesAPI.php
    ├── CompaniesAPI.php
    ├── CoverageAPI.php
    ├── LogsAPI.php
</code></pre>

<hr>

<h2>License</h2>

<p>MIT License © YourTransfer24</p>


