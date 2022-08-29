var video = document.getElementById("myVideo");
var btn1 = document.getElementById("videoCarouselControl");
var btn2 = document.getElementById("videoCarouselSound");

function vidCarouselControlFunction() {
    if (video.paused) {
        video.play();
        btn1.classList.add('ti-control-pause');
        btn1.classList.remove('ti-control-play');

        // custom
        btn1.innerHTML = "pause";
    } else {
        video.pause();
        btn1.classList.add('ti-control-play');
        btn1.classList.remove('ti-control-pause');

        // custom
        btn1.innerHTML = "play_arrow";
    }
}

function vidCarouselSoundFunction() {
    if (video.muted) {
        video.muted = false;
        btn2.classList.add('ti-close');
        // custom
        btn2.innerHTML = "volume_off";
    } else {
        video.muted = true;
        btn2.classList.remove('ti-close');
        // custom
        btn2.innerHTML = "volume_up";
    }
}