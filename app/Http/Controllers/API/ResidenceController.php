<?php

namespace App\Http\Controllers\API;

use App\Models\Residence;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidenceController extends Controller
{
    public function all(Request $request)
    {  
        $Residence = Residence::all();

        if ($Residence) 
        {
            return ResponseFormatter::success($Residence,'Data Residence berhasil diambil'); 
        }
        else 
        {
            return ResponseFormatter::error(null,'Data Residence tidak ada',404);
        }
        

    }

    public function get(Request $request, $id)
    {
        $product = Transaction::with('details.product')->find($id);

        if($product)
            return ResponseFormatter::success($product,'Data Transaksi berhasil diambil');
        else
            return ResponseFormatter::error(null,'Data Transaksi tidak ada',404);


    }

    public function one(Request $request, $id)
    {   
        $Residence = Residence::findOrFail($id);

        if ($Residence) 
        {
            return ResponseFormatter::success($Residence,'Data Residence berhasil diambil'); 
        }
        else 
        {
            return ResponseFormatter::error(null,'Data Residence tidak ada',404);
        }
        

    }

    public function update(Request $request, $id)
    {    
        $request->validate([
            'name'              => 'required|max:255',
            'unit_number'       => 'required', 
            'type'              => 'required',
            'desc'              => 'required', 
        ]);
 
        
        Residence::where('id', $id)
        ->update
        ([
            'name'              => $request->name,
            'unit_number'       => $request->unit_number,
            'type'              => $request->type,
            'desc'              => $request->desc, 
        ]);

        
        $data = Residence::where('id','=',$request->id)->get();

        if ($data) 
        {
            return ResponseFormatter::success($data,'Data Residence berhasil diupdate'); 
        }
        else 
        {
            return ResponseFormatter::error(null,'Data Residence gagal diupdate',404);
        }
        

    }

    /* public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'unit_number' => 'required',
            'type' => 'required',
            'desc' => 'required',
        ]);

        $Residence = Residence::where('id', $request->id)->first();

        if (!$Residence) {
            return response()->json(['message' => 'Data Not Found'], 404);
        }

        $update = $Residence->update([
            'name' => $request->name,
            'unit_number' => $request->unit_number,
            'type' => $request->type,
            'desc' => $request->desc
        ]);

        if (!$update) {
            return response()->json(['message'])
        }
    } */

    public function store(Request $request)
    { 
        $request->validate([
            'name'              => 'required|max:255',
            'unit_number'       => 'required', 
            'type'              => 'required',
            'desc'              => 'required', 
        ]);

        $Residence = Residence::create([
            'name'              => $request->name,
            'unit_number'       => $request->unit_number,
            'type'              => $request->type,
            'desc'              => $request->desc,  
        ]);

        $data = Residence::where('id','=',$Residence->id)->get();

        if ($data) 
        {
            return ResponseFormatter::success($data,'Data Residence berhasil dibuat'); 
        }
        else 
        {
            return ResponseFormatter::error(null,'Data Residence gagal dibuat',404);
        }
        
    }

    public function destroy($id)
    {  
        $Residence = Residence::findOrFail($id);
        Residence::destroy($id) ;

        // $data = $Residence::delete();

        if ($Residence) 
        {
            return ResponseFormatter::success($Residence,'Data Residence berhasil dihapus'); 
        }
        else 
        {
            return ResponseFormatter::error(null,'Data Residence gagal dihapus',404);
        }
        
    }

    
}
