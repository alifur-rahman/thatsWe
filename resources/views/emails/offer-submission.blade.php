<!-- resources/views/emails/offer-submission.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Information Material</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mt-4">Information Material</h2>
        <hr>

        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Company Name :</strong>
                <p>{{ $formData['companyName'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>Travel Agency :</strong>
                <p>{{ $formData['travelIndustry'] }}</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Telephone :</strong>
                <p>{{ $formData['telephone'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>Website :</strong>
                <p>{{ $formData['website'] }}</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Contact Person Name :</strong>
                <p>{{ $formData['contactPerson'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>Address :</strong>
                <p>{{ $formData['address'] }}</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <strong>City :</strong>
                <p>{{ $formData['city'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>Postal Cose :</strong>
                <p>{{ $formData['postalCode'] }}</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Mail Address :</strong>
                <p>{{ $formData['your_mail'] }}</p>
            </div>

        </div>

    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
