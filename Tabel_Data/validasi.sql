-- LED BAB 11
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL,11, 2, 
'
<ul style="list-style-type: lower-alpha; text-transform: none;">

<li> Ketersediaan
dokumen formal
kebijakan dan prosedur
pengembangan jejaring
dan kemitraan (dalam
dan luar negeri), dan
monitoring dan evaluasi
kepuasan mitra
kerjasama.</li>

<li>Ketersediaan
dokumen perencanaan
pengembangan jejaring
dan kemitraan yang
ditetapkan untuk
mencapai visi, misi dan
tujuan strategis institusi.</li>

<li>Ketersediaan data
jumlah, lingkup,
relevansi, dan
kebermanfaatan
kerjasama.
</li>

<li>
Ketersediaan bukti
monitoring dan evaluasi
pelaksanaan program
kemitraan, tingkat
kepuasan mitra
kerjasama yang diukur
dengan instrumen yang
sahih, serta upaya
perbaikan mutu jejaring
dan kemitraan untuk
menjamin ketercapaian
visi, misi dan tujuan
strategis.
Skor = 
(A + B + (2 x C) +(4 x D)) / 8
</li>

</ul>'
, '');

-- LKPT BAB 11
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL,11, 1, 
'Kerjasama perguruan
tinggi di bidang
pendidikan, penelitian
dan PkM dalam 3 tahun
terakhir.
', '
<ul>
<li>RI= NI / NDT , RN = NN / NDT , RL= NL/NDT</li>
<li>NI= Jumlah kerjasama tridharma tingkat internasional.</li>
<li>NN = Jumlah kerjasama tridharma tingkat nasional.</li>
<li>NL= Jumlah kerjasama tridharma tingkat wilayah/lokal.</li>
<li>NDT = Jumlah dosen tetap.</li>
</ul>
');


-- LED BAB 13
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL,13, 2, 
'Pelampauan SN-DIKTI
(indikator kinerja
tambahan) yang
ditetapkan oleh
perguruan tinggi pada
tiap kriteria.
', '');


-- LED BAB 14
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL,14, 2, 
'Analisis keberhasilan
dan/atau
ketidakberhasilan
pencapaian kinerja yang
telah ditetapkan institusi
pada tiap kriteria yang
memenuhi 2 aspek
sebagai berikut:
<ol>
<li>capaian kinerja harus
diukur dengan metoda
yang tepat, dan hasilnya
dianalisis serta
dievaluasi, dan</li>
<li>analisis terhadap
capaian kinerja
mencakup identifikasi
akar masalah, faktor
pendukung keberhasilan
dan faktor penghambat
ketercapaian standard,
dan deskripsi singkat
tindak lanjut yang akan
dilakukan institusi.</li>
</ol>
', '');


-- LED BAB 15
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL,15, 2, 
'Efektivitas pelaksanaan
sistem penjaminan mutu
pada tiap kriteria yang
memenuhi 4 aspek
sebagai berikut: 
<ol>
<li>keberadaan dokumen
formal penetapan standar
mutu,
</li>
<li>standar mutu
dilaksanakan secara
konsisten,</li>
<li>monitoring, evaluasi
dan pengendalian
terhadap standar mutu
yang telah ditetapkan,
dan
</li>
<li>hasilnya ditindak
lanjuti untuk perbaikan
dan peningkatan mutu.
</li>
</ol>
', '');


-- LED BAB 16
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 16, 2, 
'
Tingkat kepuasan
pemangku kepentingan
internal dan eksternal
pada masing-masing
kriteria: tata pamong dan
kerjasama, mahasiswa,
sumber daya manusia,
keuangan, sarana dan
prasarana, pendidikan,
penelitian dan
pengabdian kepada
masyarakat yang
memenuhi 4 aspek
sebagai berikut:
<ol>
<li>menggunakan
instrumen kepuasan
yang sahih, andal,
mudah digunakan>
</li>
<li>dilaksanakan secara
berkala, serta datanya
terekam secara
komprehensif</li>
<li> dianalisis dengan
metode yang tepat serta
bermanfaat untuk
pengambilan keputusan,
dan
</li>
<li>tingkat kepuasan dan
umpan balik
ditindaklanjuti untuk
perbaikan dan
peningkatan mutu luaran
secara berkala dan
tersistem.</li>
</ol>'
, '');


-- LKPT Bab 17 2a
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 17, 1, 
'Rasio jumlah pendaftar
terhadap jumlah
pendaftar yang lulus
seleksi pada program
utama.
Tabel 2.a LKPT
Seleksi Mahasiswa
', 
'
<ul>
<li>Rasio = NAi / NBi </li>
<li>NAi = Jumlah calon mahasiswa yang ikut seleksi pada program utama. i = 1, 2, …, atau 7.</li>
<li>NBi = Jumlah calon mahasiswa yang lulus seleksi pada program utama. i = 1, 2, …, atau 7.</li>
</ul>
');

-- LKPT Bab 17 2a
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 17, 1, 
'Persentase jumlah
mahasiswa yang
mendaftar ulang
terhadap jumlah
pendaftar yang lulus
seleksi pada program
utama.
Tabel 2.a LKPT
Seleksi Mahasiswa
', 
'<ul>
<li>PDU = (NCi / NBi) x 100%</li>
<li>NBi = Jumlah calon mahasiswa yang lulus seleksi pada program utama. i = 1, 2, …, atau 7.</li>
<li>NCi = Jumlah calon mahasiswa baru reguler pada program utama. i = 1, 2, …, atau 7.</li>
</ul>');


-- LKPT Bab 17 2b
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 17, 1, 
' Persentase jumlah
mahasiswa asing
terhadap jumlah seluruh
mahasiswa.
Tabel 2.b LKPT
Mahasiswa Asing
', 
'<ul>
<li>PMA = (NWNA / NM) x 100%</li>
<li>NWNA = Jumlah mahasiswa asing dalam 3 tahun terakhir.</li>
<li>NM = Jumlah mahasiswa aktif dalam 3 tahun terakhir</li>
</ul>');



-- LED Bab 20
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 20, 2, 
'Ketersediaan dan mutu
layanan kemahasiswaan.
', '');

-- LKPT BAB 21 3.a.1
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 21, 1, 
'Rasio jumlah dosen tetap
yang memenuhi
persyaratan dosen
terhadap jumlah program
studi.

Tabel 3.a.1) LKPT
Kecukupan Dosen
Perguruan Tingg
', 
'<ul>
<li>Keterangan: Data dosen tetap tercantum dalam laman PD-DIKTI. </li>
<li>RDPS = NDT / NPS</li>
<li>NNDT = Jumlah dosen tetap.</li>
<li>NPS = Jumlah program studi.</li>
</ul>');


-- LKPT BAB 21 3.a.2
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 21, 1, 
'Persentase jumlah dosen
yang memiliki jabatan
fungsional minimal Lektor
Kepala terhadap jumlah
seluruh dosen tetap.

Tabel 3.a.2) LKPT
Jabatan Fungsional
Dosen
', 
'<ul>
<li>KPLKGB = (NDTLKGB / NDT) x 100%</li>
<li>NDTLKGB = Jumlah dosen tetap yang memiliki jabatan fungsional Lektor Kepala atau Guru Besar.</li>
<li>NDT = Jumlah dosen tetap.</li>
</ul>');


-- LKPT BAB 21 3.a.3
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 21, 1, 
'Persentase jumlah dosen
yang memiliki sertifikat
kompetensi, profesi,
dan/atau industri
terhadap jumlah seluruh
dosen tetap.

Tabel 3.a.3) LKPT
Sertifikasi Dosen
', 
'<ul>
<li>PDS = (NDS / NDT) x 100%</li>
<li>NDS = Jumlah dosen tetap bersertifikasi kompetensi, profesi, dan/atau industri..</li>
<li>NDT = Jumlah dosen tetap.</li>
</ul>');

-- LKPT BAB 21 3.a.4
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 21, 1, 
'Persentase jumlah dosen
tidak tetap terhadap
jumlah seluruh dosen
(dosen tetap dan dosen
tidak tetap).

Tabel 3.a.4) LKPT
Dosen Tidak Tetap
', 
'<ul>
<li>PDTT = (NDTT / (NDTT + NDT)) x 100%</li>
<li>NDTT = Jumlah dosen tidak tetap.</li>
<li>NDT = Jumlah dosen tetap.</li>
</ul>');

-- LKPT BAB 21 3.b
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 21, 1, 
'Rasio jumlah mahasiswa
terhadap jumlah dosen
tetap.

Tabel 3.b LKPT
Beban Kerja Dosen
', 
'<ul>
<li>RMDT = NM / NDT</li>
<li>NM = Jumlah mahasiswa (reguler dan transfer) pada program sarjana terapan dan/atau diploma tiga pada saat TS</li>
<li>NDT = Jumlah dosen tetap.</li>
</ul>');

-- LKPT BAB 26 3c1
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 26, 1, 
'Rata-rata
penelitian/dosen/tahun
dalam 3 tahun terakhir.

Tabel 3.c.1) LKPT
Produktivitas Penelitian
Dosen
', 
'<ul>
<li>RI = NI / 3 / NDT , RN = NN / 3 / NDT , RL = NL / 3 / NDT </li>
<li>NI= Jumlah penelitian dengan biaya luar negeri dalam 3 tahun terakhir.</li>
<li>NN = Jumlah penelitian dengan biaya dalam negeri diluar PT dalam 3 tahun terakhir.</li>
<li>NL= Jumlah penelitian dengan biaya dari PT atau mandiri dalam 3 tahun terakhir.</li>
<li>NDT = Jumlah dosen tetap.</li>
</ul>');


-- LKPT BAB 26 3c2
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 26, 1, 
' Rata-rata
PkM/dosen/tahun dalam
3 tahun terakhir.

Tabel 3.c.2) LKPT
Produktivitas PkM Dosen
', 
'<ul>
<li>RI = NI / 3 / NDT , RN = NN / 3 / NDT , RL = NL / 3 / NDT </li>
<li>NI= Jumlah pkm dengan biaya luar negeri dalam 3 tahun terakhir.</li>
<li>NN = Jumlah pkm dengan biaya dalam negeri diluar PT dalam 3 tahun terakhir.</li>
<li>NL= Jumlah pkm dengan biaya dari PT atau mandiri dalam 3 tahun terakhir.</li>
<li>NDT = Jumlah dosen tetap.</li>
</ul>');

-- LKPT BAB 28 3d
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 28, 1, 
' Rata-rata jumlah
pengakuan atas prestasi/
kinerja dosen terhadap
jumlah dosen tetap
dalam 3 tahun terakhir
',
'<ol>
Pencapaian prestasi dosen dalam bentuk seperti:
<li>menjadi visiting professor di perguruan tinggi nasional/ internasional</li>
<li>) menjadi keynote speaker /invited speaker pada pertemuan ilmiah tingkat nasional/ internasional.</li>
<li> menjadi staf ahli di lembaga tingkat nasional/ internasional.</li>
<li>menjadi editor atau mitra bestari pada jurnal nasional terakreditasi/ jurnal internasional bereputasi.</li>
<li>mendapat penghargaan atas prestasi dan kinerja di tingkat nasional/ internasional.</li>
</ol>

<ul>
<li>RRD = NRD / NDT</li>
<li>NRD = Jumlah pengakuan atas prestasi/kinerja dosen tetap dalam 3 tahun terakhir</li>
<li>NDT = Jumlah dosen tetap.</li>
</ul>
');

-- LED BAB 29
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 29, 2, 
'Kecukupan dan
kualifikasi tenaga
kependidikan
berdasarkan jenis
pekerjaannya
(pustakawan, laboran,
teknisi, dll.).
', '');


-- LKPT BAB 30 4a 1
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 30, 1, 
'Persentase perolehan
dana yang bersumber
dari mahasiswa terhadap
total perolehan dana
perguruan tinggi.

Tabel 4.a LKPT
Perolehan Dana', 
'<ul>
<li>PDM = (DM / DT) x 100%</li>
<li>DM = Jumlah dana yang bersumber dari penerimaan mahasiswa dalam 3 tahun terakhir</li>
<li>DT = Jumlah penerimaan dana perguruan tinggi dalam 3 tahun terakhir.</li>
</ul>');

-- LKPT BAB 30 4a 2
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 30, 1, 
'Persentase perolehan
dana perguruan tinggi
yang bersumber selain 
dari mahasiswa dan
kementerian/lembaga
terhadap total perolehan
dana perguruan tinggi.

Tabel 4.a LKPT
Perolehan Dana', 
'<ul>
Perolehan dana melalui:
<li>pendapatan atas kegiatan/income generating activities (jasa layanan profesi dan/atau keahlian, produk institusi, kerjasama
kelembagaan, dll.), </li>
<li> sumber lain (hibah, dana lestari dan filantropis, dll.). </li>
</ul>

<ul>
<li>PDL = (DK / DT) x 100%</li>
<li>DL= Jumlah dana yang bersumber selain dari mahasiswa dalam 3 tahun terakhir. </li>
<li>DT = Jumlah penerimaan dana perguruan tinggi dalam 3 tahun terakhir.</li>
</ul>');

-- LKPT BAB 30 4b 1
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 30, 1, 
'Rata-rata dana
operasional proses
pembelajaran/
mahasiswa/ tahun.

Tabel 4.b LKPT
Penggunaan Dana', 
'<ul>
<li>DOM = DOP / 3 / NM</li>
<li>DOP = Jumlah dana operasional penyelenggaraan pendidikan dalam 3 tahun terakhir (Satuan: juta Rupiah).</li>
<li>NM = Jumlah mahasiswa aktif pada saat TS.</li>
</ul>');

-- LKPT BAB 30 4b 2
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 30, 1, 
'Rata-rata dana
operasional proses
pembelajaran/
mahasiswa/ tahun.

Tabel 4.b LKPT
Penggunaan Dana', 
'<ul>
<li>DPD = DP / 3 / NDT</li>
<li>DDP = Jumlah dana penelitian yang diperoleh dosen tetap dalam 3 tahun terakhir (Satuan: juta Rupiah).</li>
<li>NDT = Jumlah dosen tetap.</li>
</ul>');

-- LKPT BAB 30 4b 3
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 30, 1, 
'Persentase penggunaan
dana penelitian terhadap
total dana perguruan
tinggi.

Tabel 4.b LKPT
Penggunaan Dana', 
'<ul>
<li>DPkMD = DPkM / 3 / NDT</li>
<li>DPkM = Jumlah dana PkM yang diperoleh dosen tetap dalam 3 tahun terakhir (Satuan: juta Rupiah).</li>
<li>NDT = Jumlah dosen tetap.</li>
</ul>');

-- LKPT BAB 30 4b 4
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 30, 1, 
'Persentase penggunaan
dana PkM terhadap total
dana perguruan tinggi.

Tabel 4.b LKPT
Penggunaan Dana', 
'<ul>
<li>PDP = (DP / DT) x 100%</li>
<li>DP = Jumlah dana yang digunakan perguruan tinggi untuk kegiatan penelitian dalam 3 tahun terakhir.</li>
<li>NDT = Jumlah penggunaan anggaran perguruan tinggi dalam 3 tahun terakhir.</li>
</ul>');

-- LED BAB 37
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 37, 2, 
'
<ul style="list-style-type: lower-alpha; text-transform: none;">
<li>. Kecukupan sarana
dan prasarana
terlihat dari ketersediaan,
kemutakhiran, dan
relevansi yang
mendukung
pembelajaran, penelitian,
dan PkM, sekaligus untuk
kegiatan pengembangan
dan pelayanan termasuk
teaching factory (factory
for teaching ) atau
teaching industry
(attachment ke industri).</li>

<li> Ketersediaan Sistem
TIK (Teknologi Informasi
dan Komunikasi) untuk
mengumpulkan data
yang akurat, dapat
dipertanggung jawabkan
dan terjaga
kerahasiaannya (misal:
Sistem Informasi
Manajemen Perguruan
Tinggi/ SIMPT).
</li>

<li>Ketersediaan Sistem
TIK (Teknologi Informasi
dan Komunikasi) untuk
mengelola dan
menyebarkan ilmu
pengetahuan (misal:
Sistem Informasi
Pendidikan/
Pembelajaran, Sistem
Informasi Penelitian dan
PkM, Sistem Informasi
Perpustakaan, dll.).
Skor = ((2 x A) + B + C) /
4
</li>
</ul>'
, '');

-------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------------------------
-- LED BAB 38
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 11, 2, 
'
<ul style="list-style-type: lower-alpha; text-transform: none;">

<li> Perguruan tinggi
memiliki kebijakan
pengembangan
kurikulum yang
mempertimbangkan: 

<ol>
<li>penyediaan sumber
daya manusia yang
terampil untuk
mengantisipasi
kebutuhan masa kini dan
masa depan,</li>
<li>perkembangan
industri,
</li>
<li>pengembangan
kemampuan lulusan
untuk berwirausaha, dan</li>
<li> penerapan metode
pembelajaran system
ganda (dual system ), di
industri dan di perguruan
tinggi.
</li>
</ol>

</li>

<li>Ketersediaan
pedoman
pengembangan
kurikulum.
</li>

<li>Ketersediaan
pedoman pelaksanaan
kurikulum yang
mencakup pemantauan
dan peninjauan kurikulum
yang mempertimbangkan
umpan balik dari para
pemangku kepentingan,
pencapaian isu-isu
strategis untuk menjamin
kesesuaian dan
kemutakhirannya.
Skor = (A + B + C) / 3</li>

</ul>'
, '');

-- LED BAB 39
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 39, 2, 
'
<ul style="list-style-type: lower-alpha; text-transform: none;">

<li>Ketersediaan
pedoman tentang
penerapan sistem
penugasan dosen
berdasarkan kebutuhan,
kualifikasi, keahlian dan
pengalaman. 
</li>

<li>Ketersediaan bukti
yang sahih tentang
penetapan strategi,
metode dan media
pembelajaran serta
penilaian pembelajaran.</li>

<li> Ketersediaan bukti
yang sahih tentang
implementasi sistem
memonitor dan evaluasi
pelaksanaan dan mutu
proses pembelajaran.
Skor = (A + (2 x B) + (2 x
C)) / 5
</li>


</ul>'
, '');


-- LKPT BAB 39 2c
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 39, 1, 
'Persentase jumlah kredit
mata kuliah
praktikum/praktik/ praktik
kerja lapangan (PKL)
terhadap jumlah kredit
seluruh mata kuliah.
Tabel 2.c LKPT
Bobot Kredit Mata Kuliah', 
'<ul>
<li>PKP = (NKP / NKT) x 100%</li>
<li>NKP = Jumlah kredit mata kuliah praktikum/praktik/praktik kerja lapangan selama masa program.</li>
<li>NKT = Jumlah kredit seluruh mata kuliah.</li>
</ul>');

-- LED BAB 41
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 41, 2, 
'
<ul style="list-style-type: lower-alpha; text-transform: none;">

<li> Ketersediaan
dokumen formal
kebijakan dan pedoman
untuk mengintegrasikan
kegiatan penelitian dan
PkM ke dalam
pembelajaran.
</li>

<li>Ketersediaan bukti
yang sahih tentang
pelaksanaan, evaluasi,
pengendalian, dan
peningkatan kualitas
secara berkelanjutan
integrasi kegiatan
penelitian dan PkM ke
dalam pembelajaran.</li>

<li>Ketersedian bukti yang
sahih bahwa SPMI
melakukan monitoring
dan evaluasi integrasi
penelitian dan PkM
terhadap pembelajaran.
Skor = (A + (2 x B) + (4 x
C)) / 7
</li>

</ul>'
, '');

-- LED BAB 42
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 42, 2, 
'
<ul style="list-style-type: lower-alpha; text-transform: none;">

<li>Ketersediaan
dokumen formal
kebijakan suasana
akademik yang
mencakup: otonomi
keilmuan, kebebasan
akademik, dan
kebebasan mimbar
akademik.</li>

<li>Ketersediaan bukti
yang sahih tentang
terbangunnya suasana
akademik yang kondusif
yang dapat berupa:
<ol>
<li>Keterlaksanaan
interaksi akademik antar
sivitas akademika dalam
kegiatan pendidikan,
penelitian dan PkM baik
pada skala
lokal/nasional/
internasional.
</li>
<li>
Keterlaksanaan
program/kegiatan non
akademik yang
melibatkan seluruh warga
kampus yang didukung
oleh ketersediaan
sarana, prasarana, dan
dana yang memadai.
</li>
</ol>

</li>

<li>
Ketersediaan bukti
yang sahih tentang
langkah-langkah strategis
yang dilakukan untuk
meningkatkan suasana
akademik.
Skor = (A + (2 x B) + (2 x
C)) / 5
</li>


</ul>'
, '');


-- LED BAB 43
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 43, 2, 
'
<ul style="list-style-type: lower-alpha; text-transform: none;">

<li> Ketersediaan
dokumen formal
Rencana Strategis
Penelitian yang memuat
landasan
pengembangan, peta
jalan penelitian, sumber
daya, sasaran program
strategis dan indikator
kinerja</li>

<li>Ketersediaan
pedoman penelitian dan
bukti sosialisasinya.</li>

<li>Bukti yang sahih
tentang pelaksanaan
proses penelitian
mencakup 6 aspek
sebagai berikut:
<ol>
<li> tatacara penilaian dan
review,</li>
<li> legalitas
pengangkatan reviewer,</li>
<li> hasil penilaian usul
penelitian,</li>
<li> legalitas penugasan
peneliti/kerjasama
peneliti,</li>
<li> berita acara hasil
monitoring dan evaluasi,
serta </li>
<li> dokumentasi output
penelitian. </li>
</ol>
</li>

<li>Dokumen pelaporan
penelitian oleh pengelola
penelitian kepada
pimpinan perguruan
tinggi dan mitra/pemberi
dana, memenuhi aspekaspek berikut:
<ol>
<li> komprehensif, </li>
<li> rinci, </li>
<li> relevan, </li>
<li> mutakhir, dan </li>
<li> disampaikan tepat <li>
waktu.
</ol>
Skor = (A + (2 x B) + (4 x
C) + D) / 8
</li>

</ul>'
, '');


-- LED BAB 44
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 44, 2, 
'
<ul style="list-style-type: lower-alpha; text-transform: none;">

<li>Ketersediaan
dokumen formal
Rencana Strategis PkM
yang memuat landasan
pengembangan, peta
jalan PkM, sumber daya,
sasaran program
strategis dan indikator
kinerja. 
</li>

<li>Ketersediaan
pedoman PkM dan bukti
sosialisasinya. </li>

<li>. Bukti yang sahih
tentang pelaksanaan
proses PkM mencakup 6
aspek sebagai berikut:
<ol>
<li>tatacara penilaian dan
review,
</li>
<li>legalitas
pengangkatan reviewer,</li>
<li>hasil penilaian usul
PkM,
</li>
<li> legalitas penugasan
pelaksana PkM/kerjasama PkM,</li>
<li> berita acara hasil
monitoring dan evaluasi,
serta
</li>
<li>dokumentasi output
PkM.</li>
</ol>

</li>

<li>Dokumentasi
pelaporan PkM oleh
pengelola PkM kepada
pimpinan perguruan
tinggi dan mitra/pemberi
dana yang memenuhi 5
aspek sebagai berikut: 
<ol>
<li>komprehensif</li>
<li>rinci</li>
<li> relevan,</li>
<li>mutakhir, dan </li>
<li>disampaikan tepatwaktu</li>
</ol>
Skor = (A + (2 x B) + (4 x
C) + D) / 8
</li>

</ul>'
, '');

-- LED BAB 45
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 45, 2, 
'Keberadaan kelompok
pelaksana PkM.
', '');

----------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------

-- LKPT BAB 46 5a1
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
'Rata-rata IPK mahasiswa
dalam 3 tahun terakhir.
Tabel 5.a.1) LKPT
Capaian Pembelajaran', 
'<ul>
<li>Skor akhir dihitung berdasarkan perhitungan rata-rata terbobot terhadap jumlah program studi pada setiap program pendidikan.</li>
<li>Skor akhir = S(Skorix NPi) / SNPi</li>
<li>NPi = jumlah program studi pada program pendidikan ke-I , i = 1, 2, ..., 7</li>
</ul>');

-- LKPT BAB 46 5a2
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
' Persentase lulusan yang
memiliki sertifikasi
kompetensi/profesi/
industri dalam 3 tahun
terakhir.
Tabel 5.a.2) LKPT
Sertifikat Kompetensi/
Profesi/ Industri', 
'<ul>
<li>PLS = (NLS / NL) x 100%</li>
<li>NLS = Jumlah lulusan yang memiliki sertikat kompetensi, profesi, dan/atau industri dalam 3 tahun terakhir.</li>
<li>NL= Jumlah lulusan dalam 3 tahun terakhir</li>
</ul>');

-- LKPT BAB 46 5b1
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
'Jumlah prestasi
akademik mahasiswa di
tingkat provinsi/wilayah,
nasional, dan/atau
internasional terhadap
jumlah mahasiswa dalam
5 tahun terakhir (TS-2
s.d. TS).
Tabel 5.b.1) LKPT
Prestasi Akademik
Mahasiswa
', 
'<ul>
<li>RI = NI / NM , RN = NN / NM , RL = NL / NM</li>
<li>NI= Jumlah prestasi akademik internasional.</li>
<li>NN = Jumlah prestasi akademik nasional.</li>
<li>NL = Jumlah prestasi akademik wilayah/lokal.</li>
<li>NM = Jumlah mahasiswa aktif pada saat TS.</li>
</ul>');

-- LKPT BAB 46 5b2
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
'Jumlah prestasi nonakademik mahasiswa di
tingkat provinsi/wilayah,
nasional, dan/atau
internasional terhadap
jumlah mahasiswa dalam
5 tahun terakhir (TS-2
s.d. TS).

Tabel 5.b.2) LKPT
Prestasi Non-akademik
Mahasiswa
', 
'<ul>
<li>RI = NI / NM , RN = NN / NM , RL = NL / NM</li>
<li>NI= Jumlah prestasi non-akademik internasional.</li>
<li>NN = Jumlah prestasi non-akademik nasional.</li>
<li>NL = Jumlah prestasi non-akademik wilayah/lokal.</li>
<li>NM = Jumlah mahasiswa aktif pada saat TS.</li>
</ul>');


-- LKPT BAB 46 5c1
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
'Lama studi mahasiswa
untuk setiap program
dalam 3 tahun terakhir.

Tabel 5.c.1) LKPT
Lama Studi Mahasiswa
', 
'<ul>
<li>Skor akhir dihitung berdasarkan perhitungan rata-rata terbobot terhadap banyaknya program studi pada setiap program pendidikan.</li>
<li>Skor akhir = S(Skori x NPi) / SNPi</li>
<li>NPi = banyaknya program studi pada program pendidikan ke-i , i = 1, 2, ..., 7</li>
</ul>');

-- LKPT BAB 46 5c2 1
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
'Persentase kelulusan
tepat waktu untuk setiap
program.

Tabel 5.c.2) LKPT
', 
'<ul>
Persentase untuk program pendidikan ke-i dihitung dengan rumus sebagai berikut:
<li>PTWi = (fi/ di) x 100% </li>
<li>fi= Jumlah mahasiswa yang lulus tepat waktu pada program pendidikan ke-i.</li>
<li>di= Jumlah mahasiswa yang diterima pada angkatan tersebut pada program pendidikan ke-i. </li>
</ul>

<ul>
Skor akhir dihitung berdasarkan perhitungan rata-rata terbobot terhadap jumlah program studi pada setiap program pendidikan.
<li>Skor akhir = S(Skori x NPi) / SNP</li>
<li>NPi= banyaknya program studi pada program pendidikan ke-i , i = 1, 2, ..., 7</li>
</ul>

');

-- LKPT BAB 46 5c2 2
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
'Persentase keberhasilan
studi untuk setiap
program.

Tabel 5.c.2) LKPT
', 
'<ul>
Persentase untuk program pendidikan ke-i dihitung dengan rumus sebagai berikut:
<li>PPSi = (ci / ai) x 100% </li>
<li>ci= Jumlah mahasiswa yang lulus sampai dengan batas masa studi pada program pendidikan ke-i</li>
<li>ai= Jumlah mahasiswa yang diterima pada angkatan tersebut pada program pendidikan ke-i.</li>
</ul>

<ul>
Skor akhir dihitung berdasarkan perhitungan rata-rata terbobot terhadap jumlah program studi pada setiap program pendidikan.
<li>Skor akhir = S(Skori x NPi) / SNPi </li>
<li>NPi = Jumlah program studi pada program ke-i , i = 1, 2, ..., 7</li>
</ul>
');

-- LKPT BAB 46 5d1
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
'Lama waktu tunggu
lulusan program utama di
perguruan tinggi untuk
mendapatkan pekerjaan
pertama.

Tabel 5.d.1) LKPT
Waktu Tunggu Lulusan
', 
'<ul>
<li>NL = NL4 + NL3 + NL2, NJ = NJ4 + NJ3 + NJ2</li>
<li>PJ = (NJ / NL) x 100%</li>
<li>WT = rata-rata waktu tunggu lulusan = (WT4 + WT3 + WT ) / 3</li>
</ul>

<ul>
Ketentuan persentase responden lulusan:
<li>untuk perguruan tinggi dengan jumlah lulusan program utama dalam 3 tahun paling sedikit 5000 orang, maka Prmin = 10%.</li>
<li>untuk perguruan tinggi dengan jumlah lulusan program utama dalam 3 tahun kurang dari 5000 orang, maka Prmin = 20% - (10% / 5000) x NL.</li>
<li>Jika persentase responden memenuhi ketentuan diatas, maka Skor akhir = Skor.</li>
<li>Jika persentase responden tidak memenuhi ketentuan diatas, maka berlaku penyesuaian sebagai berikut: </li>
<li>Skor akhir = (PJ / Prmin) x Skor.</li>
</ul>
');


-- LKPT BAB 46 5d2
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
'Kesesuaian bidang kerja
lulusan dari program
utama di perguruan tinggi
terhadap kompetensi
bidang studi.

Tabel 5.d.2) LKPT
Kesesuaian Bidang Kerja
Lulusan
', 
'<ul>
<li>NL = NL4 + NL3 + NL2, NJ = NJ4 + NJ3 + NJ2</li>
<li>PJ = (NJ / NL) x 100%</li>
<li>PBS = Rata-rata persentase kesesuaian bidang kerja lulusan = (KB4 + KB3 + KB2 ) / 3</li>
</ul>

<ul>
Ketentuan persentase responden lulusan:
<li>untuk perguruan tinggi dengan jumlah lulusan program utama dalam 3 tahun paling sedikit 5000 orang, maka Prmin = 10%.</li>
<li>untuk perguruan tinggi dengan jumlah lulusan program utama dalam 3 tahun kurang dari 5000 orang, maka Prmin = 20% - (10% / 5000) x NL.</li>
<li>Jika persentase responden memenuhi ketentuan diatas, maka Skor akhir = Skor.</li>
<li>Jika persentase responden tidak memenuhi ketentuan diatas, maka berlaku penyesuaian sebagai berikut: </li>
<li>Skor akhir = (PJ / Prmin) x Skor.</li>
</ul>');


-- LKPT BAB 46 5e1
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
'Tingkat kepuasan
pengguna lulusan dinilai
terhadap aspek:
<ol>
<li> Etika, 
</li>
<li>Keahlian pada bidang
ilmu (kompetensi utama),</li>
<li>: Kemampuan
berbahasa asing,
</li>
<li>Penggunaan teknologi
informas</li>
<li>: Kemampuan
berkomunikasi,</li>
<li>Kerjasama tim,
</li>
<li>Pengembangan diri</li>
</ol>

Tabel 5.e.1) LKPT
Kepuasan Pengguna
Lulusan
', 
'<ul>
Tingkat kepuasan aspek ke-i dihitung dengan rumus sebagai berikut:
<li>TKi = (4 x ai) + (3 x bi) + (2 x ci) + di i = 1, 2, ..., 7 </li>
<li>ai = persentase “sangat baik”.</li>
<li>bi= persentase “baik”.</li>
<li>ci = persentase “cukup”. </li>
<li>di = persentase “kurang”. </li>
</ul>

<ul>
<li>NL = NL1 + NL2 + NL3 , NJ = NJ1 + NJ2 + NJ</li>
<li>PJ = (NJ / NL) x 100%</li>
<li>PBS = Rata-rata persentase kesesuaian bidang kerja lulusan = (KB1 + KB2 + KB3 ) / 3</li>
</ul>

<ul>
Jumlah tanggapan pengguna lulusan yang memberikan jawaban paling sedikit:
<li> 10% untuk perguruan tinggi dengan jumlah lulusan tiap tahun paling sedikit 5000 orang.</li>
<li>20% untuk perguruan tinggi dengan jumlah lulusan tiap tahun kurang dari 5000 orang.</li>
</ul>

<ul>
Jika jumlah tanggapan pengguna lulusan yang memberikan jawaban memenuhi ketentuan diatas, maka Skor akhir = Skor
<li> Jika jumlah tanggapan pengguna lulusan yang memberikan jawaban tidak memenuhi ketentuan diatas, maka berlaku perhitungan
Skor akhir sebagai berikut:</li>
<li>untuk perguruan tinggi dengan jumlah lulusan tiap tahun paling sedikit 5000 orang, maka Skor akhir = (PJ / 10%) x Skor</li>
<li> untuk perguruan tinggi dengan jumlah lulusan tiap tahun kurang dari 5000 orang, maka Skor akhir = (PJ / 20%) x Skor.</li>
</ul>

');


-- LKPT BAB 46 5e2
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 46, 1, 
'Tingkat dan ukuran
tempat kerja lulusan.
Tabel 5.e.2) LKPT
Tempat Kerja Lulusan
', '');


-- LKPT BAB 57 5f
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 57, 1, 
'Jumlah publikasi di jurnal
dalam 3 tahun terakhir.
Tabel 5.f LKPT
Publikasi Ilmiah
', '');

-- LKPT BAB 57 5f
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 57, 1, 
'Jumlah publikasi di
seminar/ tulisan di media
massa dalam 3 tahun
terakhir.
Tabel 5.f LKPT
Publikasi Ilmiah
', '');

-- LKPT BAB 57 5g
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 57, 1, 
'Rasio jumlah produk/jasa
yang diadopsi oleh
industri/masyarakat
terhadap jumlah dosen
tetap dalam 3 tahun
terakhir.

Tabel 5.g LKPT
Produk/jasa yang
Diadopsi oleh
Industri/Masyarakat.
', '');


-- LKPT BAB 57 5h
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 57, 1, 
'Jumlah luaran penelitian
dan PkM dosen tetap
dalam 3 tahun terakhir.

Tabel 5.h LKPT
Luaran Lainnya
', '');

-- LED BAB 61 
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 61, 2, 
'Keserbacakupan
(kelengkapan, keluasan,
dan kedalaman),
ketepatan, ketajaman
ketepatan, ketajaman,
dan kesesuaian analisis
capaian kinerja serta
konsistensi dengan
setiap kriteria.
', '');


-- LED BAB 62
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 62, 2, 
'Ketepatan analisis
SWOT atau analisis yang
relevan didalam
mengembangkan strategi
institusi.
', '');


-- LED BAB 63
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 63, 2, 
'Ketepatan di dalam
menetapkan prioritas
program pengembangan
', '');

-- LED BAB 64
INSERT INTO ELEMEN_INDIKATOR VALUES (ELEMEN_SEQ.NEXTVAL, 64, 2, 
'Perguruan tinggi memiliki
kebijakan, ketersediaan
sumberdaya,
kemampuan
melaksanakan, dan
kerealistikan program.
', '');









