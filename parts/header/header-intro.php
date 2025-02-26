<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Purerelax | Spa & Beauty PHP Template | Intro Page</title>
<!-- Stylesheets -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
<link href="css/style.css" rel="stylesheet">
<link href="intro/intro.css" rel="stylesheet">
<script src="js/jquery.js"></script> 

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->



<!-- REVOLUTION STYLE SHEETS -->
<link rel="stylesheet" type="text/css" href="intro/rev/css/rs6.css">
<!-- REVOLUTION LAYERS STYLES -->
			<!-- REVOLUTION JS FILES -->

<script>
	window.RS_MODULES = window.RS_MODULES || {};
	window.RS_MODULES.modules = window.RS_MODULES.modules || {};
	window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
	window.RS_MODULES.defered = true;
	window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
	window.RS_MODULES.type = 'compiled';
</script>
<script src="intro/rev/js/rbtools.min.js"></script>
<script src="intro/rev/js/rs6.min.js"></script>
				
<script>
	function setREVStartSize(e){
		//window.requestAnimationFrame(function() {
		window.RSIW = window.RSIW===undefined ? window.innerWidth : window.RSIW;
		window.RSIH = window.RSIH===undefined ? window.innerHeight : window.RSIH;
		try {
			var pw = document.getElementById(e.c).parentNode.offsetWidth,
				newh;
			pw = pw===0 || isNaN(pw) ? window.RSIW : pw;
			e.tabw = e.tabw===undefined ? 0 : parseInt(e.tabw);
			e.thumbw = e.thumbw===undefined ? 0 : parseInt(e.thumbw);
			e.tabh = e.tabh===undefined ? 0 : parseInt(e.tabh);
			e.thumbh = e.thumbh===undefined ? 0 : parseInt(e.thumbh);
			e.tabhide = e.tabhide===undefined ? 0 : parseInt(e.tabhide);
			e.thumbhide = e.thumbhide===undefined ? 0 : parseInt(e.thumbhide);
			e.mh = e.mh===undefined || e.mh=="" || e.mh==="auto" ? 0 : parseInt(e.mh,0);
			if(e.layout==="fullscreen" || e.l==="fullscreen")
				newh = Math.max(e.mh,window.RSIH);
			else{
				e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
				for (var i in e.rl) if (e.gw[i]===undefined || e.gw[i]===0) e.gw[i] = e.gw[i-1];
				e.gh = e.el===undefined || e.el==="" || (Array.isArray(e.el) && e.el.length==0)? e.gh : e.el;
				e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
				for (var i in e.rl) if (e.gh[i]===undefined || e.gh[i]===0) e.gh[i] = e.gh[i-1];
									
				var nl = new Array(e.rl.length),
					ix = 0,
					sl;
				e.tabw = e.tabhide>=pw ? 0 : e.tabw;
				e.thumbw = e.thumbhide>=pw ? 0 : e.thumbw;
				e.tabh = e.tabhide>=pw ? 0 : e.tabh;
				e.thumbh = e.thumbhide>=pw ? 0 : e.thumbh;
				for (var i in e.rl) nl[i] = e.rl[i]<window.RSIW ? 0 : e.rl[i];
				sl = nl[0];
				for (var i in nl) if (sl>nl[i] && nl[i]>0) { sl = nl[i]; ix=i;}
				var m = pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1 : (pw-(e.tabw+e.thumbw)) / (e.gw[ix]);
				newh =  (e.gh[ix] * m) + (e.tabh + e.thumbh);
			}
			var el = document.getElementById(e.c);
			if (el!==null && el) el.style.height = newh+"px";
			el = document.getElementById(e.c+"_wrapper");
			if (el!==null && el) {
				el.style.height = newh+"px";
				el.style.display = "block";
			}
		} catch(e){
			console.log("Failure at Presize of Slider:" + e)
		}
		//});
	};
</script>

<style type="text/css">
.demo-single .layout-buttons {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    flex-wrap: wrap;
    align-items: end;
    justify-content: center;
    height: 100%;
    width: 100%;
    background-color: rgba(255,255,255,.1);
    transition: .3s ease;
    opacity: 0;
    visibility: hidden;
}
.demo-single:hover .layout-buttons {
    opacity: 1;
    visibility: visible;
    background-color: rgba(0,0,0,.35);
}
.demo-single .layout-buttons .link-btn {
    display: inline-flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    border-width: 1px;
    border-image: initial;
    transition: all 0.3s ease-in-out 0s;
    margin-left: -5px;
    color: #111;
    background-color: #fff;
    padding: 7px 20px;
    border-radius: 5px;
}
.demo-single .layout-buttons .link-btn:hover {
    color: var(--text-color-bg-theme-color2);
    background-color: var(--theme-color2);
}
.demo-single .layout-buttons .link-btn {
    border-radius: 5px 0 0 5px;
}
.demo-single .layout-buttons .link-btn:nth-child(2) {
    border-radius: 0;
}
.demo-single .layout-buttons .link-btn:nth-child(3) {
    border-radius: 0;
}
.demo-single .layout-buttons .link-btn:last-child {
    border-radius: 0 5px 5px 0;
}
.demo-single .layout-buttons .btn-block .link-btn:last-child {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}
.demo-single .layout-buttons .btn-block .link-btn:first-child {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}
.demo-single .layout-buttons .btn-block {
    margin-bottom: 20px;
}
.demo-single .layout-buttons .btn-block1,
.demo-single .layout-buttons .btn-block2 {
	width: 100%;
}
.featured-demos {
	background-color: #1D1C21;
	color: #fff;
}
.featured-demos .content h4, .featured-demos .content h4 a {
	color: #fff;
}
.featured-demos .sec-title span, 
.featured-demos .sec-title h2{
	color: #fff;
}
.btn-style-one{
	z-index: 0;
}
.btn-style-one:before{
	z-index: -1;
}
</style>
</head>

<body>
<div class="page-wrapper">
  <!-- Preloader -->
	<div class="preloader"></div>

	<!-- intro-head Section -->
	<section class="intro-head">
		<!-- START Intro Hero Slider REVOLUTION SLIDER 6.5.15 --><p class="rs-p-wp-fix"></p>
		<rs-module-wrap id="rev_slider_1_1_wrapper" data-alias="Intro-Hero-Slider" data-source="gallery" style="visibility:hidden;background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
			<rs-module id="rev_slider_1_1" style="" data-version="6.5.15">
				<rs-slides>
					<rs-slide style="position: absolute;" data-key="rs-1" data-title="Slide" data-in="o:0;" data-out="a:false;">
						<img src="intro/assets/transparent.png" alt="Slide" class="rev-slidebg tp-rs-img" data-bg="c:#141414;" data-parallax="off" data-no-retina>
						<rs-layer
							id="slider-1-slide-1-layer-0" 
							data-type="image"
							data-bsh="c:#161616;b:50px,41px,31px,19px;"
							data-rsp_ch="on"
							data-xy="x:r;xo:652px,538px,408px,251px;y:b;yo:-146px,-120px,-91px,-56px;"
							data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
							data-dim="w:300px,247px,187px,115px;h:300px,247px,187px,115px;"
							data-basealign="slide"
							data-frame_0="x:50,41,31,19;"
							data-frame_1="st:2090;sp:1000;sR:2090;"
							data-frame_999="o:0;st:w;sR:5910;"
							style="z-index:10;"
						><img src="intro/banner-images/intro7.jpg" alt="" class="tp-rs-img" width="500" height="500" data-no-retina>
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-1" 
							data-type="image"
							data-bsh="c:#161616;b:50px,41px,31px,19px;"
							data-rsp_ch="on"
							data-xy="x:r;xo:651px,537px,407px,251px;y:b;yo:175px,144px,109px,67px;"
							data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
							data-dim="w:300px,247px,187px,115px;h:300px,247px,187px,115px;"
							data-basealign="slide"
							data-frame_0="x:50,41,31,19;"
							data-frame_1="st:2570;sp:1000;sR:2570;"
							data-frame_999="o:0;st:w;sR:5430;"
							style="z-index:9;"
						><img src="intro/banner-images/intro6.jpg" alt="" class="tp-rs-img" width="500" height="500" data-no-retina>
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-2" 
							data-type="text"
							data-rsp_ch="on"
							data-xy="xo:0,20px,30px,18px;y:m;yo:-50px,-41px,-31px,-19px;"
							data-text="w:normal;s:70,57,43,28;l:90,74,56,36;fw:700;"
							data-dim="w:645px,532px,404px,249px;"
							data-frame_0="y:-50,-41,-31,-19;"
							data-frame_1="st:540;sp:1000;sR:540;"
							data-frame_999="o:0;st:w;sR:7460;"
							style="z-index:17;"
						>Trendy & Powerful  <br />HTML Template
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-3" 
							data-type="image"
							data-rsp_ch="on"
							data-xy="xo:5px,4px,3px,1px;yo:30px,24px,18px,11px;"
							data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
							data-dim="w:140px,99px,75px,46px;h:auto,auto,auto,auto;"
							data-frame_1="e:power4.inOut;st:670;sp:1200;sR:670;"
							data-frame_1_sfx="se:blocktobottom;"
							data-frame_999="o:0;st:w;sR:7130;"
							style="z-index:20;"
						><img src="intro/assets/logo-wide-white.png" alt="" class="tp-rs-img" width="140" height="35" data-no-retina>
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-4" 
							data-type="text"
							data-rsp_ch="on"
							data-xy="xo:0,30px,40px,24px;y:m;yo:169px,129px,105px,64px;"
							data-text="w:normal;s:20,16,12,7;l:25,20,15,9;"
							data-frame_0="y:-50,-41,-31,-19;"
							data-frame_1="st:1270;sp:1000;sR:1270;"
							data-frame_999="o:0;st:w;sR:6730;"
							style="z-index:16;"
						><a href="https://1.envato.market/Gm7YPB" class="theme-btn btn-style-one text-white" target="_blank">Purchase Now</a>
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-5" 
							data-type="image"
							data-bsh="c:#161616;b:50px,41px,31px,19px;"
							data-rsp_ch="on"
							data-xy="x:r;xo:329px,271px,205px,126px;y:b;yo:214px,176px,133px,82px;"
							data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
							data-dim="w:300px,247px,187px,115px;h:300px,247px,187px,115px;"
							data-basealign="slide"
							data-frame_0="x:50,41,31,19;"
							data-frame_1="st:770;sp:1000;sR:770;"
							data-frame_999="o:0;st:w;sR:7230;"
							style="z-index:13;"
						><img src="intro/banner-images/intro3.jpg" alt="" class="tp-rs-img" width="500" height="500" data-no-retina> 
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-6" 
							data-type="image"
							data-bsh="c:#161616;b:50px,41px,31px,19px;"
							data-rsp_ch="on"
							data-xy="x:r;xo:329px,271px,205px,126px;y:b;yo:-112px,-92px,-69px,-42px;"
							data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
							data-dim="w:300px,247px,187px,115px;h:300px,247px,187px,115px;"
							data-basealign="slide"
							data-frame_0="x:50,41,31,19;"
							data-frame_1="st:410;sp:1000;sR:410;"
							data-frame_999="o:0;st:w;sR:7590;"
							style="z-index:14;"
						><img src="intro/banner-images/intro5.jpg" alt="" class="tp-rs-img" width="500" height="500" data-no-retina> 
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-7" 
							data-type="image"
							data-bsh="c:#161616;b:50px,41px,31px,19px;"
							data-rsp_ch="on"
							data-xy="x:r;xo:5px,4px,3px,1px;y:b;"
							data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
							data-dim="w:300px,247px,187px,115px;h:300px,247px,187px,115px;"
							data-basealign="slide"
							data-frame_0="x:50,41,31,19;"
							data-frame_1="sp:1000;"
							data-frame_999="o:0;st:w;sR:8000;"
							style="z-index:15;"
						><img src="intro/banner-images/intro4.jpg" alt="" class="tp-rs-img" width="500" height="500" data-no-retina> 
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-8" 
							data-type="image"
							data-bsh="c:#161616;b:50px,41px,31px,19px;"
							data-rsp_ch="on"
							data-xy="x:r;xo:5px,4px,3px,1px;y:b;yo:325px,268px,203px,125px;"
							data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
							data-dim="w:300px,247px,187px,115px;h:300px,247px,187px,115px;"
							data-basealign="slide"
							data-frame_0="x:50,41,31,19;"
							data-frame_1="st:1090;sp:1000;sR:1090;"
							data-frame_999="o:0;st:w;sR:6910;"
							style="z-index:12;"
						><img src="intro/banner-images/intro2.jpg" alt="" class="tp-rs-img" width="500" height="500" data-no-retina> 
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-9" 
							data-type="image"
							data-bsh="c:#161616;b:50px,41px,31px,19px;"
							data-rsp_ch="on"
							data-xy="x:r;xo:329px,271px,205px,126px;y:b;yo:539px,445px,338px,208px;"
							data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
							data-dim="w:300px,247px,187px,115px;h:300px,247px,187px,115px;"
							data-basealign="slide"
							data-frame_0="x:50,41,31,19;"
							data-frame_1="st:1570;sp:1000;sR:1570;"
							data-frame_999="o:0;st:w;sR:6430;"
							style="z-index:11;"
						><img src="intro/banner-images/intro1.jpg" alt="" class="tp-rs-img" width="500" height="500" data-no-retina> 
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-12" 
							data-type="image"
							data-rsp_ch="on"
							data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
							data-dim="w:['100%','100%','100%','100%'];h:['100%','100%','100%','100%'];"
							data-basealign="slide"
							data-btrans="o:0.07;"
							data-frame_999="o:0;st:w;sR:8700;"
							style="z-index:8;"
						><img src="intro/assets/header-bg-1.png" alt="" class="tp-rs-img" width="1894" height="840" data-c="cover-proportional" data-no-retina> 
						</rs-layer>
						<rs-layer
							id="slider-1-slide-1-layer-13" 
							class="rs-pxl-2"
							data-type="image"
							data-rsp_ch="on"
							data-xy="x:c;xo:-338px,-302px,-211px,-130px;y:m;yo:229px,171px,173px,106px;"
							data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
							data-dim="w:153px,126px,95px,58px;h:39px,32px,24px,14px;"
							data-frame_0="x:50,41,31,19;"
							data-frame_1="st:2380;sp:1000;sR:2380;"
							data-frame_999="o:0;st:w;sR:5620;"
							style="z-index:18;"
						><img src="intro/assets/slider-arrow.png" alt="" class="tp-rs-img" width="250" height="63" data-no-retina> 
						</rs-layer>
					</rs-slide>
				</rs-slides>
			</rs-module>
			<script>
				
			</script>
			<script>
				if(typeof revslider_showDoubleJqueryError === "undefined") {function revslider_showDoubleJqueryError(sliderID) {console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion.");console.log("To fix this, you can:");console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on");console.log("2. Find the double jQuery.js inclusion and remove it");return "Double Included jQuery Library";}}
			</script>
		</rs-module-wrap>
		<!-- END REVOLUTION SLIDER -->

		<script>
			var	tpj = jQuery;
			if(window.RS_MODULES === undefined) window.RS_MODULES = {};
			if(RS_MODULES.modules === undefined) RS_MODULES.modules = {};
			RS_MODULES.modules["revslider11"] = {once: RS_MODULES.modules["revslider11"]!==undefined ? RS_MODULES.modules["revslider11"].once : undefined, init:function() {
				window.revapi1 = window.revapi1===undefined || window.revapi1===null || window.revapi1.length===0  ? document.getElementById("rev_slider_1_1") : window.revapi1;
				if(window.revapi1 === null || window.revapi1 === undefined || window.revapi1.length==0) { window.revapi1initTry = window.revapi1initTry ===undefined ? 0 : window.revapi1initTry+1; if (window.revapi1initTry<20) requestAnimationFrame(function() {RS_MODULES.modules["revslider11"].init()}); return;}
				window.revapi1 = jQuery(window.revapi1);
				if(window.revapi1.revolution==undefined){ revslider_showDoubleJqueryError("rev_slider_1_1"); return;}
				revapi1.revolutionInit({
					revapi:"revapi1",
					DPR:"dpr",
					sliderLayout:"fullwidth",
					visibilityLevels:"1240,1024,778,480",
					gridwidth:"1240,1024,778,480",
					gridheight:"900,768,960,720",
					perspective:600,
					perspectiveType:"global",
					editorheight:"900,768,960,720",
					responsiveLevels:"1240,1024,778,480",
					progressBar:{disableProgressBar:true},
					navigation: {
						onHoverStop:false
					},
					parallax: {
						levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,30],
						type:"scroll",
						origo:"slidercenter",
						speed:0
					},
					viewPort: {
						global:false,
						globalDist:"-200px",
						enable:false
					},
					fallbacks: {
						allowHTML5AutoPlayOnAndroid:true
					},
				});
				
			}} // End of RevInitScript
			if (window.RS_MODULES.checkMinimal!==undefined) { window.RS_MODULES.checkMinimal();};
		</script>
	</section>