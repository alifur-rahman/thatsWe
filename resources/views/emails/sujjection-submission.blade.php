<!-- resources/views/emails/offer-submission.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criticism and Suggestions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mt-4">Criticism and Suggestions</h2>
        <hr>

        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Email :</strong>
                <p>{{ $formData['your_mail'] }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Information :</strong>
                <p>{{ $formData['information'] }}</p>
            </div>
        </div>


    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
