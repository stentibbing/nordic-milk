/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  const siteNavigation = document.getElementById("site-navigation");

  // Return early if the navigation don't exist.
  if (!siteNavigation) {
    return;
  }

  const button = siteNavigation.getElementsByTagName("button")[0];

  // Return early if the button don't exist.
  if ("undefined" === typeof button) {
    return;
  }

  const menu = siteNavigation.getElementsByTagName("ul")[0];

  // Hide menu toggle button if menu is empty and return early.
  if ("undefined" === typeof menu) {
    button.style.display = "none";
    return;
  }

  if (!menu.classList.contains("nav-menu")) {
    menu.classList.add("nav-menu");
  }

  // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
  button.addEventListener("click", function () {
    siteNavigation.classList.toggle("toggled");

    if (button.getAttribute("aria-expanded") === "true") {
      button.setAttribute("aria-expanded", "false");
    } else {
      button.setAttribute("aria-expanded", "true");
    }
  });

  // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
  document.addEventListener("click", function (event) {
    const isClickInside = siteNavigation.contains(event.target);

    if (!isClickInside) {
      siteNavigation.classList.remove("toggled");
      button.setAttribute("aria-expanded", "false");
    }
  });

  // Get all the link elements within the menu.
  const links = menu.getElementsByTagName("a");

  // Get all the link elements with children within the menu.
  const linksWithChildren = menu.querySelectorAll(
    ".menu-item-has-children > a, .page_item_has_children > a"
  );

  // Toggle focus each time a menu link is focused or blurred.
  for (const link of links) {
    link.addEventListener("focus", toggleFocus, true);
    link.addEventListener("blur", toggleFocus, true);
  }

  // Toggle focus each time a menu link with children receive a touch event.
  for (const link of linksWithChildren) {
    link.addEventListener("touchstart", toggleFocus, false);
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    if (event.type === "focus" || event.type === "blur") {
      let self = this;
      // Move up through the ancestors of the current link until we hit .nav-menu.
      while (!self.classList.contains("nav-menu")) {
        // On li elements toggle the class .focus.
        if ("li" === self.tagName.toLowerCase()) {
          self.classList.toggle("focus");
        }
        self = self.parentNode;
      }
    }

    if (event.type === "touchstart") {
      const menuItem = this.parentNode;
      event.preventDefault();
      for (const link of menuItem.parentNode.children) {
        if (menuItem !== link) {
          link.classList.remove("focus");
        }
      }
      menuItem.classList.toggle("focus");
    }
  }
})();

// --- Burger menu toggle ---
(function ($) {
  $(() => {
    $("#burger-menu-button").click(event => {
      event.preventDefault();
      $("#burger-menu-container").toggleClass("opened");
      $("body").toggleClass("burger-menu-opened");
    });
  });
})(jQuery);

// --- Home page pagination ---
(function ($) {
  $(() => {
    let curPagination = 1;
    let textOrderNumber = 1;
    let imageOrderNumber = 1;

    const paginatedTexts = $(".nm-paginated-texts .wpb_text_column");
    const paginatedImages = $(".nm-paginated-images .wpb_single_image");

    function getMaxHeight() {
      let textMaxHeight = 0;
      paginatedTexts.each(function () {
        $(this).css("height", "auto");
        let curHeight =
          $(this).height() + parseInt($(this).css("margin-bottom"));
        if (curHeight > textMaxHeight) textMaxHeight = curHeight;
      });
      return textMaxHeight;
    }

    function setMaxHeight(curHeight) {
      paginatedTexts.each(function () {
        $(this).css("height", curHeight + "px");
      });
      $(".nm-paginated-texts").css("height", curHeight + "px");
    }

    function getPaginationText() {
      return curPagination + "/" + paginatedTexts.length;
    }

    function setPaginationText(paginationText) {
      $(".nm-pagination-number").html(paginationText);
    }

    setPaginationText(getPaginationText());
    setMaxHeight(getMaxHeight());

    $(window).resize(function () {
      setMaxHeight(getMaxHeight());
    });

    paginatedTexts.each(function () {
      $(this).addClass("nm-paginated-text-" + textOrderNumber);
      textOrderNumber++;
    });

    paginatedImages.each(function () {
      $(this).addClass("nm-paginated-image-" + imageOrderNumber);
      if (imageOrderNumber != 1) $(this).hide();
      imageOrderNumber++;
    });

    function renderActive(activeDelta) {
      oldPagination = curPagination;
      curPagination = curPagination + activeDelta;

      $(".nm-paginated-text-" + oldPagination).fadeOut(function () {
        $(".nm-paginated-text-" + curPagination).fadeIn();
      });
      $(".nm-paginated-image-" + oldPagination).fadeOut(function () {
        $(".nm-paginated-image-" + curPagination).fadeIn();
      });
    }

    if (paginatedTexts.length != 0) {
      $(".nm-pagination-left").click(e => {
        e.preventDefault();
        if (curPagination > 1) {
          renderActive(-1);
          setPaginationText(getPaginationText());
        }
      });

      $(".nm-pagination-right").click(e => {
        e.preventDefault();
        if (curPagination < paginatedTexts.length) {
          renderActive(+1);
          setPaginationText(getPaginationText());
        }
      });
    }
  });
})(jQuery);

// --- Home page pagination ---
(function ($) {
  if ($(document).height() <= $(window).height()) {
    $(".scroll-down").hide();
  }

  function applyScrollClasses() {
    if ($(window).scrollTop() > 0) {
      $(".scroll-down").addClass("scrolled");
      $(".scroll-down").removeClass("on-top");
    } else {
      $(".scroll-down").addClass("on-top");
      $(".scroll-down").removeClass("scrolled");
    }
  }

  $(".scroll-down").click(function () {
    if ($(window).scrollTop() > 0) {
      $("html,body").animate({ scrollTop: 0 }, "slow");
    }
  });

  applyScrollClasses();
  $(window).scroll(applyScrollClasses);
})(jQuery);

// Big Five initiative - add active heading class

(function ($) {
  $(() => {
    $(".elegant-expanding-section-heading-area").click(function () {
      $(this).toggleClass("active-section");
    });
  });
})(jQuery);
