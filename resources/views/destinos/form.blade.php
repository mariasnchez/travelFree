<div class="box box-info padding-1">
    <div class="box-body">
        <input type="hidden" name="idUsu" value="{{Auth::user()->idUsu}}">

        <div class="form-group m-8">
            <div >
            {{ Form::label('ciudad') }}
            </div>
            {{ Form::text('ciudad', $destino->ciudad, ['class' => 'form-control' . ($errors->has('ciudad') ? ' is-invalid' : '')]) }}
            {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group m-8">
            <div>
            {{ Form::label('hotel') }}
            </div>
            {{ Form::text('hotel', $destino->hotel, ['class' => 'form-control' . ($errors->has('hotel') ? ' is-invalid' : '')]) }}
            {!! $errors->first('hotel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group m-8">
            <div>
            {{ Form::label('Nº de noches') }}
            </div>
            {{ Form::number('noches', $destino->noches, ['class' => 'form-control' . ($errors->has('noches') ? ' is-invalid' : '')]) }}
            {!! $errors->first('noches', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group m-8">
            <div>
            {{ Form::label('Valoracion') }}
            </div>
            {{ Form::number('valoracion', $destino->valoracion, ['class' => 'form-control' . ($errors->has('valoracion') ? ' is-invalid' : ''), 'placeholder' => 'Del 0 al 10']) }}
            {!! $errors->first('valoracion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded">Listo</button>
    </div>
    
</div>