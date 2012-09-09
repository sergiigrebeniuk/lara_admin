<div class="panel sidebar_section span7" id="active admin">
	<h3>{{$modelName}}</h3>

	<div class="panel_contents">
		<div class="attributes_table"> 
			<table border="0" cellspacing="0" cellpadding="0" >
				<tbody>
					@foreach( $model->attributes as $label => $attribute )
					<tr>
						<th>{{$label}}</th>
						<td>{{ DataHelper::get($model, $label, "show") }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

<div id="title_bar">

      <span class="action_items">
		<a href="/lara_admin/models/{{$modelName}}/" class="btn">back</a>
      </span>
			

  </div>


</div>