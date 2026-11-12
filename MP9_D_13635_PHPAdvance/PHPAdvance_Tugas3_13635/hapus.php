<?php
    // 1. Panggil file koneksi (sama seperti Tugas 1 dan Tugas 2)

    // 2. Ambil id dari link (hapus.php?id =... ) memakai $_GET['id'].
    //  Beri nilai default '' jika id tidak ada.

    // 3. Validasi id: jika id kosong ATAU bukan angka (gunakan ctype_digit),
    //  tampilkan pesan error warna merah: !! ID tidak valid. !!

    // 4. Jika id valid, hapus datanya:
    //  a. Tulis query DELETE berdasarkan id (pakai tanda ?)
    //  b. Siapkan query dengan mysqli_prepare()
    //  c. Isi tanda ? dengan mysqli_stmt_bind_param()
    //    (id berupa angka, jadi tipenya 'i')
    //  d. Jalankan dengan mysqli_stmt_execute()

    // 5. Cek hasilnya dengan mysqli_stmt_affected_rows():
    //  - jika nilainya 1   -> tampilkan "Data berhasil dihapus."
    // - jika tidak         -> tampilkan "Data tidak ditemukan."

    // 6. Tampilkan link "Kembali" menuju index.php
?>