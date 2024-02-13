<!-- resources/views/emails/offer-submission.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mt-4">Order</h2>
        <hr>

        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Company Name :</strong>
                <p>{{ $formData['company_name'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>Street :</strong>
                <p>{{ $formData['street'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Zip :</strong>
                <p>{{ $formData['zip'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>City :</strong>
                <p>{{ $formData['city'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Country :</strong>
                <p>{{ $formData['country'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>Telephone :</strong>
                <p>{{ $formData['telephone'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>WWW :</strong>
                <p>{{ $formData['www'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>Address :</strong>
                <p>{{ $formData['mail_address'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Managing Director :</strong>
                <p>{{ $formData['managing_director'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>App Name:</strong>
                <p>{{ $formData['app_name'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Logo No :</strong>
                <p>{{ $formData['logo_no'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>published :</strong>
                <p>{{ $formData['published'] }}</p>
            </div>
        </div>



    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
