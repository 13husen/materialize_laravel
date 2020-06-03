@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="padding:20px; margin-top:20px;">
                <div style="text-align:center; text-transform:uppercase;font-weight:500; letter-spacing:2">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class=" row">
                            <div class="input-field col s12">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                        </div>

                        <div class=" row">

                            <div class="input-field col s12">
                                <label for="email" >{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" row">
                            <div class="input-field col s12">
                                <label for="umur" >{{ __('Umur') }}</label>
                                <input id="umur" type="number" min="0" max="10000" name="umur"  required autocomplete="umur">
                            </div>
                        </div>                        


                        <div class=" row">
                            <div class="input-field col s12">
                                <label for="tanggal_lahir">{{ __('Tanggal Lahir') }}</label>
                                <input id="tanggal_lahir" type="text" class="datepicker"  name="tanggal_lahir"  required  autofocus>
                            </div>
                        </div>

                        <div class=" row">

                            <div class="input-field col s12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password" >{{ __('Password') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" row">

                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                            </div>
                        </div>
                        <div class="row">
                        <h5 style="font-weight:600;font-weight: 600;font-size: 17px;letter-spacing: 3px;">STATUS</h5>
                        <hr>
                        <p>
                        <label>
                            <input type="radio" value="pelajar" name="status" required class="filled-in"  />
                            <span>Pelajar</span>
                        </label>
                        </p>  
                        <p>
                        <label>
                            <input type="radio" value="pekerja" name="status" required class="filled-in"  />
                            <span>Pekerja</span>
                        </label>
                        </p>  
                        <p>
                        <label>
                            <input type="radio" value="pengusaha" name="status" required class="filled-in"  />
                            <span>Pengusaha</span>
                        </label>
                        </p>               
                        <p>
                        <label>
                            <input type="radio" value="penggiat-startup" name="status" required class="filled-in"  />
                            <span>Penggiat Startup</span>
                        </label>
                        </p>                                                             
                        </div>


                        <div class="row">
                        <h5 style="font-weight:600;font-weight: 600;font-size: 17px;letter-spacing: 3px;">JENIS PROGRAMMER</h5>
                        <hr>
                        <p>
                        <label>
                            <input type="checkbox" value="fullstack" name="jenis[]"  class="filled-in"  />
                            <span>Programmer Fullstack</span>
                        </label>
                        </p>  
                        <p>
                        <label>
                            <input type="checkbox" value="backend" name="jenis[]"  class="filled-in"  />
                            <span>Programmer Backend</span>
                        </label>
                        </p> 
                        <p>
                        <label>
                            <input type="checkbox" value="android" name="jenis[]"  class="filled-in"  />
                            <span>Programmer Android</span>
                        </label>
                        </p>                        
                        <p>
                        <label>
                            <input type="checkbox" value="ios" name="jenis[]"  class="filled-in"  />
                            <span>Programmer iOS</span>
                        </label>
                        </p>                                                   
                        </div>                        
                 

                        <div class=" row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function(){
    $('.datepicker').datepicker({
        format: "dd-mm-yyyy"
    });
  });
</script>
@endsection
