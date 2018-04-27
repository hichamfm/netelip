<form method="POST" action="{{route('netelip.enviar')}}" accept-charset="UTF-8" id="create_alert_form" name="create_alert_form" class="">
	{{ csrf_field() }}
	<div class="form-group col-md-4 {{ $errors->has('message') ? 'has-error' : '' }}">
		<label for="message" class="control-label">Palabra de seguridad asociada a la API a utilizar</label>
		<div class="col-md-10">
			<input class="form-control input-sm " name="token" type="text" id="token" value="83eaafa246bdc7df1f451211ea19f926a6f9f0bcb13e0fff2d405512f8a0c52f" min="1" max="255" required="true">
			{!! $errors->first('message', '<p class="help-block">:message</p>') !!}
		</div>
	</div>

	<div class="form-group col-md-4 {{ $errors->has('message') ? 'has-error' : '' }}">
		<label for="message" class="control-label">Nombre de la API a utilizar</label>
		<div class="col-md-10">
			<input class="form-control input-sm " name="api" type="text" id="api" value="API 6230f" min="1" max="255" required="true" >
			{!! $errors->first('message', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	
	<div class="form-group col-md-4 {{ $errors->has('message') ? 'has-error' : '' }}">
		<label for="message" class="control-label"> Identificador de llamada que se mostrará al usuario que recepciona la llamada</label>
		<div class="col-md-10">
			<input class="form-control input-sm " name="src" type="text" id="src" value="FLC" min="1" max="255" required="true" >
			{!! $errors->first('message', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<div class="form-group col-md-4 {{ $errors->has('message') ? 'has-error' : '' }}">
		<label for="message" class="control-label">Número de teléfono a llamar</label>
		<div class="col-md-10">
			<input class="form-control input-sm " name="dst" type="text" id="dst" value="527221569361" min="1" max="255" required="true" >
			{!! $errors->first('message', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<div class="form-group col-md-4 {{ $errors->has('message') ? 'has-error' : '' }}">
		<label for="message" class="control-label">Duración máxima del intento de llamada en segundos</label>
		<div class="col-md-10">
			<input class="form-control input-sm " name="duration" type="text" id="duration" value="20" min="1" max="255" required="true">
			{!! $errors->first('message', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<div class="form-group col-md-4 {{ $errors->has('message') ? 'has-error' : '' }}">
		<label for="message" class="control-label">Tipo de destino de la llamada.</label>
		<div class="col-md-10">
			<input class="form-control input-sm " name="typedst" type="text" id="typedst" value="pstn" min="1" max="255" required="true" >
			{!! $errors->first('message', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-md-offset-2 col-md-10">
			<input class="btn btn-primary" type="submit" value="Enviar">
		</div>
	</div>

</form>