# freelance-kolamPemancingan

- Konfigurasi gagal ngeload, 
    - Ubah $base_url di file config.php folder config (config/config.php)
        dari $base_url = "localhost/freelance/kolamPemancingan" 
            -> $base_url = "localhost/kolamPemancingan" kalo langsung naronya di folder htdocs 
            -> $base_url = "localhost/NamaFolder/kolamPemancingan" kalo nyimpannya di folder lain (NamaFolder disesuaikan)

- Update (31/10/2019) :
    1. (+) Email penerima sudah sesuai dengan kolom email, dari tabel user, database kolamPemancingan
    2. (+) Grafik sudah menampilkan data dari tanggal 14 hari dari sekarang sampai sekarang
    3. (-) Pas loading di dashboard, lambat karena harus ngirim email ke seluruh user yang terdaftar (Aku bikin 3 user tadi, vendor emailnya ngasih warning "too_much_take_respond", gimana kalo 10 user ato lebih ?) 
    4, (?) Saran aku sesuaiin dulu maunya email yang nerima itu seluruh user ato user yang login aja ?

- Update (16/11/2019) :
    1. (+) Menambahkan fitur untuk menambahkan data keadaan air ke database yang digunakan untuk diproses pada fitur laporan
