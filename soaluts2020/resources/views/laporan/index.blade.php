@extends('layouts.conquer2')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @section('content')

    <a href="#" onclick="showInfoA()">1</a>
    <div id="showInfoA"></div>

    <a href="#" onclick="showInfoB()">2</a>
    <div id="showInfoB"></div>

    <a href="#" onclick="showInfoC()">3</a>
    <div id="showInfoC"></div>

    <a href="#" onclick="showInfoD()">4</a>
    <div id="showInfoD"></div>
    @endsection
</body>
</html>

@section('javascript')
    <script>
        function showInfoA()
        {
            $.ajax({
                type:'POST',
                url:'{{route("laporan.showInfoA")}}',
                data:'_token=<?php echo csrf_token() ?>',
                success: function(data){
                    $('#showInfoA').html(data.msg)
                }
            });
        }

        function showInfoC()
        {
            $.ajax({
                type:'POST',
                url:'{{route("laporan.showInfoC")}}',
                data:'_token=<?php echo csrf_token() ?>',
                success: function(data){
                    $('#showInfoC').html(data.msg)
                }
            });
        }

        function showInfoD()
        {
            $.ajax({
                type:'POST',
                url:'{{route("laporan.showInfoD")}}',
                data:'_token=<?php echo csrf_token() ?>',
                success: function(data){
                    $('#showInfoD').html(data.msg)
                }
            });
        }
    </script>
@endsection
