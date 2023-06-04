/* 
Tabel 2.b Jumlah Mahasiswa Aktif dalam 3 tahun terakhir
NOTES :  
TS-2(2018) 
TS-1(2019) 
TS(2020) 
*/ 
SELECT PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM||' ' ||JURUSAN.JURUSAN AS "Program Studi", 
       COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2018 THEN MAHASISWA.NRP END) AS "TS-2(2018)",  
       COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2019 THEN MAHASISWA.NRP END) AS "TS-1(2019)",  
       COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2020 THEN MAHASISWA.NRP END) AS "TS(2020)" 
FROM PROGRAM_STUDI 
INNER JOIN PROGRAM ON PROGRAM_STUDI.PROGRAM=PROGRAM.NOMOR
INNER JOIN JURUSAN ON PROGRAM_STUDI.JURUSAN=JURUSAN.NOMOR
INNER JOIN KELAS ON PROGRAM.NOMOR=KELAS.PROGRAM AND KELAS.JURUSAN=JURUSAN.NOMOR
INNER JOIN MAHASISWA ON KELAS.NOMOR=MAHASISWA.KELAS
INNER JOIN STATUS ON MAHASISWA.STATUS=STATUS.KODE     
WHERE STATUS.KODE='E' /*KODE A = "Mahasiswa Luar Negeri"*/  
      GROUP BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM, JURUSAN.JURUSAN, PROGRAM_STUDI.GELAR 
ORDER BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM;  


/* 
Tabel 2.b Jumlah Mahasiswa Aktif dalam 3 tahun terakhir
NOTES :  
TS-2(2018) 
TS-1(2019) 
TS(2020) 
*/ 
SELECT PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM||' ' ||JURUSAN.JURUSAN AS "Program Studi", 
       COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2018 THEN MAHASISWA.NRP END) AS "TS-2(2018)",  
       COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2019 THEN MAHASISWA.NRP END) AS "TS-1(2019)",  
       COUNT(DISTINCT CASE WHEN MAHASISWA.ANGKATAN=2020 THEN MAHASISWA.NRP END) AS "TS(2020)" 
FROM PROGRAM_STUDI 
INNER JOIN PROGRAM ON PROGRAM_STUDI.PROGRAM=PROGRAM.NOMOR
INNER JOIN JURUSAN ON PROGRAM_STUDI.JURUSAN=JURUSAN.NOMOR
INNER JOIN KELAS ON PROGRAM.NOMOR=KELAS.PROGRAM AND KELAS.JURUSAN=JURUSAN.NOMOR
INNER JOIN MAHASISWA ON KELAS.NOMOR=MAHASISWA.KELAS
INNER JOIN STATUS ON MAHASISWA.STATUS=STATUS.KODE     
WHERE STATUS.KODE='A' /*KODE A = "Mahasiswa Luar Negeri"*/  
      GROUP BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM, JURUSAN.JURUSAN, PROGRAM_STUDI.GELAR 
ORDER BY PROGRAM_STUDI.NOMOR, PROGRAM.PROGRAM;  


