@extends('admin/layout')

@section('header')
<h1>
  Quirófanos 
  <small>Editar quirófano</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{route('admin.quirofanos.index')}}"><i class="fa fa-dashboard"></i>Quirófanos</a></li>
  <li class="active">Editar quirófano</li>
</ol>
@stop

@section('content')
<div class="row">
    <form method="POST" action="{{route('admin.quirofanos.update',$quirofano)}}">
        <div class="col-md-8">
            <div class="box box-primary">
                {{csrf_field()}} {{method_field('PUT')}}   
                <div class="box-body">
                    <div class="form-group">
                        <label >Número de quirófano</label>
                    <input type="number" min="1" step="1" name='numero' value="{{$quirofano->numero}}" placeholder="Ingrese el numero de quirófano" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label >Breve descripción del quirófano</label>
                        <textarea id="editor"  rows="10" name='descripcion' placeholder="Ingrese una breve del quirófano" class="form-control">{{$quirofano->descripcion}}</textarea>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label>Clínica donde se encuentra el quirófano</label>
                        <select name="clinica_id" id="" class="form-control" required autofocus>
                            <option value="">Selecciona una clínica</option>
                            @foreach($clinicas as $clinica)
                            <option value="{{$clinica->id}}"
                                {{old('clinica',$quirofano->clinica_id)==$clinica->id ? 'selected' : ''}} >
                                
                            {{$clinica->nombre}}</option>

                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>    
@stop

@push('scripts')
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    
    CKEDITOR.replace('editor');
    
</script>
@endpush