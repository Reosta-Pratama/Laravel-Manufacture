<?php

namespace App\Http\Controllers;

use App\Models\ProjectManufacture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProjectManufactureController extends Controller
{
    //
    public function index(Request $request){
        $projects = ProjectManufacture::where('nama', 'LIKE', '%'.$request->keyword.'%');
        switch (request('sortBy')) {
            case 'namaASC':
                $projects->orderby('nama', 'asc');
                break;
            case 'namaDES':
                $projects->orderby('nama', 'desc');
                break;
            default:
                $projects->orderby('created_at', 'asc');
            break;
        }
        
        $projects = $projects->latest()->get();
        return view('Manufacture.projects', compact('projects'));
    }

    public function detail(Request $request){
        $projects = DB::table('project_manufactures')->where('id', $request->id)->first();
        return view('Manufacture.project-detail', compact('projects'));
    }

    public function entryPage()
    {
        return view('admin.manufacture.addProjects');
    }

    public function entryAdd(Request $request)
    {
        $validateData = $request -> validate([
            'foto' => 'required|mimes:png,jpg',
            'nama' => 'required|unique:project_manufactures,nama',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ]);

        $foto = $request->file('foto');
        $fotoTambahan1 = $request->file('fotoTambahan1');
        $fotoTambahan2 = $request->file('fotoTambahan2');
        $fotoTambahan3 = $request->file('fotoTambahan3');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($foto->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/manufacture/project/';
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

        ProjectManufacture::insert([
            'foto' => $last_img,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
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

    public function dataTableProject()
    {
        $projects = ProjectManufacture::all();
        return view('admin.manufacture.datatableProject',compact('projects'));
    }

    public function editProject(Request $request)
    {
        $project = DB::table('project_manufactures')->where('nama', $request->nama)->first();

        $fotoSize = File::size(public_path($project->foto));

        $fotoSizefotoTambahan1 = File::size(public_path($project->fotoTambahan1));
        $fotoSizefotoTambahan2 = File::size(public_path($project->fotoTambahan2));
        $fotoSizefotoTambahan3 = File::size(public_path($project->fotoTambahan3));

        return view('admin.manufacture.detailProject', compact('project','fotoSize', 'fotoSizefotoTambahan1', 'fotoSizefotoTambahan2', 'fotoSizefotoTambahan3'));
    }

    public function saveEdit(Request $request)
    {
        $validateData = $request -> validate([
            'foto' => 'mimes:png,jpg',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $product = DB::table('project_manufactures')->where('nama', $request->nama)->first();

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
            $up_location = 'image/manufacture/project/';
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

                ProjectManufacture::find($request->id)->update([
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

                ProjectManufacture::find($request->id)->update([
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

                ProjectManufacture::find($request->id)->update([
                    'fotoTambahan3' => $last_img_fotoTambahan3,
                ]);
            }
            
            if($request->kategori == null){
                $request->kategori = $product->kategori;
            }

            if($request->tanggal == null){
                $request->tanggal = $product->tanggal;
            }

            ProjectManufacture::find($request->id)->update([
                'foto' => $last_img,
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'created_at' => Carbon::now()
            ]);
        } else {
            $up_location = 'image/manufacture/tanggal/';

            if ($fotoTambahan1) {
                $name_genfotoTambahan1 = hexdec(uniqid());
                $img_ext_fotoTambahan1 = strtolower($fotoTambahan1->getClientOriginalExtension());
                $img_name_fotoTambahan1 = $name_genfotoTambahan1.'.'.$img_ext_fotoTambahan1;
                $last_img_fotoTambahan1 = $up_location.$img_name_fotoTambahan1;
                $fotoTambahan1->move($up_location, $img_name_fotoTambahan1);
                
                if ($old_imagefotoTambahan1 != null) {
                    unlink($old_imagefotoTambahan1);
                }

                ProjectManufacture::find($request->id)->update([
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

                ProjectManufacture::find($request->id)->update([
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

                ProjectManufacture::find($request->id)->update([
                    'fotoTambahan3' => $last_img_fotoTambahan3,
                ]);
            }

            if($request->kategori == null){
                $request->kategori = $product->kategori;
            }

            if($request->tanggal == null){
                $request->tanggal = $product->tanggal;
            }
            
            ProjectManufacture::find($request->id)->update([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'created_at' => Carbon::now()
            ]);
        }
        
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect() -> route('manufacture.datatable.project') -> with($notification);
    }

    public function deleteProject($id)
    {
        $image = ProjectManufacture::find($id);
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

            ProjectManufacture::find($id) -> delete();
            $notification = array(
                'message' => 'Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect() -> back() -> with($notification);
        }
        else{
            ProjectManufacture::find($id) -> delete();
            $notification = array(
                'message' => 'Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect() -> back() -> with($notification);
        }
    }
}
