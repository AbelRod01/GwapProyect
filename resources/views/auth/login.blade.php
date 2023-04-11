<x-layouts.app title="login" meta-description="login page">


    <div class="container" style="height:90vh;" >
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-md-6">
            <h3 class="h3">Acceso de usuario</h3>
            <form method="POST" action="{{route('login.store')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">No compartiremos este correo con nadie mas.</small>
                    @error('email')
                    <small>{{$message}}</small>
                @enderror
                </div>
                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  @error('password')
                    <small>{{$message}}</small>
                @enderror
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="remember" name="remember">
                  <label class="form-check-label" for="remember">Recuerdame</label>
                </div>
                <button type="submit" class="btn btn-info">Login</button>
              </form>
          </div>
        </div>
      </div>



</x-layouts.app>
