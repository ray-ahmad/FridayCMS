# FridayCMS

FridayCMS adalah sebuah CMS sederhana yang dibuat dengan framework PHP Codeigniter 3. CMS ini sebenernya adalah hasil belajar saya sekitar tahun 2016-2017 dan terbengkalai sampai sekarang XD Mungkin bakal dirampungin kalau ada waktu.

## Cara Instalasi
1. Buat database baru (dengan phpmyadmin atau yang lainnya)
2. Import file mpc_db.sql ke database yang sebelumnya dibuat
3. Buka file **play-config/database.php** dengan text editor kemudian ubah *value* konstanta berikut:
    - Ubah *value* konstanta `DB_HOSTNAME` pada baris ke 17 dengan hostname database mu (biasanya isi dengan "localhost" jika menggunakan XAMPP, Laragon, atau local server lainnya)
    ```
        defined("DB_HOSTNAME") OR define("DB_HOSTNAME", "(isi hostname di sini)");
    ```
    - Ubah *value* konstanta `DB_USERNAME` pada baris ke 20 dengan username database mu (biassanya isi dengan "root" jika menggunakan XAMPP, Laragon, atau local server lainnya)
    ```
        defined("DB_USERNAME") OR define("DB_USERNAME", "(isi username di sini)");
    ```
    - Ubah *value* konstanta `DB_PASSWORD` pada baris ke 23 dengan password database mu (biassanya dikosongkan jika menggunakan XAMPP, Laragon, atau local server lainnya)
    ```
        defined("DB_PASSWORD") OR define("DB_PASSWORD", "(isi password di sini)";
    ```
    - Ubah *value* konstanta `DB_NAME` pada baris ke 26 dengan nama database yang sebelumnya telah dibuat
    ```
        defined("DB_NAME") OR define("DB_NAME", "(isi nama database di sini)");
    ```
4. Masih di folder yang sama, buka file **config.php** dengan text editor kemudian ubah *value* konstanta berikut:
    - Ubah *value* konstanta `BASE_URL` pada baris ke 49 dengan alamat domain beserta nama folder (jika FridayCMS diletakkan dalam folder) dan akhiran "/" (slash) (Ex: "http(s)://namadomain.test/(nama folder beserta akhiran slash)" )
    ```
    defined("BASE_URL") OR define("BASE_URL", "(isi base url di sini)");
    ```
    - Pada konstanta baris ke 106 dan 113, ubah "/playcms_ci/" dengan nama folder tempat diletakkannya FridayCMS, atau isi dengan slash saja jika tidak diletakkan dalam folder

    Contoh:
    Jika FridayCMS diletakkan dalam folder:
    ```
	defined("UPLOAD_DIR_FILEMANAGER") OR define("UPLOAD_DIR_FILEMANAGER", "/(nama folder di sini)/". ASSETS_FOLDER . "/" . FILE_FOLDER . "/");
    ```
    ```
	defined("IMG_DIR_FILEMANAGER") OR define("IMG_DIR_FILEMANAGER", "/(nama folder di sini)/" . ASSETS_FOLDER . "/" . IMG_FOLDER . "/");
    ```
    Jika FridayCMS tidak diletakkan dalam folder:
    ```
	defined("UPLOAD_DIR_FILEMANAGER") OR define("UPLOAD_DIR_FILEMANAGER", "/". ASSETS_FOLDER . "/" . FILE_FOLDER . "/");
    ```
    ```
	defined("IMG_DIR_FILEMANAGER") OR define("IMG_DIR_FILEMANAGER", "/" . ASSETS_FOLDER . "/" . IMG_FOLDER . "/");
    ```
5. Jika kamu bisa membuka `BASE_URL` di browser, maka instalasi telah berhasil.<hr>


**Alamat dashboard admin:** `BASE_URL/play-admin`


**Akun Super Administrator default**

Username: superadmin

Password: superadmin

## FAQ
Q: Kenapa masih pake CodeIgniter? Versi 3 lagi ini

A: Karena sekitar tahun 2016 dulu emang masih zamannya pake CI, dan saat itu versi 4 masih belum rilis. Tapi ini udah pake versi 3 yang terakhir kok

Q: Ada rencana pindah ke CI 4?

A: Enggak sih, karena Laravel lebih menarik xixixi

Q: Kalo rencana pindah ke Laravel?

A: Ada, lumayan bisa jadi sarana saya belajar Laravel. Tapi bakal dirombak besar-besaran sih semuanya.

## Fitur yang akan kamu dapatkan
- Post
- Post Category
- Post Tag
- Page
- File Manager
- User
- Settings

## Fitur yang belum ada/belum lengkap
- Modules
- User Roles
- User Privileges
- Themes
- Post Comments (belum diimplementasikan di front end)
