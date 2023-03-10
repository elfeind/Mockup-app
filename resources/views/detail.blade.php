@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-header">{{$action == 'view' ? 'Detail' : 'Edit'}} Biodata</div>

                <div class="card-body">
                    <form method="POST" id="form-biodata" role="form" enctype="multipart/form-data" autocomplete="off">

                        <input type="hidden" class="form-control" id="id" name="id" value="{{$data->biodata_id}}" required>
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$data->user_id}}" required>
                        <input type="hidden" class="form-control" id="action" name="action" value="admin_edit" required>
                        <label>POSISI YANG DILAMAR</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="posisi" name="posisi" value="{{$data->posisi_lamaran}}" required>
                        </div>
                        <label>NAMA</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" required>
                        </div>
                        <label>NO.KTP</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{$data->no_ktp}}" required>
                        </div>
                        <label>TEMPAT LAHIR</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$data->tempat_lahir}}" required>
                        </div>
                        <label>TANGGAL LAHIR</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{$data->tgl_lahir}}" required>
                        </div>
                        <label>JENIS KELAMIN</label>
                        <div class="mb-3">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                <option value="PEREMPUAN" {{$data->jenis_kelamin == 'PEREMPUAN' ? 'selected' : ''}}>PEREMPUAN</option>
                                <option value="LAKI-LAKI" {{$data->jenis_kelamin == 'LAKI-LAKI' ? 'selected' : ''}}>LAKI-LAKI</option>
                            </select>
                        </div>
                        <label>AGAMA</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="agama" name="agama" value="{{$data->agama}}" required>
                        </div>
                        <label>GOLONGAN DARAH</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="golongan_darah" name="golongan_darah" value="{{$data->golongan_darah}}" required>
                        </div>
                        <label>STATUS</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="status" name="status" value="{{$data->status}}" required>
                        </div>
                        <label>ALAMAT KTP</label>
                        <div class="mb-3">
                            <textarea class="form-control" name="alamat_ktp" id="alamat_ktp" rows="4" required>{{$data->alamat_ktp}}</textarea>
                        </div>
                        <label>ALAMAT TINGGAL</label>
                        <div class="mb-3">
                            <textarea class="form-control" name="alamat_tinggal" id="alamat_tinggal" rows="4" required>{{$data->alamat_tinggal}}</textarea>
                        </div>
                        <label>EMAIL</label>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}" required>
                        </div>
                        <label>NO.TLP</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="{{$data->no_tlp}}" required>
                        </div>
                        <label>ORANG TERDEKAT YANG DAPAT DIHUBUNGI</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="orang_terdekat" name="orang_terdekat" value="{{$data->orang_terdekat}}" required>
                        </div>
                        <label>PENDIDIKAN TERAKHIR</label>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label>JENJANG PENDIDIKAN TERAKHIR</label>
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{$data->jenjang}}" required>
                            </div>
                            <div class="col-lg-3">
                                <label>NAMA INSTITUSI AKADEMIK</label>
                                <input type="text" class="form-control" id="nama_institusi" name="nama_institusi" value="{{$data->nama_institusi}}" required>
                            </div>
                            <div class="col-lg-3">
                                <label>JURUSAN</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{$data->jurusan}}" required>
                            </div>
                            <div class="col-lg-2">
                                <label>TAHUN LULUS</label>
                                <input type="text" class="form-control" id="thn_lulus" name="thn_lulus" value="{{$data->tahun_lulus}}" required>
                            </div>
                            <div class="col-lg-1">
                                <label>IPK</label>
                                <input type="double" class="form-control" id="ipk" name="ipk" value="{{$data->ipk}}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>RIWAYAT PELATIHAN</label>
                        </div>
                        <div class="row col-lg-12 mb-3">
                            @foreach ($data->pelatihan as $pelatihan)
                                <div class="col-lg-4">
                                    <label>NAMA KURSUS/SEMINAR</label>
                                    <input type="text" class="form-control" id="pelatihan_nama_kursus[]" name="pelatihan_nama_kursus[]" value="{{$pelatihan['nama_pelatihan']}}" required>
                                </div>
                                <div class="col-lg-4">
                                    <label>SERTIFIKAT</label>
                                    <select name="pelatihan_sertifikat[]" id="pelatihan_sertifikat[]" class="form-select" required>
                                        <option value="ya" {{$pelatihan['sertifikat'] == 'ya' ? 'selected' : ''}}>YA</option>
                                        <option value="tidak{{$pelatihan['sertifikat'] == 'tidak' ? 'selected' : ''}}">TIDAK</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>TAHUN</label>
                                    <input type="text" class="form-control" id="pelatihan_thn[]" name="pelatihan_thn[]" value="{{$pelatihan['tahun']}}" required>
                                </div>
                            @endforeach
                        </div>
                        <div id="morePelatihan">
                        </div>
                        <div class="col-lg-12">
                            <label>RIWAYAT PEKERJAAN</label>
                        </div>
                        <div class="row col-lg-12 mb-3">
                            @foreach ($data->pekerjaan as $pekerjaan)
                                <div class="col-lg-3">
                                    <label>NAMA PERUSAHAAN</label>
                                    <input type="text" class="form-control" id="pekerjaan_nama_perusahaan[]" name="pekerjaan_nama_perusahaan[]" value="{{$pekerjaan['nama_perusahaan']}}" required>
                                </div>
                                <div class="col-lg-3">
                                    <label>POSISI TERAKHIR</label>
                                    <input type="text" class="form-control" id="pekerjaan_posisi_terakhir[]" name="pekerjaan_posisi_terakhir[]" value="{{$pekerjaan['posisi_terakhir']}}" required>
                                </div>
                                <div class="col-lg-3">
                                    <label>PENDAPATAN TERAKHIR</label>
                                    <input type="text" class="form-control" id="pekerjaan_pendapatan_terakhir[]" name="pekerjaan_pendapatan_terakhir[]" value="{{$pekerjaan['pendapatan_terakhir']}}" required>
                                </div>
                                <div class="col-lg-3">
                                    <label>TAHUN</label>
                                    <input type="text" class="form-control" id="pekerjaan_thn[]" name="pekerjaan_thn[]" value="{{$pekerjaan['tahun']}}" required>
                                </div>
                            @endforeach
                        </div>
                        <div id="morePekerjaan">
                        </div>
                        <label>SKILL</label>
                        <div class="mb-3">
                            <textarea class="form-control" name="skill" id="skill" rows="7" placeholder="TULISKAN KEAHLIAN & KETERAMPILAN YANG SAAT INI ANDA MILIKI" required>{{$data['skill']}}</textarea>
                        </div>
                        <label>BERSEDIA DITEMPATKAN DI SELURUH KANTOR PERUSAHAAN</label>
                        <div class="mb-3">
                            <select name="bersedia_tempatkan" id="bersedia_tempatkan" class="form-select" required>
                                <option value="ya" {{$data['bersedia_ditempatkan'] == 'ya' ? 'selected' : ''}}>YA</option>
                                <option value="tidak" {{$data['bersedia_ditempatkan'] == 'tidak' ? 'selected' : ''}}>TIDAK</option>
                            </select>
                        </div>
                        <label>PENGHASILAN YANG DIHARAPKAN</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="penghasilan_harapan" name="penghasilan_harapan" value="{{$data['penghasilan_harapan']}}" required>
                        </div>
                        @if ($action == 'edit')
                            <div class="text-center">
                                <input type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0" value="SAVE">
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


