 <div class="modal-body">
   <div id="main_content">
    <form accept-charset="UTF-8"  action= "/lara_admin/models/{{$modelName}}" class="formtastic customer" id="customer_new" method="post" novalidate="novalidate">
    <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" />
      <input name="authenticity_token" type="hidden" value="R4quagirY/6leP6UBwANOrbzGw0hWelIYlnt8vd8UXY=" />
    </div>


    <fieldset class="inputs">
      <ol>

        @foreach( $model->edit as $id => $options )
        <li class="string input required stringish" id="customer_username_input">
          <label class=" label" for="customer_username">  
            <?php $element_id= $id; ?>

            @if ( is_numeric( $id ) )
              {{$options}}
              <?php  $element_id= $options  ?>
            @else
            
            @if( isset( $options["title"] ) )
              {{ $options["title"] }}
            @else

            {{ $id }}
            @endif
            @endif   
            <abbr title="required">
              @if ( isset( $options["require"] ) && !is_numeric( $id ) &&  $options["require"]== true)
                *
              @endif
            </abbr>
          </label>

          <?php
          //TODO NEED HELPERS!!!
          if(!is_array($options)){
            $options=array();
          }
            $type= ( isset( $options["type"] )  ) ? $options["type"] : "text";
            $name=  $modelName."[".$element_id."]";

            $field_id= strtolower($modelName)."_".strtolower($element_id);
            $options = ( !is_numeric( $options ) )? array_merge($options, array("id"=> $field_id) ): array("id"=> $field_id);
          ?>
          @if($type=="checkbox")
             <input name="{{$name}}" type="hidden" value="0" />
             {{ Form::checkbox($name, 1 , false, $options) }}
             <span class="error"> {{ $model->first_error( strtolower($element_id) ) }} </span>
          @else
            {{Form::input( $type , $name, $model->$id , $options )  }}
             <span class="error"> {{ $model->first_error( strtolower($element_id) ) }} </span>
          @endif
        </li>
        @endforeach

      </ol>
    </fieldset>


    <fieldset class="buttons">
      <ol>
       <li class="commit button">
        <input class="create" id="customer_submit" name="commit" type="submit" value="Create" ></input>
      </li>
      <li class="cancel">
        <a href="/lara_admin/models/{{$modelName}}">Cancel</a>
      </li>
    </ol>
  </fieldset>
  </form>
</div>
</div>