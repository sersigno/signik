document.addEventListener('DOMContentLoaded', () => {
  let tabTriggers = document.querySelectorAll('.tabTrigger');
  let tabContents = document.querySelectorAll('.tabContent');

  tabContents.forEach((e, i) => {
    i != 0 ? (e.style.display = 'none') : '';
  });

  tabTriggers.forEach((e) => {
    e.addEventListener('click', () => {
      let target = document.getElementById(e.getAttribute('data-target'));
      tabTriggers.forEach(function (e) {
        e.classList.remove('active');
      });
      e.classList.add('active');
      tabContents.forEach(function (e) {
        e.style.display = 'none';
      });
      target.style.display = 'block';
    });
  });
});
