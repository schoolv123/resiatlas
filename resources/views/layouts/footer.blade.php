 <footer class="main-footer text-center">
     <strong>Copyright © {{ date('Y') }}
         <a target="_blank" style="color:#212529" href="http://demo-centre.com/sm/resi-atlas/">
             Resi Atlas
         </a>.
     </strong>
     All rights reserved.
 </footer>
 </div>
 {{-- scroll to top --}}
 {{-- <div class="scrollto-top"><i class="fa fa-angle-up" aria-hidden="true"></i></div> --}}
 {{-- jQuery --}}
 <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
 {{-- Bootstrap 4 --}}
 <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 {{-- overlay scroll bar --}}
 <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"> </script>
 {{-- AdminLTE App --}}
 <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
 {{-- App script --}}
 <script src="{{ asset('assets/js/index.js') }}"></script>

 {{-- Custom script section --}}
 @yield('custom-scripts')
 </body>

 </html>
