class Entri {

  constructor(siswa) {
    let daftarSiswa = siswa;

    $("#searchSiswa").on('click', () => {
      let value = $("input[list='listSiswa']").val();
      $.each(daftarSiswa, (key, siswa) => {
        if(value === siswa['nisn']) {
          $(".result").html(`
          <input type="hidden" name="id_spp" value="${siswa['id_spp']}">
          <div class="form-group">
              <label for="nisn">NISN</label>
              <input type="text" name="nisn" id="nisn" class="form-control" value="${siswa['nisn']}" readonly>
          </div>
          <div class="form-group">
              <label for="nis">NIS</label>
              <input type="text" name="nis" id="nis" class="form-control" value="${siswa['nis']}" readonly>
          </div>
          <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" value="${siswa['nama']}" readonly>
          </div>
          <div class="form-group">
              <label for="jumlah_bayar">Jumlah Bayar</label>
              <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="${siswa['nominal']}">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
          `)
          return false;
        }
        $(".result").html(`<div class='alert alert-warning'>Data siswa tidak ditemukan...</div>`)
      })
    })
  }

}