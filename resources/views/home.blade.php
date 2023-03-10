@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-header">Entry Biodata</div>

                <div class="card-body">
                    <form method="POST" id="form-biodata" role="form" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" class="form-control" id="id" name="id" value="" required>
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{auth()->user()->toArray()['id']}}" required>
                        <label>POSISI YANG DILAMAR</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="posisi" name="posisi" placeholder="POSISI YANG DILAMAR" required>
                        </div>
                        <label>NAMA</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="NAMA" required>
                        </div>
                        <label>NO.KTP</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="NO.KTP" required>
                        </div>
                        <label>TEMPAT LAHIR</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="TEMPAT LAHIR" required>
                        </div>
                        <label>TANGGAL LAHIR</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="19/02/1991" required>
                        </div>
                        <label>JENIS KELAMIN</label>
                        <div class="mb-3">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                            </select>
                        </div>
                        <label>AGAMA</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="agama" name="agama" placeholder="AGAMA" required>
                        </div>
                        <label>GOLONGAN DARAH</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="golongan_darah" name="golongan_darah" placeholder="GOLONGAN DARAH" required>
                        </div>
                        <label>STATUS</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="status" name="status" placeholder="STATUS" required>
                        </div>
                        <label>ALAMAT KTP</label>
                        <div class="mb-3">
                            <textarea class="form-control" name="alamat_ktp" id="alamat_ktp" rows="4" placeholder="ALAMAT KTP" required></textarea>
                        </div>
                        <label>ALAMAT TINGGAL</label>
                        <div class="mb-3">
                            <textarea class="form-control" name="alamat_tinggal" id="alamat_tinggal" rows="4" placeholder="ALAMAT TINGGAL" required></textarea>
                        </div>
                        <label>EMAIL</label>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" required>
                        </div>
                        <label>NO.TLP</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="NO.TLP" required>
                        </div>
                        <label>ORANG TERDEKAT YANG DAPAT DIHUBUNGI</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="orang_terdekat" name="orang_terdekat" placeholder="ORANG TERDEKAT YANG DAPAT DIHUBUNGI" required>
                        </div>
                        <label>PENDIDIKAN TERAKHIR</label>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label>JENJANG PENDIDIKAN TERAKHIR</label>
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="JENJANG PENDIDIKAN TERAKHIR" required>
                            </div>
                            <div class="col-lg-3">
                                <label>NAMA INSTITUSI AKADEMIK</label>
                                <input type="text" class="form-control" id="nama_institusi" name="nama_institusi" placeholder="NAMA INSTITUSI AKADEMIK" required>
                            </div>
                            <div class="col-lg-3">
                                <label>JURUSAN</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="JURUSAN" required>
                            </div>
                            <div class="col-lg-2">
                                <label>TAHUN LULUS</label>
                                <input type="text" class="form-control" id="thn_lulus" name="thn_lulus" placeholder="TAHUN LULUS" required>
                            </div>
                            <div class="col-lg-1">
                                <label>IPK</label>
                                <input type="double" class="form-control" id="ipk" name="ipk" placeholder="IPK" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>RIWAYAT PELATIHAN</label>
                            <button type="button" class="btn btn-info float-end" onclick="addPelatihan()">Tambah Riwayat Pelatihan</button>
                        </div>
                        <div class="row col-lg-12 mb-3">
                            <div class="col-lg-4">
                                <label>NAMA KURSUS/SEMINAR</label>
                                <input type="text" class="form-control" id="pelatihan_nama_kursus[]" name="pelatihan_nama_kursus[]" placeholder="NAMA KURSUS/SEMINAR" required>
                            </div>
                            <div class="col-lg-4">
                                <label>SERTIFIKAT</label>
                                <select name="pelatihan_sertifikat[]" id="pelatihan_sertifikat[]" class="form-select" required>
                                    <option value="ya">YA</option>
                                    <option value="tidak">TIDAK</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>TAHUN</label>
                                <input type="text" class="form-control" id="pelatihan_thn[]" name="pelatihan_thn[]" placeholder="TAHUN" required>
                            </div>
                        </div>
                        <div id="morePelatihan">
                        </div>
                        <div class="col-lg-12">
                            <label>RIWAYAT PEKERJAAN</label>
                            <button type="button" class="btn btn-info float-end" onclick="addPekerjaan()">Tambah Riwayat Pekerjaan</button>
                        </div>
                        <div class="row col-lg-12 mb-3">
                            <div class="col-lg-3">
                                <label>NAMA PERUSAHAAN</label>
                                <input type="text" class="form-control" id="pekerjaan_nama_perusahaan[]" name="pekerjaan_nama_perusahaan[]" placeholder="NAMA NAMA PERUSAHAAN" required>
                            </div>
                            <div class="col-lg-3">
                                <label>POSISI TERAKHIR</label>
                                <input type="text" class="form-control" id="pekerjaan_posisi_terakhir[]" name="pekerjaan_posisi_terakhir[]" placeholder="POSISI TERAKHIR<" required>
                            </div>
                            <div class="col-lg-3">
                                <label>PENDAPATAN TERAKHIR</label>
                                <input type="text" class="form-control" id="pekerjaan_pendapatan_terakhir[]" name="pekerjaan_pendapatan_terakhir[]" placeholder="PENDAPATAN TERAKHIR" required>
                            </div>
                            <div class="col-lg-3">
                                <label>TAHUN</label>
                                <input type="text" class="form-control" id="pekerjaan_thn[]" name="pekerjaan_thn[]" placeholder="TAHUN" required>
                            </div>
                        </div>
                        <div id="morePekerjaan">
                        </div>
                        <label>SKILL</label>
                        <div class="mb-3">
                            <textarea class="form-control" name="skill" id="skill" rows="7" placeholder="TULISKAN KEAHLIAN & KETERAMPILAN YANG SAAT INI ANDA MILIKI" required></textarea>
                        </div>
                        <label>BERSEDIA DITEMPATKAN DI SELURUH KANTOR PERUSAHAAN</label>
                        <div class="mb-3">
                            <select name="bersedia_tempatkan" id="bersedia_tempatkan" class="form-select" required>
                                <option value="ya">YA</option>
                                <option value="tidak">TIDAK</option>
                            </select>
                        </div>
                        <label>PENGHASILAN YANG DIHARAPKAN</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="penghasilan_harapan" name="penghasilan_harapan" placeholder="PENGHASILAN YANG DIHARAPKAN" required>
                        </div>
                        <div class="text-center">
                        <input type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0" value="SAVE">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


