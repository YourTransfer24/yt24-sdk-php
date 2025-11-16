<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>YourTransfer24 PHP SDK</title>
<style>
    body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; max-width: 900px; margin: auto; }
    pre { background: #f4f4f4; padding: 12px; border-radius: 6px; overflow-x: auto; }
    code { font-family: Consolas, monospace; }
    h1, h2, h3 { color: #333; }
</style>
</head>

<body>

<h1>yt24-sdk-php</h1>

<p>
Official PHP SDK for the YourTransfer24 REST JSON API Platform.  
Provides clean access to authentication, profile, bookings, availability, quotes, vehicles, companies, coverage, and logs.  
Fully aligned with the official YourTransfer24 API documentation.
</p>

<hr>

<h2>Installation</h2>

<p>Add the package using Composer:</p>

<pre><code>composer require yourtransfer24/yt24-sdk-php
</code></pre>

<hr>

<h2>Initialization</h2>

<pre><code>use YT24SDK\YT24Client;
use YT24SDK\ProfileAPI;
use YT24SDK\BookingsAPI;
use YT24SDK\AvailabilityAPI;
use YT24SDK\QuoteAPI;
use YT24SDK\VehiclesAPI;
use YT24SDK\CompaniesAPI;
use YT24SDK\CoverageAPI;
use YT24SDK\LogsAPI;

$client = new YT24Client("YOUR_API_KEY", "sandbox");

// API Modules
$profile     = new ProfileAPI($client);
$bookings    = new BookingsAPI($client);
$availability = new AvailabilityAPI($client);
$quote       = new QuoteAPI($client);
$vehicles    = new VehiclesAPI($client);
$companies   = new CompaniesAPI($client);
$coverage    = new CoverageAPI($client);
$logs        = new LogsAPI($client);
</code></pre>

<hr>

<h2>API Usage</h2>

<h3>1. Profile</h3>

<pre><code>// Get profile
$profileData = $profile->getProfile();

// Update profile
$profile->updateProfile([
    "first_name" => "John",
    "last_name" => "Doe"
]);
</code></pre>

<h3>2. Bookings</h3>

<pre><code>// List bookings
$bookings->list();

// With filters
$bookings->list(["limit" => 20, "page" => 2]);

// Get booking
$bookings->get(123);

// Create booking
$bookings->create([
    "pickup_location"  => "Airport",
    "dropoff_location" => "Hotel",
    "passengers"       => 3,
    "date"             => "2025-01-10"
]);

// Confirm booking
$bookings->confirm(123);

// Update booking status
$bookings->updateStatus(123, ["status" => "confirmed"]);
</code></pre>

<h3>3. Availability</h3>

<pre><code>$availability->check([
    "pickup_location"  => "Airport",
    "dropoff_location" => "Hotel",
    "date"             => "2025-01-20"
]);
</code></pre>

<h3>4. Quote</h3>

<pre><code>$quote->getQuote([
    "pickup_location"  => "Airport",
    "dropoff_location" => "Hotel",
    "passengers"       => 2
]);
</code></pre>

<h3>5. Vehicles</h3>

<pre><code>// List vehicles
$vehicles->list();

// Get vehicle
$vehicles->get(5);
</code></pre>

<h3>6. Companies</h3>

<pre><code>// Company list
$companies->list();

// Company details
$companies->get(12);
</code></pre>

<h3>7. Coverage</h3>

<pre><code>// Coverage zones
$coverage->list();
</code></pre>

<h3>8. Logs</h3>

<pre><code>// Logs with filters
$logs->list(["booking_id" => 123]);
</code></pre>

<hr>

<h2>Error Handling</h2>

<p>YourTransfer24 API returns structured JSON errors:</p>

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
} catch (\Exception $err) {
    echo $err->status;   // HTTP status code
    echo $err->err_key;  // YT24 error code
    echo $err->getMessage(); // Error message
}
</code></pre>

<p>
The SDK returns errors exactly as provided by the YourTransfer24 API.  
No internal transformation or wrapping is applied.
</p>

<hr>

<h2>Project Structure</h2>

<pre><code>
yt24-sdk-php/
│── composer.json
│── README.md
│── README.html
│── LICENSE
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

</body>
</html>

