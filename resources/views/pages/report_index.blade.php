@extends('layouts/app')

@section('meta')
    <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
@endsection

@section('content')

<div class="col-md-6">
<h1>Тайлан гаргах</h1>
    {!! Form::open(['url' => 'report_show']) !!}
        <!-- how many products to show form input -->
        <div class="form-group">
            {!! Form::label('total', 'Гаргах бүтээгдэхүүнийг хязгаарлах:') !!}
            {!! Form::text('total', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Date form input -->
        <div class="form-group">
            {!! Form::label('start_date', 'Эхлэх өдөр:') !!}
            {!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <!-- end date form input -->
        <div class="form-group">
            {!! Form::label('end_date', 'Дуусах өдөр:') !!}
            {!! Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <!-- Submit form input -->
        <div class="form-group">    
            {!! Form::submit('Show report', ['class' => 'btn btn-primary btn-block'])!!}
        </div>
    {!! Form::close() !!}

</div>
<div class="col-md-12">
    @if($orderedProducts)
    <table id="tblExport" class="table" >
        <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Зарагдсан тоо ширхэг</th>
            <th>Ширхэгийн үнэ</th>
            <th>Нийт үнэ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orderedProducts as $key=>$product)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$product->product->name}}</td>
                <td>{{$product->total_items}}</td>
                <td>{{$product->product->price}}</td>
                <td>{{$product->product->price*$product->total_items}}</td>
            </tr>
        @endforeach
            <tr>
                <td></td>
                <td>Нийт дүн</td>
                <td></td>
                <td></td>
                <td>{{$totalAmount}}</td>
            </tr>
            <tr>
                <td></td>
                <td>Тайлан гаргасан огноо</td>
                <td></td>
                <td></td>
                <td>{{\Carbon\Carbon::now()}}</td>
            </tr>     
            <tr>
                <td></td>
                <td>Бүтээгдэхүүн зарагдсан хугацаа</td>
                <td>{{$from}}</td>
                <td>{{$to}}</td>
                <td></td>
            </tr>         
    </tbody>
    </table>
        <input class="btn btn-primary" type="button" onclick="tableToExcel('tblExport', 'W3C Example Table')" value="Export to Excel" style="margin-bottom:50px;">
    @endif
</div>

@stop
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/export/tableExport.js"></script>
    <script type="text/javascript" src="/js/export/jquery.base64.js"></script>
    <script type="text/javascript" src="/js/export/jspdf/libs/sprintf.js"></script>
    <script type="text/javascript" src="/js/export/jspdf/jspdf.js"></script>
    <script type="text/javascript" src="/js/export/jspdf/libs/base64.js"></script>
    <script type="text/javascript">
    var tableToExcel = (function() {
          var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
          return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
          }
        })()
</script> 
@stop