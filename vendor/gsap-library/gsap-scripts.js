// Costanti per verificare se esiste la classe da animare
const batchGsap = document.getElementsByClassName('fade-batch').length > 0;
const revealGsap = document.getElementsByClassName('text-reveal').length > 0;
const fadeLeftGsap = document.getElementsByClassName('fade-left').length > 0;
const fadeRightGsap = document.getElementsByClassName('fade-right').length > 0;
const fadeInGsap = document.getElementsByClassName('fade-in').length > 0;
const fadeOutGsap = document.getElementsByClassName('fade-out').length > 0;
const scrollRight = document.getElementsByClassName('scroll-right').length > 0;
const scrollLeft = document.getElementsByClassName('scroll-left').length > 0;

// GSAP TO Animations
if (revealGsap){gsap.to(".text-reveal", {clipPath: "polygon(0 0, 100% 0, 100% 100%, 0 100%)", y: 0, duration: 1.2, stagger: 0.5});}
if (fadeLeftGsap) {gsap.to(".fade-left", {opacity: 1, x: 0, duration: 1.2, stagger: 0.5});} 
if (fadeRightGsap){gsap.to(".fade-right", {opacity: 1, x: 0, duration: 1.2, stagger: 0.5});}
if (fadeInGsap){gsap.to(".fade-in", {opacity: 1, y: 0, duration: 1.2, stagger: 0.5});}
if (fadeOutGsap){gsap.to(".fade-out", {opacity: 1, y: 0, duration: 1.2, stagger: 0.5});}

// ScrollTrigger Animations
if (scrollRight){gsap.to(".scroll-right",{x:0, opacity: 1, stagger: 0.3, 
    scrollTrigger:
	  { trigger: ".class-trigger", // Insert trigger to start animation
		start: "top center",
		end: "bottom center",
		scrub: true,
	  }
  });
}
  
if(scrollLeft){ gsap.to(".scroll-left", {x:0, opacity: 1, stagger: 0.3,
  scrollTrigger:
	{ trigger: ".class-trigger", // Insert trigger to start animation
	  start: "top center",
	  end: "bottom center",
	  scrub: true,
	}
 });
}

// GSAP Batch Animations
if(batchGsap){ gsap.set(".fade-batch", {y: 100});

    ScrollTrigger.batch(".fade-batch", {
        interval: 0.3,
        batchMax: 4,   
        onEnter: batch => gsap.to(batch, {opacity: 1, y: 0, stagger: {each: 0.15, grid: [1, 4]}, overwrite: true}),
        // onLeave: batch => gsap.set(batch, {opacity: 0, y: -100, overwrite: true}),
        // onEnterBack: batch => gsap.to(batch, {opacity: 1, y: 0, stagger: 0.15, overwrite: true}),
        // onLeaveBack: batch => gsap.set(batch, {opacity: 0, y: 100, overwrite: true}),
        start: "20px bottom",
        end: "bottom top"
});

ScrollTrigger.addEventListener("refreshInit", () => gsap.set(".fade-batch", {y: 0}));
}
