// ============================================================================================================================================================================
// ============================================================================================================================================================================

const button2 = document.querySelector("#button2");
const tooltip2 = document.querySelector("#tooltip2");

const popperInstance = Popper.createPopper(button2, tooltip2, {
  modifiers: [
    {
      name: "offset",
      options: {
        offset: [0, 8],
      },
    },
  ],
});

function show() {
  // Make the tooltip2 visible
  tooltip2.setAttribute("data-show", "");

  // Enable the event listeners
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

  // Update its position
  popperInstance.update();
}

function hide() {
  // Hide the tooltip2
  tooltip2.removeAttribute("data-show");

  // Disable the event listeners
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
  button2.addEventListener(event, show);
});

hideEvents.forEach((event) => {
  button2.addEventListener(event, hide);
});

// ================================================================================
// ================================================================================
