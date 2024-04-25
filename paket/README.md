# CMD

file di theme conquer 2 di copy paste ke public/conquer2

### Create new project
- composer create-project laravel/laravel:^10 namaProject
  
### Downloading Vendor
- composer -vvvv install

### Local Development Server
- php artisan serve

### File .env
- DB_DATABASE = 'NAMA_DATABASE'
- DB_USERNAME = 'root'
- DB_PASSWORD = ''

### Migration
- php artisan make:migration create_users_table, users -> nama tabelnya
- php artisan make:migration add_users_table, tambah columns
- php artisan make:migration add_fk_hotel_id_diproducts_id_dihotels_table, tambah columns
- php artisan migrate

### Seeder
- php artisan make:seeder HotelSeeder
- php artisan migrate:fresh --seed
- php artisan db:seed

### Controller
- php artisan make:controller HotelController --resource ,jangan lupa buat di web.php routingnya
- php artisan make:controller ControllerName --resource -model= ModelName
- php artisan make:controller HotelController --resource -model= Hotel



# Routing
### simple routing
```
Route::get('/greeting', function(){return 'hello world'})
```

### default page when run LDS
```
Route::get('/', function () {
    return view('dashboard', ['name' => ['Vincent','Hadinata']]);
});

```
### routing with parameter
```
Route::get('/namaDirektori/{parameter}', function($parameter){
    return 'hello '.$parameter
});
```

### routing from resource controller
```
Route::resource('hotel', HotelController::class);
```

### routing from resource controller
```
Route::get('report/availablehotelrooms', [HotelController::class, 'availablehotelroom']);
```
# Sintaks
```
  @if (count($record) === 1)
      I have one record!
  @elseif (count($record) > 2)
      I have multiple records!
  @else
      I don't have records !
  @endif
```
```
  @foreach ($queryModel as $data)
      <tr>
        <td>{{$data ->id}}</td>
        <td>{{$data ->created_at}}</td>
        <td>{{$data ->updated_at}}</td>
        <td>{{$data ->name}}</td>
        <td>{{$data ->price}}</td>
        <td>{{$data ->hotel_id}}</td>
        <td>{{$data ->hotels->name}}</td>
      </tr>
      @endforeach
```
# Migration
### Creating table
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
```
### Adding columns
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            //
            $table->string('name',100);
            $table->string('address',100);
            $table->integer('postcode');
            $table->string('city',100);
            $table->string('state',100);
            $table->integer('country_id');
            $table->double('longitude');
            $table->double('latitude');
            $table->Integer('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('currency');
            $table->string('accomodation_type');
            $table->string('category');
            $table->string('web');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            //
            $table->dropColumns('name');
            $table->dropColumns('address');
            $table->dropColumns('postcode');
            $table->dropColumns('city');
            $table->dropColumns('state');
            $table->dropColumns('country_id');
            $table->dropColumns('longitude');
            $table->dropColumns('latitude');
            $table->dropColumns('phone');
            $table->dropColumns('fax');
            $table->dropColumns('email');
            $table->dropColumns('currency');
            $table->dropColumns('accomodation_type');
            $table->dropColumns('accomodation_type');
            $table->dropColumns('category');
            $table->dropColumns('web');
        });
    }
};
```
### Add foreign key
1 hotel punya banyak produk.<br>
Tabel produk punya attrbt foreign 'hotel_id' di reference ke 'id' di tabel hotel
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropForeign('hotel_id');
            $table->dropColumn('hotel_id');
        });
    }
};
```

# Seeder

### Contoh seeder di HotelSeeder.php
```
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $hotelNames = ['Hilton Hotel', 'Marriott Hotel', 'Sheraton Hotel', 'Hyatt Regency', 'Radisson Blu'];
        
        foreach ($hotelNames as $hotelName) {
            $address = rand(100, 999) . ' ' . ucwords(strtolower($hotelName)) . ' Street';
            DB::table('hotels')->insert([
                [
                    'name' => $hotelName,
                    'address' => $address,
                    'postcode' => random_int(1000,10000),
                    'city' => Str::random(10),
                    'state' => 'NY',
                    'country_id' => 1,
                    'longitude' => -74.005972,
                    'latitude' => 40.712776,
                    'phone' => 123,
                    'fax' => '987-654-3210',
                    'email' => 'info@' . strtolower(str_replace(' ', '', $hotelName)) . '.com',
                    'currency' => 'USD',
                    'accomodation_type' => 'Hotel',
                    'category' => '5 Stars',
                    'web' => 'https://www.' . strtolower(str_replace(' ', '', $hotelName)) . '.com',
                    'type_id' => random_int(1,3),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }    
    }
}
```
### DatabaseSeeder.php
```
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            TypeSeeder::class,
            UserSeeder::class,
            HotelSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
```
# Controler & Models
### HotelController.php
```
<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HotelController extends Controller
{
    public function index()
    {
        $queryModel = Hotel::all();
        return view('hotel.index', compact('queryModel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function availablehotelroom(){
        $queryModel = Hotel::join('products as p', 'hotels.id', '=', 'p.hotel_id')->select('hotels.name', 'hotels.city', DB::raw('sum(p.available_room) as kamar_tersedia'))
        ->groupBy('hotels.id','hotels.name','hotels.city')
        -> get();
//        dd($queryModel);
        return view('hotel.available_room', compact('queryModel'));
    }

    public function averagePriceByHotelType()
    {
        $hotelData = Hotel::select('t.name as type_name', 'hotels.name as hotel_name',
            DB::raw('COALESCE(AVG(p.price), 0) AS average_price'))
            ->Join('types AS t', 'hotels.type_id', '=', 't.id')
            ->Join('products AS p', 'hotels.id', '=', 'p.hotel_id')
            ->groupBy('t.name', 'hotels.name')
            ->get();
//        dd($hotelData);
        return view('hotel.avg_price_by_hotel_type', compact('hotelData'));
    }
}
```

### MataKuliahController.php
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use DB;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queryModel = MataKuliah::all();
        return view('matakuliah.index', compact('queryModel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
    }

    public function showMahasiswas()
    {
        $data = DB::table('matakuliahs')
        ->select('mahasiswas.*')
        ->join('ambil_mk','ambil_mk.matakuliah_id','=','matakuliahs.id')
        ->join('mahasiswas','mahasiswas.id','=','ambil_mk.mahasiswa_id')
        ->where('matakuliahs.id','=',$_POST['mahasiswa_id'])
        ->get();
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('matakuliah.showMahasiswas',compact('data'))->render()
        ),200);
    }

    public function showInfoA()
    {
        $data = MataKuliah::join('ambil_mk as a', 'matakuliahs.id', '=', 'a.matakuliah_id')
        ->select('matakuliahs.kode_MK', 'matakuliahs.nama_MK', DB::raw('count(a.matakuliah_id) as jumpes'))
        ->groupBy('matakuliahs.kode_MK', 'matakuliahs.nama_MK')
        ->orderBy('jumpes','DESC')
        ->first();

        //dd($data);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>"<div class='alert alert-info'>
            Kode MK: ". $data->kode_MK.", Nama MK: ".$data->price.", Jumlah Peserta: ".$data->jumpes."</div>"
        ),200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

```

### MahasiswaController.php
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queryModel = Mahasiswa::all();
        // dd($queryModel);
        return view('mahasiswa.index', compact('queryModel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function showMataKuliahs()
    {
        $data = DB::table('matakuliahs')
        ->select('matakuliahs.*')
        ->join('ambil_mk','ambil_mk.matakuliah_id','=','matakuliahs.id')
        ->join('mahasiswas','mahasiswas.id','=','ambil_mk.mahasiswa_id')
        ->where('mahasiswas.id','=',$_POST['mahasiswa_id'])
        ->get();
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('mahasiswa.showMataKuliahs',compact('data'))->render()
        ),200);
    }

    public function showInfoC()
    {
        $data = Mahasiswa::leftJoin('ambil_mk as a', 'mahasiswas.id', '=', 'a.mahasiswa_id')
        ->select('mahasiswas.nrp')
        ->where('a.mahasiswa_id', null)
        ->get();

        $output = "";

        foreach($data as $d){
            $output .= $d->nrp.', ';
        }

        //dd($data);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>"<div class='alert alert-info'>
            NRP Mahasiswa belum pernah mengambil MK: ".$output."</div>"
        ),200);
    }

    public function showInfoD()
    {
        $data = Mahasiswa::leftJoin('ambil_mk as a', 'mahasiswas.id', '=', 'a.mahasiswa_id')
        ->select('mahasiswas.nrp', 'mahasiswas.nama', DB::raw('SUM(matakuliahs.sks) as total_sks'))
        ->leftJoin('matakuliahs', 'a.matakuliah_id', '=', 'matakuliahs.id')
        ->groupBy('mahasiswas.nrp', 'mahasiswas.nama')
        ->orderByDesc('total_sks')
        ->first();

        return response()->json(array(
            'status'=>'oke',
            'msg'=>"<div class='alert alert-info'>
             NRP: ".$data->nrp." dan Nama: ".$data->nama." adalah mahasiswa yang mengambil MK terbanyak</div>"
        ),200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

```

### Hotel.php
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'hotel_id', 'id');
    }
}
```

### Product.php
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{

    use HasFactory;
    public function hotels(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

}
```

### Mahasiswa.php
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';

    /**
     * The roles that belong to the Mahasiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function matakuliahs(): BelongsToMany
    {
        return $this->belongsToMany(MataKuliah::class, 'ambil_mk', 'mahasiswa_id', 'matakuliah_id');
    }
}

```

### MataKuliah.php
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MataKuliah extends Model
{
    protected $table = 'matakuliahs';

    /**
     * The roles that belong to the Mahasiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function matakuliahs(): BelongsToMany
    {
        return $this->belongsToMany(Mahasiswa::class, 'ambil_mk', 'matakuliah_id', 'mahasiswa_id');
    }
}

```

# views
### MataKuliah index.php
```
@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
    List of Hotel
    </h3>
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Index of Mahasiswa</a>
        </li>


    </ul>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Index of Mata Kuliah</a>
            </li>
            <li >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" onclick="showInfo()">
                <i class="icon-bulb"></a></i>
             </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div id="showinfo"></div>
    <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th>KODE MK</th>
              <th>NAMA MK</th>
              <th>SKS</th>
              <th>SEMESTER</th>
                <th>DAFTAR MAHASISWA</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($queryModel as $d)
              <tr>
                  <td>{{ $d->kode_MK }}</td>
                  <td>{{ $d->nama_MK }}</td>
                  <td>{{ $d->sks }}</td>
                  <td>{{ $d->semester }}</td>
                  <td><a class='btn btn-xs btn-info' data-toggle='modal' data-target='#myModal'onclick='showMahasiswa({{ $d->id }})'>Detail</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        <div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
       <div class="modal-content" id="showmahasiswas">
         <!--loading animated gif can put here-->
       </div>
    </div>
  </div>


@endsection

@section('javascript')
<script>
function showMahasiswa(mahasiswa_id)
{
  $.ajax({
    type:'POST',
    url:'{{route("matakuliah.showMahasiswas")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'mahasiswa_id':mahasiswa_id
         },
    success: function(data){
       $('#showmahasiswas').html(data.msg)
    }
  });
}

</script>
@endsection

```

### MataKuliah index.php alt
```
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

```

### MataKuliah showMahasiswas.php
```
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

```

### Mahasiswa index.php
```
@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
    List of Hotel
    </h3>
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Index of Mahasiswa</a>
        </li>


    </ul>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Index of Mahasiswa</a>
            </li>
            <li >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" onclick="showInfo()">
                <i class="icon-bulb"></a></i>
             </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div id="showinfo"></div>
    <div class="row">
        <table class="table">
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
              @foreach ($queryModel as $d)
              <tr>
                  <td>{{ $d->nrp }}</td>
                  <td>{{ $d->nama }}</td>
                  <td>{{ $d->ipk }}</td>
                  <td>{{ $d->ips }}</td>
                  <td>{{ $d->semester }}</td>

                  <td><a class='btn btn-xs btn-info' data-toggle='modal' data-target='#myModal'onclick='showMataKuliah({{ $d->id }})'>Detail</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        <div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
       <div class="modal-content" id="showmatakuliahs">
         <!--loading animated gif can put here-->
       </div>
    </div>
  </div>


@endsection


@section('javascript')
<script>
function showMataKuliah(mahasiswa_id)
{
  $.ajax({
    type:'POST',
    url:'{{route("mahasiswa.showMataKuliahs")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'mahasiswa_id':mahasiswa_id
         },
    success: function(data){
       $('#showmatakuliahs').html(data.msg)
    }
  });
}

</script>
@endsection

```

### Mahasiswa showMataKuliahs.php
```
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
                        <th>KODE MK</th>
                        <th>NAMA MK</th>
                        <th>SKS</th>
                        <th>SEMESTER</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->kode_MK }}</td>
                            <td>{{ $d->nama_MK }}</td>
                            <td>{{ $d->sks }}</td>
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

```

### Laporan index.php
```
@extends('layouts.conquer2')

@section('content')



    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
        List of Hotel
        </h3>
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Index of Mahasiswa</a>
            </li>


        </ul>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Index of Mahasiswa</a>
                </li>
                <li >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" onclick="showInfo()">
                    <i class="icon-bulb"></a></i>
                 </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div id="showinfo"></div>
        <div class="row">
            <a href="#" onclick="showInfoA()">1</a>
    <div id="showinfoa"></div>

    <a href="#" onclick="showInfoB()">2</a>
    <div id="showInfoB"></div>

    <a href="#" onclick="showInfoC()">3</a>
    <div id="showInfoC"></div>

    <a href="#" onclick="showInfoD()">4</a>
    <div id="showInfoD"></div>
            <div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
           <div class="modal-content" id="showmatakuliahs">
             <!--loading animated gif can put here-->
           </div>
        </div>
      </div>
@endsection

@section('javascript')
<script>
function showInfoA()
{
  $.ajax({
    type:'POST',
    url:'{{route("laporan.showInfoA")}}',
    data:{'_token':'<?php echo csrf_token() ?>'
         },
    success: function(data){
       $('#showinfoa').html(data.msg)
    }
  });
}

</script>
@endsection

```

### dashboard.php
```
@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
    Dashboard <small>statistics and more</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
</div>
@endsection

```

### web.php
```
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('dashboard', 'dashboard')
    ->name('dashboard');

Route::post("/matakuliah/showMahasiswas",[MataKuliahController::class,'showMahasiswas'])->name('matakuliah.showMahasiswas');
Route::post("/mahasiswa/showMataKuliahs",[MahasiswaController::class,'showMataKuliahs'])->name('mahasiswa.showMataKuliahs');

Route::view('laporan', 'laporan.index')
    ->name('laporan');

Route::post('laporan/showInfoA', [MataKuliahController::class, 'showInfoA'])
    ->name('laporan.showInfoA');

Route::post('laporan/showInfoB', [MataKuliahController::class, 'showInfoB'])
    ->name('laporan.showInfoB');

Route::post('laporan/showInfoC', [MahasiswaController::class, 'showInfoC'])
    ->name('laporan.showInfoC');

Route::post('laporan/showInfoD', [MahasiswaController::class, 'showInfoD'])
    ->name('laporan.showInfoD');


Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('matakuliah', MataKuliahController::class);

```