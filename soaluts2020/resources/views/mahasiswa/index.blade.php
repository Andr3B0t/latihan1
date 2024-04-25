@extends('layouts.conquer2')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@section('content')
<div class="container">
  <h2>Mahasiswa</h2>
  <p>Display all mahasiswa:</p>
  <table class="table">
    <thead>
      <tr>
        <th>NRP</th>
        <th>Nama</th>
        <th>IPK</th>
        <th>IPS</th>
        <th>Detail Mata Kuliah</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td>{{$d->nrp}}</td>
            <td>{{$d->nama}}</td>
            <td>{{$d->ipk}}</td>
            <td>{{$d->ips}}</td>
            <td>
                <a class="btn btn-xs" data-toggle="modal" href="#mahasiswa_{{$d->id}}">Tampilan MK yang diambil</a>

                <div class="modal fade" id="mahasiswa_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">MK yang diambil {{$d->nama}}:</h4>
                            </div>
                            <div class="modal-body">
                                @foreach($d->matakuliahs as $item)
                                    <li>{{$item->nama_MK}}</li>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection

</body>
</html>
