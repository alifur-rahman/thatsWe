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
                <form action="{{ route('order-submit') }}" method="POST">
                    @csrf
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
                                        <img src="https://img.freepik.com/free-vector/detailed-travel-logo_23-2148616554.jpg"
                                            alt="Image 1">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 01</span>
                                            <span>Logo No <span class="Logo_no"> 01</span> </span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option2">
                                        <img src="https://png.pngtree.com/templates/20181023/travel-logo-template-png_37505.jpg"
                                            alt="Image 2">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 02</span>
                                            <span>Logo No <span class="Logo_no"> 02 </span></span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option3">
                                        <img src="https://static.vecteezy.com/system/resources/previews/000/511/437/non_2x/travel-tourism-logo-isolated-on-white-background-vector.jpg"
                                            alt="Image 3">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 03</span>
                                            <span>Logo No <span class="Logo_no"> 03 </span></span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option4">
                                        <img src="https://media.istockphoto.com/id/1195504881/vector/travel-agency-logo-template-with-airplane-m-travel-logo-inspiration.jpg?s=612x612&w=0&k=20&c=Sg0d0Ir0D6ER_IZlCJoc01KNGEhh3s7GEo6YIz7CjkI="
                                            alt="Image 4">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 04</span>
                                            <span>Logo No <span class="Logo_no"> 04 </span></span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option5">
                                        <img src="https://d3jmn01ri1fzgl.cloudfront.net/photoadking/webp_thumbnail/pink-and-blue-travel-agency-logo-design-template-uvghvha3fa66fc.webp"
                                            alt="Image 5">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 05</span>
                                            <span>Logo No <span class="Logo_no"> 05 </span></span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option6">
                                        <img src="https://static.vecteezy.com/system/resources/previews/007/874/109/non_2x/travel-logo-design-travel-agency-logo-inspiration-vector.jpg"
                                            alt="Image 6">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 06</span>
                                            <span>Logo No <span class="Logo_no"> 06 </span></span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option7">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0jAyGpL9ewbZMxr2YN4dqSdX01zflgPVlojnJeDQozxrRstd5nMiv6bXjk8sM-3pmZGM&usqp=CAU"
                                            alt="Image 7">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 07</span>
                                            <span>Logo No <span class="Logo_no"> 07 </span></span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option8">
                                        <img src="https://thumbs.dreamstime.com/b/travel-agency-logo-around-world-design-214446308.jpg"
                                            alt="Image 8">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 08</span>
                                            <span>Logo No <span class="Logo_no"> 08 </span></span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option9">
                                        <img src="https://content.wepik.com/statics/26269232/preview-page0.jpg"
                                            alt="Image 9">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 09</span>
                                            <span>Logo No <span class="Logo_no"> 09 </span></span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option10">
                                        <img src="https://img0-placeit-net.s3-accelerate.amazonaws.com/uploads/stage/stage_image/16017/optimized_product_thumb_stage.jpg"
                                            alt="Image 10">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 10</span>
                                            <span>Logo No <span class="Logo_no"> 10 </span></span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option11">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtI93utvrpDqrWDraaZuDg2sqzZpseZ2ZCPhTwak69VslI23EkN709bbIlfvRMKrqf4Qs&usqp=CAU"
                                            alt="Image 11">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 11</span>
                                            <span>Logo No <span class="Logo_no"> 11 </span></span>
                                        </div>
                                    </label>

                                    <label class="image-radio-container">
                                        <input type="radio" name="image-radio" id="option12">
                                        <img src="https://img.traveltriangle.com/attachments/tr_a_profiles/3341/original/demologo.jpg?tr=,w-300"
                                            alt="Image 12">
                                        <div class="al_tra_logoInfo">
                                            <span class="appName">App name 12</span>
                                            <span>Logo No <span class="Logo_no"> 12 </span></span>
                                        </div>
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
                                            <label
                                                for="telephone"class="form-label">{{ __('messages.telephone') }}</label>
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
                                                        name="app_name">
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
                                                        name="logo_no">
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
                                                                name="published" id="yes" value="yes"
                                                                onchange="toggleSubmit()">

                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="no">
                                                                {{ __('messages.no') }}
                                                            </label>
                                                            <input class="form-check-input" type="radio"
                                                                name="published" id="no" value="no"
                                                                onchange="toggleSubmit()">
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
            font-size: 13px;
            margin-bottom: 0.4rem;
        }

        .text-danger {
            font-size: 12px;
            display: block;
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

        function toggleSubmit() {
            var publishedValue = document.querySelector('input[name="published"]:checked').value;
            var submitButton = document.getElementById('submitButton');

            if (publishedValue === "no") {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        }
    </script>
@endsection
