<!-- resources/views/emails/offer-submission.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.order') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mt-4">{{ __('messages.order') }}</h2>
        <hr>

        <div class="row mt-4">
            <div class="col-md-6">
                <strong>{{ __('messages.company_name') }}:</strong>
                <p>{{ $formData['company_name'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('messages.street') }}:</strong>
                <p>{{ $formData['street'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>{{ __('messages.zip') }}:</strong>
                <p>{{ $formData['zip'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('messages.city') }}:</strong>
                <p>{{ $formData['city'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>{{ __('messages.country') }}:</strong>
                <p>{{ $formData['country'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('messages.telephone') }}:</strong>
                <p>{{ $formData['telephone'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>{{ __('messages.www') }}:</strong>
                <p>{{ $formData['www'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('messages.mail_address') }}:</strong>
                <p>{{ $formData['mail_address'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>{{ __('messages.managing_director') }}:</strong>
                <p>{{ $formData['managing_director'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('messages.app_name') }}:</strong>
                <p>{{ $formData['app_name'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>{{ __('messages.logo_no') }}:</strong>
                <p>{{ $formData['logo_no'] }}</p>
            </div>
            <div class="col-md-6">
                <strong>published:</strong>
                <p>{{ $formData['published'] }}</p>
            </div>
        </div>



    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
