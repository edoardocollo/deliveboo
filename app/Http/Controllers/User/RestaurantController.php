<?php

namespace App\Http\Controllers\User;
use App\Restaurant;
use App\User;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->user()->name);
        $user_id = $request->user()->id;
        //->request->get('parameters')
        $restaurant = User::find($user_id)->restaurant;
        // dd($restaurant->id);
        return view('users.restaurant.index', compact('restaurant'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $user_id = $request->user()->id;

        $restaurant = User::find($user_id)->restaurant;

        $categories = Category::all();

        return view('users.restaurant.edit', compact('restaurant','categories'));
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

        $validatedData = $request->validate([
          'description' => 'nullable | max:500',
            'phone_number' => 'nullable | max:20',
            'img' => 'nullable | mimes:jpg,png,jpeg | max:500',
            'location' => 'nullable | max:30',
            'opening_time' => 'nullable | max:20',
            'closure_time' => 'nullable | max:20',
            'free_shipping' => 'nullable',
            'price_shipping' => 'nullable | max:5',
            'category_id' => 'exists:categories,id',
        ]);
        $restaurant = Restaurant::find($id);
        if ($request->img) {
            Storage::delete($restaurant->img);
            $img = Storage::disk('public')->put('img_restaurants', $request->img);
            $validatedData['img'] = $img;
        }
        $restaurant->update($validatedData);
        $restaurant->categories()->sync($request->category_id);


        return redirect()->route('user.restaurant.index');
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