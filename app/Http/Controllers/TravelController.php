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
                'url' => 'https://img.freepik.com/premium-vector/3d-glossy-red-logo-shape-letter-with-sharp-ends_95164-5117.jpg',
                'name' => 'Image 1'
            ],
            (object) [
                'url' => 'https://img.freepik.com/premium-vector/modern-coding-logo-designs-concept-vector-programmer-technology-logo-icon-vector_624194-126.jpg',
                'name' => 'Image 2'
            ],
            (object) [
                'url' => 'https://img.freepik.com/free-vector/flat-design-fn-nf-logo-template_23-2149255662.jpg',
                'name' => 'Image 3'
            ],
            (object) [
                'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_sXuGNj1-HdMZcA4S9h8r8QkKOseCXc3hNFPzc6YeS3mw78h50aKyo1xf2OVr7EHgym8&usqp=CAU',
                'name' => 'Image 4'
            ],
            (object) [
                'url' => 'https://st.depositphotos.com/69103596/60712/v/450/depositphotos_607122882-stock-illustration-logo-best-investment-vector-logo.jpg',
                'name' => 'Image 5'
            ],
            (object) [
                'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXNqz0ZiD8tg2WA-37Ek_napCPa-cRbDamOWMoNewmG7nauoWMnV1RtfhqmMKhhV7n2Jo&usqp=CAU',
                'name' => 'Image 6'
            ],
            (object) [
                'url' => 'https://img.freepik.com/free-vector/design-studio-logo-template_23-2148661992.jpg?size=338&ext=jpg&ga=GA1.1.1448711260.1706313600&semt=ais',
                'name' => 'Image 7'
            ],
            (object) [
                'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgE5aO-gWfQNI04y2ib3L_eoAATrP1yVD513auGRaiUdABNSH_Gn6ym9KakILjQ0OWfQo&usqp=CAU',
                'name' => 'Image 8'
            ],
            (object) [
                'url' => 'https://img.freepik.com/premium-vector/minimal-dj-font-logo-design-with-gradient-colors_720439-9.jpg',
                'name' => 'Image 9'
            ],
            (object) [
                'url' => 'https://us.123rf.com/450wm/mdranahamid/mdranahamid2009/mdranahamid200900540/156295984-creative-letter-jd-logo-design-vector-template-initial-linked-letter-jd-logo-design.jpg?ver=6',
                'name' => 'Image 10'
            ],
            (object) [
                'url' => 'https://t3.ftcdn.net/jpg/05/92/21/22/360_F_592212217_TWahwp6zXJXL1qcDbuLUa7VSqXAPWHbk.jpg',
                'name' => 'Image 11'
            ],
            (object) [
                'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjwmALuU19xPRQx_5_ZQK8QqG5HpA79AD5Iw&usqp=CAU',
                'name' => 'Image 12'
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
        Mail::to('alifurcoder@gmail.com')->send(new OfferSubmission($request->all()));
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
        Mail::to('alifurcoder@gmail.com')->send(new SujjectionSubmission($request->all()));
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
        Mail::to('alifurcoder@gmail.com')->send(new OrderSubmission($request->all()));
        // proliz@web.de
        $userLanguage = app()->getLocale();
        $successMessage = __('messages.info_submission_success', [], $userLanguage);

        return redirect()->back()->with('success', $successMessage);
    }



}
