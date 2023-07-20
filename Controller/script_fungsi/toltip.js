const buttonIds = ["button1", "button2", "button3", "button4"];
const tooltipIds = ["tooltip1", "tooltip2", "tooltip3", "tooltip4"];
const popperInstances = [];

// Loop through the buttonIds array to create popper instances for each button and tooltip
buttonIds.forEach((buttonId, index) => {
  const button = document.querySelector(`#${buttonId}`);
  const tooltip = document.querySelector(`#${tooltipIds[index]}`);

  const popperInstance = Popper.createPopper(button, tooltip, {
    modifiers: [
      {
        name: "offset",
        options: {
          offset: [0, 8],
        },
      },
    ],
  });

  popperInstances.push(popperInstance);

  function show() {
    tooltip.setAttribute("data-show", "");
    popperInstance.setOptions((options) => ({
      ...options,
      modifiers: [
        ...options.modifiers,
        {
          name: "eventListeners",
          enabled: true,
        },
      ],
    }));
    popperInstance.update();
  }

  function hide() {
    tooltip.removeAttribute("data-show");
    popperInstance.setOptions((options) => ({
      ...options,
      modifiers: [
        ...options.modifiers,
        {
          name: "eventListeners",
          enabled: false,
        },
      ],
    }));
  }

  const showEvents = ["mouseenter", "focus"];
  const hideEvents = ["mouseleave", "blur"];

  showEvents.forEach((event) => {
    button.addEventListener(event, show);
  });

  hideEvents.forEach((event) => {
    button.addEventListener(event, hide);
  });
});
