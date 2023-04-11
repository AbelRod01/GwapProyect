<x-layouts.app title="register" meta-description="register page">


    <div class="container" style="height:90vh;" >
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-md-6">
            <h3 class="h3">Registro de usuario</h3>
            <form method="POST" action="{{route('register.store')}}">
                @csrf
                <div class="form-group">
                  <label for="name">name</label>
                  <input autofocus type="text" class="form-control" id="name" name="name" >
                  <small id="emailHelp" class="form-text text-muted">No compartiremos este correo con nadie mas.</small>
                    @error('name')
                    <small>{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <small id="emailHelp" class="form-text text-muted">No compartiremos este correo con nadie mas.</small>
                @error('email')
                    <small>{{$message}}</small>
                @enderror
                </div>
                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" class="form-control" id="password" name="password">
                  @error('password')
                    <small>{{$message}}</small>
                @enderror
                </div>
                <div class="form-group">
                    <label for="passwordConfirm">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                  </div>
                <button type="submit" class="btn btn-info">Register</button>
              </form>
          </div>
        </div>
      </div>



</x-layouts.app>
