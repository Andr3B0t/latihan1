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
