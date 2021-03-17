<!DOCTYPE html> 
<html> 
<head> 
    <title>Cetak  Barcode</title> 
</head> 
<body> 
    <table  width="100%"> 
    <tr> 

       @foreach($product  as $data) 
       <td align="center"  style="border: lpx solid #ccc"> 
        {{$data->name}}
        <br>
        <br>
       <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
       $data->code_product, 'C39')}}" height="60" width="180">
      <br>{{$data->code_product }}
      </td>
      @if ($no++ %3 ==0)
           </tr><tr>
      @endif
     @endforeach
    </tr>
   </table>
  </body>
</html>