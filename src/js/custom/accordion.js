document.addEventListener('DOMContentLoaded', () => {
  let accTriggers = document.querySelectorAll('.accTrigger');
  let accContents = document.querySelectorAll('.accContent');

  accContents.forEach((e) => {
    e.style.display = 'none';
  });

  accTriggers.forEach((e) => {
    e.addEventListener('click', () => {
      let accContent = e.nextElementSibling;
      if (accContent.style.display === 'block') {
        accContent.style.display = 'none';
        e.classList.remove('active');
      } else {
        accContents.forEach(function (e) {
          e.style.display = 'none';
        });
        accContent.style.display = 'block';
        accTriggers.forEach(function (e) {
          e.classList.remove('active');
        });
        e.classList.add('active');
      }
    });
  });
});
