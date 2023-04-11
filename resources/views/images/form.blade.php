


    <div class="form-group">

      <input type="text" class="form-control" name="name" value="{{old('name',$postEdit->name)}}" >
      <small id="emailHelp" class="form-text text-muted">nombre de la imagen</small>
      @error('name')
          <small>{{$message}}</small>
      @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1"></label>
      <input type="file" class="form-control" name="imagen_id" accept="image/*"  >
      <small id="emailHelp" class="form-text text-muted">archivo</small>
      @error('imagen_id')
          <small>{{$message}}</small>
      @enderror
    </div>






