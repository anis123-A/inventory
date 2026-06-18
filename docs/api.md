# Panduan Inventory System API v1
Base URL: `http://localhost:8000/api/v1`

## Bagian 1: Fitur Otentikasi (Auth)
Di bawah ini adalah daftar link untuk mendaftar dan masuk ke sistem.

### 1. Register User Baru
- **Method:** `POST`
- **Link URL:** `/register`
- **Data yang dikirim (Body JSON):**
```json
  {
    "name": "Nama Lengkap",
    "email": "user@email.com",
    "password": "password123",
    "password_confirmation": "password123"
  }
```

## Bagian 2: Manajemen Items

### 1. Filter Items by Category
- **Method:** `GET`
- **Link URL:** `/items?category_id={id}`
- **Deskripsi:** Mengambil daftar items, dengan opsi filter berdasarkan category_id.
- **Parameter Query (opsional):**

| Parameter | Tipe | Keterangan |
|---|---|---|
| category_id | integer | Jika diisi, hanya item dengan category_id tersebut yang dikembalikan |

- **Contoh Request:**

- **Contoh Response (200 OK):**
```json
  {
    "success": true,
    "message": null,
    "data": [
      {
        "id": 2,
        "name": "Celana",
        "quantity": 6,
        "price": "50000.00",
        "category_id": 1
      }
    ]
  }
```
- **Catatan:**
  - Jika `category_id` tidak diisi pada query, seluruh item akan dikembalikan.
  - Jika `category_id` valid tapi tidak memiliki item, response tetap `200 OK` dengan `data` berupa array kosong (`[]`).