setTimeout(function() {
    document.querySelector('.bg-model').style.display = 'flex';
    // add listener to disable scroll
    //window.addEventListener('scroll', noScroll);
    $('body,html').animate({scrollTop: 720}, 800); 

}, 5000);

document.querySelector('.close').addEventListener('click', function() {
    document.querySelector('.bg-model').style.display = 'none';

    // Remove listener to re-enable scroll
    //window.removeEventListener('scroll', noScroll);
});


document.querySelector('.btnRegister').addEventListener('click', function() {
    window.location.href="register.php";
});
  