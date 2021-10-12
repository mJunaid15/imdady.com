anime({
    targets: '.anim11',
    translateY:30,
    rotateZ:-2000,
    scale: 0.1,
    duration: 4000,
    easing: 'linear',
    direction:'alternate',




    loop: false,
  });

  anime({
    targets: '.anim22',
    translateY:50,
    rotateZ:-200,
    scale: 0.1,
    duration: 3000,
    easing: 'linear',
    direction:'alternate',


    loop: false,
  });


 

  anime({
    targets: '.anim33',
    translateY:30,
    rotateZ:900,
    scale: 0.1,
    duration: 4000,
    easing: 'linear',
    direction:'alternate',


    loop: false,
  });

  

 
  anime({
    targets: '.anim44',
    translateX:50,
    rotateZ:-900,
    scale: 0.5,
    duration: 4000,
    easing: 'easeInOutSine',
    direction:'alternate',


    loop: false,
  });

  

  // anime({
  //   targets: '.animLine1',
  //   translateX:-50,
  //   rotateZ:20,
  //   scale: 0.5,
  //   duration: 1000,
  //   easing: 'linear',
  //   direction:'alternate',

  //   loop: false,
  // });

  let animation = anime({
    targets: '.letter',
    opacity: 1,
    translateY: 50, 
    rotate: {
      value: 360,
      duration: 1000,
      easing: 'easeInExpo'
    }, 
    // scale: anime.stagger([0.7, 1], {from: 'center'}), 
    delay: anime.stagger(100, {start: 1000}), 
    translateX: [-10, 30]
   });  



             
     