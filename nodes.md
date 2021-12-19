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

