//mmenu js code start: 
document.addEventListener(
    "DOMContentLoaded", () => {
        const menu = new MmenuLight(
            document.querySelector( "#menu" ),
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

    mainImg.addEventListener('mousemove', handleMouseMove);
    function handleMouseMove(event){
        let rect = mainImg.getBoundingClientRect();
        let offsetX = (event.clientX - rect.left) / rect.width - 0.5; 
        let offsetY = (event.clientY - rect.top) / rect.height - 0.5; 
        mainImg.style.transition = '0.1s';
        mainImg.style.transform = ` scale(2) translate(${offsetX * 50}%, ${offsetY * 50}%)`;
    }
    mainImg.addEventListener('mouseout', ()=>{
        mainImg.style.transition = '0.1s';
        mainImg.style.transform = 'scale(1) translate(0, 0)';
    });
});


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

document.addEventListener("DOMContentLoaded", ()=>{
    const aboutApp = document.getElementById('aboutApp');
    
    aboutHead.addEventListener('mouseenter', () => {
        aboutApp.classList.add('visible');
    });

});

