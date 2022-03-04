 @if ($message = Session::get('success'))
     <div class="alert alert-success alert-dismissible fade show text-center text-capitalize" role="alert">
         <strong> {{ $message }} </strong>
         <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
 @endif
 @if ($message = Session::get('error'))
     <div class="alert alert-danger alert-dismissible fade show text-center text-capitalize" role="alert">
         <strong> {{ $message }} </strong>
         <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
 @endif
 @if ($message = Session::get('warning'))
     <div class="alert alert-warning alert-dismissible fade show text-center text-capitalize" role="alert">
         <strong> {{ $message }} </strong>
         <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
 @endif
 @if ($message = Session::get('info'))
     <div class="alert alert-info alert-dismissible fade show text-center text-capitalize" role="alert">
         <strong> {{ $message }} </strong>
         <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
 @endif
 @if ($errors->any())
     <div class="alert alert-danger alert-dismissible fade show text-center text-capitalize" role="alert">
         @foreach ($errors->all() as $error)
             <strong>{{ $error }}</strong><br>
         @endforeach
         {{-- <strong> Please check the form below for errors </strong> --}}
         <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
 @endif
