const dominiumToggleMobileMenu = () => {
  const elementMenu = document.querySelector(".js-menu");

  if (!elementMenu) {
    return;
  }

  const hiddenMobileMenu = () => {
    elementMenu.classList.remove("show_mobile_menu");
  };

  const elementHiddenMenu = document.querySelector(".js-hidden-menu");
  const elementShowMenu = document.querySelector(".js-show-menu");
  const elementLinkMenu = elementMenu.querySelectorAll("a");

  elementShowMenu.addEventListener("click", () => {
    elementMenu.classList.add("show_mobile_menu");
  });
  elementHiddenMenu.addEventListener("click", hiddenMobileMenu);

  elementLinkMenu.forEach((link) => {
    link.addEventListener("click", hiddenMobileMenu);
  });
};
dominiumToggleMobileMenu();
