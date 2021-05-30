<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addservicepage()
    {

        return view('provider.service.add');
    }
    public function allservice()
    {

        $services = Service::orderBy('id','desc')->get();
        return view('provider.service.all',compact('services'));
    }
    public function addservice(Request $request)
    {
         // Validator function to validate the form


        $service = new Service; // Creating new customer model object


        //Calculate age from date of Birth



        // Insering data into database

        $service->name      = $request->input('name');
        $service->capacity     = $request->input('capacity');
        $service->pricerange     = $request->input('pricerange');

        $service->save();

        //redirect to page

        return redirect()->to('/provider/service/add')->with('status','New Service  has been created successfully');
    }
}
