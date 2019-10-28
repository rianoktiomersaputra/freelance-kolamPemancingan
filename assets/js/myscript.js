$(function() {
    $("#dasboard a:contains('Halaman Utama')").parent().addClass('active');
    $("#data_pasien a:contains('Master Data Pasien')").parent().addClass('active');   
    $("#data_pegawai a:contains('Master Data Pegawai')").parent().addClass('active');
    $("#periksa a:contains('Pemeriksaan')").parent().addClass('active');
    $("#keadaangigi a:contains('Data Keadaan Gigi')").parent().addClass('active');
    $("#perawatangigi a:contains('Data Perawatan Gigi')").parent().addClass('active');
    $("#bahanobat a:contains('Data Bahan & Obat')").parent().addClass('active');
    $("#kunjunganpasien a:contains('Kunjungan Pasien')").parent().addClass('active');
    $("#lpkeadaangigi a:contains('5 Besar Keadaan Gigi')").parent().addClass('active');
    $("#lpbahanobat a:contains('5 Besar Bahan & Obat')").parent().addClass('active');
    $("#lpperawatangigi a:contains('5 Besar Perawatan Gigi')").parent().addClass('active');
    $("#lpkeuangan a:contains('Keuangan')").parent().addClass('active');
});