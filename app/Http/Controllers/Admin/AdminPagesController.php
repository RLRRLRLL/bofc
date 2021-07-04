<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PomeranianInfoRequest;
use App\Models\Image;
use App\Models\Person;
use App\Models\Pom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminPagesController extends Controller
{
    public function settings()
    {
        return view('pages.admin.settings');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poms = Pom::with('images')->get();

        return view('pages.admin.index')->with('poms', $poms);
    }

    public function createPom()
    {
        return view('pages.admin.create');
    }

    public function createWithVue()
    {
        $owners = Person::where('type', 0)->get();
        $breeders = Person::where('type', 1)->get();

        return view('pages.admin.create-with-vue', [
            'owners' => $owners,
            'breeders' => $breeders,
        ]);
    }

    public function storePomInfo(Request $request)
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

    public function storePomImages(Request $request)
    {
        $pom = Pom::find($request->id);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $fileName = $image->getClientOriginalName();

                $image->storeAs('/public/poms/' . $pom->id, $fileName);

                $url = Storage::url('poms/' . $fileName);

                $pom->images()->create([
                    'url' => $url,
                ]);
            }
        }

        return response()->json(
            [
                'message' => 'Pomeranian successfully created!',
            ],
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.admin.show')->with('id', $id);
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
