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

    public function submitOffer(Request $request)
    {
        // Validate the form data (add more validation rules as needed)

        $validator = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255',
            'travelIndustry' => 'required|string|in:yes,no',
            'telephone' => 'required|string|max:20',
            'website' => 'nullable|string|max:255',
            'contactPerson' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postalCode' => 'required|string|max:20',
            'your_mail' => 'required|email|max:255',
        ]);

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
