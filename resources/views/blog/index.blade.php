@extends('app')
  @section('content')


	<div class="row">
		<div class="col-md-13">
			<h1>Ejemplo laravel ajax crud</h1>
		</div>
	</div>

	<div class="form-group row add">
		<div class="col-md-5">
			<input type="text" name="title" id="title" class="form-control" placeholder="Tu titulo esta aquí" required>
			<p class="error-title text-center alert alert-danger hidden"></p>
		</div>
		<div class="col-md-5">
			<input type="text" name="description" id="description" class="form-control" placeholder="Tu descripción esta aquí" required>
			<p class="error-description text-center alert alert-danger hidden"></p>
		</div>
		<div class="col-md-2">
			<button class="btn btn-warning" type="submit" id="add">
				<span class="glyphicon glyphicon-plus">Agregar</span>
			</button>
		</div>
	</div>

	<div class="row">
		<div class="table-responsive">
			<table class="table table-borderless" id="table ">
				<tr>
					<th>No.</th>
					<th>Title</th>
					<th>Descripción</th>
					<th>Acción</th>
				</tr>
				{{ csrf_field() }}

				<?php  $no =1;?>
				@foreach($blogs as $blog)
					<tr class="item{{$blog->id}}">
						<td>{{$no++}}</td>
						<td>{{$blog->title}}</td>
						<td>{{$blog->description}}</td>
						<td align="right">
							<button class="edit-modal btn btn-primary" data-id="{{$blog->id}}" data-title="{{$blog->title}}" data-description="{{$blog->description}}">
								<span class="glyphicon glyphicon-edit"></span> Editar
							</button>
							<button class="delete-modal btn btn-danger" data-id="{{$blog->id}}" data-title="{{$blog->title}}" data-description="{{$blog->description}}">
								<span class="glyphicon glyphicon-trash"></span> Eliminar
							</button>
						</td>
					</tr>
				@endforeach

			</table>
		</div>
	</div>

	<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">ID :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fid" disabled>
              </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-2" for="title">Titulo:</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" id="t">
              </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="description">Descripción:</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="d">
            </div>
          </div>
          </form>
            <div class="deleteContent">
            Estas seguro que lo vas a eliminar el <span class="title"></span> ?
            <span class="hidden id"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'> </span>
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Cerrar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop