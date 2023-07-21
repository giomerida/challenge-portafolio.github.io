document.addEventListener('DOMContentLoaded', function() {
    const btnScrollToTop = document.getElementById('btnScrollToTop');
  
    btnScrollToTop.addEventListener('click', function() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  
    window.addEventListener('scroll', function() {
      if (window.scrollY > 300) {
        btnScrollToTop.style.display = 'block';
      } else {
        btnScrollToTop.style.display = 'none';
      }
    });
  });