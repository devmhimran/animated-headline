
    // Dark Mode
  
  var rigDarkMode;
        if (localStorage.getItem('rig-dark-mode')) {  
        rigDarkMode = localStorage.getItem('rig-dark-mode');  
        } else {
        rigDarkMode = 'light';  
        }
    
        localStorage.setItem('rig-dark-mode', rigDarkMode);
    
        if (localStorage.getItem('rig-dark-mode') == 'dark') {
            jQuery('body').addClass('rig-dark-mode');  
            jQuery('.rig-dark-mode-button').hide();
            jQuery('.rig-light-mode-button').show();
          }
    
    
        jQuery('.rig-dark-mode-button').on('click', function() {  
            jQuery('.rig-dark-mode-button').hide();
            jQuery('.rig-light-mode-button').show();
            jQuery('body').addClass('rig-dark-mode');
            jQuery('.elementor-section').css('background-color: #000000');
            // jQuery('.elementor-section').css('color: #ffffff');
            localStorage.setItem('rig-dark-mode', 'dark');
    });
    
        jQuery('.rig-light-mode-button').on('click', function() {  
            jQuery('.rig-light-mode-button').hide();
            jQuery('.rig-dark-mode-button').show();
            jQuery('body').removeClass('rig-dark-mode');
            localStorage.setItem('rig-dark-mode', 'light');
        });

// jQuery(function() {
//     jQuery('body').addClass('js');
  
//     var $hamburger = jQuery('.hamburger'),
//         $nav = jQuery('#site-nav'),
//         $masthead = jQuery('#masthead');
  
//     $hamburger.click(function() {
//         console.log('Alhamdulillah');
//       jQuery(this).toggleClass('is-active');
//       $nav.toggleClass('is-active');
//       $masthead.toggleClass('is-active');
//       return false; 
//     })
// });


	 
	
// $(function () {
//     $('.toggle-menu').click(function(){
//        $('.exo-menu').toggleClass('display');
//     });
//    });   

// function rig_dark_mode() {

//     var element = document.body;
//     element.setAttribute('style', 'background-color: black; color: white;');
//     // var dark_mode = element.classList.toggle("dark-mode");
//     window.localStorage.setItem('mode', dark_mode);
//  }

//  function check_dark_mode() {
//     window.localStorage.getItem('mode');
// }

// jQuery(function() {
    // });



// window.onload = rig_dark_mode;