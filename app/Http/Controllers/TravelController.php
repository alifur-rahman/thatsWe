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
use Illuminate\Support\Str;
use App\Models\SuccessInfo;
use App\Models\co_order;
use App\Models\appImages;
use App\Models\agencies;
use App\Models\order;
use App\Models\CoPolicy;
use App\Models\coPdf;

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
        $userLanguage = app()->getLocale();
        // Data Protection content 
        $columnsOfContent = [
            'dp_' . $userLanguage . ' as data_protection_msg',
            'im_' . $userLanguage . ' as imprint_msg',
        ];
        $CoPolicyData = CoPolicy::select($columnsOfContent)->limit(1)->get();

        // Selecting columns dynamically based on the user's language
        $columns = [
            'assign_to',
            'save_as',
            'title_' . $userLanguage . ' as title',
            'desc_' . $userLanguage . ' as description',
        ];

        // Retrieving data based on the selected columns and other conditions
        $successInfo = SuccessInfo::where('assign_to', 'ThatsWE')
                                    ->where('save_as', 'active')
                                    ->select($columns)
                                ->get();


        return view('policy', ['successInfo' => $successInfo], ['CoPolicyData' => $CoPolicyData]);
    }

    public function order()
    {
        $userLanguage = app()->getLocale();

        // Selecting columns dynamically based on the user's language
        $columns = [
            'txt_' . $userLanguage . ' as msg',
        ];
        $coOrderInfo = co_order::select($columns)->limit(1)->get();
        $agencies = agencies::where('show', 'active')->get();
        // return view('order')->with('agencies', $agencies);
        return view('order',['agencies' => $agencies], ['coOrderInfo' => $coOrderInfo]);
    }



    public function images()
    {
        $images = appImages::all();
        return view('images')->with('images', $images);
    }


    public function pdfView(Request $request) {
        $userLanguage = app()->getLocale();

        // Selecting columns dynamically based on the user's language
        $columns = [
            'title_' . $userLanguage . ' as title',
            'subt_' . $userLanguage . ' as subTitle', 
            'ld_' . $userLanguage . ' as licenseDetails',
            'txt_' . $userLanguage . ' as msg',
            'ftxt_' . $userLanguage . ' as footerMsg',
        ];
        $pdfContents = coPdf::select($columns)->limit(1)->get();

        $ipAddress = $request->server('REMOTE_ADDR');
        return view('pdf.order', ['ipAddress' => $ipAddress], ['pdfContents' => $pdfContents]);
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
            'published' => 'required|string',
           'own_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Pass the validation errors to the view
                ->withInput();           // Pass the old input data to the view
        }
        $agencId  = $request->input('image_radio');
        $timestamp = now()->timestamp;
        if($request->image_radio == 'own_logo') {
            $title = $request->input('app_name');
            $screen_logo_filename = Str::slug($title) . '-' . $timestamp . '-app-logo.' . $request->file('own_logo')->getClientOriginalExtension();
            // Move files to upload directory
            $request->file('own_logo')->move(base_path('upload-files/agency/'), $screen_logo_filename);
            $data['app_logo'] = 'upload-files/agency/' . $screen_logo_filename;
            $data['app_no'] = $request->input('logo_no');
            $data['app_name'] = $request->input('app_name');
            $successInfo = agencies::create($data);
            $agencId = $successInfo->id;
        }

        $ipAddress = $request->getClientIp();
        $userLanguage = app()->getLocale();
        $columns = [
            'title_' . $userLanguage . ' as title',
            'subt_' . $userLanguage . ' as subTitle', 
            'ld_' . $userLanguage . ' as licenseDetails',
            'txt_' . $userLanguage . ' as msg',
            'ftxt_' . $userLanguage . ' as footerMsg',
        ];
        $pdfContents = coPdf::select($columns)->limit(1)->get();


        // Generate PDF
        $pdf = PDF::loadView('pdf/order', ['data' => $request->all(), 'ipAddress' => $ipAddress, 'pdfContents' => $pdfContents]);
        $pdfData = $pdf->output();

        $savePath = 'upload-files/order-pdf/';
        $filename = Str::slug($request->input('app_name')) . '-' . $timestamp . '.pdf';
        $pdf->save(base_path($savePath) . $filename);


        $orderData =[
            'company_name' => $request->input('company_name'),
            'street' => $request->input('street'),
            'zip' => $request->input('zip'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'telephone' => $request->input('telephone'),
            'www' => $request->input('www'),
            'mail_address' => $request->input('mail_address'),
            'managing_director' => $request->input('managing_director'),
            'agency_id' => $agencId,
            'ip' => $ipAddress,
            'pdf_url' => $savePath . $filename,
        ];

       $createdOrder =  order::create($orderData);


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
