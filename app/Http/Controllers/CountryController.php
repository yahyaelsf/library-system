<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Response ;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return response()->view('admin.countries.index',['data'=> $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name'=> 'required|string|min:3|max:40'
        ]);
        if(! $validator->fails()){
         $country = new Country();
         $country->name = $request->get('name');
         $is_saved = $country->save();
         return response()->json([
            'message' => $is_saved ? 'Country Created Successfully' : 'Faild to Create Country'
         ],
         $is_saved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
        );
        }else{
         return response()->json([
           'message'=> $validator->getMessageBag()->first()
         ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return response()->view('admin.countries.edit',['country'=>$country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:40'
        ]);
        if (!$validator->fails()) {
            $country->name = $request->get('name');
            $is_saved = $country->save();
            return response()->json(
                [
                    'message' => $is_saved ? 'Country Updated Successfully' : 'Faild to update Country'
                ],
                $is_saved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $is_deleted = $country->delete();
        return response()->json([
            'icon' => $is_deleted ? 'success' : 'danger' ,
            'title' => $is_deleted ? 'Deleted Successfuly' : 'Deleted Faild',
        ],
    $is_deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
    );
    }
}
