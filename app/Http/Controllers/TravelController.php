<?php

namespace App\Http\Controllers;

use App\Mail\OrderSubmission;
use App\Mail\SujjectionSubmission;
use Illuminate\Http\Request;
use App\Mail\OfferSubmission;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecommendationSubmission;
use Illuminate\Support\Facades\Validator;

class TravelController extends Controller
{
    public function welcome()
    {

        return view('welcome');
    }

    public function about()
    {

        return view('about');
    }

    public function offer()
    {
        return view('offer');
    }

    public function recommendation()
    {
        return view('recommend');
    }

    public function policy()
    {
        return view('policy');
    }

    public function order()
    {
        return view('order');
    }

    public function images()
    {
        $images = [
            (object) [
                'url' => asset('/assets/img/screen-logo/01-My-Booking.png'),
                'name' => 'My Bookings',
                'screen_url' => asset('/assets/img/screen-logo/001-My-Bookings.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/02-Arrival-Departure.png'),
                'name' => 'Arrival Departure',
                'screen_url' => asset('/assets/img/screen-logo/002-Arrival-Departure.png'),
            ],

            (object) [
                'url' => asset('/assets/img/screen-logo/03-Preparation.png'),
                'name' => 'The preparation',
                'screen_url' => asset('/assets/img/screen-logo/003-The-preparation.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/04-Accommodation.png'),
                'name' => 'Accommodation',
                'screen_url' => '',
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/05-Location-Info.png'),
                'name' => 'Location',
                'screen_url' => asset('/assets/img/screen-logo/005-Location.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/06-Vicinity.png'),
                'name' => 'Vicinity',
                'screen_url' => asset('/assets/img/screen-logo/006-Environment-1.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/07-I-am-looking.png'),
                'name' => 'I am looking for',
                'screen_url' => asset('/assets/img/screen-logo/007-I-am-looking-for.png'),
            ],

            (object) [
                'url' => asset('/assets/img/screen-logo/08-Conversations.png'),
                'name' => 'Conversations',
                'screen_url' => asset('/assets/img/screen-logo/008-Conversations.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/09-My-diary.png'),
                'name' => 'My Diary',
                'screen_url' => asset('/assets/img/screen-logo/009-My-diary.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/10-Sick.png'),
                'name' => 'Sick',
                'screen_url' => asset('/assets/img/screen-logo/010-sick.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/11-PDF-Prints.png'),
                'name' => 'PDF Prints',
                'screen_url' => asset('/assets/img/screen-logo/011-PDF-PRINTS.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/12-Travel-Partners.png'),
                'name' => 'Data Protection',
                'screen_url' => asset('/assets/img/screen-logo/012-Data-Protection.png'),
            ],



            // Add more images as needed
        ];

        return view('images')->with('images', $images);
    }



    public function submitOffer(Request $request)
    {
        // Validate the form data (add more validation rules as needed)
        $validator = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'website' => 'nullable|string|max:255',
            'contactPerson' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postalCode' => 'nullable|string|max:20',
            'your_mail' => 'required|email|max:255',
            'travelIndustry' => 'required|string|in:yes,no',
        ]);

        // Manually add custom error message for the 'travelIndustry' field if validation fails
        if ($validator->fails() && !$validator->errors()->has('travelIndustry')) {
            $validator->errors()->add('travelIndustry', 'The travel industry field must be either "yes" or "no".');
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Pass the validation errors to the view
                ->withInput();           // Pass the old input data to the view
        }




        // Send email to admin
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new OfferSubmission($request->all()));
        // proliz@web.de
        $userLanguage = app()->getLocale();
        $successMessage = __('messages.info_submission_success', [], $userLanguage);

        return redirect()->back()->with('success', $successMessage);
    }


    public function submitRecommendation(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'yourName' => 'required|string|max:255',
            'personEmail1' => 'sometimes|required|email|max:255',
            'personEmail2' => 'sometimes|nullable|email|max:255',
            'personEmail3' => 'sometimes|nullable|email|max:255',
            'personEmail4' => 'sometimes|nullable|email|max:255',
            'personEmail5' => 'sometimes|nullable|email|max:255',
            // Add more validation rules for additional email fields if needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Send email to each recommended person
        $emails = [
            $request->input('personEmail1'),
            $request->input('personEmail2'),
            $request->input('personEmail3'),
            $request->input('personEmail4'),
            $request->input('personEmail5'),
            // Add more email fields as needed
        ];

        foreach ($emails as $email) {
            if (!empty($email)) {
                Mail::to($email)->send(new RecommendationSubmission($request->all()));
            }
        }

        $userLanguage = app()->getLocale();
        $successMessage = __('messages.recommendation_submission_success', [], $userLanguage);

        // You can add a success message or redirect the user to a thank you page
        return redirect()->back()->with('success', $successMessage);
    }

    public function sujjectionSubmit(Request $request)
    {
        // Validate the form data (add more validation rules as needed)

        $validator = Validator::make($request->all(), [
            'information' => 'required|string',
            'your_mail' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Pass the validation errors to the view
                ->withInput();           // Pass the old input data to the view
        }

        // Send email to admin
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new SujjectionSubmission($request->all()));
        // proliz@web.de
        $userLanguage = app()->getLocale();
        $successMessage = __('messages.info_submission_success', [], $userLanguage);

        return redirect()->back()->with('success', $successMessage);
    }

    public function orderSubmit(Request $request)
    {
        // Validate the form data (add more validation rules as needed)

        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'www' => 'nullable|string|max:255',
            'mail_address' => 'required|email|max:255',
            'managing_director' => 'required|string|max:255',
            'app_name' => 'required|string|max:255',
            'logo_no' => 'required|string|max:255',
            'published' => 'required|string|in:yes',



        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Pass the validation errors to the view
                ->withInput();           // Pass the old input data to the view
        }

        // Send email to admin
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new OrderSubmission($request->all()));
        // proliz@web.de
        $userLanguage = app()->getLocale();
        $successMessage = __('messages.info_submission_success', [], $userLanguage);

        return redirect()->back()->with('success', $successMessage);
    }



}
