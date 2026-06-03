saya ingin membuat sebuah aplikasi single page app bernama TaskFlow
App ini dibuat menggunakan tailwindjs, Alpine JS dan PHP biasa sbg backend. database nya mysql.

tampilan app ini dibuat seperti google keep.

di aplikasi ini, user bisa login dan logout dgn user dan passwd biasa.

di aplikasi ini user bisa membuat satu task. task ini bisa juga di delete oleh user.

tiap task ini ada state nya, ada Todo, doing, delegate, done. 

state ini dipilih dgn menekan button masing masing. lokasi button ini sesuai referensi yg ada di direktori ini.

text yg ditulis dalam tiap task ini, 
- bisa ditulis sebagai text biasa, yg bisa di bold, italic,underline
- bisa ditulis sebagai cek list, ada kotak kecil di paling kiri text
- kalau kotak ini di centang, tulisan di belakangnya berubah menjadi striketrough (dicoret)
- text biasa bisa diubah menjadi ceklist dgn diselect dan ditekan tombol

untuk tiap task ini, kita bisa (tapi tidak wajib) memasukkan siapa saja yg terlibat, dgn membaca contact dari hp, dan dipilih
jadi ada nama dan no HP org yg terlibat yg disimpan di tiap task

ketika task ini state nya berubah menjadi delegate, ada button yg menunjukkan nama org yg di delegasikan tsb

lokasi button ini di bawah text task tsb

button ini bisa di klik dan lgsg mengirimkan WA berisi task ini ke nomor WA yg bersangkutan

ketika task masuk state done, muncul popup "hapus task ?" . kalau dia jawab iya, maka task ini dihapus

ditampilan depan task bisa dilihat, task mana saja yg Todo, doing, deletage, atau done

tampilan aplikasi ini buat semirip mungkin dgn google keep

