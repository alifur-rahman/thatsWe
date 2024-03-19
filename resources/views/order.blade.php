@extends('app')

@section('content')
    <section class="bg-light al_order_page" id="dataProtectionImprint">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="al_order_page_wrapper">
                <form action="{{ route('order-submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="al_order_logo_wrapper">
                                <h3 class="fw-bold" style="line-height: 1.0;color: #323D9A;">
                                    {{ __('messages.order_page_title') }}
                                </h3>
                                <p class="fs-6 ">{{ __('messages.order_page_sub_title') }}</p>

                                <div class="al_max_height">
                                    <div class="al_logo_selection">

                                        @foreach ($agencies as $index => $image)
                                            <label class="image-radio-container">
                                                <input type="radio" name="image_radio" id="option{{ $index + 1 }}"
                                                    value="{{ $image->id }}">
                                                <img src="{{ $image->app_logo }}" alt="{{ $image->app_name }}">
                                                <div class="al_tra_logoInfo">
                                                    <span class="appName">{{ $image->app_name }}</span>
                                                    <span><span class="Logo_no"> {{ $image->app_no }} </span> </span>
                                                </div>
                                            </label>
                                        @endforeach


                                        <label class="image-radio-container show_own_logo">
                                            <input type="radio" name="image_radio" id="ownLogoInput" value="own_logo">
                                            <img id="dataOwnLogo" src="" alt="Uploaded">
                                            <div class="al_tra_logoInfo">
                                                <span id="own_appName" class="appName">N/A</span>
                                                <span> <span id="own_appNo" class="Logo_no">N/A</span></span>
                                            </div>
                                        </label>
                                        <div>
                                            <label class="image-radio-container al_owl_logo">
                                                <input data-show-id="#dataOwnLogo" type="file" name="own_logo" hidden>
                                                <img src="{{ asset('assets/img/icons/plus-flat.svg') }}" alt="">
                                                <span>Add Own</span>
                                            </label>
                                            @error('own_logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="al_order_from_wrapper">
                                <h3 class="fw-bold text-center" style="line-height: 1.0;color: #323D9A;">
                                    {{ __('messages.order') }}
                                </h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <label for="company_name"
                                                class="form-label">{{ __('messages.company_name') }}</label>
                                            <input type="text" class="form-control" id="company_name"
                                                name="company_name">

                                            @error('company_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div>
                                            <label for="street" class="form-label">{{ __('messages.street') }}</label>
                                            <input type="text" class="form-control" id="street" name="street">
                                            @error('street')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="zip"
                                                        class="form-label">{{ __('messages.zip') }}</label>
                                                    <input type="text" class="form-control" id="zip"
                                                        name="zip">
                                                    @error('zip')
                                                        <span class="text-danger">ZIP*</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="">
                                                    <label for="city"
                                                        class="form-label">{{ __('messages.city') }}</label>
                                                    <input type="text" class="form-control" id="city"
                                                        name="city">
                                                    @error('city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="country" class="form-label">{{ __('messages.country') }}</label>
                                            <input type="text" class="form-control" id="country" name="country">
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <label for="telephone"
                                                class="form-label">{{ __('messages.telephone') }}</label>
                                            <input type="text" class="form-control" id="telephone" name="telephone">
                                            @error('telephone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <label for="www" class="form-label">WWW</label>
                                            <input type="text" class="form-control" id="www" name="www">
                                            @error('www')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <label for="mail_address"
                                                class="form-label">{{ __('messages.mail_address') }}</label>
                                            <input type="text" class="form-control" id="mail_address"
                                                name="mail_address">
                                            @error('mail_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <label for="managing_director"
                                                class="form-label">{{ __('messages.managing_director') }}/{{ __('messages.contact') }}</label>
                                            <input type="text" class="form-control" id="managing_director"
                                                name="managing_director">
                                            @error('managing_director')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="">
                                                    <label for="app_name"
                                                        class="form-label">{{ __('messages.app_name') }}</label>
                                                    <input type="text" class="form-control" id="app_name"
                                                        name="app_name" data-showOwn-id="#own_appName">
                                                    @error('app_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="logo_no"
                                                        class="form-label">{{ __('messages.logo_no') }}</label>
                                                    <input type="text" class="form-control" id="logo_no"
                                                        name="logo_no" data-showOwn-id="#own_appNo">
                                                    @error('logo_no')
                                                        <span class="text-danger">Logo No *</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex flex-column justify-content-between h-100">
                                            <div class="al_order_form_info_text">
                                                <p>{{ __('messages.order_from_info_1') }}</p>
                                                <p>{{ __('messages.order_from_info_2') }}</p>
                                                <p>{{ __('messages.order_from_info_3') }}</p>
                                                <p>{{ __('messages.order_from_info_4') }}</p>
                                                <p>{{ __('messages.order_from_info_5') }}</p>
                                                <p>{{ __('messages.order_from_info_6') }}</p>
                                                <p>{{ __('messages.order_from_info_7') }}</p>
                                                {{-- <p>{{ __('messages.order_from_info_8') }}</p> --}}

                                                <div class="">

                                                    <div class="d-flex align-items-center gap-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="yes">
                                                                {{ __('messages.yes') }}
                                                            </label>
                                                            <input class="form-check-input" type="radio"
                                                                name="published" id="yes" value="yes">

                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="no">
                                                                {{ __('messages.no') }}
                                                            </label>
                                                            <input class="form-check-input" type="radio"
                                                                name="published" id="no" value="no">
                                                        </div>

                                                    </div>
                                                    @error('published')
                                                        <span class="text-danger">{{ $message }} Please select!</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="text-center">
                                                <div class="">
                                                    <button type="submit" id="submitButton"
                                                        class="btn btn-primary">{{ __('messages.send') }}</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection

@section('styles')
    <style>
        .al_max_height {
            height: 100%;
            max-height: calc(100vh - 195px);
            overflow-y: auto;
            padding: 10px
        }

        .al_owl_logo {
            background: #fff;
            padding: 10px;
            border: none;
            display: flex !important;
            justify-content: space-between;
            flex-direction: column;
            align-items: center;
            transition: .3s;
            cursor: pointer;
        }

        .al_owl_logo:hover {
            box-shadow: 0px 0px 4px #c4c4c4;
        }

        .al_owl_logo img {
            max-width: 80px;
        }

        .image-radio-container.al_owl_logo span {
            color: #2ecc71;
            font-weight: 500;
        }

        /* WebKit (Chrome, Safari, Opera) */
        .al_max_height::-webkit-scrollbar {
            display: none;
        }

        /* Firefox */
        .al_max_height {
            scrollbar-width: none;
        }

        /* Internet Explorer */
        .al_max_height {
            -ms-overflow-style: none;
        }

        .al_order_page {
            height: 100%;
            position: initial;
            padding-bottom: 10px;
        }

        .al_logo_selection {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .image-radio-container {
            position: relative;
            display: block;
            text-align: center;
            margin: 0 !important;
            min-height: 140px;
            /* border: 1px solid #e1e1e1; */
        }

        .al_tra_logoInfo {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: #323D9A;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #fff;
            opacity: 0;
            visibility: hidden;
            transition: .4s;
            transform: scale(0);
        }


        .image-radio-container:hover .al_tra_logoInfo {
            opacity: 0.8;
            visibility: visible;
            cursor: pointer;
            transform: scale(1);
        }





        /* Style for the radio button input */
        .image-radio-container input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        /* Style for the image */
        .image-radio-container img {
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        /* Style for the border when selected */
        .image-radio-container input[type="radio"]:checked+img {
            border: 2px solid #007BFF;
            /* Change the color as needed */
        }

        .al_order_from_wrapper {
            height: 100%;
            padding: 10px 15px;
            border: 1px solid gray;
        }

        .al_order_from_wrapper label {
            color: #323D9A;
            font-weight: 500;
            margin-bottom: 2px;
            margin-left: 2px;
        }

        .al_order_form_info_text p {
            font-size: 12px;
            margin-bottom: 0.4rem;
        }

        .text-danger {
            font-size: 12px;
            display: block;
        }

        .show_own_logo {
            display: none;
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.image-radio-container').on('click', function() {
                const apName = $(this).find('.appName').text();
                const logoNo = $(this).find('.Logo_no').text();
                $('#app_name').val(apName);
                $('#logo_no').val(logoNo);
            });
        });

        function uploadImageShow() {
            $('[data-show-id]').on('change', function() {
                var input = $(this)[0];
                var showId = $(this).data('show-id');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(showId).attr('src', e.target.result);
                        $('.show_own_logo').show();
                        $('#ownLogoInput').prop('checked', true);
                        $('#app_name').focus();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        }

        $(document).on('keyup', '[data-showOwn-id]', function() {
            var readioValue = $('input[name="image_radio"]:checked').val();
            if (readioValue === 'own_logo') {
                var targetID = $(this).attr('data-showOwn-id');
                var targetValue = $(this).val();
                if (targetValue === '') targetValue = 'N/A';
                $(targetID).text(targetValue);
            }
        });

        uploadImageShow();
    </script>
@endsection
