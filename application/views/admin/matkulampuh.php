<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= ucwords((isset($judul)) ? $judul : $navbar) ?></h1>
  </div>

  <div class="row">

    <div class="col-lg-12">
      <div id="container-alert"></div>
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">List <?= ucwords((isset($judul)) ? $judul : $navbar) ?></h6>

          <!-- Button trigger modal -->
          <button id="modalTambah" class="btn btn-sm"><i class="fa fa-plus text-primary"></i></button>
        </div>
        <div class="card-body">
          <table id="myTable" class="w-100 table table-hover table-bordered">
            <thead>
              <tr>
                <th width="30px">#</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Input -->
<div class="modal fade" id="modalInput" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-white">
        <h5 class="modal-title" id="modalInputLabel"></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnTambah" type="button" class="btn btn-primary">Tambah</button>
        <button id="btnUpdate" type="button" class="btn btn-warning">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalDeleteLabel">Perhatian</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Data yang telah dihapus tidak dapat dikembalikan!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnHapus" type="button" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    const tabel = "matkulampuh";
    const columnField = ['Dosen', 'Matkul', 'Kelas'];
    let arrDosen = [];
    let arrMatkul = [];
    let arrKelas = [];

    // set tabel head
    $('#myTable thead tr').append(() => {
      let column = '';
      columnField.forEach((v, i) => {
        column += `<th>${v}</th>`;
      });
      column += `<th>Aksi</th>`;
      return column;
    });

    //set modal input
    getData('dosen')
      .then(res => {
        let dosen = '';
        for (const [key, value] of Object.entries(res.data)) {
          // console.log(value)
          arrDosen.push({
            key,
            data: value
          });
          dosen += `<option value="${value['nip']}">${value['fullname']}</option>`;
        }
        $('#modalInput .modal-body form').append(() => {
          let column = '';
          columnField.forEach((v, i) => {
            if (v.toLocaleLowerCase() == 'dosen') {
              column += `<div class="form-group">
                  <label for="${v.toLocaleLowerCase()}">${v}</label>
                  <select class="form-control" id="${v.toLocaleLowerCase()}" name="${v.toLocaleLowerCase()}">
                    ${dosen}
                  </select>
                </div>`;
            }
          });
          return column;
        });
      });
    getData('matkul')
      .then(res => {
        let matkul = '';
        for (const [key, value] of Object.entries(res.data)) {
          // console.log(value)
          arrMatkul.push({
            key,
            data: value
          });
          matkul += `<option value="${value['kode']}">${value['matkul']}</option>`;
        }
        $('#modalInput .modal-body form').append(() => {
          let column = '';
          columnField.forEach((v, i) => {
            if (v.toLocaleLowerCase() == 'matkul') {
              column += `<div class="form-group">
                  <label for="${v.toLocaleLowerCase()}">${v}</label>
                  <select class="form-control" id="${v.toLocaleLowerCase()}" name="${v.toLocaleLowerCase()}">
                    ${matkul}
                  </select>
                </div>`;
            }
          });
          return column;
        });
      });
    getData('kelas')
      .then(res => {
        let kelas = '';
        for (const [key, value] of Object.entries(res.data)) {
          // console.log(value)
          arrKelas.push({
            key,
            data: value
          });
          kelas += `<option value="${value['kode']}">${value['kelas']}</option>`;
        }
        $('#modalInput .modal-body form').append(() => {
          let column = '';
          columnField.forEach((v, i) => {
            if (v.toLocaleLowerCase() == 'kelas') {
              column += `<div class="form-group">
                  <label for="${v.toLocaleLowerCase()}">${v}</label>
                  <select class="form-control" id="${v.toLocaleLowerCase()}" name="${v.toLocaleLowerCase()}">
                    ${kelas}
                  </select>
                </div>`;
            }
          });
          return column;
        });
      });

      function dosenFilter(id) {
        let res = '';
        arrDosen.forEach((v,i) => {
          if(v.data.nip == id){
            res = v;
          }
        });
        return res;
      }
      function matkulFilter(id) {
        let res = '';
        arrMatkul.forEach((v,i) => {
          if(v.data.kode == id){
            res = v;
          }
        });
        return res;
      }
      function kelasFilter(id) {
        let res = '';
        arrKelas.forEach((v,i) => {
          if(v.data.kode == id){
            res = v;
          }
        });
        return res;
      }
      
      // get data table
      firebase.database().ref(tabel).on('value', (snapshot) => {
        console.log(snapshot.val());
      $('tbody').html('');
      if (snapshot.val()) {
        let i = 1;
        for (const [key, value] of Object.entries(snapshot.val())) {
          // console.log(value)
          let column = '';
          columnField.forEach((v, i) => {
            if(v.toLocaleLowerCase() == 'dosen'){
              column += `<td>${dosenFilter(value[v.toLocaleLowerCase()]).data.fullname}</td>`;
            }
            if(v.toLocaleLowerCase() == 'matkul'){
              column += `<td>${matkulFilter(value[v.toLocaleLowerCase()]).data.matkul}</td>`;
            }
            if(v.toLocaleLowerCase() == 'kelas'){
              column += `<td>${kelasFilter(value[v.toLocaleLowerCase()]).data.kelas}</td>`;
            }
          });
          $('tbody').append(`
            <tr>
              <td>${i++}</td>
              ${column}
              <td><span class="modalUpdate btn text-white badge badge-sm badge-warning" data-id="${key}" title="Update"><i class="fa fa-edit"></i> Update</span> <span class="modalDelete btn text-white badge badge-sm badge-danger" data-id="${key}" title="Hapus"><i class="fa fa-trash"></i> Delete</span></td>
            </tr>
          `);
        }

        // show Modal Update
        $('.modalUpdate').on('click', function() {
          let data = $(this).data();
          $('form').trigger('reset');
          $('#modalInput').modal('show');
          $('#modalInput .modal-header').removeClass('bg-primary');
          $('#modalInput .modal-header').addClass('bg-warning');
          $('#modalInput .modal-title').text('Update Data');
          $('#btnTambah').hide();
          $('#btnUpdate').show();
          getData(tabel + '/' + data.id).then(res => {
            columnField.forEach((v, i) => {
              $(`#modalInput #${v.toLocaleLowerCase()}`).val(res.data[v.toLocaleLowerCase()]);
            });
          });
          $('#btnUpdate').data('id', data.id);
        });

        // show Modal Delete
        $('.modalDelete').on('click', function() {
          let data = $(this).data();
          $('#modalDelete').modal('show');
          $('#btnHapus').data('id', data.id);
        });
      }

      // DataTable
      $('#myTable').DataTable();
    })

    // show Modal Tambah
    $('#modalTambah').on('click', () => {
      $('form').trigger('reset');
      $('#modalInput').modal('show');
      $('#modalInput .modal-header').removeClass('bg-warning');
      $('#modalInput .modal-header').addClass('bg-primary');
      $('#modalInput .modal-title').text('Tambah Data');
      $('#btnTambah').show();
      $('#btnUpdate').hide();
    });

    // tambah data
    $('#btnTambah').on('click', function() {
      function objectifyForm(formArray) {
        //serialize data function
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
          returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
      }

      let data = objectifyForm($('form').serializeArray());
      // console.log(data);

      tambahData(tabel, data).then(res => {
        if (res.status) {
          console.log(res.pesan);
          showAlert('<strong>Berhasil!</strong> ' + res.pesan, 'success');
        } else {
          console.log(res.pesan);
          showAlert('<strong>Gagal!</strong> ' + res.pesan, 'danger');
        }

        $('#modalInput').modal('hide');
      });
    });

    // hapus data
    $('#btnHapus').on('click', function() {
      let data = $(this).data();
      hapusData(tabel + '/' + data.id).then(res => {
        if (res.status) {
          console.log(res.pesan);
          showAlert('<strong>Berhasil!</strong> ' + res.pesan, 'success');
        } else {
          console.log(res.pesan);
          showAlert('<strong>Gagal!</strong> ' + res.pesan, 'danger');
        }

        $('#modalDelete').modal('hide');
      });
    });

    // update data
    $('#btnUpdate').on('click', function() {
      function objectifyForm(formArray) {
        //serialize data function
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
          returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
      }
      let id = $(this).data('id');
      let data = objectifyForm($('form').serializeArray());
      // console.log(data);

      updateData(tabel + '/' + id, data).then(res => {
        if (res.status) {
          console.log(res.pesan);
          showAlert('<strong>Berhasil!</strong> ' + res.pesan, 'success');
        } else {
          console.log(res.pesan);
          showAlert('<strong>Gagal!</strong> ' + res.pesan, 'danger');
        }

        $('#modalInput').modal('hide');
      });
    });

    function showAlert(pesan, status) {
      $('#container-alert').prepend(`
          <div class="alert alert-${status} alert-dismissible fade show" role="alert">
            ${pesan}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        `);
      setTimeout(() => {
        $('.alert').alert('close');
      }, 3000);
    }

    // let dosen = 


    function getMatkul() {
      getData('matkul').then((res) => {
        return res;
      });
    }
    getMatkul()
  });
</script>