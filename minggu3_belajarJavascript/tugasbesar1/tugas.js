function cekForm() {
    var nama = document.getElementById("nama").value;
    var alamat = document.getElementById("alamat").value;
    var tanggalLahir = document.getElementById("tanggal_lahir").value;
    var jenisKelamin = document.getElementsByName("jenis_kelamin");
    var hobby = document.getElementsByName("hobby");
    var pekerjaan = document.getElementsByName("pekerjaan");
    var cek = document.getElementsByName("check")[0];

    var errorMsg = "";

    if (nama === "") {
        errorMsg += "*  isi pada kolom nama\n";
    }

    if (alamat === "") {
        errorMsg += "*  isi pada kolom alamat\n";
    }

    if (tanggalLahir === "") {
        errorMsg += "*  isi pada kolom tanggal lahir\n";
    }

    var cekJenisKelamin = false;
    for (var i = 0; i < jenisKelamin.length; i++) {
        if (jenisKelamin[i].checked) {
            cekJenisKelamin = true;
            break;
        }
    }

    if (!cekJenisKelamin) {
        errorMsg += "*  isi pada kolom jenis kelamin\n";
    }

    var cekHobby = false;
    for (var i = 0; i < hobby.length; i++) {
        if (hobby[i].checked) {
            cekHobby = true;
            break;
        }
    }

    if (!cekHobby) {
        errorMsg += "*  isi pada kolom hobby\n";
    }

    var cekPekerjaan = false;
    for (var i = 0; i < pekerjaan.length; i++) {
        if (pekerjaan[i].checked) {
            cekPekerjaan = true;
            break;
        }
    }

    if (!cekPekerjaan) {
        errorMsg += "*  isi kolom pekerjaan\n";
    }

    if (!cek.checked) {
        errorMsg += "*  isi tanda ceklis untuk persetujuan\n";
    }

    if (errorMsg) {
        alert(errorMsg);
        return false;
    }

    alert("Terima kasih sudah melakukan pengisian data");

    return true;
}
