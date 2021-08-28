/* close small screen nav menu on overlay click */
const navCollabse = document.querySelector("#main-nav .navbar-collapse");

function handleCloseSmallMenu() {
  navCollabse.classList.remove("show");
  handleAnimateToggler();
}

/* Animate main-navbar menu toggler */
const navToggler = document.getElementById("toggler-icon");

navToggler.addEventListener("click", handleAnimateToggler);

function handleAnimateToggler() {
  navToggler.classList.toggle("open");

  const togglerClassList = navToggler.classList;
  const isOpen = togglerClassList.contains("open");

  if (isOpen) {
    createOverlay({ togglerId: "nav-menu", handler: handleCloseSmallMenu });
    togglerClassList.remove("fa-bars");
    togglerClassList.add("fa-arrow-right");
  } else {
    togglerClassList.add("fa-bars");
    togglerClassList.remove("fa-arrow-right");
    removeOverlay("nav-menu");
  }
}

function createOverlay({
  targetId,
  togglerId,
  handler = null,
  classNames = "",
}) {
  const overlay = document.createElement("div");
  overlay.setAttribute("class", "overlay show" + " " + classNames);
  overlay.setAttribute("id", togglerId + "-overlay");
  overlay.addEventListener("click", () => {
    handler ? handler() : toggleElemVisibility(targetId);
    removeOverlay(togglerId);
  });
  document.body.appendChild(overlay);
}

function toggleElemVisibility(id) {
  const elem = document.getElementById(id);
  console.log(elem);
  elem.classList.toggle("show");
}

function removeOverlay(taretId) {
  const overlay = document.getElementById(taretId + "-overlay");
  const remove = function () {
    overlay.remove();
  };
  console.log(overlay);

  overlay.addEventListener("transitionend", () => {
    remove();
    overlay.removeEventListener("transitionend", remove);
  });

  overlay.classList.remove("show");
}

/* Handle Toggle filter-nav Overlay*/
const filterNavToggler = document.getElementById("filter-menu-toggler");

window.addEventListener("click", toggleNavigationOverlay);

function toggleNavigationOverlay(e) {
  const target = e.target;
  const togglerId = target.id;
  if (target.dataset.toggle && target.classList.contains("navbar-toggler")) {
    const isOpen = target.getAttribute("aria-expanded");
    const targetId = target.dataset.target.replace("#", "");
    if (isOpen != "false") createOverlay({ togglerId, targetId });
    else removeOverlay(togglerId);
  }
}

/* Handle Toggle Bottom Modal */
window.addEventListener("click", handleToggleBottomModal);

function handleToggleBottomModal(e) {
  const target = e.target;
  const modalId = target.dataset.toggle;

  if (modalId && target.classList.contains("modal-toggler")) {
    const modal = document.getElementById(target.dataset.toggle);
    const isVisible = modal.classList.contains("show");
    if (!isVisible) {
      modal.classList.add("show");
      createOverlay({
        togglerId: modalId,
        targetId: modalId,
        handler: () => {
          modal.classList.remove("show");
        },
        classNames: "full",
      });
    } else {
      modal.classList.remove("show");
      removeOverlay(modalId);
    }
  }
}

/* Handle Uncheck All Selected Modal Inputs */
window.addEventListener("click", handleResetSelection);

function handleResetSelection(e) {
  const target = e.target;
  const modalId = target.dataset.clear;
  if (modalId && target.classList.contains("clear-btn")) {
    const selectInputs = document.querySelectorAll("#" + modalId + " input");
    for (let input of selectInputs) {
      input.checked = false;
    }
  }
}
