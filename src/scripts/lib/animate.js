import animejs from 'animejs';

const el = (tag = 'span') => {
  const element = document.createElement(tag);

  const styles = {
    backgroundColor: 'red',
    borderRadius: '50px',
    height: '20px',
    left: '400px',
    position: 'fixed',
    top: '400px',
    width: '20px',
  };

  Object.keys(styles).forEach((key) => {
    element.style[key] = styles[key];
  });

  return element;
};

export const initAnimations = () => {
  const circles = [el(), el(), el()];

  circles.forEach((circle) => {
    document.body.append(circle);
  });

  animejs({
    targets: circles,
    duration: 2000,
    delay: 1000,
    direction: 145,
    easing: 'easeOutExpo',
    top: () => -20,
    left: () => -20,
  });
};

export default initAnimations;
