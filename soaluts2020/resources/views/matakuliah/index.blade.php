@extends('layouts.conquer2')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@section('content')
<div class="container">
  <h2>Mata Kuliah</h2>
  <p>Display all mata kuliah:</p>
  <table class="table">
    <thead>
      <tr>
        <th>Kode MK</th>
        <th>Nama MK</th>
        <th>SKS</th>
        <th>Detail Mahasiswa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td>{{$d->kode_MK}}</td>
            <td>{{$d->nama_MK}}</td>
            <td>{{$d->sks}}</td>
            <td>
                <a class="btn btn-xs" data-toggle="modal" href="#matakuliah_{{$d->id}}">Tampilan Peserta MK</a>

                <div class="modal fade" id="matakuliah_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h4 class="modal-title">Peserta MK {{$d->nama_MK}}:</h4>
                              </div>
                              <div class="modal-body">
                                   @foreach($d->mahasiswas as $item)
                                        <li>{{$item->nama}}</li>
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
