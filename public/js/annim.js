gsap.registerPlugin(ScrollTrigger);
const tag1 = gsap.utils.toArray(".tag1");
const tag2 = gsap.utils.toArray(".tag2");
const a1 = gsap.utils.toArray(".a1");
const a2 = gsap.utils.toArray(".a2");

if (tag1) {
   tag1.forEach((item) =>{
    gsap.from(item, {
        scrollTrigger:{
            trigger:item,
            start:'top 80%'
        },
        duration: 2,
        opacity: 0, 
        y:-200
    });    
})
 
}

if (tag2) {
   tag2.forEach((item) =>{
    gsap.from(item, {
        scrollTrigger:{
            trigger:item,
            start:'top 80%'
        },
        duration: 2,
        opacity: 0, 
        y:200
    });

}) 
}

let carouselImg = document.querySelector('.carousel-img')
if (carouselImg) {
   gsap.from(carouselImg, {
    scrollTrigger:{
        trigger:carouselImg,
        start:'top 70%'
    },
    duration: 1,
    opacity: 0,
    x:100
}); 
}


if (a1) {
   a1.forEach((item) =>{
    gsap.from(item, {
        // scrollTrigger:{
        //     trigger:item,
        //     start:'top 10%'
        // },
        duration: 2,
        opacity: 0, 
        x:300,
    });
}) 
}

if (a2) {
   a2.forEach((item) =>{
    gsap.from(item, {
        // scrollTrigger:{
        //     trigger:item,
        //     start:'top 10%'
        // },
        duration: 3,
        opacity: 0, 
        y:300,
        // delay:.5
    });
})
}

let cont44 = document.querySelector('.cont44')
if (cont44) {
  gsap.from(cont44, {
    scrollTrigger:{
        trigger:".cont44",
        start:'top 80%'
    },
    duration: 2,
    opacity: 0, 
    y:200,
});  
}

