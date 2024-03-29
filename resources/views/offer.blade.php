@extends('app')
@section('styles')
    <style>
        .form-check-input {
            margin-top: 6px;
        }

        .text-danger {
            font-size: 12px;
            display: block;
        }
    </style>
@endsection

@section('content')
    <section class="bg-200" id="offer">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-2">{{ __('messages.company_info') }}</h2>

                    <form action="{{ route('submit-offer') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="companyName" class="form-label">{{ __('messages.company_name') }}</label>
                                    <input type="text" class="form-control" id="companyName" name="companyName"
                                        placeholder="{{ __('messages.your_company_name') }}">
                                    @error('companyName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="mb-2">
                                    <label class="form-label">{{ __('messages.travel_industry?') }}</label>

                                    <div class="d-flex align-items-center gap-4">
                                        <div class="form-check">
                                            <label class="form-check-label" for="yes">
                                                {{ __('messages.yes') }}
                                            </label>
                                            <input class="form-check-input" type="radio" name="travelIndustry"
                                                id="yes" value="yes" onchange="toggleSubmit()">

                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="no">
                                                {{ __('messages.no') }}
                                            </label>
                                            <input class="form-check-input" type="radio" name="travelIndustry"
                                                id="no" value="no" onchange="toggleSubmit()">

                                        </div>

                                    </div>
                                    <span>Please select!</span>
                                    @error('travelIndustry')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="telephone" class="form-label">{{ __('messages.telephone') }}</label>
                                    <input type="tel" class="form-control" id="telephone" name="telephone"
                                        placeholder="{{ __('messages.your_telephone') }}">
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="contactPerson"
                                        class="form-label">{{ __('messages.name_of_contact_person') }}</label>
                                    <input type="text" class="form-control" id="contactPerson" name="contactPerson"
                                        placeholder="{{ __('messages.contact_person_name') }}">
                                    @error('contactPerson')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1 offset-md-3">
                                <div class="mb-2">
                                    <label for="postalCode" class="form-label">{{ __('messages.postal_code') }}</label>
                                    <input type="text" class="form-control" id="postalCode" name="postalCode"
                                        placeholder="{{ __('messages.your_postal_code') }}">
                                    @error('postalCode')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="city" class="form-label">{{ __('messages.city') }}</label>
                                    <input type="text" class="form-control" id="city" name="city"
                                        placeholder="{{ __('messages.your_city') }}">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="address" class="form-label">{{ __('messages.address') }}</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="{{ __('messages.your_address') }}">
                                    @error('address')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="website" class="form-label">{{ __('messages.website') }}</label>
                                    <input type="text" class="form-control" id="website" name="website"
                                        placeholder="{{ __('messages.your_website') }}">
                                    @error('website')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="website" class="form-label">{{ __('messages.mail_address') }}</label>
                                    <input type="text" class="form-control" id="your_mail" name="your_mail"
                                        placeholder="{{ __('messages.your_mail_address') }}">
                                    @error('your_mail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="mt-2">
                                <button id="submitButton" type="submit" class="btn btn-primary"
                                    disabled>{{ __('messages.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function toggleSubmit() {
            var publishedValue = document.querySelector('input[name="travelIndustry"]:checked').value;
            var submitButton = document.getElementById('submitButton');

            if (publishedValue === "no") {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        }
    </script>
@endsection
