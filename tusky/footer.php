<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tusky
 */

?>

<footer id="colophon" class="footer">
<nav class="social-links">
<?php wp_nav_menu(array('theme_location' => 'social', 'container_class' => 'social')); ?>
</nav>

<p class="copyright">
<?php bloginfo('name') ?> <?php echo date('Y'); ?>. <span> &copy;</span> All Rights Reserved.
</p>	
<div class="barcode"></div>	
</footer><!-- #colophon -->
</div><!-- #page -->


<script>
	
	/*const textrev = gsap.timeline();
	
	textrev.from(".hero span", 2.4, {
		y : 1100,
		ease: "power4.out",
		delay: 1,
		skewY: 15,
		stagger:{
			amount: 0.8,
		}
	});*/
	

	
	
	 const trigger = document.querySelector('.nav-trigger');
	 const menu = document.querySelector('.menu');

trigger.addEventListener('click' , () => {
	menu.classList.toggle('hide');
});

	const fader = document.querySelectorAll('.fade-in');
	const appearOptions = {
		threshold:0.6
	};
	
	const appearOnScroll = new IntersectionObserver
	(function(
		entries,
		appearOnScroll	
	){
		entries.forEach(entry => {
			if (!entry.isIntersecting){
				return;
			} else {
				entry.target.classList.add('appear');
				appearOnScroll.unobserve(entry.target);
			}
		});
	},
	appearOptions);
	
	fader.forEach(fader => {
		appearOnScroll.observe(fader);
	});
	
	
	
	const hero = document.querySelectorAll('.hero h1');
	
	const fish = document.querySelectorAll('.fish');
	
	/*hero.addEventListener("mousemove", (e) => {
	hero.style.backgroundPositionX = -e.offsetX/2 + "px";
	hero.style.backgroundPositionY = -e.offsetY/2 + "px";
  
});*/

hero.forEach((move) => {
	move.addEventListener('mousemove', (e) => {
			move.style.backgroundPositionX = e.offsetX/2 + "px";
			move.style.backgroundPositionY = e.offsetY/2 + "px";
	});
});



// set the starting position of the cursor outside of the screen
let clientX = -100;
let clientY = -100;
const innerCursor = document.querySelector(".cursor--small");
const image = document.querySelectorAll('.gallery-thumb, .archive-img, .hero h1, .logo, a');

const initCursor = () => {
  // add listener to track the current mouse position
  document.addEventListener("mousemove", e => {
    clientX = e.clientX;
    clientY = e.clientY;
  });
  
  // transform the innerCursor to the current mouse position
  // use requestAnimationFrame() for smooth performance
  const render = () => {
    innerCursor.style.transform = `translate(${clientX}px, ${clientY}px)`;
    // if you are already using TweenMax in your project, you might as well
    // use TweenMax.set() instead
    // TweenMax.set(innerCursor, {
    //   x: clientX,
    //   y: clientY
    // });
    
    requestAnimationFrame(render);
  };
  requestAnimationFrame(render);
};

initCursor();


image.forEach(link => {
	
		link.addEventListener('mouseover', () =>{
			innerCursor.classList.add('greyscale');
		});
		
		link.addEventListener('mouseleave', () =>{
			innerCursor.classList.remove('greyscale');
		});
	})
	
	

image.forEach((hover) => {
	hover.addEventListener('mouseover', () => {
			hover.classList.add('hovered');
	});
	
	hover.addEventListener('mouseleave', () =>{
			hover.classList.remove('hovered');
		});
		
});
/*window.onload = function() {
	
		const textrev = gsap.timeline();
	
	textrev.to(".loader", 1.2,{
		top: "-100%",
		ease: Expo.easeInOut,
		delay: 1.2
	})
	.from(".hero h1", 1.8, {
		y : 800,
		opacity: 0,
		ease: "power4.out",
		delay: 1.4,
		skewY: 15,
		stagger:{
			amount: 0.6,
		}
	}, "-= 3")
		.from('.menu', 1.8, {
			opacity:0,
			delay:2.4
	}, "-= 2")
		.from('.logo a', 1.8, {
			opacity:0,
			delay:2.4
	}, "-= 2")
	.from('.nav-trigger', 1.8, {
			opacity:0,
			delay:2.4
	}, "-= 2");

}
*/

/*sessionStorage.clear();*/

 
 
 var hasPlayed = sessionStorage.getItem("loadingAnimPlayed");
 
if (!hasPlayed) {
 		
 	const textrev = gsap.timeline();
	
	textrev.to(".loader", 1.2,{
		top: "-120%",
		ease: Expo.easeInOut,
		delay: 1.4
	})
	.from(".hero h1", 1.8, {
		y : 800,
		opacity: 0,
		ease: "power4.out",
		delay: 1.4,
		skewY: 15,
		stagger:{
			amount: 0.6,
		}
	}, "-= 3")
		.from('.menu', 1.8, {
			opacity:0,
			delay:2.4
	}, "-= 2")
		.from('.logo a', 1.8, {
			opacity:0,
			delay:2.4
	}, "-= 2")
	.from('.nav-trigger', 1.8, {
			opacity:0,
			delay:2.4,
			onComplete() {
          sessionStorage.setItem("loadingAnimPlayed", true)
        }
	}, "-= 2");
	

}

else{
	console.log('Loaded');
	document.querySelector('.loader').classList.add('loaded');
};

 

/*var hasPlayed = sessionStorage.getItem("loadingAnimPlayed");
 
if (!hasPlayed) {
 		
 			const textrev = gsap.timeline();
	
	textrev.to(".loader", 1.2,{
		top: "-120%",
		ease: Expo.easeInOut,
		delay: 1.4
	})
	.from(".hero h1", 1.8, {
		y : 800,
		opacity: 0,
		ease: "power4.out",
		delay: 1.4,
		skewY: 15,
		stagger:{
			amount: 0.6,
		}
	}, "-= 3")
		.from('.menu', 1.8, {
			opacity:0,
			delay:2.4
	}, "-= 2")
		.from('.logo a', 1.8, {
			opacity:0,
			delay:2.4
	}, "-= 2")
	.from('.nav-trigger', 1.8, {
			opacity:0,
			delay:2.4,
			onComplete() {
          sessionStorage.setItem("loadingAnimPlayed", true)
        }
	}, "-= 2");
	

}

else{
	console.log('Loaded');
	document.querySelector('.loader').classList.add('loaded');
};*/




// Wrap every letter in a span
var textWrapper = document.querySelector('.ml16');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: false})
  .add({
    targets: '.ml16 .letter',
    translateY: [-150,0],
    easing: "easeOutExpo",
    duration: 1700,
    delay: (el, i) => 30 * i
  });
  



 


</script>

<?php wp_footer(); ?>

</body>
</html>
