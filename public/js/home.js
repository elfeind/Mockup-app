$(document).ready(function() {
    viewBiodata();
});
var pelatihanSeq = 1;
function addPelatihan() {
    var html =  '<div class="row col-lg-12 mb-3">'+
                '    <div class="col-lg-4">'+
                '        <input type="text" class="form-control" id="pelatihan_nama_kursus[]" name="pelatihan_nama_kursus[]" placeholder="NAMA KURSUS/SEMINAR" required>'+
                '    </div>'+
                '    <div class="col-lg-4">'+
                '        <select name="pelatihan_sertifikat[]" id="pelatihan_sertifikat[]" class="form-select" required>'+
                '            <option value="ya">YA</option>'+
                '            <option value="tidak">TIDAK</option>'+
                '        </select>'+
                '    </div>'+
                '    <div class="col-lg-4">'+
                '        <input type="text" class="form-control" id="pelatihan_thn[]" name="pelatihan_thn[]" placeholder="TAHUN" required>'+
                '    </div>'+
                '</div>';
    pelatihanSeq++;
    // console.log(pelatihanSeq);
    $('#morePelatihan').append(html);
}

var pekerjaanSeq = 1;
function addPekerjaan() {
    var html =  '<div class="row col-lg-12 mb-3">'+
                '    <div class="col-lg-3">'+
                '        <label>NAMA PERUSAHAAN</label>'+
                '        <input type="text" class="form-control" id="pekerjaan_nama_perusahaan[]" name="pekerjaan_nama_perusahaan[]" placeholder="NAMA NAMA PERUSAHAAN" required>'+
                '    </div>'+
                '    <div class="col-lg-3">'+
                '        <label>POSISI TERAKHIR</label>'+
                '        <input type="text" class="form-control" id="pekerjaan_posisi_terakhir[]" name="pekerjaan_posisi_terakhir[]" placeholder="POSISI TERAKHIR<" required>'+
                '    </div>'+
                '    <div class="col-lg-3">'+
                '        <label>PENDAPATAN TERAKHIR</label>'+
                '        <input type="text" class="form-control" id="pekerjaan_pendapatan_terakhir[]" name="pekerjaan_pendapatan_terakhir[]" placeholder="PENDAPATAN TERAKHIR" required>'+
                '    </div>'+
                '    <div class="col-lg-3">'+
                '        <label>TAHUN</label>'+
                '       <input type="text" class="form-control" id="pekerjaan_thn[]" name="pekerjaan_thn[]" placeholder="TAHUN" required>'+
                '    </div>'+
                '</div>';
    pekerjaanSeq++;
    // console.log(pekerjaanSeq);
    $('#morePekerjaan').append(html);
}

$('#form-biodata').parsley();
$('#form-biodata').on('submit', function (e){
    e.preventDefault();
    var form = $(this);
    form.parsley().validate();
    var formData = new FormData(this);
    formData.set('pelatihan_seq', pelatihanSeq)
    formData.set('pekerjaan_seq', pekerjaanSeq)

    // // Display the key/value pairs
    // for (var pair of formData.entries()) {
    //     console.log(pair[0]+ ', ' + pair[1]);
    // }

    if ($('#action').val() == 'admin_edit') {
        var url = '/createOrUpdateBiodata';
    } else {
        var url = 'createOrUpdateBiodata';
    }


    if (form.parsley().isValid()) {
        $.ajax({
            type: 'post',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            type: 'POST',
            datatype: 'JSON',
            processData: false,
            contentType: false,
            beforeSend: function() {
                $.LoadingOverlay('show');
            },
            success: function(msg) {
                console.log(msg);
                $.LoadingOverlay('hide');
                // var jsonObject = JSON.parse(msg);
                // console.log(jsonObject);
                if (msg.status) {
					$('#form-biodata')[0].reset();
					$('#form-biodata').parsley().reset();
                    Swal.fire(
                        'success',
                        msg.message,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Failed',
                        msg.message,
                        'error'
                    );
					// $('#password').val('');
                }
            }
        });
    }


});

function viewBiodata() {
    $('#dtBiodata').DataTable({
        processing: true,
        serverSide: true,
        select: true,
        ordering: false,
        // scrollY: 300,
        ajax: 'dtBiodata',
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'tempat_lahir', name: 'tempat_lahir'},
            {data: 'posisi_lamaran', name: 'posisi_lamaran'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        language: {
			paginate: {
				previous: '<span><i class="fa-solid fa-angle-left"></i></span>',
				next: '<span><i class="fa-solid fa-angle-right"></i></span>',
				first: '',
				last: ''
			}
		},
        columnDefs: [
            { targets: '_all', defaultContent: '-' },
            { targets: 0, className: "text-center" },
            { targets: 1, className: "text-center"},
            { targets: 2,
                render: function ( data, type, row ) {
                    return data+ ', ' + row['tgl_lahir'];
                }
            },
            { targets: 3, className: 'text-break'},
            { targets: 4, className: "text-center" }
          ]
    });
}
