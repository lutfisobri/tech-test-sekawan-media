# Kateru Riyu - Sekawan Media

Technical Test Backend Developer

## Getting Started

Sebuah perusahaan tambang nikel berlokasi di beberapa daerah (region), satu kantor
pusat, satu kantor cabang dan memiliki enam tambang dengan lokasi yang berbeda. Perusahaan
tersebut mempunyai banyak kendaraan dengan jenis kendaraan angkutan orang dan angkutan
barang. Selain kendaraan milik perusahaan, ada juga kendaraan yang disewa dari perusahaan
persewaan.

Perusahaan tersebut membutuhkan sebuah aplikasi untuk dapat memonitoring
kendaraan yang dimiliki. Mulai dari konsumsi BBM, jadwal service dan riwayat pemakaian
kendaraan. Untuk dapat memakai kendaraan, pegawai diwajibkan untuk melakukan pemesanan
terlebih dahulu ke pool atau bagian pengelola kendaraan dan pemakaian kendaraan harus
diketahui atau disetujui oleh masing - masing atasan.

### Prerequisites

Before running, you need installing software.

* PHP ^8.1
* composer

### Installation

Step to Installation guide.

before run migration, you create database name 'sekawan-media'
```
sekawan-media
```

```
composer install
php artisan migrate:fresh --seed
```

## Usage

Run web service.

```
php artisan serve
```

## Account's

Email | Password | Role | 
--- | --- | --- |
admin@gmail.com | password | Admin |
approver1@gmail.com | password | Approver | 
approver2@gmail.com | password | Approver |

## Feature

- Dashboard     - overall graph
- Driver        - list driver, can create, update, and delete
- Vehicle       - list vehicle, can create, update, and delete
- Booking       - create booking and request approval
- Task          - task to approve by user
- Log           - list log activity

## Server

Demo server

https://kateruriyu.my.id

## Development

For development you can open PR

https://github.com/lutfisobri/tech-test-sekawan-media.git