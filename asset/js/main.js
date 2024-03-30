//mmenu js code start: 
document.addEventListener(
    "DOMContentLoaded", () => {
        const menu = new MmenuLight(
            document.querySelector( "#mobileMenu" ),
            "(max-width: 767px)"
        );

        const navigator = menu.navigation();
        const drawer = menu.offcanvas();

        document.querySelector( "a[href='#menu']" )
            .addEventListener( "click", ( evnt ) => {
                evnt.preventDefault();
                drawer.open();
            });
    }
);
//Single product page javascript code start: 
document.addEventListener('DOMContentLoaded', ()=>{
    let mainImg = document.getElementById('mainImg');
    let singleImg = document.getElementsByClassName('singleImg');
    for(let x of singleImg){
        x.addEventListener('click', ()=>{
            mainImg.src = x.src;
            for(let img of singleImg){
                img.classList.remove('clicked');
            }
            x.classList.add('clicked');
        });
    };

    $('.pMainImg').mousemove( function(event) {
        let offsetXPercent = (100 * event.offsetX) / $(this).width();
        let offsetYPercent = (100 * event.offsetY) / $(this).height();
        $(".pMainImg_img").css('transform-origin', offsetXPercent + '%' + ' ' + offsetYPercent + '%');
        $(".pMainImg_img").css('transform', 'scale(2)');
        $(".pMainImg_img").css('transition', 'unset');
    });
    
    $('.pMainImg').mouseleave(function(event){
        $(".pMainImg_img").css('transform', '');
        $(".pMainImg_img").css('transition', '0.2s ease-in-out');
    });
});


//About page javascript code start: 
//About page javascript code start: 
document.addEventListener('DOMContentLoaded', ()=>{
    const marquee = document.getElementById('marquee');
    marquee.addEventListener('mouseover', ()=>{
        marquee.stop();
    });
    marquee.addEventListener('mouseout', ()=>{
        marquee.start();
    });
});

document.addEventListener('DOMContentLoaded', function() {
    let callback = function(entries, observer) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.transform = 'translate3d(0, 0px, 0)';
          observer.unobserve(entry.target);
        }
      });
    };
  
    let observer = new IntersectionObserver(callback, {
      root: null, 
      rootMargin: '0px',
      threshold: 0.1 
    });
  
    let aboutApp = document.getElementById('aboutApp');
    observer.observe(aboutApp);
});

//product_quality field flexible width js
$('input[name="product_quality"]').on('input', function() {
    let updatedValue = $(this).val();
    let width = 60; // Declare width variable here so it's available in the whole scope

    // Convert updatedValue to a number for comparison
    let updatedValueNumber = Number(updatedValue);

    if (updatedValueNumber <= 99) {
        width = "60px";
    } else if (updatedValueNumber > 99 && updatedValueNumber <= 99999999) {
        let valueLength = updatedValue.toString().length; 
        width = (50 + (valueLength - 1) * 10) + 'px'; 
        console.log(valueLength);
    } else {
        width = "120px";
    }

    $(this).css('width', width);
});

//menu cart icon add, total add to cart product quality number
$(document).ready(function() {
    var clickData = {
        totalCount: 0,
        items: {}
    };

    // Function to reset clickData and update the display and localStorage
    function resetClickData() {
        // Reset clickData to its initial state
        clickData.totalCount = 0;
        clickData.items = {};

        // Clear totalCount from localStorage
        localStorage.removeItem('totalCount');

        // Update the display
        updateDisplay();

        // Reset the display of totalCount
        $('#busket').css('--busket-before-content', '"0"');
    }

    // Check if totalCount exists in localStorage and set it
    if(localStorage.getItem('totalCount')) {
        clickData.totalCount = parseInt(localStorage.getItem('totalCount'), 10);
        $('#busket').css('--busket-before-content', '"' + clickData.totalCount + '"');
    }

    $('.FP_Cart').click(function() {
        clickData.totalCount++;

        var itemId = $(this).parent().attr('id');
        if (clickData.items[itemId]) {
            clickData.items[itemId]++;
        } else {
            clickData.items[itemId] = 1;
        }

        // Save totalCount to localStorage
        localStorage.setItem('totalCount', clickData.totalCount);

        // Update the display
        updateDisplay();

        // For demonstration purposes, log the clickData object to the console
        console.log(clickData);
        $('#busket').css('--busket-before-content', '"' + clickData.totalCount + '"');
    });

    // Add click event listener for elements with the "reset" class
    $('.reset').click(function() {
        // Reset the clickData and related components
        resetClickData();
    });

    function updateDisplay() {
        // Update display based on clickData. This function should be implemented according to your needs.
        // For example, you could update an element that shows the total count or list items in the cart.
    }
});
