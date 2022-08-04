<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\Category;

class MerchandiseController extends Controller
{

    public function index(){
        $merchandises = Merchandise::orderBy('id', 'desc')->paginate(5);
        return view('merchandises.index', compact('merchandises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create(Request $dados)
    public function create()
    {
        // echo"create";exit;
        $categories = Category::get();
        return view('merchandises.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required'
        ]);

        $merchandise = new Merchandise;
        $merchandise->name = $request->name;
        $merchandise->description = $request->description;
        $merchandise->category_id = $request->category_id;
        $merchandise->amount = $request->amount;
        $merchandise->supplier = $request->supplier;
        $merchandise->barcode = $request->barcode;
        $merchandise->weight = $request->weight;
        $merchandise->cost_price = str_replace(',', '.', str_replace('.', '', $request->cost_price));
        $merchandise->sale_price = str_replace(',', '.', str_replace('.', '', $request->sale_price));
        $merchandise->main_photo = $request->main_photo;

        if ($request->file('main_photo')) {
            $destinationPath = 'uploads/imagens';
            $extension = $request->file('main_photo')->getClientOriginalExtension();
            $originalname = $request->file('main_photo')->getClientOriginalName();
            $fileName = md5($originalname . date('Y-m-d H:i:s')) . '.' . $extension;
            $request->file('main_photo')->move($destinationPath, $fileName);
            $merchandise->main_photo = $destinationPath . '/' . $fileName;
        }

        $merchandise->save();

        return redirect()->route('admin.merchandises.index')->with('success', 'Mercadoria criada com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show(Merchandise $merchandise)
    {
        // $merchandise = Merchandise::find($id);
        if (is_null($merchandise)) {
            return abort(404);
        }
        return view('merchandises.show', [
            'merchandise' => $merchandise,
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchandise $merchandise)
    {
        $categories = Category::get();
        return view('merchandises.edit', compact('merchandise','categories'));
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

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);

        $merchandise = Merchandise::find($id);
        $merchandise->name = $request->name;
        $merchandise->description = $request->description;
        $merchandise->category_id = $request->category_id;
        $merchandise->amount = $request->amount;
        $merchandise->supplier = $request->supplier;
        $merchandise->barcode = $request->barcode;
        $merchandise->weight = $request->weight;
        $merchandise->cost_price = str_replace(',', '.', str_replace('.', '', $request->cost_price));
        $merchandise->sale_price = str_replace(',', '.', str_replace('.', '', $request->sale_price));

        if ($request->file('main_photo')) {
            $destinationPath = 'uploads/imagens';
            $extension = $request->file('main_photo')->getClientOriginalExtension();
            $originalname = $request->file('main_photo')->getClientOriginalName();
            $fileName = md5($originalname . date('Y-m-d H:i:s')) . '.' . $extension;
            $request->file('main_photo')->move($destinationPath, $fileName);
            $merchandise->main_photo = $destinationPath . '/' . $fileName;
        }

        $merchandise->save();
        return redirect()->route('admin.merchandises.index')
            ->with('success', 'Mercadoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $merchandise = Merchandise::find($id);
        $merchandise->delete();
        return redirect()->route('admin.merchandises.index')
            ->with('success', 'Mercadoria deletada com sucesso');
    }
}
