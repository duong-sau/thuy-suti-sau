 <div class="row" style="width: 300px">
              @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{ $err }}
                    @endforeach
                </div>
        @endif
         @if(Session::has('flag'))
                <div class="alert alert-{{ Session::get('flag') }}">
                    {{ Session::get('tb') }}
                </div>
                @endif
        </div>