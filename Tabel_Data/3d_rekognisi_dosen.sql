-- 3.D Query Rekognisi Dosen
CREATE TABLE REKOGNISI_DOSEN(
NO NUMBER, 
NAMA VARCHAR(128), 
BIDANG_KEAHLIAN VARCHAR(128), 
REKOGNISI VARCHAR(4000), 
TINGKAT VARCHAR(64), 
TAHUN NUMBER(4), 
CONSTRAINT PK_REKOGNISI_DOSEN PRIMARY KEY(NO)
);

CREATE SEQUENCE REKOGNISI_SEQ
    START WITH 1
    INCREMENT BY 1
    NOMAXVALUE
    NOCYCLE
    CACHE 20;

INSERT INTO REKOGNISI_DOSEN VALUES(REKOGNISI_SEQ.NEXTVAL, 'Agus Indra Gunawan','Measurement Engineering,Ultrasonic','Narasumber Seminar Nasional Smart City dengan tema "Inovasi Teknologi Informasi dan Robotika Menuju Smart City untuk Menghadapi MEA (Masyarakat Ekonomi ASEAN)", Univ Nusantara PGRI Kediri', 'Nasional', 2016);
INSERT INTO REKOGNISI_DOSEN VALUES(REKOGNISI_SEQ.NEXTVAL, 'Agus Indra Gunawan','Measurement Engineering,Ultrasonic','Reviewer Konferensi Internasional: International Seminar on Intelligent Technology and Its Application (ISITIA)', 'Internasional', 2016);
INSERT INTO REKOGNISI_DOSEN VALUES(REKOGNISI_SEQ.NEXTVAL, 'Aliridho Barakbah','Intelligent Computing,Knowledge Engineering', 'Reviewer Jurnal Emitter International Journal of Engineering Technology, terakreditasi nasional oleh Dikti serta terindeks SINTA, DOAJ, dan Clarivate Analytics', 'Internasional', 2016);