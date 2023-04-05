<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $products = Product::where('nama', 'LIKE', '%'.$request->keyword.'%');
        switch (request('sortBy')) {
            case 'namaASC':
                $products->orderby('nama', 'asc');
                break;
            case 'namaDES':
                $products->orderby('nama', 'desc');
                break;
            case 'NIKKEN':
                $products->where('kategori', 'NIKKEN');
                break;
            case 'PFERD':
                $products->where('kategori', 'PFERD');
                break;
            case 'SHINANO':
                $products->where('kategori', 'SHINANO');
                break;
            default:
                $products->orderby('created_at', 'asc');
            break;
        }
        
        // dd($nikken);

        $products = $products->latest()->paginate(6);
        return view('Contruction.products', compact('products'));
    }

    public function detail(Request $request)
    {
        $products = DB::table('products')->where('nama', $request->nama)->first();

        return view('Contruction.product-details', compact('products'));
    }

    
    public function showProducts(Request $request)
    {
        $products = Product::all();
        if($request->keyword != ''){
          $products = Product::where('nama','LIKE','%'.$request->keyword.'%')->get();
        }
        
        return response()->json([
           'products' => $products
        ]);
    }
    
    public function entryPage()
    {
        return view('admin.contruction.addProducts');
    }

    public function entryAdd(Request $request)
    {
        $validateData = $request -> validate([
            'foto' => 'required|mimes:png,jpg',
            'nama' => 'required|unique:products,nama',
            'kategori' => 'required',
            'deskripsi' => 'required'
        ]);


        $foto = $request->file('foto');
        $fotoTambahan1 = $request->file('fotoTambahan1');
        $fotoTambahan2 = $request->file('fotoTambahan2');
        $fotoTambahan3 = $request->file('fotoTambahan3');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($foto->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/construction/product/';
        $last_img = $up_location.$img_name;
        $foto->move($up_location, $img_name);

        $value_1 = '';
        $value_2 = '';
        $value_3 = '';

        if ($fotoTambahan1) {
            $name_genfotoTambahan1 = hexdec(uniqid());
            $img_ext_fotoTambahan1 = strtolower($fotoTambahan1->getClientOriginalExtension());
            $img_name_fotoTambahan1 = $name_genfotoTambahan1.'.'.$img_ext_fotoTambahan1;
            $last_img_fotoTambahan1 = $up_location.$img_name_fotoTambahan1;
            $fotoTambahan1->move($up_location, $img_name_fotoTambahan1);

            $value_1 = $last_img_fotoTambahan1;
        }
       
        if ($fotoTambahan2) {
            $name_genfotoTambahan2 = hexdec(uniqid());
            $img_ext_fotoTambahan2 = strtolower($fotoTambahan2->getClientOriginalExtension());
            $img_name_fotoTambahan2 = $name_genfotoTambahan2.'.'.$img_ext_fotoTambahan2;
            $last_img_fotoTambahan2 = $up_location.$img_name_fotoTambahan2;
            $fotoTambahan2->move($up_location, $img_name_fotoTambahan2);

            $value_2 = $last_img_fotoTambahan2;
        }
       
        if ($fotoTambahan3) {
            $name_genfotoTambahan3 = hexdec(uniqid());
            $img_ext_fotoTambahan3 = strtolower($fotoTambahan3->getClientOriginalExtension());
            $img_name_fotoTambahan3 = $name_genfotoTambahan3.'.'.$img_ext_fotoTambahan3;
            $last_img_fotoTambahan3 = $up_location.$img_name_fotoTambahan3;
            $fotoTambahan3->move($up_location, $img_name_fotoTambahan3);

            $value_3 = $last_img_fotoTambahan3;
        }

        Product::insert([
            'foto' => $last_img,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'dekripsiTambahan' => $request->dekripsiTambahan,
            'berat' => $request->berat,
            'ukuran' => $request->ukuran,
            'fotoTambahan1' => $value_1,
            'fotoTambahan2' => $value_2,
            'fotoTambahan3' => $value_3,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect() -> back() -> with($notification);
    }

    public function dataTableProduct()
    {
        $products = Product::all();
        return view('admin.contruction.datatableProduct', compact('products'));
    }

    public function editProduct(Request $request)
    {
        $product = DB::table('products')->where('nama', $request->nama)->first();

        $fotoSize = File::size(public_path($product->foto));

        $fotoSizefotoTambahan1 = File::size(public_path($product->fotoTambahan1));
        $fotoSizefotoTambahan2 = File::size(public_path($product->fotoTambahan2));
        $fotoSizefotoTambahan3 = File::size(public_path($product->fotoTambahan3));

        return view('admin.contruction.detailProduct', compact('product','fotoSize', 'fotoSizefotoTambahan1', 'fotoSizefotoTambahan2', 'fotoSizefotoTambahan3'));
    }

    public function saveEdit(Request $request)
    {
        $validateData = $request -> validate([
            'foto' => 'mimes:png,jpg',
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        $product = DB::table('products')->where('nama', $request->nama)->first();

        $old_image = $request->old_image;
        $old_imagefotoTambahan1 = $request->old_imagefotoTambahan1;
        $old_imagefotoTambahan2 = $request->old_imagefotoTambahan2;
        $old_imagefotoTambahan3 = $request->old_imagefotoTambahan3;

        $foto = $request->file('foto');
        $fotoTambahan1 = $request->file('fotoTambahan1');
        $fotoTambahan2 = $request->file('fotoTambahan2');
        $fotoTambahan3 = $request->file('fotoTambahan3');

        if ($foto) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($foto->getClientOriginalExtension());    
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/construction/product/';
            $last_img = $up_location.$img_name;
            $foto->move($up_location, $img_name);
            unlink($old_image);

            if ($fotoTambahan1) {
                $name_genfotoTambahan1 = hexdec(uniqid());
                $img_ext_fotoTambahan1 = strtolower($fotoTambahan1->getClientOriginalExtension());
                $img_name_fotoTambahan1 = $name_genfotoTambahan1.'.'.$img_ext_fotoTambahan1;
                $last_img_fotoTambahan1 = $up_location.$img_name_fotoTambahan1;
                $fotoTambahan1->move($up_location, $img_name_fotoTambahan1);
                
                if ($old_imagefotoTambahan1 != null) {
                    unlink($old_imagefotoTambahan1);
                }

                Product::find($request->id)->update([
                    'fotoTambahan1' => $last_img_fotoTambahan1,
                ]);
            }
           
            if ($fotoTambahan2) {
                $name_genfotoTambahan2 = hexdec(uniqid());
                $img_ext_fotoTambahan2 = strtolower($fotoTambahan2->getClientOriginalExtension());
                $img_name_fotoTambahan2 = $name_genfotoTambahan2.'.'.$img_ext_fotoTambahan2;
                $last_img_fotoTambahan2 = $up_location.$img_name_fotoTambahan2;
                $fotoTambahan2->move($up_location, $img_name_fotoTambahan2);

                if ($old_imagefotoTambahan2 != null) {
                    unlink($old_imagefotoTambahan2);
                }

                Product::find($request->id)->update([
                    'fotoTambahan2' => $last_img_fotoTambahan2,
                ]);
            }
           
            if ($fotoTambahan3) {
                $name_genfotoTambahan3 = hexdec(uniqid());
                $img_ext_fotoTambahan3 = strtolower($fotoTambahan3->getClientOriginalExtension());
                $img_name_fotoTambahan3 = $name_genfotoTambahan3.'.'.$img_ext_fotoTambahan3;
                $last_img_fotoTambahan3 = $up_location.$img_name_fotoTambahan3;
                $fotoTambahan3->move($up_location, $img_name_fotoTambahan3);

                if ($old_imagefotoTambahan3 != null) {
                    unlink($old_imagefotoTambahan3);
                }

                Product::find($request->id)->update([
                    'fotoTambahan3' => $last_img_fotoTambahan3,
                ]);
            }
            
            if($request->kategori == null){
                $request->kategori = $product->kategori;
            }

            Product::find($request->id)->update([
                'foto' => $last_img,
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'dekripsiTambahan' => $request->dekripsiTambahan,
                'berat' => $request->berat,
                'ukuran' => $request->ukuran,
                'created_at' => Carbon::now()
            ]);
        } else {
            $up_location = 'image/construction/product/';

            if ($fotoTambahan1) {
                $name_genfotoTambahan1 = hexdec(uniqid());
                $img_ext_fotoTambahan1 = strtolower($fotoTambahan1->getClientOriginalExtension());
                $img_name_fotoTambahan1 = $name_genfotoTambahan1.'.'.$img_ext_fotoTambahan1;
                $last_img_fotoTambahan1 = $up_location.$img_name_fotoTambahan1;
                $fotoTambahan1->move($up_location, $img_name_fotoTambahan1);
                
                if ($old_imagefotoTambahan1 != null) {
                    unlink($old_imagefotoTambahan1);
                }

                Product::find($request->id)->update([
                    'fotoTambahan1' => $last_img_fotoTambahan1,
                ]);
            }

            if ($fotoTambahan2) {
                $name_genfotoTambahan2 = hexdec(uniqid());
                $img_ext_fotoTambahan2 = strtolower($fotoTambahan2->getClientOriginalExtension());
                $img_name_fotoTambahan2 = $name_genfotoTambahan2.'.'.$img_ext_fotoTambahan2;
                $last_img_fotoTambahan2 = $up_location.$img_name_fotoTambahan2;
                $fotoTambahan2->move($up_location, $img_name_fotoTambahan2);

                if ($old_imagefotoTambahan2 != null) {
                    unlink($old_imagefotoTambahan2);
                }

                Product::find($request->id)->update([
                    'fotoTambahan2' => $last_img_fotoTambahan2,
                ]);
            }

            if ($fotoTambahan3) {
                $name_genfotoTambahan3 = hexdec(uniqid());
                $img_ext_fotoTambahan3 = strtolower($fotoTambahan3->getClientOriginalExtension());
                $img_name_fotoTambahan3 = $name_genfotoTambahan3.'.'.$img_ext_fotoTambahan3;
                $last_img_fotoTambahan3 = $up_location.$img_name_fotoTambahan3;
                $fotoTambahan3->move($up_location, $img_name_fotoTambahan3);

                if ($old_imagefotoTambahan3 != null) {
                    unlink($old_imagefotoTambahan3);
                }

                Product::find($request->id)->update([
                    'fotoTambahan3' => $last_img_fotoTambahan3,
                ]);
            }

            if($request->kategori == null){
                $request->kategori = $product->kategori;
            }
            
            Product::find($request->id)->update([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'dekripsiTambahan' => $request->dekripsiTambahan,
                'berat' => $request->berat,
                'ukuran' => $request->ukuran,
                'created_at' => Carbon::now()
            ]);
        }
        
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect() -> route('dashboard.datatable.product') -> with($notification);
    }

    public function deleteProduct($id){
        $image = Product::find($id);
        $old_image = $image->foto;

        $old_imagefotoTambahan1 = $image->fotoTambahan1;
        $old_imagefotoTambahan2 = $image->fotoTambahan2;
        $old_imagefotoTambahan3 = $image->fotoTambahan3;

        if ($old_image != null) {
            unlink($old_image);
            if($old_imagefotoTambahan1 != null){
                unlink($old_imagefotoTambahan1);
            }
            if($old_imagefotoTambahan2 != null){
                unlink($old_imagefotoTambahan2);
            }
            if($old_imagefotoTambahan3 != null){
                unlink($old_imagefotoTambahan3);
            }

            Product::find($id) -> delete();
            $notification = array(
                'message' => 'Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect() -> back() -> with($notification);
        }
        else{
            Product::find($id) -> delete();
            $notification = array(
                'message' => 'Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect() -> back() -> with($notification);
        }
    }
}
