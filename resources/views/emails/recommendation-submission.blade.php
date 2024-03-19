<!-- resources/views/emails/recommendation-submission.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.this_site_is_amazing') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mt-4">{{ __('messages.hi_friend') }}</h2>
        <hr>

        <!-- Display recommendation form data -->
        <div class="row mt-4">
            <div class="col-md-6">
                <p> <strong>{{ __('messages.hello_its_me') }} | {{ $formData['yourName'] }} |</strong></p>
            </div>

            <div class="col-md-6 ">
                <p>
                    <strong>{{ __('messages.i_found_site_1') }}</strong><br>
                    <strong>{{ __('messages.i_found_site_2') }}</strong>
                </p>
            </div>

            <div class="col-md-6 ">
                <p> <strong> {{ __('messages.travel_agency_msg') }} <a href="www.thatswe.de">www.thatswe.de</a></strong>
                    <br>
                    <strong> {{ __('messages.holiday_customer_msg') }} <a
                            href="www.thatssoft.de">www.thatssoft.de</a></strong>
                </p>
                <p>{{ __('messages.copyMsg') }}</p>
            </div>

            <div class="col-md-6 ">

            </div>
        </div>

    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
