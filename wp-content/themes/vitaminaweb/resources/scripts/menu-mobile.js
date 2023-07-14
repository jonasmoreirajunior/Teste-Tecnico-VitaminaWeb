export default function MenuMobile() {
  const btnMobile = document.querySelector('.js-open-mobile-menu');
  const menu = document.querySelector('.c-header');
  const menuItem = menu.querySelectorAll('.menu .menu-item > a');
  
  const classes = {
    open: 'open',
  };
  
  btnMobile.addEventListener('click', (e) => {
    e.preventDefault();
    menu.classList.toggle(classes.open);
  });

  menuItem.forEach((item) => {
    item.addEventListener('click', (e) => {
      if (e.currentTarget.getAttribute('href') === '#0') {
        e.preventDefault();
        item.parentElement.classList.toggle('open');
      }
    });
  });
}
