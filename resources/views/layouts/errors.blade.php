<div class="container">
        @if(Session::has('failed'))
              <div class="alert alert-danger">
      
                {{ Session::get('failed') }}
              </div>
              @endif
      </div>