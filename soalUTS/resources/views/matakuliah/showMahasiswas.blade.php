<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Mahasiswas : </h4>
  </div>
  <div class="modal-body">
    <div class='row'>
        <table class="table">
            <div class='col-md-4' style='border:1px solid #eee;text-align:center'>

                    <thead>
                      <tr>
                        <th>NRP</th>
                        <th>NAMA</th>
                        <th>IPK</th>
                        <th>IPS</th>
                        <th>SEMESTER</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->nrp }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->ipk }}</td>
                            <td>{{ $d->ips }}</td>
                            <td>{{ $d->semester }}</td>
                        </tr>
                        @endforeach
                    </tbody>

            </div>
    </table>
    </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
