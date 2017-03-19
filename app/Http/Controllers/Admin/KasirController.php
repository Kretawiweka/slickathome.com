<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Barang;
use App\HargaBarang;
use Session;
use Input;
use DB;
use Validator;
use Response;


class KasirController extends Controller
{
 
    public function index()
    {
        $data = [
            'page' => 'kasir',
            'barang' => Barang::all(),
            'harga_barang' => HargaBarang::all()
        ];
        return view('admin.kasir.index',$data);
    }

    public function autocomplete(Request $request)
    {   
        $term=$request->term;
        $results = array();
        $data=Barang::where('nama_barang','LIKE','%'.$term.'%')->take(10)->get();

        foreach ($data as $key => $v) {
          $results[]=[  'value'=>$v->kode_barang." -".$v->nama_barang,
                        'kode_barang'=>$v->kode_barang,
                        'nama_barang'=>$v->nama_barang,
                    ];
        }
        return response()->json($results);        
    }

}
