@extends('app')

@section('content')
    <section class="bg-light al_order_page al_images_page" id="dataProtectionImprint">
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


            <div class="al_Images_page_wrapper">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="fw-bold" style="line-height: 1.0;color: #323D9A;">
                            {{ __('messages.images_page_title') }}
                        </h3>
                        {{-- <p class="fs-6 ">{{ __('messages.order_page_sub_title') }}</p> --}}

                        <div class="al_image_show_grid">
                            @foreach ($images as $image)
                                <div class="al_single_images"
                                    data-hover-img="{{ asset('assets/img/hover-show-demo.png') }}">
                                    <img src="{{ asset($image->url) }}" alt="{{ $image->name }}">
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="al_show_hover_iamges">
                            <img id="idShoHoverImg" src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('styles')
    <style>
        .al_image_show_grid {
            display: grid;
            gap: 10px;
            grid-template-columns: repeat(4, 1fr);
            margin-top: 30px;
        }

        .al_single_images {
            border-radius: 50%;
            overflow: hidden;
            background: #ffffff;
            cursor: pointer;
            height: 100%;
            max-height: 150px;
            width: 100%;
            max-width: 150px;
            margin-bottom: 15px;
            transition: .3s;
        }

        .al_single_images:hover {
            box-shadow: 0px 3px 1px #323D9A61;
        }

        .al_single_images img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .al_show_hover_iamges {
            width: 100%;
            height: 100%;
            max-height: calc(100vh - 135px);
            visibility: hidden;
            opacity: 0;
            transition: 0.4s;
        }

        .al_show_hover_iamges.active-visible img,
        .al_show_hover_iamges.active-visible {
            visibility: visible;
            opacity: 1;
        }

        .al_show_hover_iamges img {
            width: 100%;
            height: 100%;
            visibility: hidden;
            opacity: 0;
            padding: 20px;
            /* border: 1px solid #d7d7d7; */
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".al_single_images").hover(function() {

                var hoverImgSrc = $(this).attr('data-hover-img');
                $('.al_show_hover_iamges').addClass('active-visible');
                $("#idShoHoverImg").attr('src', hoverImgSrc);
            }, function() {
                // Reset the image source when the mouse leaves
                $("#idShoHoverImg").attr('src', '');
                $('.al_show_hover_iamges').removeClass('active-visible');
            });
        });
    </script>
@endsection
