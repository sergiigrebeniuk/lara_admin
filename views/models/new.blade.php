 <div class="modal-body">
   <div id="main_content">
    <form accept-charset="UTF-8"  <?php  if(isset( $model->multipartFormData ) && $model->multipartFormData==true){?> enctype="multipart/form-data" <?php } ?> action= "/lara_admin/models/{{$modelName}}" class="formtastic customer" id="customer_new" method="post" novalidate="novalidate">
    <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" />
      <input name="authenticity_token" type="hidden" value="R4quagirY/6leP6UBwANOrbzGw0hWelIYlnt8vd8UXY=" />
    </div>


    <fieldset class="inputs">
      <ol>
        <?php $t= $model->saveData() ?>
        @foreach( $t as $id => $options )
        <li class="string input required stringish" id="customer_username_input">
         <?php $input= InputFactory::build($id, $options, $modelName, $model); ?>
         {{$input["label"]}}
         {{$input["input"]}}
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