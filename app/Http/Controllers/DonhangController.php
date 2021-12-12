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
    public function index2(Request $request)
    {
        $donhangs = Donhang::where('user_id', $request->user_id)->get();
        return $donhangs;
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
            $product = SanPham::where('id',$request->IDSanPham)->first();
            if($product->amount<$request->SLSanPham)
            {
                return "Not Enough Available";
            }
            $donhang->sanphams()->save($product, ['amount' => $sanpham['amount']]);
            $amount = $product->amount - $request->SLSanPham;
            SanPham::where('id',$request->IDSanPham)->update(['amount'=>$amount]);
        }
        return $donhang;
    }
    public function store1SP($id, Request $request)
    {
        $donhang = Donhang::create([
            'user_id' => $id,
            'Address' => $request->address,
            'Accept' => $request->accept
        ]);
        $product = SanPham::where('id',$request->IDSanPham)->first();
        if($product->amount<$request->SLSanPham)
        {
            return "Not Enough Available";
        }
        $donhang->sanphams()->save($product, ['amount' => $request->SLSanPham]);
        $amount = $product->amount - $request->SLSanPham;
        SanPham::where('id',$request->IDSanPham)->update(['amount'=>$amount]);
        return $donhang;
    }
    public function store2($id, Request $request)
    {
        $donhang = Donhang::create([
            'user_id' => $id,
            'Address' => $request->address,
            'Accept' => $request->accept
        ]);
        $len = count($request->IDSanPham);
        for($i=0;$i<$len;$i++)
        {
            $product = SanPham::where('id',$request->IDSanPham[$i])->first();
            if($product->amount<$request->SLSanPham)
            {
                return "Not Enough Available";
            }
            $donhang->sanphams()->save($product, ['amount'=> $request->SLSanPham[$i]]);
            $amount = $product->amount - $request->SLSanPham;
            SanPham::where('id',$request->IDSanPham)->update(['amount'=>$amount]);
        }
        return $donhang;
    }
    public function store1SP2(Request $request)
    {
        $donhang = Donhang::create([
            'user_id' => $request->user_id,
            'Address' => $request->address,
            'Accept' => $request->accept
        ]);
        $product = SanPham::where('id',$request->IDSanPham)->first();
        if($product->amount<$request->SLSanPham)
        {
            return "Not Enough Available";
        }
        $donhang->sanphams()->save($product, ['amount' => $request->SLSanPham]);
        $product->amount = (int)$product->amount - (int)$request->SLSanPham;
        $product->save();
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
    public function show2($id)
    {
        $donhang = Donhang::where('id', $id)->first();
        $sanphams=[];
        foreach ($donhang->sanphams as $sanpham)
        {
            $sanphams[] =$sanpham;
        }
        return ["Address"=>$donhang->Address,"Accept"=> $donhang->Accept,$sanphams];
    }
    public function show3(Request $request)
    {
        $donhang = Donhang::where('id', $request->IDDH)->first();
        $sanphams=[];
        foreach ($donhang->sanphams as $sanpham)
        {
            $sanphams[] =$sanpham;
        }
        return ["Address"=>$donhang->Address,"Accept"=> $donhang->Accept,
                "id"=>$sanphams[0]->id,
                "created_at"=>$sanphams[0]->created_at,
                "updated_at"=>$sanphams[0]->updated_at,
                "name"=>$sanphams[0]->name,
                "amount"=>$sanphams[0]->amount,
                "Price"=>$sanphams[0]->Price,
                "description"=>$sanphams[0]->description,
                "img_link"=>$sanphams[0]->img_link];
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
    public function findUnAccept($id)
    {
        $donhang = Donhang::where('user_id',$id)->where('Accept', 0)->first();
        if($donhang === null)
        {

            return ["Message"=>"create new Donhang"];
        }
        $sanphams=[];
        foreach ($donhang->sanphams as $sanpham)
        {
            $sanphams[] =$sanpham;

        }
        return ["Address"=>$donhang->Address,"Accept"=> $donhang->Accept,"SanPham:"=>$donhang->sanphams];
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
            if($request->has('Address'))
            {
                $donhang->update(['Address'=> $request->get('Address')]);
            }
            if($request->has('Accept'))
            {
                $donhang->update(['Accept'=> $request->get('Accept')]);
            }
            if($request->has('Sanpham'))
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
