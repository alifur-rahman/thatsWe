<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Mail\OrderSubmission;
use App\Mail\SujjectionSubmission;
use Illuminate\Http\Request;
use App\Mail\OfferSubmission;
use App\Mail\SuccessMessage;
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
                'url' => asset('/assets/img/screen-logo/1-Start.png'),
                'name' => 'Start',
                'screen_url' => asset('/assets/img/screen-logo/1A-Start.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/2-booking.png'),
                'name' => 'Booking',
                'screen_url' => asset('/assets/img/screen-logo/2A-booking.png'),
            ],

            (object) [
                'url' => asset('/assets/img/screen-logo/3-Accommodation.png'),
                'name' => 'Accommodation',
                'screen_url' => asset('/assets/img/screen-logo/3A-Accommodation.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/4-Search.png'),
                'name' => 'Search',
                'screen_url' => asset('/assets/img/screen-logo/4A-Search.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/5-Conversations.png'),
                'name' => 'Conversations',
                'screen_url' => asset('/assets/img/screen-logo/5A-conversations.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/6-diarys.png'),
                'name' => 'Diarys',
                'screen_url' => asset('/assets/img/screen-logo/6A-diarys.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/7-Health.png'),
                'name' => 'Health',
                'screen_url' => asset('/assets/img/screen-logo/7A-Health.png'),
            ],

            (object) [
                'url' => asset('/assets/img/screen-logo/8-PDF-prints.png'),
                'name' => 'PDF prints',
                'screen_url' => asset('/assets/img/screen-logo/8A-PDF-prints.png'),
            ],
            (object) [
                'url' => asset('/assets/img/screen-logo/9-Settings.png'),
                'name' => 'Settings',
                'screen_url' => asset('/assets/img/screen-logo/9A-Settings.png'),
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




        $userLanguage = app()->getLocale();
        // Send email to admin
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new OfferSubmission($request->all()));
        // Send email to user
        $messagesData = [
            'title' => __('messages.company_info', [], $userLanguage),
            'head_title' => __('messages.success', [], $userLanguage),
            'messages' => [
                '1' => __('messages.company_submition_message1', [], $userLanguage),
                '0' => __('messages.thank_you', [], $userLanguage),
            ]
        ];
        Mail::to($request->your_mail)->send(new SuccessMessage($request->all(), $messagesData));
        // show message to blade
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
        // Send email to user
        $userLanguage = app()->getLocale();
        $messagesData = [
            'title' => __('messages.criticism_and_suggestions', [], $userLanguage),
            'head_title' => __('messages.success', [], $userLanguage),
            'messages' => [
                '1' => __('messages.sujjection_submition_message1', [], $userLanguage),
                '0' => __('messages.thank_you', [], $userLanguage),
            ]
        ];
        Mail::to($request->your_mail)->send(new SuccessMessage($request->all(), $messagesData));
        // show message to blade

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

        // Generate PDF
        $pdf = PDF::loadView('pdf/order', $request->all());
        $pdfData = $pdf->output();

        // Send email
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new OrderSubmission($request->all(), $pdfData));
        // Send email to user
        $userLanguage = app()->getLocale();
        $messagesData = [
            'title' => __('messages.order', [], $userLanguage),
            'head_title' => __('messages.success', [], $userLanguage),
            'messages' => [
                '1' => __('messages.order_submition_message1', [], $userLanguage),
                '0' => __('messages.thank_you', [], $userLanguage),
            ]
        ];
        Mail::to($request->mail_address)->send(new SuccessMessage($request->all(), $messagesData, $pdfData));
        // show message to blade
        $successMessage = __('messages.info_submission_success', [], $userLanguage);

        return redirect()->back()->with('success', $successMessage);
    }



}
