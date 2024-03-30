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