<div class="with_sidebar" id="active_admin_content">
	<div id="main_content_wrapper">
		<div id="main_content">
			<div class="paginated_collection">
				<div class="paginated_collection_contents">
					<div class="index_content">
						<div class="index_as_table">
							<table class="index_table" border="0" cellspacing="0" id="customers" cellpadding="0">
								<thead>
									<tr>
										@foreach ($columns as $column)
										<th class="sortable 
											@if($column->key==$sort_options["column_order"])
												{{"sorted-".$sort_options["sort_direction"]}}
											@endif
										" ><a href="{{ $request_uri }}&order=
												{{$column->key}}_{{$sort_options["sort_invert"]}}
										">{{ $column->title }}</a></th>
										@endforeach
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach ( $models->results as  $key => $model)
										
									<tr class="@if( ($key % 2)==1 ) {{"even"}} @else {{"odd"}} @endif" >
										@foreach ($columns as $column)
										<?php $key= $column->key ?>
										<td>{{ $model->$key }} </td>
										@endforeach
										<td>
											<a href="{{ "/lara_admin/models/$modelName/$model->id/edit"}}">Edit</a>
											<a href="{{ "/lara_admin/models/$modelName/$model->id"}}">Show</a>
											<form  class="form_delete" method="post" action="{{ '/lara_admin/models/'.$modelName.'/'. $model->id. '/delete' }}">
												<button type="submit" onClick="return confirm('{{$model->confirmationDeleteText}}')">delete</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div id="index_footer">
					{{$models->links()}}
					<div class="pagination_information">{{$modelName}}s  <b>{{$models->total}}</b> en total</div>
					<div class="download_links">Download:&nbsp;	
					   <a href="{{ $request_uri }}&format=csv" target="self">CSV</a>&nbsp;
						<a href="{{ $request_uri  }}&format=xml" target="self">XML</a>&nbsp;
						<a href="{{ $request_uri  }}&format=json" target="self">JSON</a>&nbsp;

					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="sidebar">
		<div class="panel sidebar_section" id="filters_sidebar_section">
			<h3>Filters</h3>
			<div class="panel_contents">
				<form accept-charset="UTF-8" action="/lara_admin/models/{{$modelName}}" class="filter_form" id="q_search" method="GET">
					<div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>


					@if( isset($modelInstance) )
						@foreach( $modelInstance->edit as $id => $options )
						<div>
							<?php 
								if ( Input::get( $modelName ) !=null ) {
									$name= InputFactory::getName($id, $options);
									$oldInput= Input::get( $modelName );
									$modelInstance->$name=  $oldInput[$name];
								}
							?>

						  <?php $input= InputFactory::build($id, $options, $modelName, $modelInstance); ?>
						  {{$input["label"]}}
						  {{$input["input"]}}
						</div>
						@endforeach
					@endif




					<div class="filter_form_field filter_date_range">
						<input  name="search" type="hidden" value="search" />
					
						<label class=" label" for="q_created_at_gte">Created At
						</label>
						<input class="datetime" id="q_created_at_gte" max="10" name="created_at_gte" size="12" type="text" value="{{ Input::get("created_at_gte") }}" />
						<span class="seperator">-</span>
						<input class="datetime" id="q_created_at_lte" max="10" name="created_at_lte" size="12" type="text" value="{{ Input::get("created_at_lte") }}" /></div><div class="buttons">
						<input id="q_submit" name="commit" type="submit" value="Filter" />
						<input type="reset"  value="Clear Filters" />
						<input id="order" name="order" type="hidden" value="{{$sort_options["column_order"]}}_{{$sort_options["sort_direction"]}}" />
						<input id="scope" name="scope" type="hidden" /></div>
					</form></div>
				</div>


				<div class="panel sidebar_section" id="active admin">
					<h3>Blank Block</h3>

					<div class="panel_contents">

					</div>
				</div>

			</div>
		</div>