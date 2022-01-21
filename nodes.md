## STRUKTUR USER PADA APLIKASI

TABLE USER 
- UNTUK ADMIN DAN STAFF BUNGADAVI (Data Login dan lain-lain ada pada table user)

Table AFFILIATE ADMIN
- UNTUK ADMIN DAN STAFF AFFILIATE (Data Login dan lain-lain ada pada table AFFILIATE ADMIN)

Table CORPORATE ADMIN
- UNTUK ADMIN CORPORATE DAN PIC (Data Login dan Lain-Lain ada pada table CORPORATE ADMIN)

## STRUKTUR ROUTE
LOGIN ROUTE
- domain / login / admin -> untuk login ADMIN DAN STAFF BUNGA DAVI
- domain / login / corporate -> untuk login ADMIN CORPORATE
- domain / login / affiliate -> untuk login ADMIN DAN STAFF AFFILIATE

DASHBOARD ROUTE
- domain / {guard} / dashboard -> GUARD adalah ROLE USER

## ROLE USER
- admin -> admin dan staff bunga davi
- corporate -> admin corporate
- affiliate -> admin dan staff affiliate

Cancel Order -> on delivery Order
- New Order
- Proses Order
- On Delivery Order
- Return / Re Delivery Order

Realtime Order
- Group Berdasarkan Jenis Product
- Bisa di expand seperti accordion
- Group Berdasarkan ID Product 
- ADA COUNTER
- PRICE PRODUCT DATA TABLE - SELLING \n COST

PRODUCT DATATABLE
Action
Image
productCode | productName | Type
sellingPrice | cost Price
status

-> NEW ORDER
-> TAKE FLORIST
-> REJECT FLORIST
-> ACCEPT FLORIST
-> ON PROGRESS
-> READY TO PICKUP
-> HAS BEEN ASSIGNED TO COURIER
-> HAS BEEN PICKUP
-> REJECTED BY COURIER
-> ON DELIVERY
-> RETURN TO WAREHOUSE
-> RECEIVED BY CUSTOMER

0 = cart
1 = checkout -> NEW ORDER
2 = paid -> upload bukti pembayaran manual upload
3 = unpaid
4 = cancel order by customer
5 = cancel order by bungadavi
6 = cancel order by payment gateway
7 = order forward to gudang -> ON PROGRESS
8 = product ready from gudang to pickup -> notifikasi kirim kurir -> READY TO PICKUP
9 = accept by courier -> HAS BEEN PICKUP
10 = sudah di pickup courier (include foto dan sudah di pickup) -> api laravel
11 = dalam perjalanan -> ON DELIVERY
12 = sudah sampai di customer (include foto) -> api laravel
13 = pengiriman kembali ke gudang
14 = reject kurir

-> api gambar product dan main gambar! (cancel)
-> Laravel ngirim FCM ke firebase

-> Order PIC Tidak tampil ajax (done)
-> Tombol Order disable sampai proses selesai (done)
-> Delivery Remark auto fill dari radio button (done)
-> Message From Message To Order (testing)

-> User Team Group Membatasi Menu (done)
-> User Team List Permission 
-> User Log (done)

-> Order List (done)
-> Ajax ZIPCODE

-> QTY Stock pada Modal Product
-> Description Product pada Modal Product

-> restrict [button accept] (done)
-> Real time order Done [Ready To Pickup] (done)
-> ON PROCESS KURIR BISA DI ASSIGNED KURIR

-> ACCEPT -> ON PROGRESS DATA TAMPIL COURIER ASSIGN

-> Status -> button Assign lebih Recognize
-> Status Reject Accept Affiliate belum bisa

-> PIC NAME DIBAWAH CLIENT NAME GABUNG CLIENT NAME () atau PIC DULU ATAU NAMA PERUSAHAAN DIBAWAHNYA
-> JIKA PIC NAME NYA TIDAK ADA KOSONG SAJA

-> SENDER PHONE MASUK DIBAWAH SENDER NAME DAN HEADER GANTI JADI SENDER INFO
-> RECIPIENT INFO NAME DAN MOBILE


09-01-2022
-> DISKON PER PRODUCT -> TIDAK TERKAIT VOUCHER / KHUSUS

-> REALTIME ORDER TOMORROW berdasarkan delivery date -> timeslot -> alphabet name product
-> Today 1 timeslot 1 card group dan accordion berdasarkan group timeslot 
-> product description hanya text paragraph
-> Jika stock kosong warna Merah dan ada tanda (-)
-> QTY pada Realtime Order penulisannya 2 x 2

-> Case Studi : 
    - Accordion ada tombol button DONE untuk menyelesaikan semua product order jika semuanya sudah selesai
    - Jika belum selesai dan sudah masuk delivery time TODAY maka akan group pada accordion TODAY

-> group sales -> cost price, selling price, custom stock di hidden

-> Custom Product bisa ditambah dari bahan baku diluar dari Product Bahan Baku dan Selling Price bisa diinput (group sales)


// 15 Januari 2022
-> Button Delivered untuk Flaging Finish All Process Order 

-> Cancel Order langsung Tampil Button Reassign Order
-> TIMESLOT RESTRICT BASE TIME DAN EDIT TIMESLOT DATA MISSING
-> CITY AVALABLE BASED ON PROVINCE

// 21 Januari 2022
ERP
- Pelaporan dalam bentuk Rupiah akan tetapi tetap ditulis mata uang aslinya dan harga dari mata uang tersebut

- Deskripsi tambah field pada product
