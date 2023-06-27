<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anang APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="my-3">Toko</h1>
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <form action="/order" method="post">
                            @csrf
                            <h5 class="card-title">Order sekarang</h5>
                            <div class="mb-3">
                                <label for="jumalahPesan" class="form-label">Jumlah Pesan</label>
                                <input type="number" class="form-control" name="orderJumlahPesan" id="jumalahPesan"
                                    placeholder="jumlah">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" name="orderNama" id="nama"
                                    placeholder="nama" value="Anang Nur Prasetya">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Pemesan</label>
                                <input type="text" class="form-control" name="orderAlamat" id="alamat"
                                    placeholder="alamat" value="Mojokerto, Jawa Timur">
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon Pemesan</label>
                                <input type="text" class="form-control" name="orderTelepon" id="telepon"
                                    placeholder="alamat" value="0821837775">
                            </div>
                            <button class="btn btn-primary px-3" type="submit">Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
