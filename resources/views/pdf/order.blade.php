<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom_container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        h2 {
            font-size: 23px;
            color: #3318d4;
            font-weight: 700;
            margin-bottom: 0px;
        }

        p {
            font-size: 11px;
            margin-bottom: 10px;
            color: #333;
            text-align: justify;
        }

        h6 {
            font-size: 15px;
            background: #f1f4ff;
            padding: 3px 11px 6px 11px;
            color: #33;
            border: 1px solid #8f8f8f;
            border-radius: 3px;
        }

        label {
            color: #323D9A;
            font-weight: 500;
            margin-bottom: 2px;
            font-size: 15px;
        }

        .divider {
            display: inline-block;
            background: #767676;
            width: 100%;
            height: 1px;
        }

        table {
            width: 100%;
        }

        table {
            width: 100%;
        }

        td {
            width: 50%;
            vertical-align: top;
        }

        /* Print-specific styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .custom_container {
                width: 100%;
            }

            table {
                width: 100%;
            }

            td {
                width: 50%;
                vertical-align: top;
            }
        }
    </style>
</head>

<body>
    <div class="custom_container">
        <h2 class="mt-4 text-center">Bestellung der App „thatsWE"</h2>
        <span class="divider"></span>
        <table>
            <tr>
                <td class="pe-2">
                    <div class="left-section">
                        <div class="">
                            <label for="">Company Name</label>
                            <h6> {{ $company_name }} </h6>
                        </div>
                        <div class="">
                            <label for="">Street</label>
                            <h6>{{ $street }}</h6>
                        </div>
                        <table>
                            <tr>
                                <td class="pe-2">
                                    <div class="">
                                        <label for="">Zip</label>
                                        <h6>{{ $zip }}</h6>
                                    </div>
                                </td>
                                <td class="ps-2">
                                    <div class="">
                                        <label for="">City</label>
                                        <h6>{{ $city }}</h6>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="">
                            <label for="">Country</label>
                            <h6> {{ $country }}</h6>
                        </div>
                        <div class="">
                            <label for="">Telephone</label>
                            <h6>{{ $telephone }}</h6>
                        </div>
                        <div class="">
                            <label for="">WWW</label>
                            <h6>{{ $www }}</h6>
                        </div>
                        <div class="">
                            <label for="">Mail Address</label>
                            <h6> {{ $mail_address }}</h6>
                        </div>
                        <div class="">
                            <label for="">Managing Director/Contact</label>
                            <h6> {{ $managing_director }}</h6>
                        </div>

                        <table>
                            <tr>
                                <td class="pe-2">
                                    <div class="">
                                        <label for="">App Name</label>
                                        <h6>{{ $app_name }}</h6>
                                    </div>
                                </td>
                                <td class="ps-2">
                                    <div class="">
                                        <label for="">Logo No</label>
                                        <h6>{{ $logo_no }}</h6>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>
                </td>
                <td class="ps-2">
                    <div class="right-section">
                        <p> Die Jahres-Lizenzgebühr beträgt 240,00 €. Für die Zeit der 2024-Aktion wird auf die Zahlung
                            der
                            Lizenzgebühr für das Jahr 2024 verzichtet lediglich für die App- Einrichtung (Logo Name,
                            Impressum
                            etc) wird der Pauschalpreis von 60,00€ berechnet.
                        </p>
                        <p>
                            Es wird eine Android-App (APK-Datei) geliefert. Die Installation der App auf Android-Geräten
                            obliegt
                            dem Besteller oder den/dem fachkundigen Beauftragten des Bestellers.</p>
                        <p>
                            Die Installations-Anzahl ist während der Dauer der Lizenz unbegrenzt, gilt aber nur für das
                            Reisebüro, das Besteller der App ist.

                        <p>
                            Jeweils zum Januar eines Jahres verlängert sich die Lizenz um 12 Monate, es sei denn, die
                            Nutzer-Lizenz wird spätestens 2 Monate vorher (also bis zum 1. November des laufenden
                            Kalenderjahres) gekündigt. Die Kündigung der Lizenz per eMail an proliz@web.de wird
                            akzeptiert.
                        </p>
                        <p>
                            Die Lizenzgebühr wird für das erste laufende Kalenderjahr anteilig für die restlichen Monate
                            bis
                            zum
                            Jahresende berechnet. Für die Zeit der 2024-Aktion wird auf die Zahlung der Lizenzgebühr für
                            das
                            Jahr 2024 verzichtet.
                        </p>
                        <p>
                            Die Lizenzrechnungen sind zahlbar ohne Abzug innerhalb 14 Tage nach Zugang mit Angabe der
                            Rechnungsnummer auf ein in der Rechnung genanntes Konto. Der Lizenzbetrag ist gemäß § 19
                            USTG
                            von
                            der Umsatzsteuer befreit.
                        </p>
                        <p>
                            Soll die Teilnahme an dieser App-Version an Besteller und Interessenten einer Urlaubsreise
                            veröffentlicht werden (www.thatssoft.de)?
                        </p>

                        <table style="width: 100%; max-width: 70%; margin: 0 auto">
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="" {{ $published == 'yes' ? 'checked' : '' }}
                                            type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Ja
                                        </label>
                                    </div>
                                </td>
                                <td class="pe-2">
                                    <div class="form-check">
                                        <input class="" {{ $published == 'no' ? 'checked' : '' }} type="checkbox"
                                            value="" id="flexCheckDefault3">
                                        <label class="form-check-label" for="flexCheckDefault3">
                                            Nein
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table>
                            <tr>
                                <td class="pe-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <label for="">Datum:</label>
                                        <h6>{{ date('d.m.Y') }}</h6>
                                    </div>
                                </td>
                                <td class="ps-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <label for="">Uhrzeit:</label>
                                        <h6>{{ date('H:i') }}</h6>
                                    </div>
                                </td>
                            </tr>
                        </table>




                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
