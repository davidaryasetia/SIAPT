<?php


// Fungsi Yang Dilakukan jika $_SESSION['USER_ROLE'] === 'Tim PJM'
function tambah_pengguna(){
    if (isset($_SESSION['USER_ROLE']) && $_SESSION['USER_ROLE'] === 'Tim PJM'){
        echo '<a href="../Form_Data/Tambah_Data/tambah_user.php"
        class="btn btn-sm btn-outline-dark" type="button">
        <i class="fa-solid fa-user-plus mr-2"></i>Tambah Anggota
         </a>';
    } 
}

// Edit Daftar tabel lkpt
function edit_lkpt(){
    if (isset($_SESSION['USER_ROLE']) && $_SESSION['USER_ROLE'] === 'Tim PJM'){
        echo '<td>';
        echo '<a href="https://project.mis.pens.ac.id/mis143/Form_Data/Edit_Data/daftar_tabel.php?no=' . $row['NO'] . '" class="btn-icon">';
        echo '<i class="fa-solid fa-pencil"></i>';
        echo '</a>';
        echo '</td>';;
    }
}
?>