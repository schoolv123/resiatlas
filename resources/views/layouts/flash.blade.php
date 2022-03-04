 {{-- js ajax alert and model --}}
 <div class="alert alert-success alert-dismissible fade text-center text-capitalize js-alert" role="alert"
     style="position:fixed; width: 500px; top:20%; left: 41%; z-index: 1; visibility: hidden;">
     <strong id="jsAlertMsg"> Some text </strong>
     <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
 </div>
 <div class="modal fade" id="jsConfirmModel" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="delete-modal-body text-center mt-3">
                 <p>Are you sure to delete this?</p>
             </div>

             <div class="modal-footer delete-modal-footer d-flex align-items-center justify-content-center">
                 {{-- <form action="{{url('/channel-integration')}}"> 
                        <input class="btn btn-default btnadd" type="submit" name="" id="" value="Yes"> 
                    </form> --}}
                 <button class="btn btn-danger btnadd" type="button" id="jsconfirm"> Yes </button>
                 <button class="btn btn-primary btnadd" data-dismiss="modal">No</button>
             </div>
         </div>
     </div>
 </div>

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
