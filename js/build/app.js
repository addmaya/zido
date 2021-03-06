function writeCookie(name, value, days) {
    var date, expires;
    
    if (days) {
        date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        expires = "; expires=" + date.toGMTString();
            }else{
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var i, c, ca, nameEQ = name + "=";
    ca = document.cookie.split(';');
    
    for(i=0;i < ca.length;i++) {
        c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1,c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length,c.length);
        }
    }
    return '';
}

jQuery(document).ready(function($) {
	
	//projects
	var p = parseInt(posts_per_page);
	function fetchProjects(){
		$('.o-collection').on('click', '.js-fetch-projects', function(e) {
			e.preventDefault();

			var m = $(this);
			var c = m.data('post-type');
			var k = $('.o-collection__list');
			var q = $('.js-append');
			var y = '';
			var i = $('.o-album').last().data('index');
			var z = m.data('query');
			var e = 0;
			var t = m.data('tag');
			var projectID = parseInt($('.o-album').last().data('id')) + 1;
			var projectsCount = 0;
			var projectsRemainder = 0;

			if(year){
				y = year;
			} else{
				y = 'all';
			}

			if(z == 'fetch'){
				i = 0;
				projectID = 0;
			}
		
			$.ajax({
	           url: ajaxURL,
	           data: {action: 'fetch_projects', offset: p, post_type: c, year: y, index: i, query: z, tag: t, project_id: projectID},
	           dataType: 'text',
	           beforeSend: function(){
	           	console.log('offset: '+p+' post_type: '+c+' year: '+y+' index: '+i+' query: '+z+' tag: '+t+' count:'+projectsCount);
	           		if(z == 'update'){
	           			m.addClass('is-loading');
	           			m.find('.u-super').html(' fetching');
	           		}
	           		else{
	           			m.addClass('is-loading');
	           			k.addClass('s--empty');
	           			k.html('<a class="o-button is-loading s--big"><span>Smile :) </span></a>');
	           		}
	           },
	           success: function(data){
	           		if(z == 'update'){
	           			m.removeClass('is-loading');
		           		if(data != '0'){
		           			$('.o-collection__list').append(data);
		           			loadImages($('.is-appended .js-lazy'));
		           			
		           			e = parseInt($('.o-album').last().data('id'));
		           			projectsCount = parseInt($('.o-album').last().data('count'));
		           			projectsRemainder = projectsCount - (e+1);
		           			
		           			if(projectsRemainder > 0){
		           				m.find('.u-super').html(projectsRemainder);
		           			} else {
		           				m.find('span').html('Back to Top');
		           			}
		           			p = p + parseInt(posts_per_page);
		           		}
		           		else{
							$('html, body').animate({scrollTop: 0}, 500);
		           		}
	           		}
	           		else {
	           			$('.js-others').addClass('u-hide');
	           			k.removeClass('s--empty');
	           			m.removeClass('is-loading');
	           			if(data != '0'){

	           				k.html(data);
	           				loadImages($('.is-appended .js-lazy'));
	           				
	           				e = parseInt($('.o-album').last().data('id'));
	           				projectsCount = parseInt($('.o-album').last().data('count'));
	           				projectsRemainder = projectsCount - (e+1);

	           				
	           				if(projectsRemainder > 0){
	           					q.removeClass('u-hide');
	           					q.find('.u-super').html(projectsRemainder);
	           				}
	           				else {
	           					q.addClass('u-hide');
	           					$('.js-others').removeClass('u-hide');
	           				}
	           			}
	           		}
	           } 
	        });
		});
	}
	
	//lazy images
	function loadImages(obj){
		obj.bind('inview', function (event, isInView) {
	      if (isInView) {
	      	var m = $(this);
	      	var u = m.data('thumb');
	      	var l = m.data('thumb-medium');
	      	// var i = document.createElement('img');

	      	if (l && Modernizr.mq('(max-width: 640px)')) {
	      		u = l;
			}

	      	if(u){
	      		m.removeClass('js-lazy');
	      		m.css('background-image', 'url(' + u + ')');
	      		m.addClass('is-loaded');
	      		m.parent().find('.o-spinner__wrap').hide();
	      		
		    	// i.src = u;
		    	// i.onload = function(){
		    	// 	m.css('background-image', 'url(' + u + ')');
		    	// 	m.addClass('is-loaded');
		    	// 	m.parent().find('.o-spinner__wrap').hide();
		    	// }
	    	}
	      }
	    });
    }

    //scroll to hash
    $(document).on('click', 'a[href*="#"]:not([href="#"])', function(e) {
	    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	        if (target.length) {
	            $('html, body').animate({
	                scrollTop: target.offset().top
	            }, 1000);
	            e.preventDefault();
	        }
	    }
	});

	//menu
	$('.c-menu').on('click', 'a', function() {
		var me =$(this);
		if(!me.hasClass('js-show-search')){
			$('.c-menu').find('.is-active').removeClass('is-active');
			$(this).closest('.c-menu__item').addClass('is-active');
			$('.c-menu').removeClass('is-open');
			$('.c-menu__toggle').removeClass('is-active');
		}

	});
	$('.c-logo').click(function() {
		$('.c-menu').find('.is-active').removeClass('is-active');
	});

	$('.c-menu__toggle').click(function(e) {
		e.preventDefault();
		$(this).toggleClass('is-active');
		$('.c-menu').toggleClass('is-open');
	});

	$(document).mouseup(function (e)
	{
	    var container = $('.c-header');

	    if (!container.is(e.target) && container.has(e.target).length === 0)
	    {
	        $('.c-menu').removeClass('is-open');
			$('.c-menu__toggle').removeClass('is-active');
	    }
	});

	$(document).mouseup(function (e)
	{
	    var container = $('.o-filter__wrap');
	    if (!container.is(e.target) && container.has(e.target).length === 0)
	    {
	        $('.o-filter-list').removeClass('is-open');
	    }
	});

	$(document).mouseup(function (e)
	{
	    var container = $('.c-search');
	    if (!container.is(e.target) && container.has(e.target).length === 0)
	    {
	        $('.c-search').removeClass('is-active');
	    }
	});
	
	//search
	$('.js-show-search').click(function(e) {
		e.preventDefault();
		$('.c-search').toggleClass('is-active');
		$('.c-search__input').focus();
		$('.c-menu').removeClass('is-open');
	});
	$('.c-search .s--close').click(function(e) {
		e.preventDefault();
		$('.c-search').removeClass('is-active');
		$('.c-search form').each(function(){
			this.reset();
		});
	});

	var projectsList = [];
	$.getJSON(projectsURL, function(data) {
		var i = 0;
		for(i=0;i<data.length;i++){
			projectsList.push(data[i]);
		}
	});

	$('#search').autocomplete({
		lookup: projectsList,
		dataType: 'json',
	    onSelect: function (suggestion) {
	    	window.location.href = suggestion.data; 
	    }
	});

	//share
	$('body').on('click', '.js-share', function(e){
		e.preventDefault();
		
		var m = $(this);
		
		m.find('.o-icon').toggleClass('s--close');
		m.toggleClass('is-active');
		$('.c-album__cover .c-social').toggleClass('is-visible');
	});

	//filter
	var month = '';
	var year = '';

	function filterProjects(){
		$('.o-filter__label').click(function(e) {
			e.preventDefault();
			$('.o-filter-list').toggleClass('is-open');
		});
		
		$('.o-filter-list').on('click', 'a', function(e) {
			e.preventDefault();
			
			var m = $(this);
			var f = $('.o-filter-list');
			var t = m.data('time');

			year = t;

			f.find('.is-selected').removeClass('is-selected');
			m.closest('.o-filter').find('.o-filter__active').html(t);
			m.closest('.o-filter__wrap').find('.o-filter__button').removeClass('u-hide');
			m.addClass('is-selected');
			m.closest('.o-filter-list').removeClass('is-open');
		});
	}

	//video
	$('body').on('click', '.js-video, .c-album__cover a[href*="youtube"]', function(e) {
		e.preventDefault();

		var m = $(this);
		var VideoID = '';
		var url = m.attr('href');

		if(m.data('video')){
			videoID = m.data('video');
		}
		else {
			video = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
			videoID = video[1];
			console.log(videoID);
		}

		if(videoID){
			$('body').addClass('u-oh');
			$('.c-pop').show();
		    $('.c-pop__box .u-canvas').removeClass('u-hide');
		    $('.c-pop__box .u-canvas').html('<iframe id=ytplayer type=text/html src=https://www.youtube.com/embed/'+videoID+'?autoplay=1&vq=hd720></iframe>');
	    }
	});
	
	$('.js-close-pop').click(function(e) {
		e.preventDefault();
		closePop();
	});
	
	$('.c-pop').click(function() {
		closePop();
	});
	
	$('.c-pop .c-pop__box').click(function(e) {
		e.stopPropagation();
	});
	
	function closePop(){
		$('body').removeClass('u-oh');
		$('.c-pop__box .u-canvas').html('');
		$('.c-pop__box').removeClass('s--narrow');
		$('.s--quote').addClass('c-form');
		$('.c-pop').hide();
		$('.c-pop__box .c-contact').addClass('u-hide');
		$('.c-pop__box .u-canvas').addClass('u-hide');
	}

	//scroll top
	$('.js-top').click(function(event) {
		event.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, "slow");
	});

	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
	   if (scroll > 10){
	   		$('.c-header').addClass('is-fixed');
	   		$('.js-top').addClass('is-visible');
	   }
	   else {
	   		$('.c-header').removeClass('is-fixed');
	   		$('.js-top').removeClass('is-visible');
	   		
	   	}
	   	if(!readCookie('contact')){
		   	if((scroll > 500) && (scroll < 1500)){
		   		$('.c-msg__btn').addClass('is-visible');
		   	}
		   	else{
		   		$('.c-msg__btn').removeClass('is-visible');
		   	}
	   	}
	});
	
	//contact
	$('.js-show-contact').click(function(e){
		e.preventDefault();
		$('body').addClass('u-oh');
		$('.c-pop').show();
		$('.s--quote').removeClass('c-form');
		$('.c-pop__box').addClass('s--narrow');
	    $('.c-pop__box .c-contact').removeClass('u-hide');
	    return false;
	});

	$('body').on('change', '#albumCount', function() {
		var me = $(this);
		if(me.val() == 'other'){
			$('#otherCount').show();
		} else{
			$('#otherCount').hide();
		}
	});

	function submitRequest(){
		if (!Modernizr.input.placeholder) {
		      $("input[placeholder], textarea[placeholder]").each(function() {
		          var val = $(this).attr("placeholder");
		          if (this.value == "") {
		              this.value = val;
		          }
		          $(this).focus(function() {
		              if (this.value == val) {
		                  this.value = "";
		              }
		          }).blur(function() {
		              if ($.trim(this.value) == "") {
		                  this.value = val;
		              }
		          })
		      });
		      $('.c-form form').submit(function() {
		          $(this).find("input[placeholder], textarea[placeholder]").each(function() {
		              if (this.value == $(this).attr("placeholder")) {
		                  this.value = "";
		              }
		          });
		      });
		  }
		if (!Modernizr.input.required) {
		    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
		            return arg != value;
		        },
		        "Value must not equal arg."
		    );
		    $('.c-form form').validate({
		        rules: {
		            userName: {
		                valueNotEquals: "Your Name",
		                required: true
		            },
		            userTelephone: {
		                valueNotEquals: "Telephone",
		                required: true
		            },
		            userEmail: {
		                valueNotEquals: "E-mail",
		                required: true
		            },
		            userEvent:{
		            	valueNotEquals: "",
		            	required: true
		            }
		        },
		        errorPlacement: function(error, element) {},
		        invalidHandler: function(event, validator) {
		            $('.c-form .c-form__status').html('Check the fields in red');
		        },
		        submitHandler: function(form) {
		            $(form).ajaxSubmit({
		                beforeSend: function() {
		                    $('.c-form button').addClass('is-submiting');
		            $('.c-form button span').html('Sending');
		                },
		                success: function() {
		                	$('.c-form button').removeClass('is-submiting');
		                    $('.c-form .c-form__status').html('Thank you. Your Request was sent');
		                    $('.c-form button span').html('Send');
		                    $('.c-form form').each(function(){
		                    	this.reset();
		                    	writeCookie('contact', 1, 5);
		                    });
		                }
		            });
		        }
		    });
		} 
		else {
		    $('.c-form form').ajaxForm({
		        beforeSend: function() { 
		            $('.c-form button').addClass('is-submiting');
		            $('.c-form button span').html('Sending');
		        },
		        success: function() {
		        	$('.c-form button').removeClass('is-submiting');
		            $('.c-form .c-form__status').html('Thank you. Your Request was sent');
		            $('.c-form button span').html('Send');
		            $('.c-form form').each(function(){
		            	this.reset();
		            	writeCookie('contact', 1, 5);
		            });
		        },
		        resetForm: true
		    });
		}

		$('body').on('change', '#userEvent', function() {
			var me = $(this);
			var eventValue = me.val();
			var weddingForm = $('#c-wedding');
			var engagementForm = $('#c-engagement');
			var otherForm = $('#c-other');

			if(eventValue == '1'){
				$('.c-form-group').not('#c-wedding').addClass('u-hide');
				weddingForm.removeClass('u-hide');
			}
			if(eventValue == '2'){
				$('.c-form-group').not('#c-engagement').addClass('u-hide');
				engagementForm.removeClass('u-hide');
			}
			if(eventValue == '3'){
				$('.c-form-group').not('#c-other').addClass('u-hide');
				otherForm.removeClass('u-hide');
			}
		});
	}

	//home
	var slider_speed = 800;
	if(Modernizr.mq('(max-width: 767px)')){
		slider_speed = 300;
	}

	var home = Barba.BaseView.extend({
	  namespace: 'home',
	  onEnter: function() {
	  	$('body').addClass('t-home');
	  	$('.c-slide').each(function() {
	    	var m = $(this);
	    	var u = m.data('thumb');
	    	var i = document.createElement('img');
	    	m.css('background-image', 'url(' + u + ')');
	    });

	  	var splashSwiper = new Swiper('.c-slides', {
	    	loop: true,
	    	speed: slider_speed,
	    	autoplay: 6000,
	    	autoplayDisableOnInteraction:false,
	    	nextButton: '.swiper-button-next',
	    	prevButton: '.swiper-button-prev'
	    });
	    $('.scene').parallax();
	  },
	  onLeave: function(){
	  	$('body').removeClass('t-home');
	  }
	});
	home.init();

	
	//archives
	var archive = Barba.BaseView.extend({
	  namespace: 'archive',
	  onEnter: function() {
	  	fetchProjects();
	  	filterProjects();
	  	$('.c-menu .is-active').removeClass('is-active');
	  }
	});
	archive.init();
	

	var weddings = Barba.BaseView.extend({
	  namespace: 'weddings',
	  onEnter: function() {
	  	$('body').addClass('t-weddings');
	  	$('.c-menu .is-active').removeClass('is-active');
	  	$('.js-wedding').addClass('is-active');
	
	  	fetchProjects();
	  	filterProjects();
	  },
	  onLeave: function(){
	  	$('body').removeClass('t-weddings');
	  	$('.js-wedding').removeClass('is-active');
	  }
	});
	weddings.init();

	//engagements
	var engagements = Barba.BaseView.extend({
	  namespace: 'engagements',
	  onEnter: function() {
	  	$('body').addClass('t-engagements');
	  	$('.c-menu .is-active').removeClass('is-active');
	  	$('.js-engagement').addClass('is-active');
	
	  	fetchProjects();
	  	filterProjects();
	  },
	  onLeave: function(){
	  	$('body').removeClass('t-engagements');
	  	$('.js-engagement').removeClass('is-active');
	  }
	});
	engagements.init();


	//single
	var single = Barba.BaseView.extend({
	  namespace: 'single',
	  onEnter: function() {
	  	$('body').addClass('t-single');
	  },
	  onLeave: function(){
	  	$('body').removeClass('t-single');
	  }
	});
	single.init();

	
	//video
	var video = Barba.BaseView.extend({
	  namespace: 'video',
	  onEnter: function() {
	  	$('body').addClass('t-video');
	  	$('.js-videos').addClass('is-active');
	
	  	fetchProjects();
	  	filterProjects();
	  },
	  onLeave: function(){
	  	$('body').removeClass('t-video');
	  	$('.js-videos').removeClass('is-active');
	  }
	});
	video.init();

	
	//team
	var team = Barba.BaseView.extend({
	  namespace: 'team',
	  onEnter: function() {
	  	$('body').addClass('t-team');
  	    $('.js-team').addClass('is-active');

  	    //random class
  	    var classes = ["s--h1", "s--h2", "s--h3","s--h4"];
  		$('.c-team article').each(function(){
  	        $(this).addClass(classes[~~(Math.random()*classes.length)]);
  	    });

  	    //moments
  	    $('.c-grid__moments .o-moment').each(function(){
  	        $(this).addClass(classes[~~(Math.random()*classes.length)]);
  	    });

  	    var gridMoments = $('.c-grid__moments');    
  	    gridMoments.isotope({
  	    	 itemSelector: '.o-moment',
  	    	 layoutMode: 'packery'
  	    });
	  },
	  onLeave: function(){
	  	$('body').removeClass('t-team');
	  	$('.js-team').removeClass('is-active');
	  }
	});
	team.init();

	//targets
	$('#barba-wrapper').on('click', '.o-album a', function() {
		var me = $(this);
		var target = me.data('target');
		if(target){
			$('.c-menu .is-active').removeClass('is-active');
			$('.js-'+target).addClass('is-active');
		}
	});

	//transitions
	Barba.Pjax.start();
	var FadeTransition = Barba.BaseTransition.extend({
	  start: function() {
	    Promise.all([this.newContainerLoading, this.fadeOut()]).then(this.fadeIn.bind(this));
	    $('.c-edges').addClass('is-active');
	    $('body').addClass('is-exiting');
	  },

	  fadeOut: function() {
	    return $(this.oldContainer).animate({ opacity: 0 }).promise();
	  },

	  fadeIn: function() {
	    var _this = this;
	    var $el = $(this.newContainer);

	    $(this.oldContainer).hide();
	    $el.css({visibility : 'visible',opacity : 0});
	    $("html, body").animate({ scrollTop: 0 }, 0);
	    $('.c-loader').addClass('is-exiting');
	    $('body').removeClass('is-exiting');
	    $('.c-edges').removeClass('is-active');

	    window.setTimeout(function(){
	    	$('.c-loader').removeClass('is-exiting');
	    }, 1000);

	    $el.animate({ opacity: 1 }, 400, function() {
	      _this.done();
	      AOS.init();
	      loadImages($('.js-lazy'));
	      p = parseInt(posts_per_page);
	    });
	  }
	});
	Barba.Pjax.getTransition = function() {
	  return FadeTransition;
	};
	
	//init
	AOS.init();
	submitRequest();
	loadImages($('.js-lazy'));
});

