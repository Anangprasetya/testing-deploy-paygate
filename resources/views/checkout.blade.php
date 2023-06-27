<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.ClientKey') }}"></script>
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
                        <form method="post">
                            @csrf
                            <h5 class="card-title">Pembayaran Order</h5>
                            <div class="mb-3">
                                <label for="jumalahPesan" class="form-label">Jumlah Pesan</label>
                                <input type="number" disabled class="form-control" name="orderJumlahPesan"
                                    id="jumalahPesan" placeholder="jumlah" value="{{ $dataOrder->jumlah }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pemesan</label>
                                <input type="text" disabled class="form-control" name="orderNama" id="nama"
                                    placeholder="nama" value="{{ $dataOrder->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Pemesan</label>
                                <input type="text" disabled class="form-control" name="orderAlamat" id="alamat"
                                    placeholder="alamat" value="{{ $dataOrder->alamat }}">
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon Pemesan</label>
                                <input type="text" disabled class="form-control" name="orderTelepon" id="telepon"
                                    placeholder="alamat" value="{{ $dataOrder->telepon }}">
                            </div>
                            <div class="mb-3">
                                <label for="jumalahTotalBayar" class="form-label">Total Bayar</label>
                                <input type="number" disabled class="form-control" name="orderTotalBayar"
                                    id="jumalahTotalBayar" placeholder="jumlah" value="{{ $dataOrder->total }}">
                            </div>
                        </form>
                        <button class="btn btn-primary px-3" id="pay-button">Bayar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snap }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
</body>

</html>
