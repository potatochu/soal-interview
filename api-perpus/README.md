# REST API SOAL BACKEND #
## Spesifikasi ##
- Framework PHP Laravel
- Auth Laravel Sanctum
- Selain Register dan Login, menggunakan middleware auth

## Installation ##
- clone repo
- Run composer install.
- Run cp .env.example .env.
- Run php artisan key:generate.
- Run php artisan migrate.
- Run php artisan serve.

## Dokumentasi API ##
Dokumentasi lengkap untuk semua API yang telah dibuat, dengan detail contoh permintaan dan respons:
1. Register User
Endpoint: POST /api/register
Deskripsi: Mendaftarkan pengguna baru ke dalam sistem.
Contoh Permintaan:
json

>     {
>         "name": "John Doe",
>         "email": "john@example.com",
>         "password": "password"
>     }

Contoh Respons (Status: 200 OK):
json

    {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "created_at": "2024-02-17T12:00:00.000000Z",
            "updated_at": "2024-02-17T12:00:00.000000Z"
        },
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImEwNTMzOTNjZDEwZDk2NzQyMDA5N..."
    }

2. Login User
Endpoint: POST /api/login
Deskripsi: Melakukan login pengguna ke dalam sistem.
Contoh Permintaan:
json
>     {
>         "email": "john@example.com",
>         "password": "password"
>     }

Contoh Respons (Status: 200 OK):
json

    {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "created_at": "2024-02-17T12:00:00.000000Z",
            "updated_at": "2024-02-17T12:00:00.000000Z"
        },
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImEwNTMzOTNjZDEwZDk2NzQyMDA5N..."
    }

2.1. Penggunaan Akses Token

> Authorization: Bearer <access_token>

3. Logout User
Endpoint: POST /api/logout
Deskripsi: Melakukan logout pengguna dari sistem. Memerlukan token akses.
Contoh Respons (Status: 200 OK):
json

>     {
>         "message": "Successfully logged out"
>     }

4. Daftar Kategori Buku
Endpoint: GET /api/categories
Deskripsi: Mengambil daftar semua kategori buku.
Contoh Respons (Status: 200 OK):
json

>     {
>         "categories": [
>             {
>                 "id": 1,
>                 "name": "Fiction",
>                 "created_at": "2024-02-17T12:00:00.000000Z",
>                 "updated_at": "2024-02-17T12:00:00.000000Z"
>             },
>             {
>                 "id": 2,
>                 "name": "Non-fiction",
>                 "created_at": "2024-02-17T12:00:00.000000Z",
>                 "updated_at": "2024-02-17T12:00:00.000000Z"
>             }
>         ]
>     }

5. Detail Kategori Buku
Endpoint: GET /api/categories/{id}
Deskripsi: Mengambil detail suatu kategori buku berdasarkan ID.
Contoh Respons (Status: 200 OK):
json

>     {
>         "category": {
>             "id": 1,
>             "name": "Fiction",
>             "created_at": "2024-02-17T12:00:00.000000Z",
>             "updated_at": "2024-02-17T12:00:00.000000Z"
>         }
>     }

6. Buat Kategori Buku Baru
Endpoint: POST /api/categories
Deskripsi: Membuat kategori buku baru.
Contoh Permintaan:
json

>     {
>         "name": "Fantasy"
>     }
>     Contoh Respons (Status: 201 Created):
>     json
>     {
>         "category": {
>             "id": 3,
>             "name": "Fantasy",
>             "created_at": "2024-02-17T12:00:00.000000Z",
>             "updated_at": "2024-02-17T12:00:00.000000Z"
>         }
>     }

7. Update Kategori Buku
Endpoint: PUT /api/categories/{id}
Deskripsi: Memperbarui informasi suatu kategori buku berdasarkan ID.
Contoh Permintaan:
json

>     {
>         "name": "Science Fiction"
>     }

Contoh Respons (Status: 200 OK):
json

>     {
>         "category": {
>             "id": 3,
>             "name": "Science Fiction",
>             "created_at": "2024-02-17T12:00:00.000000Z",
>             "updated_at": "2024-02-17T12:00:00.000000Z"
>         }
>     }

8. Hapus Kategori Buku
Endpoint: DELETE /api/categories/{id}
Deskripsi: Menghapus suatu kategori buku berdasarkan ID.
Contoh Respons (Status: 200 OK):
json

>     {
>         "message": "Category deleted successfully"
>     }

9. Daftar Semua Buku
Endpoint: GET /api/books
Deskripsi: Mengambil daftar semua buku.
Contoh Respons (Status: 200 OK):
json

>     {
>         "books": [
>             {
>                 "id": 1,
>                 "title": "Book Title 1",
>                 "author": "Author 1",
>                 "category_id": 1,
>                 "created_at": "2024-02-17T12:00:00.000000Z",
>                 "updated_at": "2024-02-17T12:00:00.000000Z"
>             },
>             {
>                 "id": 2,
>                 "title": "Book Title 2",
>                 "author": "Author 2",
>                 "category_id": 2,
>                 "created_at": "2024-02-17T12:00:00.000000Z",
>                 "updated_at": "2024-02-17T12:00:00.000000Z"
>             }
>         ]
>     }

10. Detail Buku
Endpoint: GET /api/books/{id}
Deskripsi: Mengambil detail suatu buku berdasarkan ID.
Contoh Respons (Status: 200 OK):
json

>     {
>         "book": {
>             "id": 1,
>             "title": "Book Title 1",
>             "author": "Author 1",
>             "category_id": 1,
>             "created_at": "2024-02-17T12:00:00.000000Z",
>             "updated_at": "2024-02-17T12:00:00.000000Z"
>         }
>     }

11. Tambah Buku Baru
Endpoint: POST /api/books
Deskripsi: Menambah buku baru.
Contoh Permintaan:
json

>     {
>         "title": "New Book",
>         "author": "New Author",
>         "category_id": 1
>     }

Contoh Respons (Status: 201 Created):
json

>     {
>         "book": {
>             "id": 3,
>             "title": "New Book",
>             "author": "New Author",
>             "category_id": 1,
>             "created_at": "2024-02-17T12:00:00.000000Z",
>             "updated_at": "2024-02-17T12:00:00.000000Z"
>         }
>     }

12. Update Buku
Endpoint: PUT /api/books/{id}
Deskripsi: Memperbarui informasi suatu buku berdasarkan ID.
Contoh Permintaan:
json

>     {
>         "title": "Updated Book Title",
>         "author": "Updated Author Name",
>         "category_id": 2
>     }

Contoh Respons (Status: 200 OK):
json

>     {
>         "book": {
>             "id": 1,
>             "title": "Updated Book Title",
>             "author": "Updated Author Name",
>             "category_id": 2,
>             "created_at": "2024-02-17T12:00:00.000000Z",
>             "updated_at": "2024-02-17T12:00:00.000000Z"
>         }
>     }

13. Hapus Buku
Endpoint: DELETE /api/books/{id}
Deskripsi: Menghapus suatu buku berdasarkan ID.
Contoh Respons (Status: 200 OK):
json

>     {
>         "message": "Book deleted successfully"
>     }

14. Pinjam Buku
Endpoint: POST /api/books/{id}/borrow
Deskripsi: Meminjam buku berdasarkan ID buku.
Contoh Permintaan:
json

>     {
>         "user_id": 1
>     }

Contoh Respons (Status: 200 OK):
json

>     {
>         "message": "Book borrowed successfully"
>     }

15. Kembalikan Buku
Endpoint: PUT /api/books/{id}/return
Deskripsi: Mengembalikan buku berdasarkan ID buku.
Contoh Respons (Status: 200 OK):
json

>     {
>         "message": "Book returned successfully"
>     }

16. Daftar Buku yang Dipinjam
Endpoint: GET /api/borrowed-books
Deskripsi: Mengambil daftar buku yang sedang dipinjam oleh pengguna yang sedang login.
Contoh Respons (Status: 200 OK):
json

>     {
>         "borrowed_books": [
>             {
>                 "id": 1,
>                 "title": "Book Title 1",
>                 "author": "Author 1",
>                 "category_id": 1,
>                 "borrow_date": "2024-02-17T12:00:00.000000Z",
>                 "return_date": "2024-02-24T12:00:00.000000Z",
>                 "created_at": "2024-02-17T12:00:00.000000Z",
>                 "updated_at": "2024-02-17T12:00:00.000000Z"
>             }
>         ]
>     }
