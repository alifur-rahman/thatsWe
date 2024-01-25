@extends('app')

@section('content')
    <section class="bg-light al_order_page" id="dataProtectionImprint">
        <div class="container">
            <div class="al_order_page_wrapper">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="al_order_logo_wrapper">
                                <h3 class="fw-bold" style="line-height: 1.0;color: #323D9A;">
                                    {{ __('messages.order_page_title') }}
                                </h3>
                                <p class="fs-6 ">{{ __('messages.order_page_sub_title') }}</p>

                                <div class="al_logo_selection">
                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option1">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 1">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option2">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 2">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option3">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 3">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option4">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 4">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option5">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 5">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option6">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 6">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option7">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 7">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option8">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 8">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option9">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 9">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option10">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 10">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option11">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 11">
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option12">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 12">
                                    </label>
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
                                        <div class="mb-2">
                                            <label for="companyName"
                                                class="form-label">{{ __('messages.company_name') }}</label>
                                            <input type="text" class="form-control" id="companyName" name="companyName">
                                        </div>
                                        <div class="mb-2">
                                            <label for="street" class="form-label">{{ __('messages.street') }}</label>
                                            <input type="text" class="form-control" id="street" name="street">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="al_order_form_info_text">
                                            <p>{{ __('messages.order_from_info_1') }}</p>
                                            <p>{{ __('messages.order_from_info_2') }}</p>
                                            <p>{{ __('messages.order_from_info_3') }}</p>
                                            <p>{{ __('messages.order_from_info_4') }}</p>
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
        }

        /* Style for the radio button input */
        .image-radio-container input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        /* Style for the image */
        .image-radio-container img {
            width: 100%;
            /* Adjust the width as needed */
            height: auto;
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
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            //use static method
        })
    </script>
@endsection
