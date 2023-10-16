<!-- resources/views/layouts/app.blade.php -->
 
<html>
    <head>
    @yield('title')
    @yield('meta')
    <!-- Favicon -->
    <link rel="SHORTCUT ICON" href="" type="image/x-icon" />
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('eshopper-1.0.0/eshopper-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-end/products/discount.css') }}">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('eshopper-1.0.0/eshopper-1.0.0/css/style.css')}}" rel="stylesheet">
   @yield('css')    
</head>
    <body>
        
<style>.float-contact {
    position: fixed;
    bottom: 80px;
    right: 30px;
    z-index: 99999;
    }
    .chat-zalo, .chat-face, .float-contact .hotline{
    background:rgb(15, 100, 191);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    /* padding: 18px; */
    color: white;
    display: block;
    
    margin-bottom: 6px;
    }
  
    .chat-zalo a, .chat-face a, .hotline a {
    font-size: 15px;
    color: white;
    font-weight: 400;
    text-transform: none;
    line-height: 0;
    }
   .float-contact .chat-zalo:hover, .float-contact .chat-face:hover, .float-contact .hotline:hover{
    /* box-shadow: -3px 2px 2px 1px #121111; */
    cursor: pointer;
    }
    @media (max-width: 549px){
    .float-contact{
    /* display:none */
    }
    }</style>
        @include('front-end.component.header')
     
        @yield('content')
        <div class="float-contact">
            <button class="chat-zalo">
            <a href="http://zalo.me/08.2992.3636">
                Zalo
                {{-- <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.1 436.6" width="40" height="40"><style>.st0{fill:#fdfefe}.st1{fill:#0180c7}.st2{fill:#0172b1}.st3{fill:none;stroke:#0180c7;stroke-width:2;stroke-miterlimit:10}</style><title>logo-zalo-vector</title><path class="st0" d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z"/><path class="st1" d="M139.5 436.2c-27.3 0-54.7.9-82-.1-32.3-1.3-57-28.4-57-60.7 0-104.3.2-208.6 0-313C.5 26.7 28.4 1.8 60.5.9c33.6-.9 67.3-.2 101-.2.6 0 1.4-.3 1.7.7-.2 1.8-2 2-3.1 2.7-19.8 11.6-37.9 25.5-53.1 42.7-25.1 28.4-42.5 61-48.4 98.9-10.4 66.9 10.5 123.7 57.8 171.1 8.4 8.5 9.5 15.1 2.8 26.5-8.1 13.7-20.4 23-33.5 31.5-1.4.8-2.8 1.8-4.2 2.7-2.1 1.8-.8 2.7 1 3.5.4.9.9 1.7 1.5 2.5 11.5 10.2 22.4 21.1 33.7 31.5 5.3 4.9 10.6 10 15.7 15.1 2.1 1.9 5.6 2.5 6.1 6.1z"/><path class="st2" d="M139.5 436.2c-.5-3.5-4-4.1-6.1-6.2-5.1-5.2-10.4-10.2-15.7-15.1-11.3-10.4-22.2-21.3-33.7-31.5-.6-.8-1.1-1.6-1.5-2.5 25.5 5 50.4 1.6 74.9-5.9 8.3-2.5 16.6-5 25-7.1 5.7-1.5 11.7-1.2 17.2.8 63.4 21.8 126 19.8 187.6-7.2 25.1-11.1 48-26.7 67.4-46.2 1-1 1.7-2.5 3.5-2.6.9 1.4.4 2.9.4 4.4v58.5c.2 33.4-26.6 60.6-60 60.9h-.5c-36 .2-72 0-108 0H145.5c-2-.2-4-.3-6-.3z"/><path class="st1" d="M155.1 212.4c15.1 0 29.3-.1 43.4 0 7.9.1 12.2 3.4 13 9.7.9 7.9-3.7 13.2-12.3 13.3-16.2.2-32.3.1-48.5.1-4.7 0-9.3.2-14-.1-5.8-.3-11.5-1.5-14.3-7.5s-.8-11.4 3-16.3c15.4-19.6 30.9-39.3 46.4-58.9.9-1.2 1.8-2.4 2.7-3.5-1-1.7-2.4-.9-3.6-1-10.8-.1-21.7 0-32.5-.1-2.5 0-5-.3-7.4-.8-5.7-1.3-9.2-7-7.9-12.6.9-3.8 3.9-6.9 7.7-7.8 2.4-.6 4.9-.9 7.4-.9 17.8-.1 35.7-.1 53.5 0 3.2-.1 6.3.3 9.4 1.1 6.8 2.3 9.7 8.6 7 15.2-2.4 5.7-6.2 10.6-10 15.5-13.1 16.7-26.2 33.3-39.3 49.8-1.1 1.3-2.1 2.6-3.7 4.8z"/><path class="st1" d="M271.1 159.8c2.4-3.1 4.9-6 9-6.8 7.9-1.6 15.3 3.5 15.4 11.5.3 20 .2 40 0 60 0 5.2-3.4 9.8-8.3 11.3-5 1.9-10.7.4-14-3.9-1.7-2.1-2.4-2.5-4.8-.6-9.1 7.4-19.4 8.7-30.5 5.1-17.8-5.8-25.1-19.7-27.1-36.6-2.1-18.3 4-33.9 20.4-43.5 13.6-8.1 27.4-7.4 39.9 3.5zm-35.4 36.5c.2 4.4 1.6 8.6 4.2 12.1 5.4 7.2 15.7 8.7 23 3.3 1.2-.9 2.3-2 3.3-3.3 5.6-7.6 5.6-20.1 0-27.7-2.8-3.9-7.2-6.2-11.9-6.3-11-.7-18.7 7.8-18.6 21.9zM340.4 196.9c-.8-25.7 16.1-44.9 40.1-45.6 25.5-.8 44.1 16.3 44.9 41.3.8 25.3-14.7 43.2-38.6 45.6-26.1 2.6-46.8-16.3-46.4-41.3zm25.1-2.4c-.2 5 1.3 9.9 4.3 14 5.5 7.2 15.8 8.6 23 3 1.1-.8 2-1.8 2.9-2.8 5.8-7.6 5.8-20.4.1-28-2.8-3.8-7.2-6.2-11.9-6.3-10.8-.6-18.4 7.6-18.4 20.1zM331.6 177c0 15.5.1 31 0 46.5.1 7.1-5.5 13-12.6 13.2-1.2 0-2.5-.1-3.7-.4-5-1.3-8.8-6.6-8.8-12.9v-79.5c0-4.7-.1-9.3 0-14 .1-7.7 5-12.7 12.4-12.7 7.6-.1 12.7 4.9 12.7 12.9.1 15.6 0 31.3 0 46.9z"/><path class="st0" d="M235.7 196.3c-.1-14.1 7.6-22.6 18.5-22 4.7.2 9.1 2.5 11.9 6.4 5.6 7.5 5.6 20.1 0 27.7-5.4 7.2-15.7 8.7-23 3.3-1.2-.9-2.3-2-3.3-3.3-2.5-3.5-3.9-7.7-4.1-12.1zM365.5 194.5c0-12.4 7.6-20.7 18.4-20.1 4.7.1 9.1 2.5 11.9 6.3 5.7 7.6 5.7 20.5-.1 28-5.6 7.1-16 8.3-23.1 2.7-1.1-.8-2-1.8-2.8-2.9-3-4.1-4.4-9-4.3-14z"/><path class="st3" d="M66 1h328.1c35.9 0 65 29.1 65 65v303c0 35.9-29.1 65-65 65H66c-35.9 0-65-29.1-65-65V66C1 30.1 30.1 1 66 1z"/></svg> --}}
            </a>
            </button>
            <button class="chat-face">
            <a href="https://www.facebook.com/profile.php?id=100079100306100&mibextid=LQQJ4d">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256.55 8C116.52 8 8 110.34 8 248.57c0 72.3 29.71 134.78 78.07 177.94 8.35 7.51 6.63 11.86 8.05 58.23A19.92 19.92 0 0 0 122 502.31c52.91-23.3 53.59-25.14 62.56-22.7C337.85 521.8 504 423.7 504 248.57 504 110.34 396.59 8 256.55 8zm149.24 185.13l-73 115.57a37.37 37.37 0 0 1-53.91 9.93l-58.08-43.47a15 15 0 0 0-18 0l-78.37 59.44c-10.46 7.93-24.16-4.6-17.11-15.67l73-115.57a37.36 37.36 0 0 1 53.91-9.93l58.06 43.46a15 15 0 0 0 18 0l78.41-59.38c10.44-7.98 24.14 4.54 17.09 15.62z"/></svg> --}}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800"><radialGradient id="a" cx="101.9" cy="809" r="1.1" gradientTransform="matrix(800 0 0 -800 -81386 648000)" gradientUnits="userSpaceOnUse"><stop offset="0" style="stop-color:#09f"/><stop offset=".6" style="stop-color:#a033ff"/><stop offset=".9" style="stop-color:#ff5280"/><stop offset="1" style="stop-color:#ff7061"/></radialGradient><path fill="url(#a)" d="M400 0C174.7 0 0 165.1 0 388c0 116.6 47.8 217.4 125.6 287 6.5 5.8 10.5 14 10.7 22.8l2.2 71.2a32 32 0 0 0 44.9 28.3l79.4-35c6.7-3 14.3-3.5 21.4-1.6 36.5 10 75.3 15.4 115.8 15.4 225.3 0 400-165.1 400-388S625.3 0 400 0z"/><path fill="#FFF" d="m159.8 501.5 117.5-186.4a60 60 0 0 1 86.8-16l93.5 70.1a24 24 0 0 0 28.9-.1l126.2-95.8c16.8-12.8 38.8 7.4 27.6 25.3L522.7 484.9a60 60 0 0 1-86.8 16l-93.5-70.1a24 24 0 0 0-28.9.1l-126.2 95.8c-16.8 12.8-38.8-7.3-27.5-25.2z"/>
                </svg>                
            </a>
            </button>
            <button class="hotline">
            <a href="tel:0848.556.236">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#77B3D4;}
	.st1{opacity:0.2;}
	.st2{fill:#231F20;}
	.st3{fill:#FFFFFF;}
</style>
<g id="Layer_1">
	<g>
		<circle class="st0" cx="32" cy="32" r="32"/>
	</g>
	<g class="st1">
		<g>
			<path class="st2" d="M29,25.3c-0.4-4.8-5.4-7.1-5.6-7.2C23.1,18,22.9,18,22.7,18c-5.8,1-6.6,4.3-6.7,4.5c0,0.2,0,0.4,0,0.6
				c6.9,21.4,21.2,25.3,25.9,26.6c0.4,0.1,0.7,0.2,0.9,0.3c0.1,0,0.2,0.1,0.3,0.1c0.2,0,0.3,0,0.5-0.1c0.1-0.1,3.5-1.7,4.4-6.9
				c0-0.2,0-0.5-0.1-0.7c-0.1-0.1-1.9-3.5-6.8-4.7c-0.3-0.1-0.7,0-1,0.2c-1.6,1.3-3.7,2.7-4.6,2.9c-6.2-3-9.7-8.9-9.8-10
				c-0.1-0.6,1.3-2.8,3-4.6C28.9,26,29,25.6,29,25.3z"/>
		</g>
	</g>
	<g>
		<g>
			<path class="st3" d="M29,23.3c-0.4-4.8-5.4-7.1-5.6-7.2C23.1,16,22.9,16,22.7,16c-5.8,1-6.6,4.3-6.7,4.5c0,0.2,0,0.4,0,0.6
				c6.9,21.4,21.2,25.3,25.9,26.6c0.4,0.1,0.7,0.2,0.9,0.3c0.1,0,0.2,0.1,0.3,0.1c0.2,0,0.3,0,0.5-0.1c0.1-0.1,3.5-1.7,4.4-6.9
				c0-0.2,0-0.5-0.1-0.7c-0.1-0.1-1.9-3.5-6.8-4.7c-0.3-0.1-0.7,0-1,0.2c-1.6,1.3-3.7,2.7-4.6,2.9c-6.2-3-9.7-8.9-9.8-10
				c-0.1-0.6,1.3-2.8,3-4.6C28.9,24,29,23.6,29,23.3z"/>
		</g>
	</g>
</g>
<g id="Layer_2">
</g>
</svg>
            </a>
            </button>
            </div>
            
        @include('front-end.component.footer')
        {{-- button share Facebook start--}}
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0" nonce="OGsIatgX"></script>
        {{-- button share Facebook end--}}
        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('eshopper-1.0.0/eshopper-1.0.0/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('eshopper-1.0.0/eshopper-1.0.0/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <!-- Contact Javascript File -->
        <script src="{{ asset('eshopper-1.0.0/eshopper-1.0.0/mail/jqBootstrapValidation.min.js') }}"></script>
        <script src="{{ asset('eshopper-1.0.0/eshopper-1.0.0/mail/contact.js') }}"></script>
        <!-- Template Javascript -->
        <script src="{{ asset('eshopper-1.0.0/eshopper-1.0.0/js/main.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
        <script>
           $(document).ready(function(){
    $('.btn').on('click', function () {
        $('#navbar-vertical').collapse('toggle');
    });
});

        </script>

    </body>
</html>