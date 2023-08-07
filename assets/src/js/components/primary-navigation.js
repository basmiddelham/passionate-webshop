/* global TemplateVars */
import Collapse from "bootstrap/js/dist/collapse";

const primaryNavigation = document.getElementById("primary-navigation");

/**
 * Toggle primary navigation when navbar opens or collapses
 */
const hamburgerToggler = document.getElementById("hamburger-toggler");
const togglePrimaryNavigation = () => {
  hamburgerToggler.classList.toggle("is-active"); // Animate Hamburger-menu.
  document.body.classList.toggle("overflow-hidden"); // Fix background scrolling.
};
primaryNavigation.addEventListener("show.bs.collapse", togglePrimaryNavigation);
primaryNavigation.addEventListener("hide.bs.collapse", togglePrimaryNavigation);

/**
 * Hide menu on click. (Needed for one-pagers)
 */
primaryNavigation.querySelectorAll(".nav-link").forEach((l) => {
  l.addEventListener(
    "click",
    () => {
      if (Collapse.getInstance(primaryNavigation)) {
        Collapse.getInstance(primaryNavigation).hide();
      }
    },
    togglePrimaryNavigation
  );
});

/**
 * Create submenuToggle button for opening the submenu
 */
const submenuToggle = document.createElement("button");
Object.assign(submenuToggle, {
  className: "submenu-toggle",
  ariaExpanded: false,
  innerHTML:
    '<span class="screen-reader-text">' +
    TemplateVars.expand +
    '</span><svg xmlns="http://www.w3.org/2000/svg" width="13" height="7" aria-hidden="true" role="img"><path stroke="#979797" d="m.5.5 6 6m0 0 6-6"/></svg>',
});

/**
 * Add Collapse to first level sub-menus
 */
primaryNavigation
  .querySelectorAll(".navbar-nav > .menu-item > .sub-menu")
  .forEach((subMenu) => {
    new Collapse(subMenu, {
      toggle: false,
      parent: primaryNavigation,
    });
  });

/**
 * Add Collapse to second level sub-menus
 */
primaryNavigation
  .querySelectorAll(".sub-menu > .menu-item > .sub-menu")
  .forEach((subMenu) => {
    new Collapse(subMenu, {
      toggle: false,
      parent: subMenu.parentElement.parentElement,
    });
  });

/**
 * Loop through parentMenuItems
 */
const parentMenuItems = primaryNavigation.querySelectorAll(
  ".menu-item-has-children"
);
const toggleSubmenu = (event, item) => {
  event.stopPropagation();
  item.children[1].classList.toggle("toggled-on"); // Toggle class to animate dropdown arrow
  item.children[1].toggleAttribute("aria-expanded"); // Toggle aria-expanded attribute
  // Toggle translated screenreader text
  item.children[1].children[0].innerHTML =
    item.children[1].children[0].innerHTML === TemplateVars.expand
      ? TemplateVars.collapse
      : TemplateVars.expand;
};
parentMenuItems.forEach((item, index) => {
  item.children[0].after(submenuToggle.cloneNode(true)); // Add submenuToggle button.
  item.children[1].setAttribute("aria-controls", "submenu-" + index); // Add aria-controls.
  item.children[2].setAttribute("id", "submenu-" + index); // Add ID for aria-controls
  item.children[2].classList.add("collapse"); // Add 'collapse' class.
  item.children[2].addEventListener("show.bs.collapse", (event) => {
    toggleSubmenu(event, item);
  });
  item.children[2].addEventListener("hide.bs.collapse", (event) => {
    toggleSubmenu(event, item);
  });
});

/**
 * Open sub-menus on toggleBtn click
 */
primaryNavigation.querySelectorAll(".submenu-toggle").forEach((toggleBtn) => {
  toggleBtn.addEventListener("click", function () {
    Collapse.getInstance(this.nextElementSibling).toggle();
  });
});

/**
 * Improve the usabilty on touch devices.
 * Show the sub menu on the first click and only navigate on a second click for top-level menu items.
 */
const parentMenuLinks = primaryNavigation.querySelectorAll(
  ".menu-item-has-children > a"
);
if ("ontouchstart" in primaryNavigation) {
  const menuItemFocusedClass = "focus";
  let i;
  const touchStartFn = function (e) {
    const menuItem = this.parentElement;
    if (!menuItem.classList.contains(menuItemFocusedClass)) {
      e.preventDefault();
      const menuItemLength = menuItem.parentNode.children.length;
      for (i = 0; i < menuItemLength; ++i) {
        if (menuItem === menuItem.parentNode.children[i]) {
          continue;
        }
        menuItem.parentNode.children[i].classList.remove(menuItemFocusedClass);
      }
      menuItem.classList.add(menuItemFocusedClass);
      Collapse.getInstance(menuItem.children[2]).toggle();
    } else {
      menuItem.classList.remove(menuItemFocusedClass);
    }
  };
  for (i = 0; i < parentMenuLinks.length; ++i) {
    parentMenuLinks[i].addEventListener("touchstart", touchStartFn, {
      passive: false,
    });
  }
}
