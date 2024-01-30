@extends('app')

@section('content')
    <section class="bg-light al_privecy_page" id="dataProtectionImprint">
        <div class="container">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="al_privecy_page_wrapper">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="al_sujjection_wrapper">
                            <div class="card p-3 pt-0 pb-0 flex-1">
                                <div class="card-body p-2">
                                    <h2 class="text-center mb-1">{{ __('messages.data_protection') }}</h2>
                                    <p>
                                        {{ __('messages.data_protection1') }}
                                    </p>
                                    <p>
                                        {{ __('messages.data_protection2') }}
                                    </p>
                                    <p class="pb-0 mb-0">
                                        {{ __('messages.data_protection3') }}
                                    </p>
                                </div>
                            </div>
                            <div class="card mt-xl-3 p-3 pb-0 ">
                                <h2 class="text-center mb-1">{{ __('messages.imprint') }}</h2>
                                <address>
                                    <strong>{{ __('messages.line1') }}</strong><br>
                                    Bockhorner Weg 90<br>
                                    28779 Bremen<br>
                                    <a href="http://www.thatswe.de" target="_blank">www.thatswe.de</a><br>
                                    Email: <a href="mailto:proliz@web.de">proliz@web.de</a>
                                </address>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="al_sujjection_wrapper h-100">
                            <div class="card w-100 h-100 position-relative">
                                <div class="card-body">
                                    <h2 class="text-center mb-2">{{ __('messages.criticism_and_suggestions') }}</h2>

                                    <form action="{{ route('sujjection-submit') }}" method="POST">
                                        @csrf
                                        <div class="mb-2 d-flex justify-content-between align-items-center">
                                            <label for="your_mail"
                                                class="form-label w-25">{{ __('messages.your_mail') }}</label>
                                            <input type="text" class="form-control" id="your_mail" name="your_mail"
                                                placeholder="{{ __('messages.your_mail') }}">
                                        </div>

                                        <div class="mb-2 d-flex justify-content-between ">
                                            <label for="information"
                                                class="form-label">{{ __('messages.your_information') }}</label>
                                            <textarea class="form-control al_textarea" name="information" id="information"></textarea>
                                        </div>

                                        <div class="text-center al_card_footer">
                                            <div class="mt-2">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ __('messages.send') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="al_sujjection_wrapper">
                            <div class="card w-100 h-100 position-relative">
                                <div class="card-body">
                                    <h2 class="text-center mb-2">{{ __('messages.information_about_success') }}</h2>

                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td class="al_view_info"><span class="info_title">Newsletter</span>
                                                    <div class="al_lognText d-none">
                                                        <p>
                                                            What is important for long-term and, of course, profitable
                                                            customer loyalty is
                                                            NOT just the provision of a digital travel companion, but rather
                                                            a connection
                                                            that is as long-lasting as possible between the service provider
                                                            (you as a travel agency) and the customer, but also to maintain
                                                            contact with your customers and interested parties AFTER booking
                                                            the trip.
                                                        </p>
                                                        <p>
                                                            During the initial consultation, ask permission to receive a
                                                            newsletter with great information about your next vacation.
                                                        </p>
                                                        <p>
                                                            Send a newsletter to existing customers to introduce the new
                                                            digital
                                                            travel companion and present exclusive offers for bookings.

                                                        </p>
                                                        <p>
                                                            Additionally, use small tools (business card advertising) to
                                                            point out the recommendation options to friends, colleagues,
                                                            etc. on the homepage “www.thatswe.de”.
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td class="al_view_info"> <span class="info_title">Exclusivity</span>

                                                    <div class="al_lognText d-none">
                                                        <p>Offer your customers an exclusive travel experience with the
                                                            'thatsWE' app
                                                            Your personalized travel companion, only available through your
                                                            travel agent.
                                                        </p>
                                                        <p>
                                                            To my knowledge, this type of digital holiday guidance has not
                                                            existed before
                                                            and with this app on your mobile phone or “holiday tablet” your
                                                            holiday customer has complete attention.
                                                        </p>
                                                        <p>
                                                            And not just on vacation, but beforehand in conversations with
                                                            friends, work
                                                            colleagues, etc.
                                                        </p>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <td class="al_view_info"> <span class="info_title">Customer growth</span>

                                                    <div class="al_lognText d-none">
                                                        <p>This digital holiday companion offers you these options, which
                                                            you should use consistently!
                                                        </p>
                                                        <p>a) You acquire new customers with this digital app!</p>
                                                        <p>
                                                            With the logo of your travel agency and the app name you want -
                                                            from “Pepe”
                                                            to “Mira” to “Tom” to any other name)
                                                        </p>
                                                        <p>
                                                            b) You activate your customers from the inventory of travel
                                                            bookings from the
                                                            last few years!
                                                        </p>
                                                        <p>
                                                            c) If you use the options in the “Recommendations to friends and
                                                            colleagues” department, you will reach further potential
                                                            customers. Simply point out these referral opportunities to
                                                            EVERY visitor to your office.
                                                        </p>
                                                        <p>

                                                            If you also register as a regional participant in this app
                                                            campaign, you will be
                                                            able to make further contacts.
                                                        </p>
                                                        <p>
                                                            In summary: With 'thatsWE' you offer unique added value that
                                                            leaves your
                                                            competitors behind."
                                                        </p>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>4</th>
                                                <td class="al_view_info"> <span class="info_title"> Increase in sales
                                                    </span>
                                                    <div class="al_lognText d-none">
                                                        <p>It needs to be explained why, for you as a travel agency, your
                                                            competitor in
                                                            the neighboring town is NOT your competitor in the true sense!
                                                        </p>
                                                        <p>
                                                            The fact is that every travel agency works and has to work
                                                            against the comfort of other people. Simply because with the
                                                            possibilities of online services,
                                                            booking at home from your sofa is MUCH more convenient.

                                                        </p>
                                                        <p>
                                                            That's a fact and EVERY travel agency looks forward to EVERY
                                                            person interested in booking who comes to the office and wants
                                                            advice.

                                                        </p>
                                                        <p>
                                                            By participating in the holiday companion version of thatsWE,
                                                            you have exclusive access to all the online travel centers and
                                                            every other travel agency -
                                                            whether in your neighborhood or in a neighboring town!

                                                        </p>
                                                        <p>
                                                            Increase your sales with every booking!
                                                        </p>
                                                        <p>
                                                            “thatsWE” enables additional income through exclusive functions
                                                            and personalized services for your customers.
                                                        </p>
                                                        <p>
                                                            Old customers, new customers and interested parties will be
                                                            willing to consult
                                                            you simply because of your offer:
                                                        </p>
                                                        <p>
                                                            The holiday companion app as a give-away for holiday booking.
                                                        </p>
                                                        <p>
                                                            As a travel agency, you determine the minimum booking price and
                                                            which additional services you offer (mobile phone, tablet, etc.)
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>5</th>
                                                <td class="al_view_info"> <span class="info_title"> Use of customer greed
                                                        (“I want that too”)</span>
                                                    <div class="al_lognText d-none">
                                                        <p>A lot of people have this feeling. No matter your profession,
                                                            marital status, income, etc.
                                                        </p>
                                                        <p>
                                                            Just take a look at the green market, where the fruit dealer is
                                                            handing out
                                                            free apples.

                                                        </p>
                                                        <p>
                                                            Or at the store opening, where shopping bags are distributed
                                                            alongside free
                                                            bratwurst.

                                                        </p>
                                                        <p>
                                                            So with “thatsWE” you awaken the greed “I want that too!”.

                                                        </p>
                                                        <p>
                                                            This happens in connection with an action that has to be planned
                                                            within the
                                                            family anyway. The vacation trip - at least the thought - is
                                                            coming up!
                                                        </p>
                                                        <p>
                                                            Awaken your customers' desire to travel!
                                                        </p>
                                                        <p>
                                                            "thatsWE" isn't just an app - it's the ultimate experience that
                                                            keeps your customers coming back to you."
                                                        </p>

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>6</th>
                                                <td class="al_view_info"> <span class="info_title"> Customer loyalty</span>
                                                    <div class="al_lognText d-none">
                                                        <p>All it takes for a dissatisfied customer is ONE negative comment
                                                            during the
                                                            booking or on vacation (which your travel agent strongly
                                                            advised)!
                                                        </p>
                                                        <p>
                                                            The customer has to be worked on and convinced quite intensively
                                                            so that he
                                                            remains your customer!

                                                        </p>
                                                        <p>
                                                            So there is only one strategy left, which you should maintain
                                                            continuously and
                                                            over the years:

                                                        </p>
                                                        <p>
                                                            Make sure that the customer is in a good mood because he has
                                                            found the
                                                            RIGHT advice with you. And not only that, he will also be
                                                            relying on a continuation of the holiday consultations in the
                                                            following year, because

                                                        </p>
                                                        <p>
                                                            - he is completely satisfied and <br>
                                                            - was also rewarded with the digital holiday advisor for his
                                                            decision
                                                        </p>


                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <div class="text-center al_card_footer">
                                        <div class="mt-2">
                                            <button type="submit"
                                                class="btn btn-primary">{{ __('messages.load_info') }}</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>



    <div class="modal" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="showTitleModla" class="modal-title">{{ __('messages.full_inoformation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="shoWMoreInfo"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .al_privecy_page {
            height: 100%;
            position: initial;
        }

        .al_privecy_page_wrapper {
            padding-bottom: 40px;
        }

        .al_textarea {
            height: 100%;
            min-height: 260px !important;
        }

        .al_card_footer {
            position: absolute;
            bottom: 40px;
            left: 0;
            width: 100%;
        }

        .al_view_info {
            cursor: pointer;
            transition: .3s;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
            width: 100%;
            cursor: pointer;
        }

        .al_view_info:hover {
            color: #6f42c1;
        }

        .al_sujjection_wrapper {
            height: 100%;
        }

        @media (max-width: 1200px) {
            .al_sujjection_wrapper {
                height: inherit;
                display: flex;
                justify-content: space-between;
                gap: 20px;
                padding: 10px 0;
            }

            .al_card_footer {
                position: inherit;
            }

            .al_textarea {
                height: 100%;
                min-height: 100px !important;
            }
        }

        @media (max-width: 768px) {
            .al_sujjection_wrapper {
                height: inherit;
                display: flex;
                justify-content: space-between;
                gap: 20px;
                padding: 10px 0;
                flex-direction: column;
            }

        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const myModalEl = $('#exampleModal');
            $(document).on('click', '.al_view_info', function() {
                $('#shoWMoreInfo').html($(this).find('.al_lognText').html());
                $('#showTitleModla').text($(this).find('.info_title').text());
                myModalEl.modal('show');
                return false;
            });
            myModalEl.on('hidden.bs.modal', function(event) {
                $('#showTitleModla').text('');
                $('#shoWMoreInfo').html('');
            });
        });
    </script>
@endsection
