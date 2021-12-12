<?php

namespace App\Http\Controllers;

use App\Models\Donhang;
use Illuminate\Http\Request;
use App\Models\SanPham;

class DonhangController extends Controller
{
    /**
     * Display a listing of the Donhang with User ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $donhang = Donhang::where('user_id', $id)->get();
        return $donhang;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $donhang = Donhang::create([
            'user_id' => $id,
            'Address' => $request->address,
            'Accept' => $request->accept
        ]);
        foreach ($request->sanpham as $sanpham)
        {
            $product = SanPham::find($sanpham['id'])->first();
            $donhang->sanphams()->save($product, ['amount' => $sanpham['amount']]);
            $product->amount = $product->amount - $sanpham['amount'];
        }
        return $donhang;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donhang = Donhang::where('id', $id)->first();
        $sanphams=[];
        foreach ($donhang->sanphams as $sanpham)
        {
            $sanphams[] =$sanpham;
        }
        return $sanphams;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function edit(Donhang $donhang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $donhang = Donhang::where('id', $id)->first();
            if($request->has('address'))
            {
                $donhang->update(['Address'=> $request->get('address')]);
            }
            if($request->has('accept'))
            {
                $donhang->update(['Accept'=> $request->get('accept')]);
            }
            if($request->has('sanpham'))
            {
                $donhang->sanphams()->detach();
                foreach ($request->sanpham as $sanpham)
                {
                    $product = SanPham::where('id', $sanpham['id'])->first();
                    $donhang->sanphams()->save($product, ['amount' => $sanpham['amount']]);
                }
            }
            return $donhang;
        }
        catch(Exception $e)
        {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $donhang = Donhang::where('id', $id)->first();
            $donhang->sanphams()->detach();
            $donhang->delete();
            return "Success";
        }
        catch(Exception $e){return $e;}
    }
    public function destroymany(Request $request)
    {
        try{
            foreach($request->id as $id)
            {
                $donhang = Donhang::where('id', $id)->first();
                $donhang->sanphams()->detach();
                $donhang->delete();
            }
            return "Success";
        }
        catch(Exception $e){return $e;}
    }
}
