@extends('layouts.app')
@section('content')
<div class="container z-depth-2" style="padding:20px;background:white; margin-top:20px;" >
<div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Diagram</a></li>
        <li class="tab col s3"><a class="active" href="#test2">Data Tabel</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <div id="container_bars"></div>
                </figure>    
    </div>
    <div id="test2" class="col s12">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div  style="padding:20px;margin-top:20px;">
                    <div class="card-header"><h5 style="font-weigth:700; letter-spacing:2px; font-size:22px; text-align:center;">DASHBOARD</h5></div>

                    <div class="card-body">

                    <a class="waves-effect waves-light btn modal-trigger green darken-1" href="#modal_tambah" style="margin-bottom:20px;font-weight:600">Insert User</a>                    
                    <table id="table_id" class="table responsive-table" style="width:100%">
                        <thead>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th ></th>
                            <th ></th>

                        </thead>

                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


                <div id="modal_tambah" class="modal modal-fixed-footer">
                    <div class="modal-content">
                    <h5 style="font-weight:600; font-size:20px; letter-spacing:2px">DAFTAR</h4>
                    <hr>
                    <form id="upload_form"  enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="margin-top:20px;">
                            <div data-repeater-list="datafile">
                                <div data-repeater-item  style="margin-top:10px;">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" name="qfile_html"  required>
                                    </div>                                
                                    <input data-repeater-delete type="button" class="btn red darken-2" value="Delete"/>
                                </div>
                            </div>
                        <input class="btn  green darken-2" data-repeater-create type="button" style="margin-top:10px;" value="Add File Field"/> 
                        </div>
                        <div class="form-group row">
                            <div class="input-field col s12">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="" name="name"  required autocomplete="name" autofocus>
                            </div>
                            <div class="input-field col s12">
                                <input id="email" type="email"  name="email"  required autocomplete="email">
                                <label for="email" >{{ __('E-Mail Address') }}</label>
                            </div>  
                            <div class="input-field col s12">
                                <label for="umur" >{{ __('Umur') }}</label>
                                <input id="umur" type="number" min="0" max="10000" name="umur"  required autocomplete="umur">
                            </div>          
                            <div class="input-field col s12">
                                <label for="tanggal_lahir">{{ __('Tanggal Lahir') }}</label>
                                <input id="tanggal_lahir" type="text" class="datepicker"  name="tanggal_lahir"  required  autofocus>
                            </div>      
                            <div class="input-field col s12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password" >{{ __('Password') }}</label>
                            </div>                                                                                              
                        </div>

                        <div class="row">
                        <h5 style="font-weight:600;font-weight: 600;font-size: 17px;letter-spacing: 3px;">STATUS</h5>
                        <hr>
                        <p>
                        <label>
                            <input type="radio" value="pelajar" name="status" required class="filled-in"  />
                            <span>Pelajar</span>
                        </label>
                        </p>  
                        <p>
                        <label>
                            <input type="radio" value="pekerja" name="status" requireds class="filled-in"  />
                            <span>Pekerja</span>
                        </label>
                        </p>   
                        <p>
                        <label>
                            <input type="radio" value="pengusaha" name="status" required class="filled-in"  />
                            <span>Pengusaha</span>
                        </label>
                        </p>               
                        <p>
                        <label>
                            <input type="radio" value="penggiat-startup" name="status" required class="filled-in"  />
                            <span>Penggiat Startup</span>
                        </label>
                        </p>                                                   
                        </div>


                        <div class="row">
                        <h5 style="font-weight:600;font-weight: 600;font-size: 17px;letter-spacing: 3px;">JENIS PROGRAMMER</h5>
                        <hr>
                        <p>
                        <label>
                            <input type="checkbox" value="fullstack" name="jenis[]" required class="filled-in"  />
                            <span>Programmer Fullstack</span>
                        </label>
                        </p>  
                        <p>
                        <label>
                            <input type="checkbox" value="backend" name="jenis[]" requireds class="filled-in"  />
                            <span>Programmer Backend</span>
                        </label>
                        </p> 
                        <p>
                        <label>
                            <input type="checkbox" value="android" name="jenis[]" requireds class="filled-in"  />
                            <span>Programmer Android</span>
                        </label>
                        </p>                        
                        <p>
                        <label>
                            <input type="checkbox" value="ios" name="jenis[]" requireds class="filled-in"  />
                            <span>Programmer iOS</span>
                        </label>
                        </p>                                                   
                        </div>                        

    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
    </div>
    </form>
  </div>


  <div id="modal_edit" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5 style="font-weight:600; font-size:20px; letter-spacing:2px">EDIT</h4>
      <hr>
                    <form id="upload_form_edit"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="sid"/>
                        <div class="form-group row">
                            <div class="input-field col s12">
                                <label for="name_edit">{{ __('Name') }}</label>
                                <input id="name_edit" type="text" class="" name="name"  required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="input-field col s12">
                                <label for="tanggal_lahir_edit">{{ __('Tanggal Lahir') }}</label>
                                <input id="tanggal_lahir_edit" type="text" class="datepicker"  name="tanggal_lahir"  required  autofocus>
                            </div>
                        </div>

                        <div class="row">
                        <h5 style="font-weight:600;font-weight: 600;font-size: 17px;letter-spacing: 3px;">Jenis Programmer</h5>
                        <hr>
                        <p>
                        <label>
                            <input type="checkbox" value="fullstack" name="jenis[]"  class="filled-in"  />
                            <span>Programmer Fullstack</span>
                        </label>
                        </p>  
                        <p>
                        <label>
                            <input type="checkbox" value="backend" name="jenis[]"  class="filled-in"  />
                            <span>Programmer Backend</span>
                        </label>
                        </p> 
                        <p>
                        <label>
                            <input type="checkbox" value="android" name="jenis[]"  class="filled-in"  />
                            <span>Programmer Android</span>
                        </label>
                        </p>                        
                        <p>
                        <label>
                            <input type="checkbox" value="ios" name="jenis[]"  class="filled-in"  />
                            <span>Programmer iOS</span>
                        </label>
                        </p>                                                                                                              
                        </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
    </div>
    </form>
  </div>
<script>
$(document).ready(function(){$('#upload_form').repeater({initEmpty:!0,defaultValues:{'text-input':'foo'},show:function(){$(this).slideDown()},hide:function(deleteElement){if(confirm('Are you sure you want to delete this element?')){$(this).slideUp(deleteElement)}},isFirstItemUndeletable:!0})
$('.modal').modal();$('.tabs').tabs();$('.datepicker').datepicker({format:"dd-mm-yyyy",container:'body'})});var data='{{$leads}}';var datajson=JSON.parse(data.replace(/&quot;/g,'"'));Highcharts.chart('container',{chart:{plotBackgroundColor:null,plotBorderWidth:null,plotShadow:!1,type:'pie'},title:{text:''},tooltip:{pointFormat:'{series.name}: <b>{point.percentage:.1f}%</b>'},accessibility:{point:{valueSuffix:'%'}},plotOptions:{pie:{allowPointSelect:!0,cursor:'pointer',dataLabels:{enabled:!0,format:'<b>{point.name}</b>: {point.percentage:.1f} %'}}},series:[{name:'Brands',colorByPoint:!0,data:datajson}]});var arrbars=[];jQuery.each(datajson,function(i,val){console.log(val.y)
var arrbar=[];arrbar[0]=val.name;arrbar[1]=val.y;arrbars.push(arrbar)});Highcharts.chart('container_bars',{chart:{type:'column'},title:{text:''},subtitle:{text:''},xAxis:{type:'category',labels:{rotation:-45,style:{fontSize:'13px',fontFamily:'Verdana, sans-serif'}}},yAxis:{min:0,title:{text:'Status User'}},legend:{enabled:!1},tooltip:{pointFormat:'<b>{point.y}</b>'},series:[{name:'Population',data:arrbars,dataLabels:{enabled:!0,rotation:-90,color:'#FFFFFF',align:'right',y:10,style:{fontSize:'13px',fontFamily:'Verdana, sans-serif'}}}]});var table=$('#table_id').DataTable({processing:!0,serverSide:!0,dom:'Bfrtip',buttons:[{extend:'collection',text:'Export',className:'blue darken-2',buttons:[{extend:'excelHtml5',title:'Excel_data_users',exportOptions:{columns:[0,1,2,3,4]}},{extend:'pdfHtml5',title:'PDF_data_users',exportOptions:{columns:[0,1,2,3,4]}}],},{text:'Reload',className:'grey darken-2',action:function(e,dt,node,config){reload()}}],ajax:'{!! route('get.users') !!}',columns:[{data:'id',name:'id'},{data:'name',name:'name'},{data:'email',name:'email'},{data:'status',name:'status'},{data:'actiondelete',name:'actiondelete',orderable:!1,searchable:!1},{data:'actionedit',name:'actionedit',orderable:!1,searchable:!1}]});$('#upload_form').on('submit',function(event){event.preventDefault();$.ajax({url:'{!! route('get.action') !!}',method:"POST",data:new FormData(this),dataType:'JSON',contentType:!1,cache:!1,processData:!1,success:function(data){$('[data-repeater-list]').empty();$('[data-repeater-create]').click();if(data.status=="success"){$("#modal_tambah").modal('close');$("#upload_form")[0].reset()}
console.log(data)
Swal.fire(data.status,data.message,data.status)}})});$('#upload_form_edit').on('submit',function(event){event.preventDefault();$.ajax({url:'{!! route('set.updateusers') !!}',method:"POST",data:new FormData(this),dataType:'JSON',contentType:!1,cache:!1,processData:!1,success:function(data){if(data.status=="success"){$("#modal_edit").modal('close')}
console.log(data)
Swal.fire(data.status,data.message,data.status)
reload()}})});const reload=()=>{table.ajax.reload()}
const deleteUser=(a,b)=>{Swal.fire({title:'Hapus Data',icon:'warning',showCancelButton:!0,confirmButtonColor:'#3085d6',cancelButtonColor:'#d33',confirmButtonText:'Delete!'}).then((result)=>{if(result.value){$.ajax({url:'{!! route('get.deleteusers') !!}',method:"POST",headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},data:{sid:a,oldim:b},dataType:'JSON',success:function(data){reload();Swal.fire(data.status,data.message,data.status)}})}})}
const editUser=(a)=>{$("#modal_edit").modal('open');$.ajax({url:'{!! route('get.editusers') !!}',method:"POST",headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},data:{sid:a},dataType:'JSON',success:function(data){$("#name_edit").val(data.name);$("#sid").val(data.id);$("#tanggal_lahir_edit").val(data.tanggal_lahir);$("input[name=status_edit][value="+data.status+"]").prop('checked',!0)}})}
</script>
@endsection
