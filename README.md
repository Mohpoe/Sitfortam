# Daftar Isi
- [Deskripsi](#deskripsi)
- [Keterangan Migration](#keterangan-migration)
- [Jenis User](#jenis-user)
- [Rencana Work Flow](#rencana-work-flow)
- [Kemampuan User](#kemampuan-user)

# Deskripsi[^](#daftar-isi)
 Aplikasi Web SitForTam (Sistem Informasi Tamu) - Kantor Gubernur Sulawesi Selatan. _Deskripsi tentang aplikasi ini masih perlu ditambahkan di sini._

# Keterangan Migration[^](#daftar-isi)
Beberapa keterangan tabel ada di migration

# Jenis User[^](#daftar-isi)
Ada beberapa jenis akun yang bisa login, lebih teknisnya bisa lihat di migration, secara umum:
1. **Admin** (users management) bertugas mengatur users
2. **Pejabat** secara teknis mungkin nantinya akan dipakai oleh staff nya untuk mengubah status dari pejabat yang bersangkutan *(ada | sibuk | tidak ada)*
3. **Piket** petugas piket yang bertugas untuk memasukkan data-data/informasi tentang tamu yang sedang berkunjung
4. **Dev** *most powerful user*

# Rencana Work Flow[^](#daftar-isi)
- Jadi, ketika petugas piket _login_, maka akan muncul daftar nama pejabat/pegawai beserta statusnya masing-masing, untuk saat ini yaitu _ada, sibuk, tidak ada_. Kemudian jika ada tamu yang berkunjung, petugas piket memasukkan data-data tamu tersebut sesuai data yang diminta pada tabel database di file migration untuk tamu.
- Ketika tamu mulai mengunjungi salah satu pejabat, harus ada user yang mengubah status pejabat tersebut jadi _sibuk_, dalam hal ini idealnya adalah staf pejabat tersebut, namun jika teknisnya nanti tidak berjalan sebagaimana harusnya, mungkin akan diperbarui dengan seluruh informasi dikelola oleh petugas piket.
- _Untuk saat ini_, mungkin begitulah seterusnya.

# Kemampuan User[^](#daftar-isi)
- `0` = Dev
- `1` = Admin
- `2` = Pejabat
- `3` = Piket

Kemampuan | User
--- | ---
Lihat Buku Tamu | `0,1,2,3`
Tambah Tamu | `0,3`
Lihat Users | `0,1`
Tambah User | `0,1`
Edit user | `0,1`
Ubah Status Keberadaan | `0,1,2`
Cetak Detail Tamu | `0,3`
