document.addEventListener('DOMContentLoaded', () => {
  var textarea = document.getElementsByClassName('textarea');
  textarea ? autosize(textarea) : '';

  let ham = document.getElementById('ham');
  let nav = document.getElementById('main-nav');
  ham.addEventListener('click', () => {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    ham.classList.toggle('is-active');
    if (nav.style.display === 'flex') {
      nav.style.display = 'none';
      document.body.style.overflow = 'visible';
    } else {
      document.body.style.overflow = 'hidden';
      nav.style.display = 'flex';
    }
  });
});
