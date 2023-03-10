<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Pendidikan;
use App\Models\Riwayat_pelatihan;
use App\Models\Riwayat_pekerjaan;
use Illuminate\Http\JsonResponse;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function createOrUpdateBiodata(Request $request) {
        $data = $request->all();
        // echo json_encode($input);die(0);
        $date = strtotime($data['tgl_lahir']);
        $tgl_lahir = date('Y-m-d',$date);
        $biodata = new Biodata;

        // echo json_encode($data['id']);
        if ($data['id'] != '') {
            $biodata = Biodata::find($data['id']);
        }
        $biodata->user_id = $data['user_id'];
        $biodata->posisi_lamaran = $data['posisi'];
        $biodata->nama = $data['nama'];
        $biodata->no_ktp = $data['no_ktp'];
        $biodata->tempat_lahir = $data['tempat_lahir'];
        $biodata->tgl_lahir = $tgl_lahir;
        $biodata->jenis_kelamin = $data['jenis_kelamin'];
        $biodata->agama = $data['agama'];
        $biodata->golongan_darah = $data['golongan_darah'];
        $biodata->status = $data['status'];
        $biodata->alamat_ktp = $data['alamat_ktp'];
        $biodata->alamat_tinggal = $data['alamat_tinggal'];
        $biodata->email = $data['email'];
        $biodata->no_tlp = $data['no_tlp'];
        $biodata->orang_terdekat = $data['orang_terdekat'];
        $biodata->skill = $data['skill'];
        $biodata->bersedia_ditempatkan = $data['bersedia_tempatkan'];
        $biodata->penghasilan_harapan = $data['penghasilan_harapan'];
        $responseBiodata = $biodata->save();
        if ($responseBiodata) {
            if ($data['id'] == '') {
                $pendidikan = new Pendidikan;
                // echo json_encode($data);
                $pendidikan->biodata_id = $biodata->id;
                $pendidikan->jenjang = $data['pendidikan'];
                $pendidikan->nama_institusi = $data['nama_institusi'];
                $pendidikan->jurusan = $data['jurusan'];
                $pendidikan->tahun_lulus = $data['thn_lulus'];
                $pendidikan->ipk = $data['ipk'];
                $pendidikan->save();

                for ($i=0; $i < $data['pelatihan_seq'] ; $i++) {
                    $pelatihan = new Riwayat_pelatihan;
                    $pelatihan->biodata_id = $biodata->id;
                    $pelatihan->nama_pelatihan = $data['pelatihan_nama_kursus'][$i];
                    $pelatihan->sertifikat = $data['pelatihan_sertifikat'][$i];
                    $pelatihan->tahun = $data['pelatihan_thn'][$i];
                    $pelatihan->save();
                }

                for ($i=0; $i < $data['pekerjaan_seq'] ; $i++) {
                    $pekerjaan = new Riwayat_pekerjaan;
                    $pekerjaan->biodata_id = $biodata->id;
                    $pekerjaan->nama_perusahaan = $data['pekerjaan_nama_perusahaan'][$i];
                    $pekerjaan->posisi_terakhir = $data['pekerjaan_posisi_terakhir'][$i];
                    $pekerjaan->pendapatan_terakhir = $data['pekerjaan_pendapatan_terakhir'][$i];
                    $pekerjaan->tahun = $data['pekerjaan_thn'][$i];
                    $pekerjaan->save();
                }
            }

            $balikan = [
                'status' => true,
                'message' => 'Biodata has been saved',
                'data' => $biodata->id
            ];
        } else {
            $balikan = [
                'status' => false,
                'message' => 'an error occurred trying to save biodata. Try again later.'
            ];
        }

        return response()->json($balikan);


    }

    public function biodataList()
    {
        return view('admin');
    }

    public function dtBiodata()
    {
        $data = Biodata::select(['id','nama','posisi_lamaran','tempat_lahir','tgl_lahir'])
                ->orderByDesc('created_at')
                ->get();
        // echo json_encode($data);die(0);
        $dataTable = Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){

                            $btn = '<a class="btn btn-info my-1" href="detailBiodata/'.$data->id.'/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-warning my-1" href="detailBiodata/'.$data->id.'/view"><i class="fa-solid fa-scroll"></i></a>
                                    <a class="btn btn-danger my-1" href="deleteBiodata/'.$data->id.'"><i class="fa-solid fa-trash"></i></a>';

                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);

        return $dataTable;


    }

    public function detailBiodata($id,$action)
    {
        $data = Biodata::join('pendidikan', 'biodata.id', '=', 'pendidikan.biodata_id')
                ->where('biodata.id',$id)
                ->select('biodata.*', 'pendidikan.*', 'biodata.id as biodata_id')
                ->first();
        $data['pelatihan'] = Riwayat_pelatihan::where('biodata_id', $id)->get();
        $data['pekerjaan'] = Riwayat_pekerjaan::where('biodata_id', $id)->get();

        // echo json_encode($data);

        return view('detail',[
            'data' => $data,
            'action' => $action
        ]);
    }

    public function deleteBiodata($id) {
        $biodata = Biodata::find($id);
        $biodata->delete();
        return back();
    }
}
