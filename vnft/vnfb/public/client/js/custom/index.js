$(function () {
    $('.multiple-items').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: false,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        centerMode: true,
        centerPadding: '0',
        focusOnSelect: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0',
                slidesToShow: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0',
                slidesToShow: 1
            }
        }
        ]
    });
    $('.single-item').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        prevArrow: '.ti-angle-left',
        nextArrow: '.ti-angle-right',
        dots: true,
        focusOnSelect: true
    });
    $('.center').slick({
        prevArrow: '.ti-angle-left',
        nextArrow: '.ti-angle-right',
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        focusOnSelect: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0',
                slidesToShow: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0',
                slidesToShow: 1
            }
        }
        ]
    });

    // slider
    $('.single-item-slider').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        prevArrow: '.slider-previous',
        nextArrow: '.slider-next',
        dots: false,
        focusOnSelect: true,
    });

    // matches/tickets
    $('.variable-width-matches').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
        focusOnSelect: true,
        initialSlide: 3,
        prevArrow: '.matches-previous',
        nextArrow: '.matches-next',
        responsive: [{
            breakpoint: 1100,
            settings: {
                centerMode: true,
                centerPadding: '0',
                slidesToShow: 1
            }
        },
        {
            breakpoint: 739,
            settings: {
                centerMode: true,
                centerPadding: '0',
                slidesToShow: 1
            }
        }
        ]
    });
});

$(function () {
    $('.multiple-items-moments').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        centerMode: true,
        centerPadding: '0',
        focusOnSelect: true,
        responsive: [{
            breakpoint: 1100,
            settings: {
                arrows: false,
                centerMode: true,
                autoplay: true,
                autoplaySpeed: 2000,
                centerPadding: '0',
                slidesToShow: 3

            }
        }, {
            breakpoint: 1023,
            settings: {
                arrows: false,
                centerMode: true,
                autoplay: true,
                autoplaySpeed: 3000,
                centerPadding: '0',
                slidesToShow: 2

            }
        },
        {
            breakpoint: 739,
            settings: {
                arrows: false,
                centerMode: true,
                autoplay: true,
                autoplaySpeed: 3000,
                centerPadding: '0',
                slidesToShow: 1
            }
        }
        ]

    });

});

$(document).ready(function () {
    $('#loginModal').modal('');
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
});


function openSearch() {
    document.getElementById("search-display").style.display = "block";
}

function closeSearch() {
    document.getElementById("search-display").style.display = "none";
}
  
// Toast function

// config toast
function showSuccessCartToast(type,name,quantity,link) {
    if(type == 'add_to_cart') {
        toast({
            title: "Successful!",
            message: "Added " + quantity + " " + name + " into your cart.",
            type: "success",
            duration: 3000,
            link: link
        });
    }
}
function showErrorToast() {
    toast({
        title: "Failure!",
        message: "An error occurred, please contact the administrator.",
        type: "error",
        duration: 3000
    });
}

// Base Toast function
function toast({ title = "", message = "", type = "info", duration = 3000, link = "" }) {
	const main = document.getElementById("toast");
	if (main) {
	  const toast = document.createElement("div");
  
	  // Auto remove toast
	  const autoRemoveId = setTimeout(function () {
		main.removeChild(toast);
	  }, duration + 1000);
  
	  // Remove toast when clicked
	  toast.onclick = function (e) {
		if (e.target.closest(".toast__close")) {
            main.removeChild(toast);
            clearTimeout(autoRemoveId);
		} else {
            window.location.href = link;
        }
	  };
  
	  const icons = {
		success: "fas fa-check-circle",
		info: "fas fa-info-circle",
		warning: "fas fa-exclamation-circle",
		error: "fas fa-exclamation-circle"
	  };
	  const icon = icons[type];
	  const delay = (duration / 1000).toFixed(2);
  
	  toast.classList.add("toast", `toast--${type}`);
	  toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
  
	  toast.innerHTML = `
					  <div class="toast__icon">
						  <i class="${icon}"></i>
					  </div>
					  <div class="toast__body">
						  <h3 class="toast__title">${title}</h3>
						  <p class="toast__msg">${message}</p>
					  </div>
					  <div class="toast__close">
						  <i class="fas fa-times"></i>
					  </div>
				  `;
	  main.appendChild(toast);
	}
  }