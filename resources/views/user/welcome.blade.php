@php
$config = [
'appName' => config('app.name'),
'locale' => $locale = app()->getLocale(),
'locales' => config('app.locales'),
'githubAuth' => config('services.github.client_id'),
];
$polyfills = [
'Promise',
'Object.assign',
'Object.values',
'Array.prototype.find',
'Array.prototype.findIndex',
'Array.prototype.includes',
'String.prototype.includes',
'String.prototype.startsWith',
'String.prototype.endsWith',
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ config('app.name') }}</title>

        <!--link rel="stylesheet" href="{{ mix('css/app.css') }}"-->
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('user/css/blog-home.css') }}" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">        
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <script src="https://apis.google.com/js/api:client.js"></script>
        <script type="text/javascript">
            var _token = "{{ csrf_token() }}";
        </script>
    </head>
    <body>
        <div id="app"></div>
        <!-- Footer -->
<footer>
    <div class="clear"></div>
    <div class="footer">
    <div class="about-menu-div">
    <ul>
        <li><span>ABOUT</span></li>
        <li><span>HELP</span></li>
        <li><span>FOLLOW US</span></li>
        <li><span>MOBILE APPS</span></li>
        <li><span>CLOZETTE GROUP</span></li>
        <li><span>PARTNER SITES</span></li>

        <li><a>Corporate Information</a></li>
        <li><a href="mailto:hello@clozette.co">Contact Us</a></li>
        <li><a href="https://www.facebook.com/ClozetteIndonesia" target="_blank">Facebook</a></li>
        <li><a href="https://play.google.com/store/apps/details?id=co.clozette.shoppe" target="_blank">Clozette Shoppe</a></li>
        <li><a href="http://www.clozette.co" target="_blank">Clozette.co</a></li>
        <li><a href="http://femaledaily.com/" target="_blank">Female Daily</a></li>
        <li><a href="/info/company_news">Company News</a></li>
        <li><a href="/info/help">My Virtual Closet</a></li>
        <li><a href="https://twitter.com/clozetteid" target="_blank">Twitter</a></li>
        <li><a target="_blank"></a></li>
        <li><a href="http://id.clozette.com" target="_blank">Clozette Indonesia</a></li>
        <li><a href="http://mommiesdaily.com/" target="_blank">Mommies Daily</a></li>
        <li><a href="/info/terms">Terms of Use</a></li>
        <li><a href="/info/help">Account Settings</a></li>
        <li><a href="https://instagram.com/clozetteid" target="_blank">Instagram</a></li>
        <li><a target="_blank"></a></li>
        <li><a href="http://www.oshare.com.tw" target="_blank">O SHa'Re Taiwan</a></li>
        <li><a href="http://www.glamasia.com/" target="_blank">Glam Asia</a></li>
        <li><a href="/info/privacy">Privacy Policy</a></li>
        <li><a href="/info/help">Key Sections</a></li>
        <li><a href="https://www.youtube.com/user/clozetteid" target="_blank">YouTube</a></li>
        <li><a target="_blank"></a></li>
        <li><a href="http://clozette.glam.jp" target="_blank">Glam Clozette Japan</a></li>
        <li><a target="_BLANK" href="http://www35t.glam.com/jsadclick.act?8^2^a93ea9642e37e88feacbc45148728555^115174139528665382311^1646228586^0^/^888x10^204571623^25299855^-1^-1^-1^204571623^0^0^402865931883653^^^0^^SG^0^0^0^^SINGAPORE^5000^0^None^0^^@http://www.glam.com"><img src="http://indo.zettecdn.com/static/mood-glam.gif" width="110" height="16"></a></li>
        <li><a href="/info/copyright">Copyright</a></li>
     </ul>
            <!-- /.container -->
        <div class="clearfix">
            <a href="/"><img left src="//cimg-indo.clozette.co.id/static/clozetteIndo-logo-reverse.png" style="width:400px;"></a>
            <li><a target="_blank"></a></li>
        </div>
            <p style="text-align:right;margin-top:-10px;">Palma One Building, 10th Floor, Suite 1004 Jl. HR Rasuna Said Kav. X2 No. 4, Jakarta 12950, Indonesia</p>
		    <br/>
            <p style="float:right;margin-top:-37px;">Copyright © <!---->2016  Clozette Pte Ltd</p>
    </div>	 
</div>
        </footer>
        {{-- Global configuration object --}}
        <script>window.config = @json($config);</script>

        {{-- Polyfill JS features via polyfill.io --}}
        <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features={{ implode(',', $polyfills) }}"></script>

        {{-- Load the application scripts --}}
        @if (app()->isLocal())
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>        
        <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @else
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>        
        <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @endif
    </body>
</html>

<style>
*{margin:0}
.navbarSupportedContent{
    float: right;
}
.content {
            float:left;
            width:100%;
            background:#FFF;
            padding:2%; 
            min-height:400px;
}
.footer{
            grid-area: footer;
            width:100%;
            height:auto;
            padding:5px 10px;
            background:#000;
            color:#fff;
            font-weight: normal;
            font-size: 12px;
            font-family: "AvenirNext-Regular", sans-serif;
            border: 1px solid #FFF;
            position: center;
            left: 0px;
}
/* A link that has not been visited */
a {
    text-decoration: none;
    color: #ffffff;
    }
li {
    display: inline;
}
ul {
    display:grid;
    list-style-type:none;
    margin:0;padding:0;
    grid-template-columns: repeat(6, auto);
    grid-template-rows: repeat(5, auto);
}
img{ 
    width:150px;
    position: left;
}
a:active {
    text-decoration: underline;
}
</style>