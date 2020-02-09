'use strict';
$(function() {
    //settings for slider
    //dohvati max-sirinu pozicije
    var width = 720;
   
    var animationSpeed = 1000; 
    //dohvati brzinu izmjene za svaki oglas i promjeni pause
    var pause = 3000;
    var currentSlide = 1;

    //cache DOM elements
    var $slider = $('#slider');
    var $slideContainer = $('.slides', $slider);
    var $slides = $('.slide', $slider);

    var interval;
    
    function startSlider() {
        interval = setInterval(function() {
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                if (++currentSlide === $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });
        }, pause);
    }
    function pauseSlider() {
        clearInterval(interval);
    }
    
        startSlider();
    
    
});
