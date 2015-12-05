<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DriversRequest;
use App\Http\Controllers\Controller;

use App\ImageUploader;
use App\Driver;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Driver $drivers)
    {
        $drivers = $drivers->paginate(5);

        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Driver $driver)
    {
        return view('drivers.create', compact('driver'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DriversRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Driver $driver, DriversRequest $request)
    {
        $driver = $driver->create($request->all());

        return redirect()->route('admin.drivers.index')
            ->withSuccess("Se han agregado los datos del chofer $driver->full_name correctamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Driver $drivers
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\DriversRequest  $request
     * @param  int  Driver $drivers
     * @return \Illuminate\Http\Response
     */
    public function update(DriversRequest $request, Driver $driver)
    {
        $driver->update($request->all());

        return redirect()->route('admin.drivers.index')
            ->withWarning("Usted ha editado los datos para el chofer $driver->full_name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()->route('admin.drivers.index')
            ->withWaning("Los datos del chofer $driver->full_name han sido eliminados!");
    }

    /**
     * search indexes in the model. Split the given value and realize multiple
     * searchs by each value, 
     * @param  Request $request input field and request object
     * @return [type]           collection
     */
    public function search(Request $request, Driver $drivers)
    {
        $searchs = explode(' ', $request->get('search'));

        foreach ($searchs as $key => $value) {
            $drivers = $drivers
                ->orWhere('file_number', 'like', "%$value%")
                ->orWhere('full_name', 'like', "%$value%")
                ->orWhere('personal_id', 'like', "%$value%")
                ->orWhere('dob', 'like', "%$value%")
                ->orWhere('cellphone', 'like', "%$value%")
                ->orWhere('phone', 'like', "%$value%")
                ->orWhere('address', 'like', "%$value%")
                ->orWhere('city', 'like', "%$value%")
                ->orWhere('card_number', 'like', "%$value%")
                ->orWhere('car_id', 'like', "%$value%")
                ->orWhere('plate_number', 'like', "%$value%")
                ->orWhere('reference', 'like', "%$value%")
                ->orWhere('reference_phone', 'like', "%$value%")
                ;
        }

        $drivers = $drivers->paginate(10)->appends(['search' => $request->get('search')]);

        return view('drivers.index', compact('drivers'));

    }

    public function postImage($id, Request $request, Driver $drivers, ImageUploader $image)
    {
        $model = $drivers->findOrFail($id);

        return $image->saveImage($model, $request->get('main_image'));

        $this->validate($request, [
            'main_image' => 'required|image|max:5000'
        ]);

        return $request->all();

    }

    public function birthdays(Driver $drivers)
    {
       $drivers->birthdaysToday = $drivers->getBirthdaysToday();
       $drivers->birthdaysThisMonth = $drivers->getBirthdaysThisMonth();
       $drivers->birthdaysNextMonth = $drivers->getBirthdaysNextMonth();
       return view('drivers.birthdays', compact('drivers'));
    }


}
