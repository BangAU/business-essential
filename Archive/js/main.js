!function(e,t,o,a){var n=e(t),i=e(o);n.on("resize",function(){}),i.ready(function(){var a=!1;e(o).on("click touchstart",".flip",function(e){return a||(a=!0,setTimeout(function(){a=!1},100),this.class.toggle("hover")),!1}),e("img.head").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){e(this).removeClass("animated fadeInRight revealOnScroll"),e(".text h2").removeClass("animated fadeInLeft revealOnScroll"),e(".text h3").removeClass("animated fadeInLeft revealOnScroll")}),e(function(){function o(){var o=a.scrollTop(),n=1.1*a.height();e(".revealOnScroll:not(.animated)").each(function(){var a=e(this),i=a.offset().top;o+n>i&&(a.data("timeout")?t.setTimeout(function(){a.addClass("animated "+a.data("animation"))},parseInt(a.data("timeout"),10)):a.addClass("animated "+a.data("animation")))}),e(".revealOnScroll.animated").each(function(t){var a=e(this).offset().top;o+n<a&&e(this).removeClass("animated fadeInLeft fadeIn fadeInRight zoomIn")})}var a=e(t);a.height();Modernizr.touch&&e(".revealOnScroll").addClass("animated"),a.on("scroll",o),o()}),e("#fullpage").fullpage({anchors:["one","two","three","four","five","six","seven","eight","nine","keys"],interlockedSlides:!0,fadingEffect:!0,recordHistory:!1,scrollOverflow:!0,scrollOverflowReset:!1,autoScrolling:!1,scrollHorizontally:!0,scrollBar:!1,fitToSection:!1,licenseKey:"OPEN-SOURCE-GPLV3-LICENSE",afterLoad:function(o,a){console.log(a),e(t).width()>767&&("one"==a.anchor||a.index>=0)&&(fullpage_api.setAllowScrolling(!1),fullpage_api.setAutoScrolling(!0)),"keys"==a.anchor&&(console.log("ecc"),fullpage_api.setAllowScrolling(!1,"up"),fullpage_api.setAutoScrolling(!0)),e(t).width()<767&&(fullpage_api.setAllowScrolling(!0),fullpage_api.destroy("all"))}}),e(t).width()<767&&fullpage_api.destroy("all"),e("a.next-question").click(function(t){t.preventDefault();var o=e(this),a=e(this).siblings(".row").find("input[type='radio']:checked").val();console.log(e(this).siblings(".row").find("input[type='radio']:checked").val()),void 0===a?(e(this).addClass("animated shake"),setTimeout(function(){o.removeClass("animated shake")},1e3)):(fullpage_api.moveSectionDown(),e(this).removeClass("animated shake"))}),e(".section.question.nine a.next-question").click(function(t){t.preventDefault();var o=e(this),a=e(this).siblings(".row").find("input[type='radio']:checked").val();console.log(e(this).siblings(".row").find("input[type='radio']:checked").val()),void 0===a?(e(this).addClass("animated shake"),setTimeout(function(){o.removeClass("animated shake")},1e3)):(setTimeout(function(){e(".section.keys .key-quote").addClass("animated fadeIn")},500),fullpage_api.moveSectionDown(),e(this).removeClass("animated shake"))}),e("a.gotokey").click(function(t){setTimeout(function(){e(".section.keys .key-quote").addClass("animated fadeIn")},500)}),e("a.prev-question").click(function(e){e.preventDefault(),fullpage_api.moveSectionUp()}),e(".flip").click(function(t){t.preventDefault(),e(this).toggleClass("hover")}),e(".section .menu").click(function(t){console.log("click"),e(".section .menu input").change(function(){console.log(e(this)),e(this).is(":checked")?(console.log("click menu"),e("section .menu ul.mobMenu").toggleClass("active")):e("section .menu ul.mobMenu").removeClass("active")})}),e("body").click(function(t){"menu"!=t.target.id&&"show-mobile"!=t.target.id&&(e("section .menu ul").removeClass("active"),e("section .menu input").prop("checked",!1))}),e(".question_data").validate({rules:{}}),e(".submit a").click(function(o){if(o.preventDefault(),e("form.question_data").valid()){var a=e("form.question_data").serialize(),n=e("form.question_data").attr("action");return console.log(a),e("body").css("cursor","wait"),e("body").prepend("<span><img height='1' width='1' style='display:none;' alt='' src='https://dc.ads.linkedin.com/collect/?pid=492340&conversionId=519180&fmt=gif' /></span>"),e.ajax({type:"POST",url:n,data:a,success:function(o){e(".submit").fadeOut(),e(".registration .form").fadeOut("slow",function(){e(".message-success").fadeIn(500)}),console.log(o),o>=1&&o<=10&&(t.location.href="https://businessessential8.com.au/download-data.php?url=https://businessessential8.com.au/low-risk.report.pdf"),o>10&&o<=20&&(t.location.href="https://businessessential8.com.au/download-data.php?url=https://businessessential8.com.au/mid-risk.report.pdf"),o>20&&o<=32&&(t.location.href="https://businessessential8.com.au/download-data.php?url=https://businessessential8.com.au/high-risk.report.pdf"),e("body").css("cursor","auto")}}),!1}});var n=25/e(t).height(),i=25/e(t).width(),s=25/e(t).height(),l=25/e(t).width();e(".header").mousemove(function(o){var a=o.pageX-e(t).width()/2,c=o.pageY-e(t).height()/2,r=i*a*-1-0,d=n*c*-1-0,u=l*a*1-0,f=s*c*1-0;e(".head").css({transform:"translate("+r+"px,"+d+"px)"}),e(".text h2, .text h3").css({transform:"translate("+u+"px,"+f+"px)"})}),e(".mobMenu a, a.read-more, a.scroll-animation").click(function(){return e("html, body").stop().animate({scrollTop:e(e(this).attr("href")).offset().top},600),!1}),e(".scrollTop a").scrollTop()}),e(t).on("load",function(){})}(jQuery,window,document);