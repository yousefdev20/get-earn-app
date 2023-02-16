
$(document).ready(function() {
//sidebar menu js
$.sidebarMenu($('.sidebar-menu'));

// === toggle-menu js
$(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

// === sidebar menu activation js

$(function() {
        for (var i = window.location, o = $(".sidebar-menu a").filter(function() {
            return this.href == i;
        }).addClass("active").parent().addClass("active"); ;) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    }),


/* Top Header */

$(document).ready(function(){
    $(window).on("scroll", function(){
        if ($(this).scrollTop() > 60) {
            $('.topbar-nav .navbar').addClass('bg-dark');
        } else {
            $('.topbar-nav .navbar').removeClass('bg-dark');
        }
    });

 });


/* Back To Top */

$(document).ready(function(){
    $(window).on("scroll", function(){
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });

    $('.back-to-top').on("click", function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});


$(function () {
  $('[data-toggle="popover"]').popover()
})


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

	 // theme setting
	 $(".switcher-icon").on("click", function(e) {
        e.preventDefault();
        $(".right-sidebar").toggleClass("right-toggled");
    });

	$('#theme1').click(theme1);
    $('#theme2').click(theme2);
    $('#theme3').click(theme3);
    $('#theme4').click(theme4);
    $('#theme5').click(theme5);
    $('#theme6').click(theme6);
    $('#theme7').click(theme7);
    $('#theme8').click(theme8);
    $('#theme9').click(theme9);
    $('#theme10').click(theme10);
    $('#theme11').click(theme11);
    $('#theme12').click(theme12);
    $('#theme13').click(theme13);
    $('#theme14').click(theme14);
    $('#theme15').click(theme15);
    $('#theme16').click(theme16);

    function prepareRequest(themeName) {
        const token = ($('meta[name="_token"]').attr('content'))
        fetch('/dashboard/setting/theme', {
            method: 'POST',
            headers: {
                'X-CSRF-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                theme_name: themeName,
            })
        }).then(res => {
            console.log(res)
        })
    }
    function theme1() {
        prepareRequest('bg-theme1');
      $('body').attr('class', 'bg-theme bg-theme1');
    }

    function theme2() {
        prepareRequest('bg-theme2');
      $('body').attr('class', 'bg-theme bg-theme2');
    }

    function theme3() {
        prepareRequest('bg-theme3');
      $('body').attr('class', 'bg-theme bg-theme3');
    }

    function theme4() {
        prepareRequest('bg-theme4');
      $('body').attr('class', 'bg-theme bg-theme4');
    }

	function theme5() {
        prepareRequest('bg-theme5');
      $('body').attr('class', 'bg-theme bg-theme5');
    }

	function theme6() {
        prepareRequest('bg-theme6');
      $('body').attr('class', 'bg-theme bg-theme6');
    }

    function theme7() {
        prepareRequest('bg-theme7');
      $('body').attr('class', 'bg-theme bg-theme7');
    }

    function theme8() {
        prepareRequest('bg-theme8');
      $('body').attr('class', 'bg-theme bg-theme8');
    }

    function theme9() {
        prepareRequest('bg-theme9');
      $('body').attr('class', 'bg-theme bg-theme9');
    }

    function theme10() {
        prepareRequest('bg-theme10');
      $('body').attr('class', 'bg-theme bg-theme10');
    }

    function theme11() {
        prepareRequest('bg-theme11');
      $('body').attr('class', 'bg-theme bg-theme11');
    }

    function theme12() {
        prepareRequest('bg-theme12');
      $('body').attr('class', 'bg-theme bg-theme12');
    }

	function theme13() {
        prepareRequest('bg-theme13');
      $('body').attr('class', 'bg-theme bg-theme13');
    }

	function theme14() {
        prepareRequest('bg-theme14');
      $('body').attr('class', 'bg-theme bg-theme14');
    }

	function theme15() {
        prepareRequest('bg-theme15');
      $('body').attr('class', 'bg-theme bg-theme15');
    }
    function theme16() {
        prepareRequest('bg-theme16');
        $('body').attr('class', 'bg-theme bg-theme16');
    }
});
