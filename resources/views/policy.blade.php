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
                                                <td class="al_view_info">Book your next vacation with us and you will
                                                    receive your personal travel companion from us. With this digital
                                                    companion on your vacation trip, you will document everything that is or
                                                    was interesting on your next vacation.</td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td class="al_view_info">Go in a big way and talk to the boss. The boss can
                                                    point out this wonderful free deal to his employees when the next
                                                    vacation trip is booked with the travel agency "Papperlapapp & Cie</td>
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <td class="al_view_info">Distribute small cards (business card size) with
                                                    the app information (www.thatswe.de) in places that are visited by many
                                                    people (bank, train station, etc.)</td>
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
                    <h5 class="modal-title">{{ __('messages.full_information') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="modal-text" id="shoWMoreInfo"></p>
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
                $('#shoWMoreInfo').text($(this).text());
                myModalEl.modal('show');
                return false;
            });
            myModalEl.on('hidden.bs.modal', function(event) {
                console.log('Modal is hidden');
            });
        });
    </script>
@endsection
