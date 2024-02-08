@extends('app')

@section('styles')
    <style>
        .text-danger {
            font-size: 12px;
            display: block;
        }
    </style>
@endsection

@section('content')
    <section class="bg-200" id="recommend">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">{{ __('messages.recommend_to_friend') }}</h2>

                    <form action="{{ route('submit-recommendation') }}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <!-- Other form fields -->
                            <div class="col-md-5">
                                <div class="mb-2">
                                    <label for="yourName" class="form-label">{{ __('messages.your_name') }}</label>
                                    <input type="text" class="form-control" id="yourName" name="yourName"
                                        placeholder="{{ __('messages.your_name') }}">
                                    @error('yourName')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="personEmail1" class="form-label">{{ __('messages.person_email') }}
                                        #1</label>
                                    <input type="email" class="form-control" id="personEmail1" name="personEmail1"
                                        placeholder="{{ __('messages.person_email') }} #1">

                                    @error('personEmail1')
                                        <span class="text-danger">At least enter one friend's email </span>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="personEmail2" class="form-label">{{ __('messages.person_email') }}
                                        #2</label>
                                    <input type="email" class="form-control" id="personEmail2" name="personEmail2"
                                        placeholder="{{ __('messages.person_email') }} #2">
                                    @error('personEmail2')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="personEmail3" class="form-label">{{ __('messages.person_email') }}
                                        #3</label>
                                    <input type="email" class="form-control" id="personEmail3" name="personEmail3"
                                        placeholder="{{ __('messages.person_email') }} #3">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="personEmail3" class="form-label">{{ __('messages.person_email') }}
                                        #4</label>
                                    <input type="email" class="form-control" id="personEmail4" name="personEmail4"
                                        placeholder="{{ __('messages.person_email') }} #4">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="personEmail3" class="form-label">{{ __('messages.person_email') }}
                                        #5</label>
                                    <input type="email" class="form-control" id="personEmail5" name="personEmail5"
                                        placeholder="{{ __('messages.person_email') }} #5">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center mt-3">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.send') }}</button>
                                </div>
                            </div>
                        </div>


                        <!-- Add more email input fields if needed -->


                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
