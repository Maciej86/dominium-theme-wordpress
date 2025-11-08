const dominiumImageBackground = () => {
  const elementBackground = document.querySelectorAll(".js-image-background");
  if (!elementBackground.length) return;

  elementBackground.forEach((item) => {
    const img = item.dataset.image;
    if (img) {
      item.style.backgroundImage = `url(${img})`;
    }
  });
};
dominiumImageBackground();
