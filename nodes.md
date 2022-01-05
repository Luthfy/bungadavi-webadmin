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
-> Message From Message To Order

-> User Team Group Membatasi Menu
-> User Team List Permission 
-> User Log (done)

-> Order List
-> Ajax ZIPCODE

-> QTY Stock pada Modal Product
-> Description Product pada Modal Product

-> restrict [button accept]
-> Real time order Done [Ready To Pickup]
-> ON PROGRESS KURIR BISA DI ASSIGNED KURIR

-> ACCEPT -> ON PROGRESS DATA TAMPIL COURIER ASSIGN
