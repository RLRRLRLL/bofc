<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pom;

class PomeraniansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.poms.index', [
            'poms' => Pom::with('images')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.poms.create');
    }

    /**
     * Store a newly created resource in storage.
     * Store Pomeranian info.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInfo(Request $request)
    {
        // parse json info data
        $data = json_decode($request->getContent(), true);

        // validation rules
        $rules = [
            'name' => 'required',
            'color' => 'required',
            'height' => 'required',
            'teeth' => 'required',
            'birthday' => 'required',
            'titles' => 'required',
            'age' => 'required',
            // bools
            'is_for_sale' => 'required',
            'is_male' => 'required',
            'is_open_for_breeding' => 'required',
            'has_fontanel' => 'required',
            // nullables
            'father' => 'nullable',
            'mother' => 'nullable',
            'owner' => 'nullable',
            'breeder' => 'nullable',
        ];

        // validate
        $validator = Validator::make($data, $rules);

        // notify
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        // create Pom model
        $pom = Pom::create($data);

        // return Pom id for pom->images() relationship purpose
        return $pom->id;
    }

    /**
     * Store a newly created resource in storage.
     * Store Pomeranian images.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImages(Request $request)
    {
        $pom = Pom::find($request->id);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $fileName = $image->getClientOriginalName();

                $image->storeAs('/public/poms/' . $pom->id, $fileName);

                $url = Storage::url('poms/' . $pom->id . '/' . $fileName);

                $pom->images()->create([
                    'url' => $url,
                ]);
            }
        }

        return response()->json(
            [
                'message' => 'Pomeranian successfully created!',
                'id' => $pom->id,
            ],
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.admin.poms.show', [
            'pom' => Pom::with('images')->find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
