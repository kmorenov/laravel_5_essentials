<?php

Route::get('/', function()
{
	return redirect('cats');
	//return view('cats');
});

Route::get('cats', function()
{
	$cats = Furbook\Cat::all();

	return view('cats.index')->with('cats', $cats);
});



Route::get('cats/breeds/{name}', function($name)
{
//    echo $name;

    /*
    SELECT FROM `cats` c JOIN `breeds` b
    ON b.id = c.breed_id
    WHERE b.name = 'Persian';
    */
    //exit;
    //$name = 'Domestic';
    //$breed = Furbook\Breed::with('cats')
    //$breed = Furbook\Cat::with('breeds')
    //$cats = DB::table('cats')
    $breed = DB::table('cats')
        ->join('breeds', 'cats.breed_id', '=', 'breeds.id')
        ->select('cats.*')
        ->where('breeds.name', '=', $name)
        ->get();
    //find($name)
    //->whereName($name)
    //->where('breeds.name', '=', '$name')
    //->get();
    //->first();
    //-firstOrFail();

    //$breed = Furbook\Breed::find(2);
    //$breed = Furbook\Breed::all();
    //$breed = Furbook\Breed::where('id','=', 2)->first();

//    foreach ($breed as $b){
//        echo '<pre>';
//        echo 'test breed: ' . $b->name; //->name;
//        echo '</pre>';
//    }

//    dd($breed);
//    exit;
    //echo $breed;
    //echo $cats;
    //echo isnull($breed);


/*    return view('cats.index'
        ->with('breed', $b) //$breed)
        //->with('cats', $cats);
        ->with('cats', $b->name)); *///$breed->cats));
    //->with('cats', $cats);
    //->with('cats', $cats->breed);
    //----------------------
    return view('cats.index')->with('breed', $name)->with('cats', $breed);

});



Route::get('cats/create', function()
{
	return view('cats.create');
});

Route::get('cats/{cat}', function(Furbook\Cat $cat)
{
	return view('cats.show')->with('cat', $cat);

})->where('id', '[0-9]+');

Route::post('cats', function()
{
	$cat = Furbook\Cat::create(Input::all());

	return redirect('cats/'.$cat->id)
		->withSuccess('Cat has been created.');
});

Route::get('cats/{cat}/edit', function(Furbook\Cat $cat)
{
	return view('cats.edit')->with('cat', $cat);
});

Route::put('cats/{cat}', function(Furbook\Cat $cat)
{
	$cat->update(Input::all());

	return redirect('cats/'.$cat->id)
		->withSuccess('Cat has been updated.');
});

Route::delete('cats/{cat}', function(Furbook\Cat $cat)
{
	$cat->delete();

	return redirect('cats')
		->withSuccess('Cat has been deleted.');
});

Route::get('about', function()
{
	return view('about')->with('number_of_cats', 9000);
});

// Route::resource('cat', 'CatController');
